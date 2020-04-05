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

## Installation de OctoberCMS avec curl (à préférer)

- Créer un nouveau projet vide (avec Laragon par exemple)
- Se rendre dans le dossier du projet

```shell
curl -s https://octobercms.com/api/installer | php
```

Lancer l'installation (base de données et autres données) :

```shell
php artisan october:install
```

Pour mettre à jour les migrations, ne pas utiliser artisan migrate, mais :

```shell
php artisan october:up
```

## Installation de OctoberCMS avec composer

- Créer un nouveau projet vide (avec Laragon par exemple)
- Se rendre dans le dossier www du projet

```shell
composer create-project october/october .
```

Modifier le fichier /config/cms.php pour éviter que les mises à jour ne se fasse par le GUI (on utilise composer) :

```shell
'disableCoreUpdates' => true,
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

## Installation du plugin :

- Créer un dossier plugins/digitalartisan/enseignement
- Se rendre dans le dossier enseignement

```shell
git init
git remote add origin https://github.com/najbo/enseignement-specialise.git
git pull origin master
```

Retourner dans le dossier du projet et lancer la commande up :

```shell
php artisan october:up
```


## Mise à jour du plugin (migration & seed):

Attention : cette commande efface toutes les données déjà présentes dans la base de données.

```shell
php artisan plugin:refresh digitalartisan.enseignement
```

## Plugins nécessaires :

- DynamicPDF
