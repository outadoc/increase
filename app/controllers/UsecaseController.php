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

			$this->jquery->click(".tache", $this->jquery->show("$(this).parent().find('.btns')"));
			$this->jquery->click(".tache", $this->jquery->removeClass("$(this).parent().find('.tache')", "active"));
			$this->jquery->click(".tache", $this->jquery->addClass("this", "active"));

			$this->jquery->click(".btn-add-task", "$('#modal-add-task').modal()");

			$this->jquery->compile($this->view);

			$this->view->setRenderLevel(View::LEVEL_LAYOUT);
			$this->view->setVar("tasks", $result);
		}

	}