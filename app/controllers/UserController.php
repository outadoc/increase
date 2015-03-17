<?php

	namespace increase\controllers;

	use increase\models\Projet;

	class UserController extends ControllerBase
	{

		public function projectAction($id)
		{
			$project = Projet::findFirst(array("id" => $id));

			$this->view->setVar("project", $project);
		}

	}

