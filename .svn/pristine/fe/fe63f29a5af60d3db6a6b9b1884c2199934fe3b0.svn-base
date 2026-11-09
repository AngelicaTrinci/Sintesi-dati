<?php
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);

function getDominioInt($dominio){
    if(trim($dominio)=="")
        return "";
    $domini_int = explode(",", IMP_LDAP_DOMINT);
    $domini_est = explode(",", IMP_LDAP_DOMEST);
    foreach($domini_est as $k=>$dominio_est){
        if(strtolower(trim($dominio))==strtolower(trim($dominio_est))){
            return $domini_int[$k];
        }
    }
    $domini_est = explode(",", IMP_LDAP_DOMNAME);
    foreach($domini_est as $k=>$dominio_est){
        if(strtolower(trim($dominio))==strtolower(trim($dominio_est))){
            return $domini_int[$k];
        }
    }
    return $dominio;
}

function loginLdap($utente, $dominio, $password) {
    if( trim($utente)=="" || trim($password)=="" ){
        return false;
    }
    $inibizione=new inibisci_output();

    $servers    = explode(",", IMP_LDAP_SRVAUT);
    $domini_int = explode(",", IMP_LDAP_DOMINT);
    $domini_name= explode(",", IMP_LDAP_DOMNAME);
    if(trim($dominio)==""){
        // Se non è stato impostato nessun dominio
        $dominio=$domini_int[0];
    }
    $id_dominio=array_search($dominio,$domini_int);
    if($id_dominio===false){
        $id_dominio=array_search($dominio,$domini_name);
    }
    if($id_dominio===false){
        return false;
    }

    $ldapconn = ldap_connect($servers[$id_dominio]);
    if ($ldapconn == null){
        return false;
    }
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

    $ldapbind = ldap_bind($ldapconn, $utente . "@" . $domini_int[$id_dominio], $password);
    if ($ldapbind) {
        $datiUtente=getUserInfo($ldapconn, $utente, $domini_int[$id_dominio]);
        //$datiUtente=getUtentiLdap($utente, $dominio, $password, $utente);
        ldap_close($ldapconn);
        return array("utente"=>$utente,"dominio"=>$dominio,"dati"=>$datiUtente);
    }
    ldap_close($ldapconn);

    return false;
}

function getUserInfo( $ldapconn, $utente, $dominio ){
    $dn=explode(".",$dominio);
    array_walk($dn, function(&$value, $key) { $value = 'dc='.$value ; });
    $dn=  implode(",", $dn);
    
    $filter = "samaccountname=$utente";
    $filter = "(&(objectCategory=person)({$filter})(displayname=*))";
    $fields = array("samaccountname", "mail", "displayname");
        
    $sr = ldap_search($ldapconn, $dn, $filter, $fields);
    if ($sr != null) {
        $info = ldap_get_entries($ldapconn, $sr);
        if (is_array($info)){
            foreach ($info as $result){
                if ($result["samaccountname"][0] != null) {
                    $cognome_nome = explode(" ", $result["displayname"][0]);
                    for($i = 0; $i < count($cognome_nome ); $i++) {
                        if($i == count($cognome_nome) - 1) {
                            $nome = $cognome_nome [$i];
                        }
                        else{
                            $cognome=(($i == 0)?"":"$cognome ").$cognome_nome[$i];
                        }
                    }
                    $utente = array(
                        "username"=> $result["samaccountname"][0],
                        "mail" => $result["mail"][0],
                        "cognome_nome" => $result["displayname"][0],
                        "cognome" => $cognome,
                        "nome" => $nome
                    );
                    return $utente;
                }
            }
        }
    }
    return null;
}



class inibisci_output{
    public function __construct() {
        ob_start();
    }
    public function __destruct() {
//        file_put_contents("log_ldap.txt",ob_get_contents()."\r\n\r\n",FILE_APPEND);
        ob_end_clean();
    }
}