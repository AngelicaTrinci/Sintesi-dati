<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_TOKEN_ACCESSO_MANAGER);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
include_once("include/autorizzazioni.php");
?>
<!DOCTYPE html>

<html>

 <head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="UTF-8">
      <!--<meta charset="iso-8859-1"> -->
       
        <!-- no cache headers -->
 <meta http-equiv="Pragma" content="no-cache" />
 <meta http-equiv="Expires" content="-1" />
 <meta http-equiv="Cache-Control" content="no-cache" />
 <!-- end no cache headers -->
        <link rel="shortcut icon" href="<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <link rel="icon" href="<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <title>Progetto Vuoto</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>
        <script src="js/delta_dialog_o.js" type="text/javascript"></script> 
        <link type="text/css" href="css/custom-theme/jquery-ui.min.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/livevalidation_standalone.js"></script>
        <script src="js/jquery.iframe-auto-height.plugin.js">
        </script>
            
  </head>
<body>
<?      $return = requestUtils::getRequestObject('Return');
	$Op = requestUtils::getRequestObject('Op');
	$submit = requestUtils::getRequestObject('submit');
        
        if ($submit == "Copia") $Op = "Inserisci";
        
        $thisToken = stripslashes(requestUtils::getRequestObject('Token'));
	$thisId_utente = stripslashes(requestUtils::getRequestObject('Id_utente'));
	$thisData_ora_creazione = stripslashes(requestUtils::getRequestObject('Data_ora_creazione'));
	$thisUtente_modifica = stripslashes(requestUtils::getRequestObject('Utente_modifica'));
	$thisData_ora_modifica = stripslashes(requestUtils::getRequestObject('Data_ora_modifica'));
	$thisInfo = stripslashes(requestUtils::getRequestObject('Info'));
	$thisAttivo = stripslashes(requestUtils::getRequestObject('Attivo'));
	$thisUtenti_token_accessoManager = new Utenti_token_accessoManager();
	$thisUtenti_token_accessoInfo = $thisUtenti_token_accessoManager->getUtenti_token_accessoByPK(escapeDBVariabile($thisToken));
        
?>
<script> 

$(function(){ 

    delta_dialog.SetOptions({ 

        title: "<? if( $Op=="Inserisci" ) echo $Op; else echo "Modifica"; ?> token di accesso", 

        width: 660, 

        height: 300 

    }); 

    delta_dialog.setButtons({ 

            <? if($thisUtenti_token_accessoInfo->getAttivo()=="N"){ ?>
 "Attiva": function(){ submit2("ModificaS"); }, 
<? }else{ ?>
 "Disattiva": function(){ submit2("ModificaN"); }, 
<? } ?>
            

        "Chiudi":    function(){ 

            delta_dialog.close("done"); 

        } 

    }); 

}); 

function doRedirect() { 

      delta_dialog.close("done"); 

} 

</script> 
<?php

	
	if ($submit == "Copia") $Op = "Inserisci";
	if ($Op == "Inserisci"){
		$thisUtenti_token_accessoInfo = new utenti_token_accessoInfo();

		$thisUtenti_token_accessoInfo->Token = $thisToken ;
		$thisUtenti_token_accessoInfo->Id_utente = $thisId_utente ;
		$thisUtenti_token_accessoInfo->Data_ora_creazione = $thisData_ora_creazione ;
		$thisUtenti_token_accessoInfo->Utente_modifica = $thisUtente_modifica ;
		$thisUtenti_token_accessoInfo->Data_ora_modifica = $thisData_ora_modifica ;
		$thisUtenti_token_accessoInfo->Info = $thisInfo ;
		$thisUtenti_token_accessoInfo->Attivo = $thisAttivo ;
	}

	if ($thisUtenti_token_accessoInfo == false)
	{
?>
Utenti_token_accesso Non Trovato,Campi Chiave Errati 
<?php
		//exit;
	}
if($submit=="ModificaN"){
		$thisUtenti_token_accessoInfo->Token = $thisToken ;
		$thisUtenti_token_accessoInfo->Utente_modifica = $utente->Id_utente ;
		$thisUtenti_token_accessoInfo->Data_ora_modifica =  date("Y-m-d H:i:s") ;
		$thisUtenti_token_accessoInfo->Info = $thisInfo ;
		$thisUtenti_token_accessoInfo->Attivo = "N";
	$thisUtenti_token_accessoManager->updateUtenti_token_accesso(escapeDB(clone $thisUtenti_token_accessoInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Token disattivato</b><br/>"; 
	
}
if($submit=="ModificaS"){
		$thisUtenti_token_accessoInfo->Token = $thisToken ;
		$thisUtenti_token_accessoInfo->Utente_modifica = $utente->Id_utente ;
		$thisUtenti_token_accessoInfo->Data_ora_modifica =  date("Y-m-d H:i:s") ;
		$thisUtenti_token_accessoInfo->Info = $thisInfo ;
		$thisUtenti_token_accessoInfo->Attivo = "S";
	$thisUtenti_token_accessoManager->updateUtenti_token_accesso(escapeDB(clone $thisUtenti_token_accessoInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Token attivato</b><br/>"; 
	
}
if($submit=="Elimina"){
	$Op="Inserisci"; 
	$thisUtenti_token_accessoManager->deleteUtenti_token_accesso(escapeDB(clone $thisUtenti_token_accessoInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Utenti_token_accesso Eliminato</b><br/>"; 
}

?>
<form autocomplete="off" name="utenti_token_accessoEditForm" id="utenti_token_accessoEditForm" method="POST" action="editUtenti_token_accesso.php" onsubmit='if(document.getElementById("submit").value=="Elimina") return window.confirm("Sei sicuro di volerlo Eliminare ?"); else return true;' >
<input type="hidden" name="Return" value="<?php echo $return; ?>"></input>
<table cellspacing="8" cellpadding="0" border="0">
<!--	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Token : </b> </td>
                <?php //echo htmlentities ($thisUtenti_token_accessoInfo->getToken(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>
			</tr>-->
    		 <input type="hidden"  id="Token" name="Token" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getToken(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"> 		
	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Id utente : </b> </td>
		<td> <input type="text" id="Id_utente" name="Id_utente" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getId_utente(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11"  maxlength="11" disabled> </td>
	</tr>
	
	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Info : </b> </td>
		<td> <input type="text" id="Info" name="Info" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getInfo(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="500" > </td>
	</tr>
	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Attivo : </b> </td>
		<td> <input type="text" id="Attivo" name="Attivo" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->Attivo,ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="1"  maxlength="1" disabled> </td>
	</tr>
                   
	<tr valign="top" height="20">
		<td id="BordatoTitolo" > <b> Data e ora creazione : </b> </td>
		<td><?php
                    function convertiDataOraDbToIt2($data) {

                        if ($data == null)
                            return null;
                        if (DATABASE_SERVER_TO_USE == "mysql" || DATABASE_SERVER_TO_USE == "mysqli") {
                        } else if (DATABASE_SERVER_TO_USE == "mssqlnative") {
                            $format = 'Y-m-d H:i:s';
                            $date = new DateTime($data);
                            $data = $date->format($format);
                        }
                        else {
                            $format = 'Y-m-d H:i:s';
                            $date = DateTime::createFromFormat($format, $data);
                            $fuso = -((integer) (date("O") / 100));
                            if ($fuso >= 0)
                                $fuso = "+" . $fuso;
                            $date->modify($fuso . " hours");
                            $data = $date->format($format);
                        }
                        $d = explode(" ", $data);
                        return convertiDataDbToIt($d[0]) . " " . convertiTimeToOra($d[1]);
                    }
                    echo convertiDataOraDbToIt2($thisUtenti_token_accessoInfo->getData_ora_creazione());
                    ?>
                    <input type="hidden" readonly="readonly" id="Data_ora_creazione" name="Data_ora_creazione" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getData_ora_creazione(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="524288"> 
                </td>
	</tr>
        <tr valign="top" height="20">
		<td id="BordatoTitolo"  > <b> Utente modifica : </b> </td>
		<td> 
                    <?php
                    
                    $query = new databaseQuery();
                    $str = "Select Nome, Cognome from Utenti where Id_utente = ?";
                    $par =     $par = array($thisUtenti_token_accessoInfo->getUtente_modifica());
                    $rs = $query->executeDirectQueryPar($str, $par);
                    $rows = $rs->getRows(-1);
                    echo $rows[0]["Nome"]," ",$rows[0]["Cognome"];
                    ?>
                    <? echo $rows_mod[0]["TO14A"];?>
                    <input type="hidden" readonly="" id="Utente_modifica" name="Utente_modifica" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getUtente_modifica(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="60"> 
                </td>
	</tr>
	<tr valign="top" height="20">
		<td id="BordatoTitolo"  > <b> Data e ora modifica : </b> </td>
		<td> 
                    <?php echo convertiDataOraDbToIt2($thisUtenti_token_accessoInfo->getData_ora_modifica());?>
                    <input type="hidden" readonly="" id="Data_ora_modifica" name="Data_ora_modifica" value="<?php echo htmlentities ($thisUtenti_token_accessoInfo->getData_ora_modifica(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="524288"> 
                </td>
	</tr>
</table>
<input type="hidden" id="submit" name="submit" value=""/> 
<script> 
function submit2(valore)  

{  

    submit=valore;  

    document.getElementById("submit").value=valore;  

    var form = document.getElementById("utenti_token_accessoEditForm"); 

    if (form){ 

        if(form.onsubmit()){ 

        HTMLFormElement.prototype.submit.call(form); 

    } 

    } 

    return true;  

} 

function ripristina() 
{ 
window.location=window.location; 
} 
</script> 

</form>

</body>
</html>