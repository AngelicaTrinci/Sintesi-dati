<?
class pm_toscotecInfo
{ 

		// Variables 
		var $Id;
		var $Nome;


		/**
		* @return returns value of variable $Id
		* @desc getId : Getting value for variable $Id
		*/
		function getId()
		{
				return $this->Id;
		}

		/**
		* @param param : value to be saved in variable $Id
		* @desc setId : Setting value for $Id
		*/
		function setId($value)
		{
				$this->Id = $value;
		}

		/**
		* @return returns value of variable $Nome
		* @desc getNome : Getting value for variable $Nome
		*/
		function getNome()
		{
				return $this->Nome;
		}

		/**
		* @param param : value to be saved in variable $Nome
		* @desc setNome : Setting value for $Nome
		*/
		function setNome($value)
		{
				$this->Nome = $value;
		}

		// This is the constructor for this class
		// Initialize all your default variables here
		function pm_toscotecInfo()
		{

				$this->setId("");
				$this->setNome("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setId("");
				$this->setNome("");
		}

} 

?>