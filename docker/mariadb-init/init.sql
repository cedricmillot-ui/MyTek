-- Révoque tous les privilèges existants de l'utilisateur pour repartir propre
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'byfect'@'%';

-- Accorde uniquement les droits nécessaires à l'application sur la base "byfect"
GRANT SELECT, INSERT, UPDATE, DELETE ON byfect.* TO 'byfect'@'%';

-- Applique les changements
FLUSH PRIVILEGES;
