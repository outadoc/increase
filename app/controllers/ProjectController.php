<?php

	namespace increase\controllers;

	use increase\models\Projet;

	class ProjectController extends ControllerBase
	{

		public function equipeAction($id)
		{
			// On récupère le projet concerné, ainsi que ses use cases
			$project = Projet::findFirst($id);
			$cases = $project->getUsecases();

			// On initialise les tableaux dont on va avoir besoin
			$devs = array();
			$devWeights = array();
			$total = 0;

			// On calcule les poids totaux de chaque développeur
			// Ex: Igor MINAR aura cas1.poids + cas2.poids ...
			foreach($cases as $case) {
				$devId = $case->getUser()->getId();

				if(!isset($devWeights[$devId])) {
					$devWeights[$devId] = 0;
				}

				$devWeights[$devId] += $case->getPoids();
				$total += $case->getPoids();
			}

			// On calcule les pourcentages pour chaque développeur, maintenant qu'on a le total
			// et le poids de chaque développeur
			foreach($cases as $case) {
				$dev = $case->getUser();

				if(isset($devs[$dev->getId()])) continue;

				$devs[$dev->getId()] = array(
					"name" => $dev->getIdentite(),
					"weight" => ($devWeights[$dev->getId()] / $total)
				);
			}

			$this->view->setVar("devs", $devs);
		}

	}