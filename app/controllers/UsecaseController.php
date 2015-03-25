<?php

	namespace increase\controllers;

	use increase\models\Tache;
	use Phalcon\Mvc\View;

	class UsecaseController extends ControllerBase
	{

		public function tachesAction($idUsecase)
		{
			$tasks  = Tache::findByCodeUseCase($idUsecase);
			$result = array();

			foreach ($tasks as $task) {
				$result[] = array(
					"id"       => $task->getId(),
					"label"    => $task->getLibelle(),
					"date"     => $task->getDate(),
					"progress" => $task->getAvancement()
				);
			}

			$this->view->setRenderLevel(View::LEVEL_LAYOUT);
			$this->view->setVar("tasks", $result);
		}

	}