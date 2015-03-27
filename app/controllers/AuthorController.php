<?php

	namespace increase\controllers;

	use increase\models\Projet;
	use increase\models\User;

	class AuthorController extends ControllerBase
	{

		public function projectAction($projectId, $authorId)
		{
			$project  = Projet::findFirst($projectId);
			$messages = $project->getMessages_();
			$author   = User::findFirst($authorId);

			$this->jquery->getAndBindTo("#btnClose", "click", 'author/projects/' . $authorId, "html");
			$this->jquery->get('project/author/' . $projectId . '/' . $authorId, "#usecases-panel");
			$this->jquery->click("#btnMessages", $this->jquery->toggle("#divMessages"));
			$this->jquery->compile($this->view);

			$this->view->setVar("project", $project);
			$this->view->setVar("messages", $messages);
			$this->view->setVar("author", $author);
		}

		public function projectsAction($id)
		{
			$author   = User::findfirst(array("id" => $id));
			$projects = Projet::find(array("idAuthor" => $id));

			$this->view->setVar("Author", $author);
			$this->view->setVar("projects", $projects);
		}

	}
