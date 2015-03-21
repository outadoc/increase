<?php

	namespace increase\controllers;

	use increase\models\Projet;
	use increase\models\User;

	class UserController extends ControllerBase
	{

		public function projectAction($id)
		{
			$project = Projet::findFirst($id);
			$messages = $project->getMessages_();

			$this->view->setVar("project", $project);
			$this->view->setVar("messages", $messages);
		}

		public function projectsAction($id)
		{
			$Client = User::findfirst(array("id" => $id));

			$this->view->setVar("Client", $Client);

			$projects = Projet::find(array("idClient" => $id));

			$this->view->setVar("projects", $projects);
		}

	}

