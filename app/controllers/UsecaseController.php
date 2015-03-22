<?php

	namespace increase\controllers;

	use increase\models\Tache;

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

			$this->view->disable();

			$response = new \Phalcon\Http\Response();
			$response->setHeader("Content-Type", "application/json");
			$response->setContent(json_encode($result));

			return $response;
		}

	}