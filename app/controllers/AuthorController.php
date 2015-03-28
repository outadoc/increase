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

			foreach ($projects as $project) {
				$this->jquery->getAndBindTo("#btnOuvrir", "click", 'author/project/' . $project->getIdclient(), "html");
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
