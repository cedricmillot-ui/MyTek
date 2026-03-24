#!/usr/bin/env bash
# Sauvegarde SQL d'une base MariaDB/MySQL via Docker Compose.
# Usage rapide:
#   scripts/db-backup.sh [compose_file] [service]
# Exemple:
#   scripts/db-backup.sh docker-compose.dev.yml db
#   scripts/db-backup.sh docker-compose.yml db
# Execution:
# - Lancement manuel quand besoin.
# - Cron possible pour dump regulier.
#   Etapes rapides pour activer cron:
#   1) crontab -e
#   2) coller une ligne ci-dessous
#   3) crontab -l pour verifier
#   Modifier un cron:
#   - crontab -e, modifier la ligne, sauvegarder.
#   Supprimer un cron specifique:
#   - crontab -e, supprimer la ligne concerne, sauvegarder.
#   Supprimer tous les cron:
#   - crontab -r (attention: supprime tout le crontab utilisateur).
#   Toutes les 30 min:  */30 * * * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les 1h:     0 * * * *   /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les 3h:     0 */3 * * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les 4h:     0 */4 * * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les 6h:     0 */6 * * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les 12h:    0 */12 * * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Tous les jours:    0 2 * * *   /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Tous les 3 jours:  0 2 */3 * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Toutes les semaines (dimanche): 0 2 * * 0 /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
#   Tous les mois (1er): 0 2 1 * * /path/to/template_web/scripts/db-backup.sh docker-compose.dev.yml db
set -euo pipefail

if [ -f ".env" ]; then
  # shellcheck disable=SC2046
  export $(grep -v '^#' .env | xargs 2>/dev/null || true)
fi

compose_file="${1:-docker-compose.dev.yml}"
service="${2:-db}"
timestamp="$(date +"%Y%m%d_%H%M%S")"
backup_dir="docker/backups"
backup_file="${backup_dir}/db_${timestamp}.sql"
retain_count="${RETAIN_COUNT:-30}"

mkdir -p "${backup_dir}"

dump_cmd="mariadb-dump"
if ! docker compose -f "${compose_file}" exec -T "${service}" command -v mariadb-dump >/dev/null 2>&1; then
  dump_cmd="mysqldump"
fi

docker compose -f "${compose_file}" exec -T "${service}" "${dump_cmd}" \
  -u"${DB_USER:-byfect}" -p"${DB_PASS:-password}" "${DB_NAME:-byfect}" \
  > "${backup_file}"

echo "Backup OK: ${backup_file}"

# Rotation: garde seulement les N derniers dumps (N = RETAIN_COUNT).
# Modifier RETAIN_COUNT ici ou en variable d'environnement:
#   RETAIN_COUNT=15 scripts/db-backup.sh docker-compose.dev.yml db
if [ "${retain_count}" -gt 0 ]; then
  ls -1t "${backup_dir}"/db_*.sql 2>/dev/null | tail -n +"$((retain_count + 1))" | xargs -r rm -f
fi

# Notes:
# - Le backup est ecrit dans docker/backups/ et ignore par git.
# - Pense a purger regulierement les anciens dumps si tu utilises cron.
# - La rotation automatique peut etre desactivee avec RETAIN_COUNT=0.
