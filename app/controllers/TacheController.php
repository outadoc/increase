<?php

	namespace increase\controllers;

	use increase\models\Tache;

	class TacheController extends ControllerBase
	{

		public function updateAction($id)
		{
			$request = new \Phalcon\Http\Request();
			$task    = Tache::find($id);

			$task->setLibelle($request->getPost("libelle"));
			$task->setDate($request->getPost("date"));
			$task->setAvancement($request->getPost("avancement"));

			$task->save();
			$this->view->disable();
		}

		public function insertAction()
		{
			$request = new \Phalcon\Http\Request();
			$task    = new Tache();

			$task->setLibelle($request->getPost("libelle"));
			$task->setDate($request->getPost("date"));
			$task->setAvancement($request->getPost("avancement"));
			$task->setCodeusecase($request->getPost("codeUseCase"));

			$task->save();
			$this->view->disable();
		}
	}
