<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("base.conf.php");
include_once(CONFIG_FILE);
//include_once(CLASS_UTENTI_MANAGER);
include_once(CLASS_TOABCPP_MANAGER);
include_once ('class.phpmailer.php');

function effettuaLogin($username, $password, $userWindows = "", $domainWindows = "",$sso="N") {
    
    $utente = null;
    $slash = "\\";
    if (DATABASE_SERVER_TO_USE == "mysql") {
        $slash = "\\\\";
    }
    if ($username != "") {
        if (DATABASE_SERVER_TO_USE == "mysql") {
            $username = mysql_escape_string($username);
            //echo $thisUsername;
        }else
            {
            $username=  str_replace("'", "''", $username);
            }
        //$utentiDao = new utentiDAO();
            $utentiDao = new toabcppDAO();
        if($domainWindows==""||$domainWindows==getDominioDefault()||getDominioDefault()==""){
            //echo " if entrato";
            //echo "SELECT * FROM TOABCPP where USRLOGN='$username' OR USRLOGN = '" . $domainWindows . $slash . $username . "' ";
           // $utenti = $utentiDao->searchUtentiFromSql("SELECT * FROM utenti where Username='$username' OR Username = '" . $domainWindows . $slash . $username . "' ");
            $utenti = $utentiDao->searchToabcppFromSql("SELECT * FROM TOABCPP where usrlogn='$username' OR usrlogn = '" . $domainWindows . $slash . $username . "' ");

            if ($utenti != null) {
                $utente = $utenti->getResultsArray();
                if (is_array($utente)) {
                    $utente = $utente[0];
                } else {
                    $utente = null;
                }
            }
        }else
            {
                $utenti = $utentiDao->searchUtentiFromSql("SELECT * FROM TOABCPP where usrlogn = '" . $domainWindows . $slash . $username . "' ");
                if ($utenti != null) {
                    $utente = $utenti->getResultsArray();
                    if (is_array($utente)) {
                        $utente = $utente[0];
                    } else {
                        $utente = null;
                    }
                }
            }
        if ($utente != null)
            {
          
                $username=$utente->getusrlogn();
                if (DATABASE_SERVER_TO_USE == "mysql") {
                    $username = mysql_escape_string($username);
                    //echo $username;
                }
            }
        if ($utente != null && trim($utente->getusrpwd()) == $password) {
           $sql= "update TOABCPP set faild=0 where usrlogn='".$utente->getusrlogn()."'";
                $thisDatabaseQuery = new databaseQuery(); 
                $thisDatabaseQuery->setSqlQuery($sql); 
                $result = $thisDatabaseQuery->executeQuery(); 
                
            $login = 1;
            $username = $utente->getusrlogn();
            salvaLogin($username, $password, $utente->Admin,$domainWindows);
        } else if ($utente != null && $utente->AccessoLdap == "S" && $password!="" && loginLdap($username, $password)) {
           
            $login = 1;
            $username = $utente->getusrlogn();
            salvaLogin($username, $password, $utente->Admin,$domainWindows);
        } else if ($utente != null && $utente->AccessoLdap == "A" && loginAdiuto($username, $password)) {
             
            $login = 1;
            $username = $utente->getusrlogn();
            salvaLogin($username, $password, $utente->Admin,$domainWindows);
        } else {
            if($utente!=null){
                $sql= "update TOABCPP set faild=faild+1 where usrlogn='".$utente->getusrlogn()."'";
                $thisDatabaseQuery = new databaseQuery(); 
                $thisDatabaseQuery->setSqlQuery($sql); 
                $result = $thisDatabaseQuery->executeQuery(); 
            }
            
            $utente = null;
            disconnetti();
            //setcookie("admin", "", time()-3600);
        }
    } else if ($userWindows != "") {
        if (DATABASE_SERVER_TO_USE == "mysql") {
            $userWindows = mysql_escape_string($userWindows);
            //echo $thisUsername;
        }else
            {
            $userWindows=  str_replace("'", "''", $userWindows);
            }
       
        $utentiDao = new toabcppDAO();
        
        if($domainWindows==""||$domainWindows==getDominioDefault()||getDominioDefault()==""){
            
            $utenti = $utentiDao->searchToabcppFromSql("SELECT * FROM TOABCPP where usrlogn='$userWindows' OR usrlogn = '" . $domainWindows . $slash . $userWindows . "' ");
            if ($utenti != null) {
                $utente = $utenti->getResultsArray();
                if (is_array($utente)) {
                    $utente = $utente[0];
                } else {
                    $utente = null;
                }
            }
        }else
            {
                $utenti = $utentiDao->searchUtentiFromSql("SELECT * FROM TOABCPP where usrlogn = '" . $domainWindows . $slash . $userWindows . "' ");
                if ($utenti != null) {
                    $utente = $utenti->getResultsArray();
                    if (is_array($utente)) {
                        $utente = $utente[0];
                    } else {
                        $utente = null;
                    }
                }
            }
        //if (($utente != null && $utente->AccessoLdap == "S" &&$sso=="S") || ($utente != null && $utente->AccessoLdap == "S" && $sso!="S" && loginLdap($userWindows, $password)) ) {
        if ($utente != null && $utente->AccessoLdap == "S"  ) {
            //echo $userWindows." ".$domainWindows;
            
            $login = 1;
            $impostazioni = impostazioni();
            $domini = explode(",", $impostazioni->DominioEsterno);
            $trovato = false;
            foreach ($domini as $d) {
                //echo "$d - $domainWindows";
                if ($d == $domainWindows)
                    $trovato = true;
            }
            if ($trovato) {
                $username = $utente->getusrlogn();
                salvaLogin($username, "", $utente->Admin,$domainWindows);
            } else {
                $utente = null;
                disconnetti();
            }
        } else {
            $utente = null;
            disconnetti();
        }
    }
    
    return $utente;
}
function escapeDB($oggetto)
{
    foreach($oggetto as $p=>$v)
    {
         if (DATABASE_SERVER_TO_USE == "mysql") {
        $oggetto->$p=mysql_escape_string($v);
         }else
             {
             $oggetto->$p=  str_replace("'", "''", $v);
             }
    }
    return $oggetto;
}
function escapeDBVariabile($v)
{
    if (DATABASE_SERVER_TO_USE == "mysql") {
        return mysql_escape_string($v);
    }else{
        return str_replace("'", "''", $v);
    }
}
function rimuovi_escapeDBVariabile($v)
{
    if (DATABASE_SERVER_TO_USE == "mysql") {
        return str_replace("''", "'",str_replace("\\\\", "\\", $v));
    }else{
        return str_replace("''", "'", $v);
    }
}


function loginLdap($username, $password) {
    if (DATABASE_SERVER_TO_USE == "mysql") {
            $username =  stripslashes($username);
            //echo $thisUsername;
        }
    //echo "$username";
    $impostazioni = impostazioni();

    $servers = explode(",", $impostazioni->ServerAutenticazione);
    $dominioInterno = explode(",", $impostazioni->DominioInterno);
    $domini = explode(",", $impostazioni->DominioEsterno);
    $i = 0;
    $domainWindows = explode("\\", $username);
    $indice = 0;
    if (count($domainWindows) > 1) {
        //var_dump($domainWindows);
        $username = $domainWindows[1];
        $domainWindows = $domainWindows[0];
        
        //echo $username;
        foreach ($domini as $d) {
            //echo "$d - $domainWindows";
            if ($d == $domainWindows) {
                $indice = $i;
            }
            $i++;
        }
    }

    //echo "Server indice $indice - Server : ".$servers[$indice]." - Dominio Interno : ".$dominioInterno[$indice]." Dominio Autenticazione ".$domini[$indice]." Username ".$username;
    $ldapconn = ldap_connect($servers[$indice]);
    if ($ldapconn == null)
        return false;
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

//ldap_bind($ldapconn);
    /* ?><div style="display: none">
    <?php*/
    $ldapbind = ldap_bind($ldapconn, $username . "@" . $dominioInterno[$indice], $password);
    /* ?>
    </div>
    <?php */
    if ($ldapbind) {
        ldap_close($ldapconn);

        return true;
    }
    ldap_close($ldapconn);
    return false;
}

function disconnetti() {
     
    setcookie("username", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    setcookie("Dominio", "", time() - 3600);
    setcookie("admin", "", time() - 3600);
    setcookie("security_uid", "", time() - 3600);
    setcookie("passwordMail", "", time() - 3600);
    
    
}

function salvaLogin($username, $password, $admin = "N",$dominio="") {
    $expire = time() + 60 * 60 * 24 * 30 * 12;
    setcookie("username", $username, $expire);
    setcookie("password", $password, $expire);
    setcookie("admin", $admin, $expire);
    setcookie("Dominio", $dominio, $expire);
}

function impostazioni() {
    $impostazioniDao = new impostazioniDAO();
    
    $imp=$impostazioniDao->getImpostazioniByPK(1);
    if($imp==false||$imp==null) $imp= new impostazioniInfo();
    return $imp;
}


class utenteLdap {

    public $Nome = "";
    public $Cognome = "";
    public $Mail = "";
    public $Username = "";

}

function getMySqlTimestamp() {
    return date('Y-m-d H:i:s');
    
}

function getMySqlDate() {
    return date('Y-m-d');
}

function getDateLicenza() {
    return date('Y-m-d', time()+60*60*24*30);
}

function getMySqlTime() {
    return date('H:i:s');
}

function getUtentiLdap($username, $password, $user = "*") {
    //echo "$username $password";
    //$username=  $username;
    $utenti = array();
    $impostazioni = impostazioni();
    $servers = explode(",", $impostazioni->ServerAutenticazione);
    $dominioInterno = explode(",", $impostazioni->DominioInterno);
    $domini = explode(",", $impostazioni->DominioEsterno);
    $i = 0;
    $domainWindows = explode("\\", $username);
    $indice = 0;
    if (count($domainWindows) > 1) {
        //var_dump($domainWindows);
        $username = $domainWindows[1];
        $domainWindows = $domainWindows[0];
        
        //echo $username;
        foreach ($domini as $d) {
            //echo "$d - $domainWindows";
            if ($d == $domainWindows) {
                $indice = $i;
            }
            $i++;
        }
    }
    echo "Server : ".$servers[$indice]." - Dominio Interno : ".$dominioInterno[$indice]." Dominio Autenticazione ".$domini[$indice]." Username ".$username;
    
    $ldapconn = ldap_connect($servers[$indice]);
    if (!$ldapconn)
        return $utenti;
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
    // ldap_set_option($ldapconn, LDAP_SCOPE_SUBTREE, 1);
    ?><div style="display: none">
    <?php
    $ldapbind = ldap_bind($ldapconn, $username . "@" . $dominioInterno[$indice], $password);
    ?>
    </div>
    <?php
    if ($ldapbind) {

        $dcs = explode(".", $dominioInterno[$indice]);
        $i = 0;
        $dn = "";
        foreach ($dcs as $dc) {
            if ($i > 0) {
                $dn.=",";
            }
            $dn.="dc=" . $dc;
            $i++;
        }
        $filter = "samaccountname=$user";
        //$filter = "(&(objectCategory=person)({$filter})(mail=*" . $impostazioni->DominioEsterno . "))";
        //$filter = "(&(objectCategory=person)({$filter})(displayname=*)(|(mail=*" . $impostazioni->DominioEsterno . ")(!(mail=*))))";
        $filter = "(&(objectCategory=person)({$filter})(displayname=*))";
        $fields = array("samaccountname", "mail", "displayname");

        $sr = ldap_search($ldapconn, $dn, $filter, $fields);
        if ($sr != null) {
            $info = ldap_get_entries($ldapconn, $sr);
            if (is_array($info))
                foreach ($info as $result) {
                    if ($result["samaccountname"][0] != null) {
                        $utente = new utenteLdap();
                        $utente->Username =$domini[$indice]."\\".$result["samaccountname"][0];
                        $utente->Mail = $result["mail"][0];
                        $utente->Cognome = $result["displayname"][0];
                        $nome = explode(" ", $utente->Cognome);
                        $utente->Cognome = "";
                        for ($i = 0; $i < count($nome); $i++) {
                            if ($i == count($nome) - 1) {
                                $utente->Nome = $nome[$i];
                            } else {
                                if ($i == 0) {
                                    $utente->Cognome = $nome[$i];
                                } else {
                                    $utente->Cognome.=" " . $nome[$i];
                                }
                            }
                        }
                        $utenti[] = $utente;
                    }
                }
        }
    }
    return $utenti;
}

function correct_encoding($text) {
    $current_encoding = mb_detect_encoding($text, 'auto');
    $text = iconv($current_encoding, 'UTF-8', $text);
    return $text;
}


function getRadioSiNo($selected = false, $name) {
    ?>
    <input type="radio" id="<?php echo $name; ?>S" name="<?php echo $name; ?>" value="S" <?php if ($selected == "S")
           echo "checked='checked'";
    ?>/>Si
    <input type="radio" id="<?php echo $name; ?>N" name="<?php echo $name; ?>" value="N" <?php if ($selected != "S")
           echo "checked='checked'";
    ?>/>No
           <?php
       }

function convertiDataItToDb($data) {
    if ($data == null)
        return null;
    $d = explode("/", $data);
    if (count($d) < 3) {
        $d = explode("-", $data);
        if (count($d) < 3)
            return null;
    }
    $giorno = $d[0];
    if ($giorno < 10 && strlen($giorno) < 2) {
        $giorno = "0" . $giorno;
    }
    $mese = $d[1];
    if ($mese < 10 && strlen($mese) < 2) {
        $mese = "0" . $mese;
    }
    return $d[2] . "-" . $mese . "-" . $giorno;
}

function convertiDataDbToIt($data) {
     if (DATABASE_SERVER_TO_USE == "mssqlnative")
        {
        //$data=str_replace(array("T","Z")," ", $data);
        $format = 'Y-m-d';
        //echo $data;
         $date = new DateTime($data);
         $data=$date->format($format);
        }
    if ($data == null)
        return null;
    $d = explode("-", $data);
    if (count($d) < 3) {
        return null;
    }
    return $d[2] . "/" . $d[1] . "/" . $d[0];
}
function convertiDataDbToISO($data)
{
   return convertiDataItToDb(convertiDataDbToIt($data));
}
function convertiNumeroDb($num,$dec=2)
{
    $num=  str_replace(",",".", $num);
    return @number_format($num, $dec, ".", "");
}
function convertiTimeToOra($time) {
                if ($time == null || $time == "")
                    return $time;
        if (DATABASE_SERVER_TO_USE == "mssqlnative")
        {
        //$data=str_replace(array("T","Z")," ", $data);
        $format = 'H:i:s';
        //echo $data;
         $date = new DateTime($time);
         $time=$date->format($format);
        }
        
                if (strpos($time, ".") > 0) {
                    $time = explode(".", $time);
                    return $time[0];
                }
                return $time;
            }
function convertiDataDbToDate8($data) {
    if (DATABASE_SERVER_TO_USE == "mssqlnative")
        {
        //$data=str_replace(array("T","Z")," ", $data);
        $format = 'Y-m-d';
        //echo $data;
         $date = new DateTime($data);
         $data=$date->format($format);
        }
    if ($data == null)
        return null;
    $d = explode("-", $data);
    if (count($d) < 3) {
        return null;
    }
    return $d[0] . "" . $d[1] . "" . $d[2];
}

function convertiDataOraDbToIt($data) {
    
    
    if ($data == null)
        return null;
    if (DATABASE_SERVER_TO_USE == "mysql") {
        
    }else if (DATABASE_SERVER_TO_USE == "mssqlnative")
        {
        //$data=str_replace(array("T","Z")," ", $data);
        $format = 'Y-m-d H:i:s';
        //echo $data;
         $date = new DateTime($data);
         $fuso=-((integer)(date("O")/100));
         if($fuso>=0) $fuso="+".$fuso;
         $date->modify($fuso." hours");
         $data=$date->format($format);
        }
        else{
         $format = 'Y-m-d H:i:s';
         $date = DateTime::createFromFormat($format, $data);
         $fuso=-((integer)(date("O")/100));
         if($fuso>=0) $fuso="+".$fuso;
         $date->modify($fuso." hours");
         $data=$date->format($format);
        }
   

    
    $d = explode(" ", $data);
    return convertiDataDbToIt($d[0]) . " " . convertiTimeToOra($d[1]);
}
function convertiDataOraDbToUTC($data) {
    
    if ($data == null)
        return null;
    if (DATABASE_SERVER_TO_USE == "mysql") {
        
    }else if (DATABASE_SERVER_TO_USE == "mssqlnative")
        {
        //$data=str_replace(array("T","Z")," ", $data);
        $format = 'Y-m-d H:i:s';
        //echo $data;
         $date = new DateTime($data);
         $fuso=-((integer)(date("O")/100));
         if($fuso>=0) $fuso="+".$fuso;
         $date->modify($fuso." hours");
         $data=$date->format($format);
        }else
        {
         $format = 'Y-m-d H:i:s';
         $date = DateTime::createFromFormat($format, $data);
         $fuso=-((integer)(date("O")/100));
         if($fuso>=0) $fuso="+".$fuso;
         $date->modify($fuso." hours");
         $data=$date->format($format);
        }
   

    
    $d = explode(" ", $data);
    return $d[0] . "T" . convertiTimeToOra($d[1]);
}
function convertiDataOraUTCtoDb($data) {
    
    $d = explode("T", $data);
    $d1=explode("+",$d(1));
    return $d[0] . " " . $d1[0];
}
function creaSelezione($NomeSelezione, $Sql, $Campi, $width = 600, $page = DEFAULT_PAGINA_SELEZIONA, $testo = "+") {
    ?>
    <script type="text/javascript">
        $(function(){
            $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog({
                autoOpen: false,
                width: <?php echo $width ?>,
                height: 500,
                modal: true
            });
            $("#Seleziona<?php echo $NomeSelezione; ?>").button();
        });

        function CloseDivSelezione<?php echo $NomeSelezione; ?>(<?php
    $nomi = split(",", $Campi);
    $i = 0;
    if (is_array($nomi)) {
        foreach ($nomi as $value) {
            if ($i > 0)
                echo ",";
            echo "$value";
            $i++;
        }
    }else
        echo $campi;
    ?>){
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog('close');
    var frame = document.getElementById("FrameModificaSelezione<?php echo $NomeSelezione; ?>");
    frame.src="";
    DopoSelezione<?php echo $NomeSelezione; ?>(<?php
    $nomi = split(",", $Campi);
    $i = 0;
    if (is_array($nomi)) {
        foreach ($nomi as $value) {
            if ($i > 0)
                echo ",";
            echo "$value";
            $i++;
        }
    }else
        echo $campi;
    ?>);
    }
    function DivTitleSelezione<?php echo $NomeSelezione; ?>(titolo)
    {
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog( "option", "title", titolo );
    }
    function OpenDivSelezione<?php echo $NomeSelezione; ?>(link)
    {
    var frame = document.getElementById("FrameModificaSelezione<?php echo $NomeSelezione; ?>");
    frame.src=""+link;
    frame.onload=function()
    {
    var frame = document.getElementById("FrameModificaSelezione<?php echo $NomeSelezione; ?>");
    if(frame.contentWindow.document.body.scrollHeight>400){
    frame.height=frame.contentWindow.document.body.scrollHeight + "px";
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height(frame.contentWindow.document.body.scrollHeight+50);
    }
    else {
    frame.height="300px";
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height(350);
    }
                        
    }
    //$('#dialogSelezione<?php echo $NomeSelezione; ?>').height('100');
                    
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog('open');
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height('400');
    }
    </script>
    <div id="dialogSelezione<?php echo $NomeSelezione; ?>" title="">
        <iframe id="FrameModificaSelezione<?php echo $NomeSelezione; ?>" src="" width="<?php echo $width - 20 ?>px" height="380px" frameborder="no" allowtransparency="yes">
        </iframe>
    </div>
    <input type="button" class="ui-button ui-button-text-only ui-widget" id="Seleziona<?php echo $NomeSelezione ?>" type="button" onclick='OpenDivSelezione<?php echo $NomeSelezione ?>("selezionaDaTabella.php?width=<?php echo $width - 30 ?>px&page=<?php echo $page ?>&NomeSelezione=<?php echo $NomeSelezione ?>&Sql=<?php echo $Sql ?>&Campi=<?php echo $Campi ?>")' value='<?php echo $testo; ?>' >
    
    <?php /* if($testo=="+")
        { ?>
            <input type="button"  class="add" onclick='OpenDivSelezione<?php echo $NomeSelezione ?>("selezionaDaTabella.php?width=<?php echo $width - 30 ?>px&page=<?php echo $page ?>&NomeSelezione=<?php echo $NomeSelezione ?>&Sql=<?php echo $Sql ?>&Campi=<?php echo $Campi ?>")' value="<?php echo $testo; ?>">
        <?php }else if($testo=="+ U"||$testo=="+U")
        { ?>
            <input type="button"  class="add_user" onclick='OpenDivSelezione<?php echo $NomeSelezione ?>("selezionaDaTabella.php?width=<?php echo $width - 30 ?>px&page=<?php echo $page ?>&NomeSelezione=<?php echo $NomeSelezione ?>&Sql=<?php echo $Sql ?>&Campi=<?php echo $Campi ?>")' value="<?php echo $testo; ?>">
        <?php }else{ ?>
    <button id="Seleziona<?php echo $NomeSelezione ?>" type="button" onclick='OpenDivSelezione<?php echo $NomeSelezione ?>("selezionaDaTabella.php?width=<?php echo $width - 30 ?>px&page=<?php echo $page ?>&NomeSelezione=<?php echo $NomeSelezione ?>&Sql=<?php echo $Sql ?>&Campi=<?php echo $Campi ?>")' ><?php echo $testo; ?></button>
        <?php }*/ ?>
    
        <?php
}
function apriDettaglio($NomeSelezione, $url,$width = 600, $testo = "Modifica") {
    ?>
    <script type="text/javascript">
        $(function(){
            $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog({
                autoOpen: false,
                width: <?php echo $width ?>,
                height: 500,
                modal: true
            });
            $("#Seleziona<?php echo $NomeSelezione; ?>").button();
        });

        function CloseDivSelezione<?php echo $NomeSelezione; ?>(){
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog('close');
    }
    function DivTitleSelezione<?php echo $NomeSelezione; ?>(titolo)
    {
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog( "option", "title", titolo );
    }
    function OpenDivSelezione<?php echo $NomeSelezione; ?>(link)
    {
        var frame = document.getElementById("FrameModificaSelezione<?php echo $NomeSelezione; ?>");
        frame.src=""+link;
        frame.onload=function()
    {
    var frame = document.getElementById("FrameModificaSelezione<?php echo $NomeSelezione; ?>");
    if(frame.contentWindow.document.body.scrollHeight>400){
    frame.height=frame.contentWindow.document.body.scrollHeight + "px";
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height(frame.contentWindow.document.body.scrollHeight+50);
    }
    else {
    frame.height="400px";
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height(350);
    }
                        
    }
    //$('#dialogSelezione<?php echo $NomeSelezione; ?>').height('100');
                    
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').dialog('open');
    $('#dialogSelezione<?php echo $NomeSelezione; ?>').height('400');
    }
    </script>
    <div id="dialogSelezione<?php echo $NomeSelezione; ?>" title="">
        <iframe id="FrameModificaSelezione<?php echo $NomeSelezione; ?>" src="" width="<?php echo $width - 20 ?>px" height="380px" frameborder="no" allowtransparency="yes">
        </iframe>
    </div>
    <input type="button" class="ui-button ui-button-text-only ui-widget" id="Seleziona<?php echo $NomeSelezione ?>" type="button" onclick='OpenDivSelezione<?php echo $NomeSelezione ?>("<?php echo $url ?>")' value='<?php echo $testo; ?>' >
    
        <?php
}
function getUsername() {
    $username=isset($_SESSION['username']) && $_SESSION['username'] != "" ? $_SESSION['username'] : $_COOKIE['username'];
    if (DATABASE_SERVER_TO_USE == "mysql") {
        $username=mysql_escape_string($username);
    }else
        {
        $username=str_replace("'","''",$username);
        }
    return $username;
}
function getDominio() {
    $domain=isset($_SESSION['Dominio']) && $_SESSION['Dominio'] != "" ? $_SESSION['Dominio'] : $_COOKIE['Dominio'];
    if (DATABASE_SERVER_TO_USE == "mysql") {
        $domain=mysql_escape_string($domain);
    }else
        {
        $domain=str_replace("'","''",$domain);
        }
    return $domain;
}

function getAdmin() {
    return isset($_SESSION['Admin']) && $_SESSION['Admin'] != "" ? $_SESSION['Admin'] : $_COOKIE['admin'];
}

/**
  Validate an email address.
  Provide email address (raw input)
  Returns true if the email address has the email
  address format and the domain exists.
 */
function validEmail($email) {
    $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex) {
        $isValid = false;
    } else {
        $domain = substr($email, $atIndex + 1);
        $local = substr($email, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64) {
            // local part length exceeded
            $isValid = false;
        } else if ($domainLen < 1 || $domainLen > 255) {
            // domain part length exceeded
            $isValid = false;
        } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
            // local part starts or ends with '.'
            $isValid = false;
        } else if (preg_match('/\\.\\./', $local)) {
            // local part has two consecutive dots
            $isValid = false;
        } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
            // character not valid in domain part
            $isValid = false;
        } else if (preg_match('/\\.\\./', $domain)) {
            // domain part has two consecutive dots
            $isValid = false;
        } else if
        (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
            // character not valid in local part unless
            // local part is quoted
            if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                $isValid = false;
            }
        }
        /* if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
          {
          // domain not found in DNS
          $isValid = false;
          } */
    }
    return $isValid;
}

function formReadOnly($Id) {
    ?>
    <script>
    objForm=document.getElementById("<?php echo $Id ?>");
    var elArr = objForm.elements;
    for(var i=0; i<elArr.length; i++) {
    switch (elArr[i].type) {
    case 'radio': elArr[i].disabled = true; break;
    case 'checkbox': elArr[i].disabled = true; break;
    case 'select-one': elArr[i].disabled = true; break;
    case 'select-multiple': elArr[i].disabled = true; break;
    case 'text': elArr[i].readOnly = true; break;
    case 'textarea': elArr[i].readOnly = true; break;
    case 'button': elArr[i].disabled = true; break;
    case 'submit': elArr[i].disabled = true; break;
    case 'reset': elArr[i].disabled = true; break;
    case 'hidden': break;
    default: elArr[i].disabled = true; break;
    }
    }
    </script>
    <?php
}

function inviaMail($to, $oggetto, $messaggio) {

    if (!is_array($to) || count($to) == 0)
        return;

    $impostazioniDao = new impostazioniDAO();
    $impo = $impostazioniDao->getImpostazioniByPK(1);

    $mail = new PHPMailer();

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = $impo->Smtp; // SMTP server
    if ($impo->PortaSmtp != null && $impo->PortaSmtp > 0)
        $mail->Port = 0 + $impo->PortaSmtp;
    if (!checkServer($mail->Host, $mail->Port)) {
        return "Server Mail Inattivo";
    }
    if ($impo->UsernameSmtp != null && $impo->UsernameSmtp != "" && $impo->PasswordSmtp != "") {
        $mail->Username = $impo->UsernameSmtp;
        $mail->Password = $impo->PasswordSmtp;
    }
    $mail->From = $impo->EmailErrori;
    $mail->FromName = "Protocollo - " . $impo->Denominazione;

    $mail->Subject = $oggetto;
    $mail->AltBody = "Messaggio non in html\n" . $messaggio;
    $mail->MsgHTML($messaggio);

    foreach ($to as $ind) {
        $mail->AddAddress($ind);
    }

    ini_set("SMTP", $impo->Smtp);
    $headers = "From: " . $impo->Email_Amministratore . "\r\n" .
            'X-Mailer: PHP/' . phpversion() . "\n";
    $header .= "MIME-Version: 1.0\n";
    $header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $header .= "Content-Transfer-Encoding: 7bit\n\n";
    //$messaggio= "Content-Type: text/html; charset=\"iso-8859-1\"\n"."Content-Transfer-Encoding: 7bit\n\n".$messaggio;
    //mail($to,$oggetto,$messaggio,$headers);

    if (!$mail->Send()) {
        return "Errore Invio Email: " . $mail->ErrorInfo;
    } else {
        return "Email inviate!";
    }
}

function checkServer($server, $port = 80) {
    $timeout = "5";
    $errno = "";
    $errstr = "";
    return @fsockopen("$server", $port, $errno, $errstr, $timeout);
}

function unzip($file, $basedir = "", $debug = false) {
    if (substr($basedir, -1) != "\\" && substr($basedir, -1) != "/") {
        $basedir .= "/";
    }
    $files = array();
    $zip = zip_open($file);
    if (is_resource($zip)) {
        $tree = "";
        while (($zip_entry = zip_read($zip)) !== false) {
            if (debug)
                echo "Scompattazione " . zip_entry_name($zip_entry) . "<br>";
            if (strpos(zip_entry_name($zip_entry), "/") !== false) {
                $last = strrpos(zip_entry_name($zip_entry), "/");
                $dir = substr(zip_entry_name($zip_entry), 0, $last);
                $file = substr(zip_entry_name($zip_entry), strrpos(zip_entry_name($zip_entry), "/") + 1);
                if (!is_dir($basedir . $dir)) {
                    mkdir($basedir . $dir);
                }
                $file=str_replace("'","",$file);
                if (strlen(trim($file)) > 0) {
                    $return = @file_put_contents($basedir . $dir . "/" . $file, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
                    if ($return === false) {
                        echo("Impossibile Scrivere $basedir$dir/$file\n");
                    }else
                        $files[] = $basedir . $dir . "/" . $file;
                }
            }else {
                $file=zip_entry_name($zip_entry);
                $file=str_replace("'","",$file);
                $return = @file_put_contents($basedir .$file , zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
                if ($return === false) {
                    echo("Impossibile Scrivere $basedir" . $file . "\n");
                }else
                    $files[] = $basedir . $file;
            }
        }
    }else {
        echo "Impossibile Aprire lo Zip\n";
    }
    return $files;
}

function unrar($file, $basedir = "", $debug = false) {
    if (substr($basedir, -1) != "\\" && substr($basedir, -1) != "/") {
        $basedir .= "/";
    }
    $files = array();
    $rar_file = rar_open($file);
    if ($rar_file == null) {
        echo "Errore Scompattazione RAR";
        return $files;
    }
    $entries = rar_list($rar_file);
    foreach ($entries as $entry) {
        if (debug)
            echo 'Filename: ' . $entry->getName() . "\n";
        
        //echo 'Packed size: ' . $entry->getPackedSize() . "\n";
        //echo 'Unpacked size: ' . $entry->getUnpackedSize() . "\n";
        $name=$entry->getName();
        $name=str_replace("'","",$name);
        if (!$entry->isDirectory() && $entry->extract(false,$basedir.$name)) {
            $files[] = $basedir . $name;
        }
    }
    rar_close($rar_file);
    return $files;
}
function getSelectFromTabella($selected , $name,$tabella,$campoValue,$campoDescr,$opz=false,$valOpz="") {
           ?>
    <select id="<?php echo $name; ?>" name="<?php echo $name; ?>">

        <?php
        if($opz) echo "<option value=\"$valOpz\"></option>";
        
        $select="SELECT $campoValue,$campoDescr FROM $tabella";
        //faccio apparire prima gli attivi
//           $result = $tipoLettereDao->searchTipolettere("","","","","Descrizione","ASC");

       
            $trovato = false;
            $thisDatabaseQuery = new databaseQuery();
    $result = $thisDatabaseQuery->executeDirectQuery($select);
$rows = $result->GetRows(-1);
 $i=1;
 $totGenerale=0;
    foreach ($rows as $row) {
                ?>
                <option value="<?php echo $row[$campoValue]; ?>" <?php
            if ($selected == $row[$campoValue]) {
                $trovato = true;
                echo "selected='selected'";
            }
                ?> ><?php echo $row[$campoDescr];
            ?></option>
                        <?php
                    }
                    //gestisco il caso che non sia a tabella il valore
                    if (!$trovato && $selected != "") {
                        ?>
                <option value="<?php echo $selected; ?>" <?php
            echo "selected='selected'";
                        ?> > <?php echo $selected;
            echo " *Non a Tabella*"; ?></option>
            <?php
        }
    
    ?>

    </select>
        <?php
    }
    function getSelectFromArray($selected,$name,$arr)
    {
        ?>
    <select id="<?=$name?>" name="<?=$name?>" >
                       <?php 
                       foreach($arr as $k=>$v)
                       {
                           echo "<option value='$k'>$v</option>\n";
                       }
                       ?>
                    </select>
                    <script>

                        var elSel=document.getElementById("<?=$name?>");
                          var i;
                          for (i = elSel.length - 1; i>=0; i--) {
                            if (elSel.options[i].value=="<?=$selected?>")
                            {
                              elSel.options[i].selected=true;
                            }
                          }
                    </script>
    <?php
    }
function inputCalendario($nome, $valore) {
    require_once "KoolControls/KoolCalendar/koolcalendar.php";
    $datapicker = new KoolDatePicker($nome); //Create calendar object
    $datapicker->scriptFolder = "KoolControls/KoolCalendar"; //Set scriptFolder
    $datapicker->styleFolder = "default";
    $datapicker->Localization->Load("KoolControls/KoolCalendar/localization/it.xml");
    //Change date and time format
    $datapicker->DateFormat = "d/m/Y";
    $datapicker->Init();
    $datapicker->Value = str_replace("''", "'", $valore);
    $datapicker->Width="100px";
    echo $datapicker->Render();
}
?>