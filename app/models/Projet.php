<?php

	namespace increase\models;

	class Projet extends \Phalcon\Mvc\Model
	{

		/**
		 *
		 * @var integer
		 */
		protected $id;

		/**
		 *
		 * @var string
		 */
		protected $nom;

		/**
		 *
		 * @var string
		 */
		protected $description;

		/**
		 *
		 * @var string
		 */
		protected $dateLancement;

		/**
		 *
		 * @var string
		 */
		protected $dateFinPrevue;

		/**
		 *
		 * @var integer
		 */
		protected $idClient;

		public function initialize()
		{
			$this->belongsTo("idClient", 'increase\models\User', "id", array(
				'alias' => 'User'
			));

			$this->hasMany("id", 'increase\models\Message', "idProjet", array(
				'alias' => 'Messages_'
			));

			$this->hasMany("id", 'increase\models\Usecase', "idProjet", array(
				'alias' => 'Usecases'
			));
		}

		/**
		 * Method to set the value of field id
		 *
		 * @param integer $id
		 * @return $this
		 */
		public function setId($id)
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Method to set the value of field nom
		 *
		 * @param string $nom
		 * @return $this
		 */
		public function setNom($nom)
		{
			$this->nom = $nom;

			return $this;
		}

		/**
		 * Method to set the value of field description
		 *
		 * @param string $description
		 * @return $this
		 */
		public function setDescription($description)
		{
			$this->description = $description;

			return $this;
		}

		/**
		 * Method to set the value of field dateLancement
		 *
		 * @param string $dateLancement
		 * @return $this
		 */
		public function setDatelancement($dateLancement)
		{
			$this->dateLancement = $dateLancement;

			return $this;
		}

		/**
		 * Method to set the value of field dateFinPrevue
		 *
		 * @param string $dateFinPrevue
		 * @return $this
		 */
		public function setDatefinprevue($dateFinPrevue)
		{
			$this->dateFinPrevue = $dateFinPrevue;

			return $this;
		}

		/**
		 * Method to set the value of field idClient
		 *
		 * @param integer $idClient
		 * @return $this
		 */
		public function setIdclient($idClient)
		{
			$this->idClient = $idClient;

			return $this;
		}

		/**
		 * Returns the value of field id
		 *
		 * @return integer
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Returns the value of field nom
		 *
		 * @return string
		 */
		public function getNom()
		{
			return $this->nom;
		}

		/**
		 * Returns the value of field description
		 *
		 * @return string
		 */
		public function getDescription()
		{
			return $this->description;
		}

		/**
		 * Returns the value of field dateLancement
		 *
		 * @return string
		 */
		public function getDatelancement()
		{
			return $this->dateLancement;
		}

		public function getDatelancementStr()
		{
			return date('d/m/Y', strtotime($this->dateLancement));
		}

		/**
		 * Returns the value of field dateFinPrevue
		 *
		 * @return string
		 */
		public function getDatefinprevue()
		{
			return $this->dateFinPrevue;
		}

		public function getDatefinprevueStr()
		{
			return date('d/m/Y', strtotime($this->dateFinPrevue));
		}

		/**
		 * Returns the value of field idClient
		 *
		 * @return integer
		 */
		public function getIdclient()
		{
			return $this->idClient;
		}

		public function getAvancement() {
			$usecases = $this->getUsecases();
			$total = 0;
			$res = 0;
			foreach ($usecases as $usecase) {
				$total += $usecase->getPoids();
			}

			foreach ($usecases as $usecase) {
				$res += $usecase->getPoids() / $total * 100 * $usecase->getAvancement();
			}

			return round($res /100);
		}

		public function getJourRest() {
			$DateFin = new \DateTime($this ->dateFinPrevue);
			$DateAuj = new \DateTime();
			$res = date_diff($DateAuj,$DateFin);

			return $res->format('%a jours restant');

		}

	}
