#!/usr/bin/env bash
# Restaure un dump SQL dans la base MariaDB/MySQL via Docker Compose.
# Usage rapide:
#   scripts/db-restore.sh <backup_file.sql> [compose_file] [service]
# Exemple:
#   scripts/db-restore.sh docker/backups/db_YYYYMMDD_HHMMSS.sql docker-compose.dev.yml db
#   scripts/db-restore.sh docker/backups/db_YYYYMMDD_HHMMSS.sql docker-compose.yml db
# Execution:
# - Lancement manuel uniquement (eviter cron pour un restore).
set -euo pipefail

if [ $# -lt 1 ]; then
  echo "Usage: scripts/db-restore.sh <backup_file.sql> [compose_file] [service]"
  exit 1
fi

backup_file="$1"
compose_file="${2:-docker-compose.dev.yml}"
service="${3:-db}"

if [ -f ".env" ]; then
  # shellcheck disable=SC2046
  export $(grep -v '^#' .env | xargs 2>/dev/null || true)
fi

if [ ! -f "${backup_file}" ]; then
  echo "Backup file not found: ${backup_file}"
  exit 1
fi

import_cmd="mariadb"
if ! docker compose -f "${compose_file}" exec -T "${service}" command -v mariadb >/dev/null 2>&1; then
  import_cmd="mysql"
fi

docker compose -f "${compose_file}" exec -T "${service}" "${import_cmd}" \
  -u"${DB_USER:-byfect}" -p"${DB_PASS:-password}" "${DB_NAME:-byfect}" \
  < "${backup_file}"

echo "Restore OK: ${backup_file}"

# Notes:
# - Le restore ecrase les donnees existantes de la base cible.
# - Verifie le fichier et l'environnement (dev/prod) avant execution.
