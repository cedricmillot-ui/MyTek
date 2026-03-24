# Supabase (optionnel)

Objectif: garder MariaDB pour les projets simples et activer Supabase pour les projets plus complexes.

## Etapes de bascule (manuel)
1) Creer le projet Supabase (self-host ou cloud).
2) Recuperer l'URL et la cle API (service role / anon selon besoin).
3) Mettre a jour les variables d'env dans `.env`:
```
DB_HOST="supabase-db-host"
DB_PORT="5432"
DB_NAME="postgres"
DB_USER="postgres"
DB_PASS="ChangeMe"
```
4) Adapter le driver dans `core/Model.php` (MySQL -> PostgreSQL).
5) Mettre a jour les scripts d'init et les migrations si besoin.

## Conseils
- Garder MariaDB par defaut pour la simplicite.
- Documenter les differences de schema et de types SQL.
