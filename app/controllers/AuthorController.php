<?php

namespace increase\controllers;

use increase\models\Projet;
use increase\models\User;

class AuthorController extends ControllerBase
{

    public function projectAction($projectId, $authorId)
    {
	    $project = Projet::findFirst($projectId);
	    $messages = $project->getMessages_();
	    $author = User::findFirst($authorId);

	    $this->view->setVar("project", $project);
	    $this->view->setVar("messages", $messages);
	    $this->view->setVar("author", $author);
    }

    public function projectsAction($id)
    {
        $Author = User::findfirst(array("id" => $id));

        $this->view->setVar("Author", $Author);

        $projects = Projet::find(array("idAuthor" => $id));

        $this->view->setVar("projects", $projects);
    }

}
