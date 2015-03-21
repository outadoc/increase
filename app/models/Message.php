<?php

	namespace increase\models;

	class Message extends \Phalcon\Mvc\Model
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
		protected $objet;

		/**
		 *
		 * @var string
		 */
		protected $content;

		/**
		 *
		 * @var string
		 */
		protected $date;

		/**
		 *
		 * @var integer
		 */
		protected $idUser;

		/**
		 *
		 * @var integer
		 */
		protected $idProjet;

		/**
		 *
		 * @var integer
		 */
		protected $idFil;

		public function initialize()
		{
			$this->belongsTo("idUser", 'increase\models\User', "id", array(
				'alias' => 'Emetteur'
			));

			$this->belongsTo("idProjet", 'increase\models\Projet', "id", array(
				'alias' => 'Projet'
			));

			$this->belongsTo("idFil", 'increase\models\Message', "id", array(
				'alias' => 'Parent'
			));

			$this->hasMany("id", 'increase\models\Message', "idFil", array(
				'alias' => 'Children'
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
		 * Method to set the value of field objet
		 *
		 * @param string $objet
		 * @return $this
		 */
		public function setObjet($objet)
		{
			$this->objet = $objet;

			return $this;
		}

		/**
		 * Method to set the value of field content
		 *
		 * @param string $content
		 * @return $this
		 */
		public function setContent($content)
		{
			$this->content = $content;

			return $this;
		}

		/**
		 * Method to set the value of field date
		 *
		 * @param string $date
		 * @return $this
		 */
		public function setDate($date)
		{
			$this->date = $date;

			return $this;
		}

		/**
		 * Method to set the value of field idUser
		 *
		 * @param integer $idUser
		 * @return $this
		 */
		public function setIduser($idUser)
		{
			$this->idUser = $idUser;

			return $this;
		}

		/**
		 * Method to set the value of field idProjet
		 *
		 * @param integer $idProjet
		 * @return $this
		 */
		public function setIdprojet($idProjet)
		{
			$this->idProjet = $idProjet;

			return $this;
		}

		/**
		 * Method to set the value of field idFil
		 *
		 * @param integer $idFil
		 * @return $this
		 */
		public function setIdfil($idFil)
		{
			$this->idFil = $idFil;

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
		 * Returns the value of field objet
		 *
		 * @return string
		 */
		public function getObjet()
		{
			return $this->objet;
		}

		/**
		 * Returns the value of field content
		 *
		 * @return string
		 */
		public function getContent()
		{
			return $this->content;
		}

		/**
		 * Returns the value of field date
		 *
		 * @return string
		 */
		public function getDate()
		{
			return $this->date;
		}

		public function getFormattedDate()
		{
			return date("d/m/Y à H:i", strtotime($this->date));
		}

		/**
		 * Returns the value of field idUser
		 *
		 * @return integer
		 */
		public function getIduser()
		{
			return $this->idUser;
		}

		/**
		 * Returns the value of field idProjet
		 *
		 * @return integer
		 */
		public function getIdprojet()
		{
			return $this->idProjet;
		}

		/**
		 * Returns the value of field idFil
		 *
		 * @return integer
		 */
		public function getIdfil()
		{
			return $this->idFil;
		}

	}
