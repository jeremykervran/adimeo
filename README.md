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

## Points de friction rencontrés

* Rôle et capacités des utilisateurs : mauvaise interprétation de la consigne dans un premier temps. Puis complexité à mettre en place le système demandé, obligation de passer par Javascript qui n'est pas mon point fort.
* Champs jour/mois/année de la Base Documentaire : la consigne nécessitant des champs select, j'ai dû implémenter une solution que je trouve un peu bancale pour la vérification de la date. Un datepicker n'aurait-il pas eu plus de sens ?
* Timber : n'ayant pas utilisé Timber depuis plusieurs années, j'ai dû me replonger dans la documentation, notamment pour la nécessité de refaire un `get_post()` dans le template Twig, et l'accès aux champs ACF via `.meta()`
* Lando/Docker : quelques petits soucis sur ma machine à cause d'autres projets personnels, un peu de temps perdu à réparer/supprimer certaines configurations.