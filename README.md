# Test technique Adimeo - Jérémy Kervran

## Dépendances techniques

* PHP 8.2+
* Composer v2
* Lando v3

## Setup

Créer le fichier `.env` depuis `.env.local` :
```bash
cp .env.local .env
```

Lancer le projet via Lando :
```bash
lando start
```

S'assurer de la bonne installation des dépendances Composer :
```bash
composer install
```

Importer la base de données :
```shell
lando wp db import adimeo-dump.sql
```

## Comptes utilisateurs

Un compte utilisateur est créé pour chaque rôle. Voici les identifiants et mots de passe :

* Administrator : `adimeo` / `adimeo`
* Editor : `editor` / `adimeo`
* Author : `author` / `adimeo`
* Contributor : `contributor` / `adimeo`
* Subscriber : `subscriber` / `adimeo`