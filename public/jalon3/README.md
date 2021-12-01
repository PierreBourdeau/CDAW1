## Jalon 3 - Projet CDAW :rocket:

### Liste des objectifs :pencil2:

> - [X] Migrer le projet en local[^1]
> - [X] Implémentation de l'authentification[^2]
> - [ ] Implémentation des tests
> - [X] La réalisation et l'implémentation des différents modèles et de la base de données & de différentes requêtes utiles au projet[^3].

Dans le dossier `jalon2` se trouve : 
* Un site "exemple" pour gérer l'affichage des films récupérés via l'API ImDB.
* Au format pdf : le modèle de base de données : MCD & MLD.

[^1]: Cette migration est induite par un problème de performance inhérent à l'utilisation de Docker Desktop sur Windows. Nous disposons d'un Ordinateur MacOS poursuivant l'exécution de l'application sur Docker et un ordinateur Windows passé en local.
[^2]: L'authentification était déja réalisé au jalon précédent. La fonctionnalité de vérification a étée retirée dans un soucis de délai mais peut-être ré-implémentée. Deux comptes sont disponible lors du `seeding`de la base de données. Voir : [README](https://github.com/PierreBourdeau/UV_CDAW_Projet/tree/master/public/Projet/catalogue).
[^3]: La plupart des modèles et des requêtes utiles au projet étaient déja, lors du jalon 2, implémentées directement dans l'application **Laravel**. D'autres modèles,tables et requêtes ont été ajoutés directement dans le projet Laravel via **Eloquent ORM**. 

## :warning: Important

:pushpin: Les modifications apportées au cours de la réalisation de ce projet, conformément aux jalons, s'effectuent directement sur l'application Laravel se trouvant dans : [`public/Projet/catalogue`](https://github.com/PierreBourdeau/UV_CDAW_Projet/tree/master/public/Projet/catalogue)

Dans ce dossier se trouve un fichier [README](https://github.com/PierreBourdeau/UV_CDAW_Projet/tree/master/public/Projet/catalogue) expliquant la démarche à suivre pour faire fonctionner l'application.


> **Ainsi l'application de référence pour les jalons est : [`public/Projet/catalogue`](https://github.com/PierreBourdeau/UV_CDAW_Projet/tree/master/public/Projet/catalogue)**