<?php

// Web Address (URL) of your Website
define("URL_ROOT_ADDRESS", "http://localhost/Sintesi_dati_progetto");
define("URL_ADDRESS", URL_ROOT_ADDRESS . "/web");
define("PREFISSO_SESSIONE", "base");
//header
define("TITOLO", "Sintesi dati progetto");

//path
define("PATH_IMMAGINI_MENU","img_caricate/");

//hover
define("HOVER","N");
// "S" per hover attivo su header orizzontale
// "N" per hover non attivo su header orizzontale


//tipo menù
define("TIPO_MENU","orizzontale");
//"orizzontale" per menù in orizzontale
//"verticale" per menù in verticale

//specificare il periodo in giorni per il cambio della password
define("PERIODO_CAMBIO_PASSWORD", 30);
//3 criteri base per le password, specificarne nuovi in caso di bisogno
define("PATTERN_CRITERI", "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%&?@]).{8,}"); //specificare i criteri
//(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%&?@]).{8,}    Almeno una lettera maiuscola,una lettera minuscola, un carattere speciale, un numero e minimo 8 caratteri di lunghezza
//(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}                   Almeno una lettera maiuscola,una lettera minuscola, un numero e minimo 8 caratteri di lunghezza
//(?=.*\d)(?=.*[a-zA-Z]).{,}                            Almeno una lettera, un numero 
//specificare la frase d'errore nel caso non venga soddisfatto il criterio
define("CRITERI", "Almeno una lettera maiuscola,una lettera minuscola, un carattere speciale, un numero e minimo 8 caratteri di lunghezza");

define("LOGIN_LDAP", "S");
define("LOGIN_MANUALE", "S");
define("RESTA_CONNESSO","S");

//HASH  
define("HASH", "whirlpool");

//DURATA COOKIE

define("DURATA_COOKIE", strtotime(" +6 month"));

// Location of your Source code (absolute Paths)
define("SITE_PATH", __DIR__);             // no trailing slashes (e.g windows : c:\server\myWebsite, *nix : /usr/local/apache/myWebsite)
define("FILE_SEPARATOR", "\\");       // Different OS use different File Separators (e.g windows : \, *nix : / )
define("WEB_SEPARATOR", "/");                        // Just in case url token separator change at some point in time :)
// Database Configuration MYSQL/MYSQLI
define("DATABASE_SERVER_TO_USE", "mssqlnative");            // Adodb Database Type to use (e.g mssqlnative, mysql, oracle, postgres..)
define("DATABASE_HOST", "DELTASQL");                    // Address of your database server (could be hostname or ipaddress)
define("DATABASE_USER_NAME","sa");           // User to connect to database as
define("DATABASE_PASSWORD","M@ris@STR33Tfighter6!322?");             // Password to connect to database
define("DATABASE_NAME", "sintesi_dati_progetto");                   // Database Name (for oraclle, that'll be empty)
 
//Connessione a Job progress MsMsql
define("DATABASE_SERVER_TO_USE_JOB_PROGRESS","mssqlnative");            // Adodb Database Type to use (e.g mysql, oracle, postgres..)
define("DATABASE_HOST_JOB_PROGRESS", "DELTASQL");                    // Address of your database server (could be hostname or ipaddress)
define("DATABASE_USER_NAME_JOB_PROGRESS","sa");           // User to connect to database as
define("DATABASE_PASSWORD_JOB_PROGRESS","M@ris@STR33Tfighter6!322?");             // Password to connect to database
define("DATABASE_NAME_JOB_PROGRESS","Toscotec_job_progress");

/*define("DATABASE_SERVER_TO_USE","mysqli");            // Adodb Database Type to use (e.g mysql, oracle, postgres..)
define("DATABASE_HOST", "127.0.0.1");                    // Address of your database server (could be hostname or ipaddress)
define("DATABASE_USER_NAME","root");           // User to connect to database as
define("DATABASE_PASSWORD","");             // Password to connect to database
define("DATABASE_NAME","sintesi_dati_progetto");*/

define("IMP_LDAP_SRVAUT", "ldaps://10.0.1.7,ldaps://10.0.1.7");
define("IMP_LDAP_DOMINT", "deltainf.local,deltainf.local");
define("IMP_LDAP_DOMEST", "deltainf,deltainf");
define("IMP_LDAP_DOMNAME", "deltainf.it,deltainf.it");

// Application Basic Paths - DO NOT CHANGE THESE
define("APP_PATH", SITE_PATH . FILE_SEPARATOR . "app");
define("WEB_PATH", SITE_PATH . FILE_SEPARATOR . "web");
define("CONFIG_COMPONENT", SITE_PATH . FILE_SEPARATOR . "config");
define("CONFIG_FILE", CONFIG_COMPONENT . FILE_SEPARATOR . "configuration.inc.php"); // codifica da charset database a utf-8
define("DEFAULT_PAGINA_SELEZIONA", 10);
define("DEFAULT_KOOLGRID_STYLE","delta_blu");// default style griglia  gestito dalla nuova generazione
define("CHARSET", "");

define("IMP_SMTP","mail.deltainf.it");
define("IMP_SMTPPORTA","25");
define("IMP_SMTPUSR","");
define("IMP_SMTPPWD","");

//define("EMAIL", "atrinci@deltainf.it");
define("EMAIL", "");
?>