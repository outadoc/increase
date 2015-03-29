<?php

	namespace increase\controllers;

	use increase\models\Projet;
	use increase\models\Usecase;
	use Phalcon\Mvc\View;

	class ProjectController extends ControllerBase
	{

		public function equipeAction($id)
		{
			// On récupère le projet concerné, ainsi que ses use cases
			$project = Projet::findFirst($id);
			$cases   = $project->getUsecases();

			// On initialise les tableaux dont on va avoir besoin
			$devs       = array();
			$devWeights = array();
			$total      = 0;

			// On calcule les poids totaux de chaque développeur
			// Ex: Igor MINAR aura cas1.poids + cas2.poids ...
			foreach ($cases as $case) {
				$devId = $case->getUser()->getId();

				if (!isset($devWeights[$devId])) {
					$devWeights[$devId] = 0;
				}

				$devWeights[$devId] += $case->getPoids();
				$total += $case->getPoids();
			}

			$added = array();

			// On calcule les pourcentages pour chaque développeur, maintenant qu'on a le total
			// et le poids de chaque développeur
			foreach ($cases as $case) {
				$dev = $case->getUser();

				if (in_array($dev->getId(), $added)) continue;

				$added[] = $dev->getId();

				$devs[] = array(
					"id"     => $dev->getId(),
					"name"   => $dev->getIdentite(),
					"weight" => round($devWeights[$dev->getId()] / $total * 100, 4)
				);
			}

			$this->view->setRenderLevel(View::LEVEL_LAYOUT);
			$this->view->setVar("devs", $devs);
		}

		public function authorAction($projectId, $authorId)
		{
			$usecases = Usecase::find(array(
				"conditions" => "idDev = ?1 AND idProjet = ?2",
				"bind"       => array(1 => $authorId, 2 => $projectId)
			));

			$result = array();

			foreach ($usecases as $usecase) {
				$nbTaches = count($usecase->getTaches());

				$result[] = array(
					"code"     => $usecase->getCode(),
					"weight"   => (int)$usecase->getPoids(),
					"nb_tasks" => $nbTaches,
					"progress" => $usecase->getAvancement()
				);

				$this->jquery->getAndBindTo("#useCase-" . $usecase->getCode(),
					"click", "usecase/taches/" . $usecase->getCode(),
					"#divUseCase-" . $usecase->getCode(),
					true,
					"function() {" . $this->jquery->toggle("#divUseCase-" . $usecase->getCode()) . "}");
			}

			$this->jquery->compile($this->view);

			$this->view->setRenderLevel(View::LEVEL_LAYOUT);
			$this->view->setVar("usecases", $result);
		}

	}