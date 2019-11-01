# Enseignement specialisé
Gestion de l'enseignement spécialisé. Le plugin doit être placé dans /plugins/digitalartisan/enseignement.

## Fonctions et tables :

- Elèves
- Ecoles
- Enseignants
- Interlocuteurs (professionnels de la santé ou autres)
- Suivi des élèves pour l'enseignement spécialisé

## Mise à jour du plugin (migration & seed):

Attention : cette commande efface toutes les données déjà présentes dans la base de données.

```shell
php artisan plugin:refresh digitalartisan.enseignement
```

## Plugins nécessaires :

- DynamicPDF
