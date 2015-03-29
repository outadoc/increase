increase
==========

![Increase logo](http://open-beer.kobject.net/img/Increase.png "Increase logo")

A Phalcon web application to manage the progress of projects, and improve communication with the customer.

Who are we
----------

This project was started by @jcheron and developed by Ophélie Mendes and Baptiste Candellier.

Fonctionnalités
---------------

Les différents contrôleurs et actions implémentés sont :

### author/project/{projet}/{auteur}

Affiche la vue auteur pour un projet, avec la liste des usecases, la liste des tâches au clic sur les usecases, et la 
sélection d'une tâche. Le bouton "Ajouter une tâche" ouvre une modale mais la modale ne fait rien.

La liste des messages fonctionne et les messages s'affichent par fil de discussion de façon récursive 
(parent -> enfants -> petits-enfants...)

### author/projects/{auteur}

Affiche la liste des projets d'un auteur, avec une barre de progression montrant l'avancement de chaque projet, le 
nombre de jours restants avant la clôture, et les boutons pour ouvrir le projet.

### user/project/{projet}

Affiche les détails du projet et l'équipe, avec l'avancement du travail de chaque développeur.


Autres
------

Les contrôleurs nécessaires aux requêtes AJAX sont bien évidemment implémentés eux aussi.  
Toute l'application utilise phalcon-jquery pour le code contrôleur côté client.