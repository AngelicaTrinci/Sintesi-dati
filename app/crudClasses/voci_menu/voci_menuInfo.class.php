<?
class voci_menuInfo
{ 

		// Variables 
		var $Id_voce;
		var $Voce;
		var $File_php;
		var $Tipo;
		var $Id_voce_padre;
		var $Posizione;
		var $Attivo;
		var $Immagine;


		/**
		* @return returns value of variable $Id_voce
		* @desc getId_voce : Getting value for variable $Id_voce
		*/
		function getId_voce()
		{
				return $this->Id_voce;
		}

		/**
		* @param param : value to be saved in variable $Id_voce
		* @desc setId_voce : Setting value for $Id_voce
		*/
		function setId_voce($value)
		{
				$this->Id_voce = $value;
		}

		/**
		* @return returns value of variable $Voce
		* @desc getVoce : Getting value for variable $Voce
		*/
		function getVoce()
		{
				return $this->Voce;
		}

		/**
		* @param param : value to be saved in variable $Voce
		* @desc setVoce : Setting value for $Voce
		*/
		function setVoce($value)
		{
				$this->Voce = $value;
		}

		/**
		* @return returns value of variable $File_php
		* @desc getFile_php : Getting value for variable $File_php
		*/
		function getFile_php()
		{
				return $this->File_php;
		}

		/**
		* @param param : value to be saved in variable $File_php
		* @desc setFile_php : Setting value for $File_php
		*/
		function setFile_php($value)
		{
				$this->File_php = $value;
		}

		/**
		* @return returns value of variable $Tipo
		* @desc getTipo : Getting value for variable $Tipo
		*/
		function getTipo()
		{
				return $this->Tipo;
		}

		/**
		* @param param : value to be saved in variable $Tipo
		* @desc setTipo : Setting value for $Tipo
		*/
		function setTipo($value)
		{
				$this->Tipo = $value;
		}

		/**
		* @return returns value of variable $Id_voce_padre
		* @desc getId_voce_padre : Getting value for variable $Id_voce_padre
		*/
		function getId_voce_padre()
		{
				return $this->Id_voce_padre;
		}

		/**
		* @param param : value to be saved in variable $Id_voce_padre
		* @desc setId_voce_padre : Setting value for $Id_voce_padre
		*/
		function setId_voce_padre($value)
		{
				$this->Id_voce_padre = $value;
		}

		/**
		* @return returns value of variable $Posizione
		* @desc getPosizione : Getting value for variable $Posizione
		*/
		function getPosizione()
		{
				return $this->Posizione;
		}

		/**
		* @param param : value to be saved in variable $Posizione
		* @desc setPosizione : Setting value for $Posizione
		*/
		function setPosizione($value)
		{
				$this->Posizione = $value;
		}

		/**
		* @return returns value of variable $Attivo
		* @desc getAttivo : Getting value for variable $Attivo
		*/
		function getAttivo()
		{
				return $this->Attivo;
		}

		/**
		* @param param : value to be saved in variable $Attivo
		* @desc setAttivo : Setting value for $Attivo
		*/
		function setAttivo($value)
		{
				$this->Attivo = $value;
		}

		/**
		* @return returns value of variable $Immagine
		* @desc getImmagine : Getting value for variable $Immagine
		*/
		function getImmagine()
		{
				return $this->Immagine;
		}

		/**
		* @param param : value to be saved in variable $Immagine
		* @desc setImmagine : Setting value for $Immagine
		*/
		function setImmagine($value)
		{
				$this->Immagine = $value;
		}

		// This is the constructor for this class
		// Initialize all your default variables here
		function voci_menuInfo()
		{

				$this->setId_voce("");
				$this->setVoce("");
				$this->setFile_php("");
				$this->setTipo("");
				$this->setId_voce_padre("");
				$this->setPosizione("");
				$this->setAttivo("");
				$this->setImmagine("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setId_voce("");
				$this->setVoce("");
				$this->setFile_php("");
				$this->setTipo("");
				$this->setId_voce_padre("");
				$this->setPosizione("");
				$this->setAttivo("");
				$this->setImmagine("");
		}

} 

?>