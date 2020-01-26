# Enseignement specialisé

Gestion de l'enseignement spécialisé. Le plugin doit être placé dans /plugins/digitalartisan/enseignement.

## Fonctions et tables :

- Elèves
- Ecoles
- Enseignants
- Interlocuteurs (professionnels de la santé ou autres)
- Suivi des élèves pour l'enseignement spécialisé
- Fonctions professionnelles
- Mesures thérapeuthiques

## Installation

- Créer un nouveau projet vide (avec Laragon par exemple)
- Se rendre dans le dossier www du projet

```shell
composer create-project october/october .
```

Mettre à jour les dépendances

```shell
composer update
```

Puis lancer l'installateur :

```shell
php artisan october:install
```

Source : https://octobercms.com/docs/console/commands#console-install

## Cloner le projet :

- Créer un dossier plugins/digitalartisan/enseignement
- Se rendre dans le dossier enseignement

```shell
git init
git remot add origin {URL du projet sous GIT}
git pull origin master
```

## Mise à jour du plugin (migration & seed):

Attention : cette commande efface toutes les données déjà présentes dans la base de données.

```shell
php artisan plugin:refresh digitalartisan.enseignement
```

## Plugins nécessaires :

- DynamicPDF
