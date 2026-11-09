<?
class utenti_token_accessoInfo
{ 

		// Variables 
		var $Token;
		var $Id_utente;
		var $Data_ora_creazione;
		var $Utente_modifica;
		var $Data_ora_modifica;
		var $Info;
		var $Attivo;


		/**
		* @return returns value of variable $Token
		* @desc getToken : Getting value for variable $Token
		*/
		function getToken()
		{
				return $this->Token;
		}

		/**
		* @param param : value to be saved in variable $Token
		* @desc setToken : Setting value for $Token
		*/
		function setToken($value)
		{
				$this->Token = $value;
		}

		/**
		* @return returns value of variable $Id_utente
		* @desc getId_utente : Getting value for variable $Id_utente
		*/
		function getId_utente()
		{
				return $this->Id_utente;
		}

		/**
		* @param param : value to be saved in variable $Id_utente
		* @desc setId_utente : Setting value for $Id_utente
		*/
		function setId_utente($value)
		{
				$this->Id_utente = $value;
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

		/**
		* @return returns value of variable $Info
		* @desc getInfo : Getting value for variable $Info
		*/
		function getInfo()
		{
				return $this->Info;
		}

		/**
		* @param param : value to be saved in variable $Info
		* @desc setInfo : Setting value for $Info
		*/
		function setInfo($value)
		{
				$this->Info = $value;
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

		// This is the constructor for this class
		// Initialize all your default variables here
		function utenti_token_accessoInfo()
		{

				$this->setToken("");
				$this->setId_utente("");
				$this->setData_ora_creazione("");
				$this->setUtente_modifica("");
				$this->setData_ora_modifica("");
				$this->setInfo("");
				$this->setAttivo("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setToken("");
				$this->setId_utente("");
				$this->setData_ora_creazione("");
				$this->setUtente_modifica("");
				$this->setData_ora_modifica("");
				$this->setInfo("");
				$this->setAttivo("");
		}

} 

?>