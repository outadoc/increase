<?php

	namespace increase\controllers;

	use increase\models\Projet;
	use increase\models\User;

	class UserController extends ControllerBase
	{

		public function projectAction($id)
		{
			$project = Projet::findFirst($id);

			$this->view->setVar("project", $project);
		}

		public function projectsAction($id)
		{
			$Client = User::findfirst(array("id" => $id));

			$this->view->setVar("Client", $Client);

			$projects = Projet::find(array("idClient" => $id));

			$this->view->setVar("projects", $projects);
		}

	}

