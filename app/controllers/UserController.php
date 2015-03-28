<?php

	namespace increase\controllers;

	use increase\models\Projet;
	use increase\models\User;

	class UserController extends ControllerBase
	{

		public function projectAction($id)
		{
			$project  = Projet::findFirst($id);
			$messages = $project->getMessages_();

			$this->jquery->getAndBindTo("#btnClose", "click", 'user/projects/' . $project->getIdclient(), "html");
			$this->jquery->get("project/equipe/" . $id, "#team-panel");
			$this->jquery->click("#btnMessages", $this->jquery->toggle("#divMessages"));
			$this->jquery->compile($this->view);

			$this->view->setVar("project", $project);
			$this->view->setVar("messages", $messages);
		}

		public function projectsAction($id)
		{
			$Client = User::findfirst(array("id" => $id));

			$this->view->setVar("Client", $Client);

			$projects = Projet::find(array("idClient" => $id));

			$this->view->setVar("projects", $projects);

			foreach ($projects as $project) {
				$this->jquery->getAndBindTo("#btnOuvrir", "click", 'user/project/' . $project->getIdclient(), "html");
			}

			foreach ($projects as $project) {
				$avancement = $project->getAvancement();
				$DateFin = new \DateTime($project->dateFinPrevue);
				$DateDeb = new \DateTime($project->dateLancement);
				$DateAuj = new \DateTime();
				$dureeTotal = date_diff($DateDeb, $DateFin);
				$dureeEcoule = date_diff($DateAuj, $DateFin);
				$temp = ($dureeEcoule / $dureeTotal) * 100;
				if ($temp > 100) {
					$this->view->setVar("couleur","danger");
				}
				elseif ($avancement >= $temp){
					$this->view->setVar("couleur","success");
				}
				elseif ($avancement < $temp)
					$this->view->setVar("couleur","warning");
			}

			$this->jquery->getAndBindTo("#btn", "click", "exemple/reponse","#panelReponse");
		}


	}

