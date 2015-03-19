<?php

namespace increase\controllers;

use increase\models\Projet;
use increase\models\User;

class AuthorController extends ControllerBase
{

    public function projectAction($id)
    {
        $project = Projet::findFirst($id);

        $this->view->setVar("project", $project);
    }

    public function projectsAction($id)
    {
        $Author = User::findfirst(array("id" => $id));

        $this->view->setVar("Author", $Author);

        $projects = Projet::find(array("idAuthor" => $id));

        $this->view->setVar("projects", $projects);
    }

}
