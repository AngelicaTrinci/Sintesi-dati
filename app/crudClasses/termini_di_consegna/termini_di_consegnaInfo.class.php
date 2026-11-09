<?
class termini_di_consegnaInfo
{ 

		// Variables 
		var $codice;
		var $descrizione;


		/**
		* @return returns value of variable $codice
		* @desc getCodice : Getting value for variable $codice
		*/
		function getCodice()
		{
				return $this->codice;
		}

		/**
		* @param param : value to be saved in variable $codice
		* @desc setCodice : Setting value for $codice
		*/
		function setCodice($value)
		{
				$this->codice = $value;
		}

		/**
		* @return returns value of variable $descrizione
		* @desc getDescrizione : Getting value for variable $descrizione
		*/
		function getDescrizione()
		{
				return $this->descrizione;
		}

		/**
		* @param param : value to be saved in variable $descrizione
		* @desc setDescrizione : Setting value for $descrizione
		*/
		function setDescrizione($value)
		{
				$this->descrizione = $value;
		}

		// This is the constructor for this class
		// Initialize all your default variables here
		function termini_di_consegnaInfo()
		{

				$this->setCodice("");
				$this->setDescrizione("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setCodice("");
				$this->setDescrizione("");
		}

} 

?>