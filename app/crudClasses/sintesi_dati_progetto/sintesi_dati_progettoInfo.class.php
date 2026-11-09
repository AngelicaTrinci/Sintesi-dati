<?
class sintesi_dati_progettoInfo
{ 

		// Variables 
		var $Id_dati_progetto;
		var $Ragione_sociale_cliente;
		var $Area;
		var $Data_contratto;
		var $Scopo_fornitura;
		var $Numero_supercommessa_job;
		var $Acronimo_progetto;
		var $Pm_tt;
		var $Pm_customer;
		var $Email;
		var $Delivery_address;
		var $Data_consegna_materiale;
		var $Data_consegna_materiale_note;
		var $Dich_origine;
		var $Colori_macchina;
		var $Penali_su_consegna;
		var $Penali_su_consegna_note;
		var $Data_fine_smontaggio;
		var $Data_fine_smontaggio_note;
		var $Data_inizio_spedizione;
		var $Data_inizio_spedizione_note;
		var $Data_inizio_montaggio;
		var $Data_inizio_montaggio_note;
		var $Data_avviamento_da_contratto;
		var $Data_avviamento_da_contratto_note;
		var $Data_avviamento_atteso;
		var $Data_avviamento_atteso_note;
		var $Data_avviamento_effettivo;
		var $Data_avviamento_effettivo_note;
		var $Data_mesi_accettazione;
		var $Data_mesi_accettazione_note;
		var $Data_primo_invio_doc_cliente;
		var $Data_primo_invio_doc_cliente_note;
		var $Data_estrazione_doc_site_manager;
		var $Data_estrazione_doc_site_manager_note;
		var $Data_primo_invio_doc_disegni;
		var $Data_primo_invio_doc_disegni_note;
		var $Doc_training_tt_startup;
		var $Doc_training_tt_startup_note;
		var $Training_richiesto;
		var $Training_richiesto_note;
		var $Data_training;
		var $Data_training_note;
		var $Tipologia_training_richiesta;
		var $Incluso_pagamento;
		var $Incluso_pagamento_note;
		var $Lingua_training;
		var $Interno;
		var $Interno_note;
		var $Cliente;
		var $Cliente_note;
		var $Esterno;
		var $Esterno_note;
		var $Data_consegna_ricambi;
		var $Data_consegna_ricambi_note;
		var $termine_di_consegna_note;
		var $Data_training_in_sito;
		var $Data_training_in_sito_note;
		var $Data_consegna_lista_ricambi_definitiva;
		var $Data_consegna_lista_ricambi_definitiva_note;
		var $Termine_consegna_note;
		var $Garanzia_meccanica_contrattuale_note;
		var $Documentazione_contrattuale_note;
		var $Garanzia_meccanica_contrattuale;
		var $Documentazione_contrattuale;
		var $Termine_consegna;
		var $Non_richiesta_preliminare;
		var $Non_richiesta_definitiva;


		/**
		* @return returns value of variable $Id_dati_progetto
		* @desc getId_dati_progetto : Getting value for variable $Id_dati_progetto
		*/
		function getId_dati_progetto()
		{
				return $this->Id_dati_progetto;
		}

		/**
		* @param param : value to be saved in variable $Id_dati_progetto
		* @desc setId_dati_progetto : Setting value for $Id_dati_progetto
		*/
		function setId_dati_progetto($value)
		{
				$this->Id_dati_progetto = $value;
		}

		/**
		* @return returns value of variable $Ragione_sociale_cliente
		* @desc getRagione_sociale_cliente : Getting value for variable $Ragione_sociale_cliente
		*/
		function getRagione_sociale_cliente()
		{
				return $this->Ragione_sociale_cliente;
		}

		/**
		* @param param : value to be saved in variable $Ragione_sociale_cliente
		* @desc setRagione_sociale_cliente : Setting value for $Ragione_sociale_cliente
		*/
		function setRagione_sociale_cliente($value)
		{
				$this->Ragione_sociale_cliente = $value;
		}

		/**
		* @return returns value of variable $Area
		* @desc getArea : Getting value for variable $Area
		*/
		function getArea()
		{
				return $this->Area;
		}

		/**
		* @param param : value to be saved in variable $Area
		* @desc setArea : Setting value for $Area
		*/
		function setArea($value)
		{
				$this->Area = $value;
		}

		/**
		* @return returns value of variable $Data_contratto
		* @desc getData_contratto : Getting value for variable $Data_contratto
		*/
		function getData_contratto()
		{
				return $this->Data_contratto;
		}

		/**
		* @param param : value to be saved in variable $Data_contratto
		* @desc setData_contratto : Setting value for $Data_contratto
		*/
		function setData_contratto($value)
		{
				$this->Data_contratto = $value;
		}

		/**
		* @return returns value of variable $Scopo_fornitura
		* @desc getScopo_fornitura : Getting value for variable $Scopo_fornitura
		*/
		function getScopo_fornitura()
		{
				return $this->Scopo_fornitura;
		}

		/**
		* @param param : value to be saved in variable $Scopo_fornitura
		* @desc setScopo_fornitura : Setting value for $Scopo_fornitura
		*/
		function setScopo_fornitura($value)
		{
				$this->Scopo_fornitura = $value;
		}

		/**
		* @return returns value of variable $Numero_supercommessa_job
		* @desc getNumero_supercommessa_job : Getting value for variable $Numero_supercommessa_job
		*/
		function getNumero_supercommessa_job()
		{
				return $this->Numero_supercommessa_job;
		}

		/**
		* @param param : value to be saved in variable $Numero_supercommessa_job
		* @desc setNumero_supercommessa_job : Setting value for $Numero_supercommessa_job
		*/
		function setNumero_supercommessa_job($value)
		{
				$this->Numero_supercommessa_job = $value;
		}

		/**
		* @return returns value of variable $Acronimo_progetto
		* @desc getAcronimo_progetto : Getting value for variable $Acronimo_progetto
		*/
		function getAcronimo_progetto()
		{
				return $this->Acronimo_progetto;
		}

		/**
		* @param param : value to be saved in variable $Acronimo_progetto
		* @desc setAcronimo_progetto : Setting value for $Acronimo_progetto
		*/
		function setAcronimo_progetto($value)
		{
				$this->Acronimo_progetto = $value;
		}

		/**
		* @return returns value of variable $Pm_tt
		* @desc getPm_tt : Getting value for variable $Pm_tt
		*/
		function getPm_tt()
		{
				return $this->Pm_tt;
		}

		/**
		* @param param : value to be saved in variable $Pm_tt
		* @desc setPm_tt : Setting value for $Pm_tt
		*/
		function setPm_tt($value)
		{
				$this->Pm_tt = $value;
		}

		/**
		* @return returns value of variable $Pm_customer
		* @desc getPm_customer : Getting value for variable $Pm_customer
		*/
		function getPm_customer()
		{
				return $this->Pm_customer;
		}

		/**
		* @param param : value to be saved in variable $Pm_customer
		* @desc setPm_customer : Setting value for $Pm_customer
		*/
		function setPm_customer($value)
		{
				$this->Pm_customer = $value;
		}

		/**
		* @return returns value of variable $Email
		* @desc getEmail : Getting value for variable $Email
		*/
		function getEmail()
		{
				return $this->Email;
		}

		/**
		* @param param : value to be saved in variable $Email
		* @desc setEmail : Setting value for $Email
		*/
		function setEmail($value)
		{
				$this->Email = $value;
		}

		/**
		* @return returns value of variable $Delivery_address
		* @desc getDelivery_address : Getting value for variable $Delivery_address
		*/
		function getDelivery_address()
		{
				return $this->Delivery_address;
		}

		/**
		* @param param : value to be saved in variable $Delivery_address
		* @desc setDelivery_address : Setting value for $Delivery_address
		*/
		function setDelivery_address($value)
		{
				$this->Delivery_address = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_materiale
		* @desc getData_consegna_materiale : Getting value for variable $Data_consegna_materiale
		*/
		function getData_consegna_materiale()
		{
				return $this->Data_consegna_materiale;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_materiale
		* @desc setData_consegna_materiale : Setting value for $Data_consegna_materiale
		*/
		function setData_consegna_materiale($value)
		{
				$this->Data_consegna_materiale = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_materiale_note
		* @desc getData_consegna_materiale_note : Getting value for variable $Data_consegna_materiale_note
		*/
		function getData_consegna_materiale_note()
		{
				return $this->Data_consegna_materiale_note;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_materiale_note
		* @desc setData_consegna_materiale_note : Setting value for $Data_consegna_materiale_note
		*/
		function setData_consegna_materiale_note($value)
		{
				$this->Data_consegna_materiale_note = $value;
		}

		/**
		* @return returns value of variable $Dich_origine
		* @desc getDich_origine : Getting value for variable $Dich_origine
		*/
		function getDich_origine()
		{
				return $this->Dich_origine;
		}

		/**
		* @param param : value to be saved in variable $Dich_origine
		* @desc setDich_origine : Setting value for $Dich_origine
		*/
		function setDich_origine($value)
		{
				$this->Dich_origine = $value;
		}

		/**
		* @return returns value of variable $Colori_macchina
		* @desc getColori_macchina : Getting value for variable $Colori_macchina
		*/
		function getColori_macchina()
		{
				return $this->Colori_macchina;
		}

		/**
		* @param param : value to be saved in variable $Colori_macchina
		* @desc setColori_macchina : Setting value for $Colori_macchina
		*/
		function setColori_macchina($value)
		{
				$this->Colori_macchina = $value;
		}

		/**
		* @return returns value of variable $Penali_su_consegna
		* @desc getPenali_su_consegna : Getting value for variable $Penali_su_consegna
		*/
		function getPenali_su_consegna()
		{
				return $this->Penali_su_consegna;
		}

		/**
		* @param param : value to be saved in variable $Penali_su_consegna
		* @desc setPenali_su_consegna : Setting value for $Penali_su_consegna
		*/
		function setPenali_su_consegna($value)
		{
				$this->Penali_su_consegna = $value;
		}

		/**
		* @return returns value of variable $Penali_su_consegna_note
		* @desc getPenali_su_consegna_note : Getting value for variable $Penali_su_consegna_note
		*/
		function getPenali_su_consegna_note()
		{
				return $this->Penali_su_consegna_note;
		}

		/**
		* @param param : value to be saved in variable $Penali_su_consegna_note
		* @desc setPenali_su_consegna_note : Setting value for $Penali_su_consegna_note
		*/
		function setPenali_su_consegna_note($value)
		{
				$this->Penali_su_consegna_note = $value;
		}

		/**
		* @return returns value of variable $Data_fine_smontaggio
		* @desc getData_fine_smontaggio : Getting value for variable $Data_fine_smontaggio
		*/
		function getData_fine_smontaggio()
		{
				return $this->Data_fine_smontaggio;
		}

		/**
		* @param param : value to be saved in variable $Data_fine_smontaggio
		* @desc setData_fine_smontaggio : Setting value for $Data_fine_smontaggio
		*/
		function setData_fine_smontaggio($value)
		{
				$this->Data_fine_smontaggio = $value;
		}

		/**
		* @return returns value of variable $Data_fine_smontaggio_note
		* @desc getData_fine_smontaggio_note : Getting value for variable $Data_fine_smontaggio_note
		*/
		function getData_fine_smontaggio_note()
		{
				return $this->Data_fine_smontaggio_note;
		}

		/**
		* @param param : value to be saved in variable $Data_fine_smontaggio_note
		* @desc setData_fine_smontaggio_note : Setting value for $Data_fine_smontaggio_note
		*/
		function setData_fine_smontaggio_note($value)
		{
				$this->Data_fine_smontaggio_note = $value;
		}

		/**
		* @return returns value of variable $Data_inizio_spedizione
		* @desc getData_inizio_spedizione : Getting value for variable $Data_inizio_spedizione
		*/
		function getData_inizio_spedizione()
		{
				return $this->Data_inizio_spedizione;
		}

		/**
		* @param param : value to be saved in variable $Data_inizio_spedizione
		* @desc setData_inizio_spedizione : Setting value for $Data_inizio_spedizione
		*/
		function setData_inizio_spedizione($value)
		{
				$this->Data_inizio_spedizione = $value;
		}

		/**
		* @return returns value of variable $Data_inizio_spedizione_note
		* @desc getData_inizio_spedizione_note : Getting value for variable $Data_inizio_spedizione_note
		*/
		function getData_inizio_spedizione_note()
		{
				return $this->Data_inizio_spedizione_note;
		}

		/**
		* @param param : value to be saved in variable $Data_inizio_spedizione_note
		* @desc setData_inizio_spedizione_note : Setting value for $Data_inizio_spedizione_note
		*/
		function setData_inizio_spedizione_note($value)
		{
				$this->Data_inizio_spedizione_note = $value;
		}

		/**
		* @return returns value of variable $Data_inizio_montaggio
		* @desc getData_inizio_montaggio : Getting value for variable $Data_inizio_montaggio
		*/
		function getData_inizio_montaggio()
		{
				return $this->Data_inizio_montaggio;
		}

		/**
		* @param param : value to be saved in variable $Data_inizio_montaggio
		* @desc setData_inizio_montaggio : Setting value for $Data_inizio_montaggio
		*/
		function setData_inizio_montaggio($value)
		{
				$this->Data_inizio_montaggio = $value;
		}

		/**
		* @return returns value of variable $Data_inizio_montaggio_note
		* @desc getData_inizio_montaggio_note : Getting value for variable $Data_inizio_montaggio_note
		*/
		function getData_inizio_montaggio_note()
		{
				return $this->Data_inizio_montaggio_note;
		}

		/**
		* @param param : value to be saved in variable $Data_inizio_montaggio_note
		* @desc setData_inizio_montaggio_note : Setting value for $Data_inizio_montaggio_note
		*/
		function setData_inizio_montaggio_note($value)
		{
				$this->Data_inizio_montaggio_note = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_da_contratto
		* @desc getData_avviamento_da_contratto : Getting value for variable $Data_avviamento_da_contratto
		*/
		function getData_avviamento_da_contratto()
		{
				return $this->Data_avviamento_da_contratto;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_da_contratto
		* @desc setData_avviamento_da_contratto : Setting value for $Data_avviamento_da_contratto
		*/
		function setData_avviamento_da_contratto($value)
		{
				$this->Data_avviamento_da_contratto = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_da_contratto_note
		* @desc getData_avviamento_da_contratto_note : Getting value for variable $Data_avviamento_da_contratto_note
		*/
		function getData_avviamento_da_contratto_note()
		{
				return $this->Data_avviamento_da_contratto_note;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_da_contratto_note
		* @desc setData_avviamento_da_contratto_note : Setting value for $Data_avviamento_da_contratto_note
		*/
		function setData_avviamento_da_contratto_note($value)
		{
				$this->Data_avviamento_da_contratto_note = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_atteso
		* @desc getData_avviamento_atteso : Getting value for variable $Data_avviamento_atteso
		*/
		function getData_avviamento_atteso()
		{
				return $this->Data_avviamento_atteso;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_atteso
		* @desc setData_avviamento_atteso : Setting value for $Data_avviamento_atteso
		*/
		function setData_avviamento_atteso($value)
		{
				$this->Data_avviamento_atteso = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_atteso_note
		* @desc getData_avviamento_atteso_note : Getting value for variable $Data_avviamento_atteso_note
		*/
		function getData_avviamento_atteso_note()
		{
				return $this->Data_avviamento_atteso_note;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_atteso_note
		* @desc setData_avviamento_atteso_note : Setting value for $Data_avviamento_atteso_note
		*/
		function setData_avviamento_atteso_note($value)
		{
				$this->Data_avviamento_atteso_note = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_effettivo
		* @desc getData_avviamento_effettivo : Getting value for variable $Data_avviamento_effettivo
		*/
		function getData_avviamento_effettivo()
		{
				return $this->Data_avviamento_effettivo;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_effettivo
		* @desc setData_avviamento_effettivo : Setting value for $Data_avviamento_effettivo
		*/
		function setData_avviamento_effettivo($value)
		{
				$this->Data_avviamento_effettivo = $value;
		}

		/**
		* @return returns value of variable $Data_avviamento_effettivo_note
		* @desc getData_avviamento_effettivo_note : Getting value for variable $Data_avviamento_effettivo_note
		*/
		function getData_avviamento_effettivo_note()
		{
				return $this->Data_avviamento_effettivo_note;
		}

		/**
		* @param param : value to be saved in variable $Data_avviamento_effettivo_note
		* @desc setData_avviamento_effettivo_note : Setting value for $Data_avviamento_effettivo_note
		*/
		function setData_avviamento_effettivo_note($value)
		{
				$this->Data_avviamento_effettivo_note = $value;
		}

		/**
		* @return returns value of variable $Data_mesi_accettazione
		* @desc getData_mesi_accettazione : Getting value for variable $Data_mesi_accettazione
		*/
		function getData_mesi_accettazione()
		{
				return $this->Data_mesi_accettazione;
		}

		/**
		* @param param : value to be saved in variable $Data_mesi_accettazione
		* @desc setData_mesi_accettazione : Setting value for $Data_mesi_accettazione
		*/
		function setData_mesi_accettazione($value)
		{
				$this->Data_mesi_accettazione = $value;
		}

		/**
		* @return returns value of variable $Data_mesi_accettazione_note
		* @desc getData_mesi_accettazione_note : Getting value for variable $Data_mesi_accettazione_note
		*/
		function getData_mesi_accettazione_note()
		{
				return $this->Data_mesi_accettazione_note;
		}

		/**
		* @param param : value to be saved in variable $Data_mesi_accettazione_note
		* @desc setData_mesi_accettazione_note : Setting value for $Data_mesi_accettazione_note
		*/
		function setData_mesi_accettazione_note($value)
		{
				$this->Data_mesi_accettazione_note = $value;
		}

		/**
		* @return returns value of variable $Data_primo_invio_doc_cliente
		* @desc getData_primo_invio_doc_cliente : Getting value for variable $Data_primo_invio_doc_cliente
		*/
		function getData_primo_invio_doc_cliente()
		{
				return $this->Data_primo_invio_doc_cliente;
		}

		/**
		* @param param : value to be saved in variable $Data_primo_invio_doc_cliente
		* @desc setData_primo_invio_doc_cliente : Setting value for $Data_primo_invio_doc_cliente
		*/
		function setData_primo_invio_doc_cliente($value)
		{
				$this->Data_primo_invio_doc_cliente = $value;
		}

		/**
		* @return returns value of variable $Data_primo_invio_doc_cliente_note
		* @desc getData_primo_invio_doc_cliente_note : Getting value for variable $Data_primo_invio_doc_cliente_note
		*/
		function getData_primo_invio_doc_cliente_note()
		{
				return $this->Data_primo_invio_doc_cliente_note;
		}

		/**
		* @param param : value to be saved in variable $Data_primo_invio_doc_cliente_note
		* @desc setData_primo_invio_doc_cliente_note : Setting value for $Data_primo_invio_doc_cliente_note
		*/
		function setData_primo_invio_doc_cliente_note($value)
		{
				$this->Data_primo_invio_doc_cliente_note = $value;
		}

		/**
		* @return returns value of variable $Data_estrazione_doc_site_manager
		* @desc getData_estrazione_doc_site_manager : Getting value for variable $Data_estrazione_doc_site_manager
		*/
		function getData_estrazione_doc_site_manager()
		{
				return $this->Data_estrazione_doc_site_manager;
		}

		/**
		* @param param : value to be saved in variable $Data_estrazione_doc_site_manager
		* @desc setData_estrazione_doc_site_manager : Setting value for $Data_estrazione_doc_site_manager
		*/
		function setData_estrazione_doc_site_manager($value)
		{
				$this->Data_estrazione_doc_site_manager = $value;
		}

		/**
		* @return returns value of variable $Data_estrazione_doc_site_manager_note
		* @desc getData_estrazione_doc_site_manager_note : Getting value for variable $Data_estrazione_doc_site_manager_note
		*/
		function getData_estrazione_doc_site_manager_note()
		{
				return $this->Data_estrazione_doc_site_manager_note;
		}

		/**
		* @param param : value to be saved in variable $Data_estrazione_doc_site_manager_note
		* @desc setData_estrazione_doc_site_manager_note : Setting value for $Data_estrazione_doc_site_manager_note
		*/
		function setData_estrazione_doc_site_manager_note($value)
		{
				$this->Data_estrazione_doc_site_manager_note = $value;
		}

		/**
		* @return returns value of variable $Data_primo_invio_doc_disegni
		* @desc getData_primo_invio_doc_disegni : Getting value for variable $Data_primo_invio_doc_disegni
		*/
		function getData_primo_invio_doc_disegni()
		{
				return $this->Data_primo_invio_doc_disegni;
		}

		/**
		* @param param : value to be saved in variable $Data_primo_invio_doc_disegni
		* @desc setData_primo_invio_doc_disegni : Setting value for $Data_primo_invio_doc_disegni
		*/
		function setData_primo_invio_doc_disegni($value)
		{
				$this->Data_primo_invio_doc_disegni = $value;
		}

		/**
		* @return returns value of variable $Data_primo_invio_doc_disegni_note
		* @desc getData_primo_invio_doc_disegni_note : Getting value for variable $Data_primo_invio_doc_disegni_note
		*/
		function getData_primo_invio_doc_disegni_note()
		{
				return $this->Data_primo_invio_doc_disegni_note;
		}

		/**
		* @param param : value to be saved in variable $Data_primo_invio_doc_disegni_note
		* @desc setData_primo_invio_doc_disegni_note : Setting value for $Data_primo_invio_doc_disegni_note
		*/
		function setData_primo_invio_doc_disegni_note($value)
		{
				$this->Data_primo_invio_doc_disegni_note = $value;
		}

		/**
		* @return returns value of variable $Doc_training_tt_startup
		* @desc getDoc_training_tt_startup : Getting value for variable $Doc_training_tt_startup
		*/
		function getDoc_training_tt_startup()
		{
				return $this->Doc_training_tt_startup;
		}

		/**
		* @param param : value to be saved in variable $Doc_training_tt_startup
		* @desc setDoc_training_tt_startup : Setting value for $Doc_training_tt_startup
		*/
		function setDoc_training_tt_startup($value)
		{
				$this->Doc_training_tt_startup = $value;
		}

		/**
		* @return returns value of variable $Doc_training_tt_startup_note
		* @desc getDoc_training_tt_startup_note : Getting value for variable $Doc_training_tt_startup_note
		*/
		function getDoc_training_tt_startup_note()
		{
				return $this->Doc_training_tt_startup_note;
		}

		/**
		* @param param : value to be saved in variable $Doc_training_tt_startup_note
		* @desc setDoc_training_tt_startup_note : Setting value for $Doc_training_tt_startup_note
		*/
		function setDoc_training_tt_startup_note($value)
		{
				$this->Doc_training_tt_startup_note = $value;
		}

		/**
		* @return returns value of variable $Training_richiesto
		* @desc getTraining_richiesto : Getting value for variable $Training_richiesto
		*/
		function getTraining_richiesto()
		{
				return $this->Training_richiesto;
		}

		/**
		* @param param : value to be saved in variable $Training_richiesto
		* @desc setTraining_richiesto : Setting value for $Training_richiesto
		*/
		function setTraining_richiesto($value)
		{
				$this->Training_richiesto = $value;
		}

		/**
		* @return returns value of variable $Training_richiesto_note
		* @desc getTraining_richiesto_note : Getting value for variable $Training_richiesto_note
		*/
		function getTraining_richiesto_note()
		{
				return $this->Training_richiesto_note;
		}

		/**
		* @param param : value to be saved in variable $Training_richiesto_note
		* @desc setTraining_richiesto_note : Setting value for $Training_richiesto_note
		*/
		function setTraining_richiesto_note($value)
		{
				$this->Training_richiesto_note = $value;
		}

		/**
		* @return returns value of variable $Data_training
		* @desc getData_training : Getting value for variable $Data_training
		*/
		function getData_training()
		{
				return $this->Data_training;
		}

		/**
		* @param param : value to be saved in variable $Data_training
		* @desc setData_training : Setting value for $Data_training
		*/
		function setData_training($value)
		{
				$this->Data_training = $value;
		}

		/**
		* @return returns value of variable $Data_training_note
		* @desc getData_training_note : Getting value for variable $Data_training_note
		*/
		function getData_training_note()
		{
				return $this->Data_training_note;
		}

		/**
		* @param param : value to be saved in variable $Data_training_note
		* @desc setData_training_note : Setting value for $Data_training_note
		*/
		function setData_training_note($value)
		{
				$this->Data_training_note = $value;
		}

		/**
		* @return returns value of variable $Tipologia_training_richiesta
		* @desc getTipologia_training_richiesta : Getting value for variable $Tipologia_training_richiesta
		*/
		function getTipologia_training_richiesta()
		{
				return $this->Tipologia_training_richiesta;
		}

		/**
		* @param param : value to be saved in variable $Tipologia_training_richiesta
		* @desc setTipologia_training_richiesta : Setting value for $Tipologia_training_richiesta
		*/
		function setTipologia_training_richiesta($value)
		{
				$this->Tipologia_training_richiesta = $value;
		}

		/**
		* @return returns value of variable $Incluso_pagamento
		* @desc getIncluso_pagamento : Getting value for variable $Incluso_pagamento
		*/
		function getIncluso_pagamento()
		{
				return $this->Incluso_pagamento;
		}

		/**
		* @param param : value to be saved in variable $Incluso_pagamento
		* @desc setIncluso_pagamento : Setting value for $Incluso_pagamento
		*/
		function setIncluso_pagamento($value)
		{
				$this->Incluso_pagamento = $value;
		}

		/**
		* @return returns value of variable $Incluso_pagamento_note
		* @desc getIncluso_pagamento_note : Getting value for variable $Incluso_pagamento_note
		*/
		function getIncluso_pagamento_note()
		{
				return $this->Incluso_pagamento_note;
		}

		/**
		* @param param : value to be saved in variable $Incluso_pagamento_note
		* @desc setIncluso_pagamento_note : Setting value for $Incluso_pagamento_note
		*/
		function setIncluso_pagamento_note($value)
		{
				$this->Incluso_pagamento_note = $value;
		}

		/**
		* @return returns value of variable $Lingua_training
		* @desc getLingua_training : Getting value for variable $Lingua_training
		*/
		function getLingua_training()
		{
				return $this->Lingua_training;
		}

		/**
		* @param param : value to be saved in variable $Lingua_training
		* @desc setLingua_training : Setting value for $Lingua_training
		*/
		function setLingua_training($value)
		{
				$this->Lingua_training = $value;
		}

		/**
		* @return returns value of variable $Interno
		* @desc getInterno : Getting value for variable $Interno
		*/
		function getInterno()
		{
				return $this->Interno;
		}

		/**
		* @param param : value to be saved in variable $Interno
		* @desc setInterno : Setting value for $Interno
		*/
		function setInterno($value)
		{
				$this->Interno = $value;
		}

		/**
		* @return returns value of variable $Interno_note
		* @desc getInterno_note : Getting value for variable $Interno_note
		*/
		function getInterno_note()
		{
				return $this->Interno_note;
		}

		/**
		* @param param : value to be saved in variable $Interno_note
		* @desc setInterno_note : Setting value for $Interno_note
		*/
		function setInterno_note($value)
		{
				$this->Interno_note = $value;
		}

		/**
		* @return returns value of variable $Cliente
		* @desc getCliente : Getting value for variable $Cliente
		*/
		function getCliente()
		{
				return $this->Cliente;
		}

		/**
		* @param param : value to be saved in variable $Cliente
		* @desc setCliente : Setting value for $Cliente
		*/
		function setCliente($value)
		{
				$this->Cliente = $value;
		}

		/**
		* @return returns value of variable $Cliente_note
		* @desc getCliente_note : Getting value for variable $Cliente_note
		*/
		function getCliente_note()
		{
				return $this->Cliente_note;
		}

		/**
		* @param param : value to be saved in variable $Cliente_note
		* @desc setCliente_note : Setting value for $Cliente_note
		*/
		function setCliente_note($value)
		{
				$this->Cliente_note = $value;
		}

		/**
		* @return returns value of variable $Esterno
		* @desc getEsterno : Getting value for variable $Esterno
		*/
		function getEsterno()
		{
				return $this->Esterno;
		}

		/**
		* @param param : value to be saved in variable $Esterno
		* @desc setEsterno : Setting value for $Esterno
		*/
		function setEsterno($value)
		{
				$this->Esterno = $value;
		}

		/**
		* @return returns value of variable $Esterno_note
		* @desc getEsterno_note : Getting value for variable $Esterno_note
		*/
		function getEsterno_note()
		{
				return $this->Esterno_note;
		}

		/**
		* @param param : value to be saved in variable $Esterno_note
		* @desc setEsterno_note : Setting value for $Esterno_note
		*/
		function setEsterno_note($value)
		{
				$this->Esterno_note = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_ricambi
		* @desc getData_consegna_ricambi : Getting value for variable $Data_consegna_ricambi
		*/
		function getData_consegna_ricambi()
		{
				return $this->Data_consegna_ricambi;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_ricambi
		* @desc setData_consegna_ricambi : Setting value for $Data_consegna_ricambi
		*/
		function setData_consegna_ricambi($value)
		{
				$this->Data_consegna_ricambi = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_ricambi_note
		* @desc getData_consegna_ricambi_note : Getting value for variable $Data_consegna_ricambi_note
		*/
		function getData_consegna_ricambi_note()
		{
				return $this->Data_consegna_ricambi_note;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_ricambi_note
		* @desc setData_consegna_ricambi_note : Setting value for $Data_consegna_ricambi_note
		*/
		function setData_consegna_ricambi_note($value)
		{
				$this->Data_consegna_ricambi_note = $value;
		}

		/**
		* @return returns value of variable $termine_di_consegna_note
		* @desc getTermine_di_consegna_note : Getting value for variable $termine_di_consegna_note
		*/
		function getTermine_di_consegna_note()
		{
				return $this->termine_di_consegna_note;
		}

		/**
		* @param param : value to be saved in variable $termine_di_consegna_note
		* @desc setTermine_di_consegna_note : Setting value for $termine_di_consegna_note
		*/
		function setTermine_di_consegna_note($value)
		{
				$this->termine_di_consegna_note = $value;
		}

		/**
		* @return returns value of variable $Data_training_in_sito
		* @desc getData_training_in_sito : Getting value for variable $Data_training_in_sito
		*/
		function getData_training_in_sito()
		{
				return $this->Data_training_in_sito;
		}

		/**
		* @param param : value to be saved in variable $Data_training_in_sito
		* @desc setData_training_in_sito : Setting value for $Data_training_in_sito
		*/
		function setData_training_in_sito($value)
		{
				$this->Data_training_in_sito = $value;
		}

		/**
		* @return returns value of variable $Data_training_in_sito_note
		* @desc getData_training_in_sito_note : Getting value for variable $Data_training_in_sito_note
		*/
		function getData_training_in_sito_note()
		{
				return $this->Data_training_in_sito_note;
		}

		/**
		* @param param : value to be saved in variable $Data_training_in_sito_note
		* @desc setData_training_in_sito_note : Setting value for $Data_training_in_sito_note
		*/
		function setData_training_in_sito_note($value)
		{
				$this->Data_training_in_sito_note = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_lista_ricambi_definitiva
		* @desc getData_consegna_lista_ricambi_definitiva : Getting value for variable $Data_consegna_lista_ricambi_definitiva
		*/
		function getData_consegna_lista_ricambi_definitiva()
		{
				return $this->Data_consegna_lista_ricambi_definitiva;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_lista_ricambi_definitiva
		* @desc setData_consegna_lista_ricambi_definitiva : Setting value for $Data_consegna_lista_ricambi_definitiva
		*/
		function setData_consegna_lista_ricambi_definitiva($value)
		{
				$this->Data_consegna_lista_ricambi_definitiva = $value;
		}

		/**
		* @return returns value of variable $Data_consegna_lista_ricambi_definitiva_note
		* @desc getData_consegna_lista_ricambi_definitiva_note : Getting value for variable $Data_consegna_lista_ricambi_definitiva_note
		*/
		function getData_consegna_lista_ricambi_definitiva_note()
		{
				return $this->Data_consegna_lista_ricambi_definitiva_note;
		}

		/**
		* @param param : value to be saved in variable $Data_consegna_lista_ricambi_definitiva_note
		* @desc setData_consegna_lista_ricambi_definitiva_note : Setting value for $Data_consegna_lista_ricambi_definitiva_note
		*/
		function setData_consegna_lista_ricambi_definitiva_note($value)
		{
				$this->Data_consegna_lista_ricambi_definitiva_note = $value;
		}

		/**
		* @return returns value of variable $Termine_consegna_note
		* @desc getTermine_consegna_note : Getting value for variable $Termine_consegna_note
		*/
		function getTermine_consegna_note()
		{
				return $this->Termine_consegna_note;
		}

		/**
		* @param param : value to be saved in variable $Termine_consegna_note
		* @desc setTermine_consegna_note : Setting value for $Termine_consegna_note
		*/
		function setTermine_consegna_note($value)
		{
				$this->Termine_consegna_note = $value;
		}

		/**
		* @return returns value of variable $Garanzia_meccanica_contrattuale_note
		* @desc getGaranzia_meccanica_contrattuale_note : Getting value for variable $Garanzia_meccanica_contrattuale_note
		*/
		function getGaranzia_meccanica_contrattuale_note()
		{
				return $this->Garanzia_meccanica_contrattuale_note;
		}

		/**
		* @param param : value to be saved in variable $Garanzia_meccanica_contrattuale_note
		* @desc setGaranzia_meccanica_contrattuale_note : Setting value for $Garanzia_meccanica_contrattuale_note
		*/
		function setGaranzia_meccanica_contrattuale_note($value)
		{
				$this->Garanzia_meccanica_contrattuale_note = $value;
		}

		/**
		* @return returns value of variable $Documentazione_contrattuale_note
		* @desc getDocumentazione_contrattuale_note : Getting value for variable $Documentazione_contrattuale_note
		*/
		function getDocumentazione_contrattuale_note()
		{
				return $this->Documentazione_contrattuale_note;
		}

		/**
		* @param param : value to be saved in variable $Documentazione_contrattuale_note
		* @desc setDocumentazione_contrattuale_note : Setting value for $Documentazione_contrattuale_note
		*/
		function setDocumentazione_contrattuale_note($value)
		{
				$this->Documentazione_contrattuale_note = $value;
		}

		/**
		* @return returns value of variable $Garanzia_meccanica_contrattuale
		* @desc getGaranzia_meccanica_contrattuale : Getting value for variable $Garanzia_meccanica_contrattuale
		*/
		function getGaranzia_meccanica_contrattuale()
		{
				return $this->Garanzia_meccanica_contrattuale;
		}

		/**
		* @param param : value to be saved in variable $Garanzia_meccanica_contrattuale
		* @desc setGaranzia_meccanica_contrattuale : Setting value for $Garanzia_meccanica_contrattuale
		*/
		function setGaranzia_meccanica_contrattuale($value)
		{
				$this->Garanzia_meccanica_contrattuale = $value;
		}

		/**
		* @return returns value of variable $Documentazione_contrattuale
		* @desc getDocumentazione_contrattuale : Getting value for variable $Documentazione_contrattuale
		*/
		function getDocumentazione_contrattuale()
		{
				return $this->Documentazione_contrattuale;
		}

		/**
		* @param param : value to be saved in variable $Documentazione_contrattuale
		* @desc setDocumentazione_contrattuale : Setting value for $Documentazione_contrattuale
		*/
		function setDocumentazione_contrattuale($value)
		{
				$this->Documentazione_contrattuale = $value;
		}

		/**
		* @return returns value of variable $Termine_consegna
		* @desc getTermine_consegna : Getting value for variable $Termine_consegna
		*/
		function getTermine_consegna()
		{
				return $this->Termine_consegna;
		}

		/**
		* @param param : value to be saved in variable $Termine_consegna
		* @desc setTermine_consegna : Setting value for $Termine_consegna
		*/
		function setTermine_consegna($value)
		{
				$this->Termine_consegna = $value;
		}

		/**
		* @return returns value of variable $Non_richiesta_preliminare
		* @desc getNon_richiesta_preliminare : Getting value for variable $Non_richiesta_preliminare
		*/
		function getNon_richiesta_preliminare()
		{
				return $this->Non_richiesta_preliminare;
		}

		/**
		* @param param : value to be saved in variable $Non_richiesta_preliminare
		* @desc setNon_richiesta_preliminare : Setting value for $Non_richiesta_preliminare
		*/
		function setNon_richiesta_preliminare($value)
		{
				$this->Non_richiesta_preliminare = $value;
		}

		/**
		* @return returns value of variable $Non_richiesta_definitiva
		* @desc getNon_richiesta_definitiva : Getting value for variable $Non_richiesta_definitiva
		*/
		function getNon_richiesta_definitiva()
		{
				return $this->Non_richiesta_definitiva;
		}

		/**
		* @param param : value to be saved in variable $Non_richiesta_definitiva
		* @desc setNon_richiesta_definitiva : Setting value for $Non_richiesta_definitiva
		*/
		function setNon_richiesta_definitiva($value)
		{
				$this->Non_richiesta_definitiva = $value;
		}

		// This is the constructor for this class
		// Initialize all your default variables here
		function sintesi_dati_progettoInfo()
		{

				$this->setId_dati_progetto("");
				$this->setRagione_sociale_cliente("");
				$this->setArea("");
				$this->setData_contratto("");
				$this->setScopo_fornitura("");
				$this->setNumero_supercommessa_job("");
				$this->setAcronimo_progetto("");
				$this->setPm_tt("");
				$this->setPm_customer("");
				$this->setEmail("");
				$this->setDelivery_address("");
				$this->setData_consegna_materiale("");
				$this->setData_consegna_materiale_note("");
				$this->setDich_origine("");
				$this->setColori_macchina("");
				$this->setPenali_su_consegna("");
				$this->setPenali_su_consegna_note("");
				$this->setData_fine_smontaggio("");
				$this->setData_fine_smontaggio_note("");
				$this->setData_inizio_spedizione("");
				$this->setData_inizio_spedizione_note("");
				$this->setData_inizio_montaggio("");
				$this->setData_inizio_montaggio_note("");
				$this->setData_avviamento_da_contratto("");
				$this->setData_avviamento_da_contratto_note("");
				$this->setData_avviamento_atteso("");
				$this->setData_avviamento_atteso_note("");
				$this->setData_avviamento_effettivo("");
				$this->setData_avviamento_effettivo_note("");
				$this->setData_mesi_accettazione("");
				$this->setData_mesi_accettazione_note("");
				$this->setData_primo_invio_doc_cliente("");
				$this->setData_primo_invio_doc_cliente_note("");
				$this->setData_estrazione_doc_site_manager("");
				$this->setData_estrazione_doc_site_manager_note("");
				$this->setData_primo_invio_doc_disegni("");
				$this->setData_primo_invio_doc_disegni_note("");
				$this->setDoc_training_tt_startup("");
				$this->setDoc_training_tt_startup_note("");
				$this->setTraining_richiesto("");
				$this->setTraining_richiesto_note("");
				$this->setData_training("");
				$this->setData_training_note("");
				$this->setTipologia_training_richiesta("");
				$this->setIncluso_pagamento("");
				$this->setIncluso_pagamento_note("");
				$this->setLingua_training("");
				$this->setInterno("");
				$this->setInterno_note("");
				$this->setCliente("");
				$this->setCliente_note("");
				$this->setEsterno("");
				$this->setEsterno_note("");
				$this->setData_consegna_ricambi("");
				$this->setData_consegna_ricambi_note("");
				$this->setTermine_di_consegna_note("");
				$this->setData_training_in_sito("");
				$this->setData_training_in_sito_note("");
				$this->setData_consegna_lista_ricambi_definitiva("");
				$this->setData_consegna_lista_ricambi_definitiva_note("");
				$this->setTermine_consegna_note("");
				$this->setGaranzia_meccanica_contrattuale_note("");
				$this->setDocumentazione_contrattuale_note("");
				$this->setGaranzia_meccanica_contrattuale("");
				$this->setDocumentazione_contrattuale("");
				$this->setTermine_consegna("");
				$this->setNon_richiesta_preliminare("");
				$this->setNon_richiesta_definitiva("");
		}

		// This function will clear all the values of variables in this class
		function emptyInfo()
		{

				$this->setId_dati_progetto("");
				$this->setRagione_sociale_cliente("");
				$this->setArea("");
				$this->setData_contratto("");
				$this->setScopo_fornitura("");
				$this->setNumero_supercommessa_job("");
				$this->setAcronimo_progetto("");
				$this->setPm_tt("");
				$this->setPm_customer("");
				$this->setEmail("");
				$this->setDelivery_address("");
				$this->setData_consegna_materiale("");
				$this->setData_consegna_materiale_note("");
				$this->setDich_origine("");
				$this->setColori_macchina("");
				$this->setPenali_su_consegna("");
				$this->setPenali_su_consegna_note("");
				$this->setData_fine_smontaggio("");
				$this->setData_fine_smontaggio_note("");
				$this->setData_inizio_spedizione("");
				$this->setData_inizio_spedizione_note("");
				$this->setData_inizio_montaggio("");
				$this->setData_inizio_montaggio_note("");
				$this->setData_avviamento_da_contratto("");
				$this->setData_avviamento_da_contratto_note("");
				$this->setData_avviamento_atteso("");
				$this->setData_avviamento_atteso_note("");
				$this->setData_avviamento_effettivo("");
				$this->setData_avviamento_effettivo_note("");
				$this->setData_mesi_accettazione("");
				$this->setData_mesi_accettazione_note("");
				$this->setData_primo_invio_doc_cliente("");
				$this->setData_primo_invio_doc_cliente_note("");
				$this->setData_estrazione_doc_site_manager("");
				$this->setData_estrazione_doc_site_manager_note("");
				$this->setData_primo_invio_doc_disegni("");
				$this->setData_primo_invio_doc_disegni_note("");
				$this->setDoc_training_tt_startup("");
				$this->setDoc_training_tt_startup_note("");
				$this->setTraining_richiesto("");
				$this->setTraining_richiesto_note("");
				$this->setData_training("");
				$this->setData_training_note("");
				$this->setTipologia_training_richiesta("");
				$this->setIncluso_pagamento("");
				$this->setIncluso_pagamento_note("");
				$this->setLingua_training("");
				$this->setInterno("");
				$this->setInterno_note("");
				$this->setCliente("");
				$this->setCliente_note("");
				$this->setEsterno("");
				$this->setEsterno_note("");
				$this->setData_consegna_ricambi("");
				$this->setData_consegna_ricambi_note("");
				$this->setTermine_di_consegna_note("");
				$this->setData_training_in_sito("");
				$this->setData_training_in_sito_note("");
				$this->setData_consegna_lista_ricambi_definitiva("");
				$this->setData_consegna_lista_ricambi_definitiva_note("");
				$this->setTermine_consegna_note("");
				$this->setGaranzia_meccanica_contrattuale_note("");
				$this->setDocumentazione_contrattuale_note("");
				$this->setGaranzia_meccanica_contrattuale("");
				$this->setDocumentazione_contrattuale("");
				$this->setTermine_consegna("");
				$this->setNon_richiesta_preliminare("");
				$this->setNon_richiesta_definitiva("");
		}

} 

?>