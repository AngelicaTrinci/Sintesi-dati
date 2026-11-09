<?
class utenti_gruppiInfo
{ 

		// Variables 
		var $Id_gruppo;
		var $Descrizione;
		var $Note;
		var $Utente_creazione;
		var $Data_ora_creazione;
		var $Utente_modifica;
		var $Data_ora_modifica;


		/**
		* @return returns value of variable $Id_gruppo
		* @desc getId_gruppo : Getting value for variable $Id_gruppo
		*/
		function getId_gruppo()
		{
				return $this->Id_gruppo;
		}

		/**
		* @param param : value to be saved in variable $Id_gruppo
		* @desc setId_gruppo : Setting value for $Id_gruppo
		*/
		function setId_gruppo($value)
		{
				$this->Id_gruppo = $value;
		}

		/**
		* @return returns value of variable $Descrizione
		* @desc getDescrizione : Getting value for variable $Descrizione
		*/
		function getDescrizione()
		{
				return $this->Descrizione;
		}

		/**
		* @param param : value to be saved in variable $Descrizione
		* @desc setDescrizione : Setting value for $Descrizione
		*/
		function setDescrizione($value)
		{
				$this->Descrizione = $value;
		}

		/**
		* @return returns value of variable $Note
		* @desc getNote : Getting value for variable $Note
		*/
		function getNote()
		{
				return $this->Note;
		}

		/**
		* @param param : value to be saved in variable $Note
		* @desc setNote : Setting value for $Note
		*/
		function setNote($value)
		{
				$this->Note = $value;
		}

		/**
		* @return returns value of variable $Utente_creazione
		* @desc getUtente_creazione : Getting value for variable $Utente_creazione
		*/
		function getUtente_creazione()
		{
				return $this->Utente_creazione;
		}

		/**
		* @param param : value to be saved in variable $Utente_creazione
		* @desc setUtente_creazione : Setting value for $Utente_creazione
		*/
		function setUtente_creazione($value)
		{
				$this->Utente_creazione = $value;
		}

		/**
		* @return returns value of variable $Data_ora_creazione
		* @desc getData_ora_creazione : Getting value for variable $Data_ora_creazione
		*/
		function getData_ora_creazione()
		{
				return $this->Data_ora_creazione;
		}

		/**
		* @param param : value to be saved in variable $Data_ora_creazione
		* @desc setData_ora_creazione : Setting value for $Data_ora_creazione
		*/
		function setData_ora_creazione($value)
		{
				$this->Data_ora_creazione = $value;
		}

		/**
		* @return returns value of variable $Utente_modifica
		* @desc getUtente_modifica : Getting value for variable $Utente_modifica
		*/
		function getUtente_modifica()
		{
				return $this->Utente_modifica;
		}

		/**
		* @param param : value to be saved in variable $Utente_modifica
		* @desc setUtente_modifica : Setting value for $Utente_modifica
		*/
		function setUtente_modifica($value)
		{
				$this->Utente_modifica = $value;
		}

		/**
		* @return returns value of variable $Data_ora_modifica
		* @desc getData_ora_modifica : Getting value for variable $Data_ora_modifica
		*/
		function getData_ora_modifica()
		{
				return $this->Data_ora_modifica;
		}

		/**
		* @param param : value to be saved in variable $Data_ora_modifica
		* @desc setData_ora_modifica : Setting value for $Data_ora_modifica
		*/
		function setData_ora_modifica($value)
		{
				$this->Data_ora_modifica = $value;
		}

		// This is the constructor for this class
		// Initialize all your default variables here
		function utenti_gruppiInfo()
		{

				$this->setId_gruppo("");
				$this->setDescrizione("");
				$this->setNote("");
				$this->setUtente_creazione("");
				$this->setData_ora_creazione("");
				$this->setUtente_modifica("");
				$this->setData_ora_modifica("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setId_gruppo("");
				$this->setDescrizione("");
				$this->setNote("");
				$this->setUtente_creazione("");
				$this->setData_ora_creazione("");
				$this->setUtente_modifica("");
				$this->setData_ora_modifica("");
		}

} 

?>