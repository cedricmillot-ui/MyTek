# template_web — Guide de demarrage

SDK maison pour sites vitrines en PHP (MVC leger, routing simple, UI base).
Ce guide permet de lancer un nouveau projet proprement, du clonage au run.

## 1) Installation rapide (dev)
```
git clone <URL_DU_REPO>
cd template_web
cp .env.example .env
```

## 2) Configurer l'environnement
Ouvrir `.env` et verifier:
- `APP_ENV="dev"`
- `APP_URL="http://localhost"`
- `APP_BASE_PATH="/public"` (si tu sers via nginx du template)
- `DB_HOST="db"`
- `DB_NAME`, `DB_USER`, `DB_PASS` coherents

## 3) Lancer les conteneurs (dev)
```
docker compose -f docker-compose.dev.yml up -d
docker compose --env-file .env -f docker-compose.dev.yml up -d --build
```
Acces:
- Site: http://localhost
- phpMyAdmin: http://localhost:8080

## 4) Tester la DB
- Ouvrir `/dbtest` dans le navigateur.
- Si erreur, verifier les variables DB dans `.env`.

## 5) Creer une nouvelle page
1) Route dans `app/config/routes/` (ex: `app/config/routes/main.php`)
2) Controleur dans `app/controllers/`
3) Vue dans `app/views/`
4) CSS page dans `public/assets/css/pages/`

Exemple route:
```
return [
  '/ma-page' => 'App\\Controllers\\MainController@maPage',
];
```

## 6) Modifier le style global
- Variables globales: `public/assets/css/base.css`
- Styles page: `public/assets/css/pages/<slug>.css`

## 7) JS global (menu, etc.)
- Fichier global: `public/assets/js/app.js`
- JS par page: `public/assets/js/pages/<slug>.js` (optionnel)

## 8) Sauvegarde MariaDB
Backup manuel:
```
scripts/db-backup.sh docker-compose.dev.yml db
```
Restore:
```
scripts/db-restore.sh docker/backups/db_YYYYMMDD_HHMMSS.sql docker-compose.dev.yml db
```

## 9) Cron pour backups auto
Les exemples de cron sont deja dans `scripts/db-backup.sh`.
Pour activer:
```
crontab -e
```
Colle la ligne voulue depuis le script.

## 10) Production (compose standard)
```
docker compose -f docker-compose.yml up -d
```
Note: en prod, securiser l'acces DB et changer tous les mots de passe.

## 11) Supabase (option)
Si projet plus complexe, voir `docs/supabase.md`.

## Commandes utiles (Docker / Git / Linux)
Docker:
```
docker compose -f docker-compose.dev.yml up -d
docker compose -f docker-compose.dev.yml down
docker compose -f docker-compose.dev.yml ps
docker compose -f docker-compose.dev.yml logs -f
docker compose -f docker-compose.dev.yml exec db mariadb -u${DB_USER} -p${DB_PASS} ${DB_NAME}
docker compose -f docker-compose.dev.yml exec php bash
docker compose -f docker-compose.dev.yml build --no-cache
```

Git:
```
git status -sb
git add .
git commit -m "Message de commit"
git push -u origin main
git branch -m main
```

Linux:
```
ls -la
pwd
cp .env.example .env
chmod +x scripts/db-backup.sh scripts/db-restore.sh
```

## Checklist avant nouveau projet
- [ ] Copier `.env.example` vers `.env`
- [ ] Regler `APP_URL`, `APP_ENV`, `DB_*`
- [ ] Verifier les routes
- [ ] Adapter le theme CSS
- [ ] Activer backup si besoin



## Procédure : dupliquer `template_web` en nouveau site `web-<client>` + repo Git propre (main + dev)

### Pré-requis
- `template_web` existe déjà en local
- GitHub en SSH
- 1 repo par site (indépendant du template)

---

### 1) Dupliquer le template
```bash
cd ~/Documents/PROJETS/DEV
cp -a template_web web-CLIENT
cd web-CLIENT
