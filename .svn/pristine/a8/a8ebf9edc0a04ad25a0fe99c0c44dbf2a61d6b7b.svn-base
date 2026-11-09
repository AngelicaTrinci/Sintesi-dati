<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_GRUPPI_ASSEGNATI_MANAGER);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
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
<title>Gestione assegnazione gruppi </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui.css">
<script src="js/jquery.min.js">
</script>
<script src="js/jquery-ui.min.js">
</script>
<!--<script type="text/javascript" src="js/livevalidation_standalone.js"></script>--></head>
<body>
<?php

	$return = requestUtils::getRequestObject('Return');
        $Op = requestUtils::getRequestObject('Op');
	$submit = requestUtils::getRequestObject('submit');
        if ($submit == "Copia") $Op = "Inserisci";
?>
    
    <script> 

$(function(){ 

    delta_dialog.SetOptions({ 

        title: "<? if( $Op=="Inserisci" ) echo $Op; else echo "Modifica"; ?> assegnazione", 

        width: 660, 

        height: 300 

    }); 

    delta_dialog.setButtons({ 

        <? if ($Op == "Inserisci" ){?> 

        "Inserisci": function(){ submit2("Inserisci"); }, 

        <?} else {?> 

        "Modifica":  function(){ submit2("Modifica"); }, 

        "Copia":     function(){ submit2("Copia"); }, 

        "Elimina":   function(){ submit2("Elimina"); }, 

        <?}?> 

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


	$thisId_gruppo = stripslashes(requestUtils::getRequestObject('Id_gruppo'));
	$thisId_utente = stripslashes(requestUtils::getRequestObject('Id_utente'));
       
        
	$thisUtenti_gruppi_assegnatiManager = new Utenti_gruppi_assegnatiManager();
	$thisUtenti_gruppi_assegnatiInfo = $thisUtenti_gruppi_assegnatiManager->getUtenti_gruppi_assegnatiByPK(escapeDBVariabile($thisId_gruppo),escapeDBVariabile($thisId_utente));
	
	if ($Op == "Inserisci"){
		$thisUtenti_gruppi_assegnatiInfo = new utenti_gruppi_assegnatiInfo();

		$thisUtenti_gruppi_assegnatiInfo->Id_gruppo = $thisId_gruppo ;
		$thisUtenti_gruppi_assegnatiInfo->Id_utente = $thisId_utente ;
	}
if($submit=="Inserisci"){
	if ($thisUtenti_gruppi_assegnatiInfo == false){
		$thisUtenti_gruppi_assegnatiInfo = new utenti_gruppi_assegnatiInfo();
                
		$thisUtenti_gruppi_assegnatiInfo->Id_gruppo = $thisId_gruppo ;
		$thisUtenti_gruppi_assegnatiInfo->Id_utente = $thisId_utente ;
		$thisUtenti_gruppi_assegnatiManager->createUtenti_gruppi_assegnati(escapeDB(clone $thisUtenti_gruppi_assegnatiInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Il gruppo assegnato è stato inserito</b><br/>"; 
	}else{
	echo "<b> Utenti_gruppi_assegnati Gia Presente, Cambiare la Chiave</b><br/>"; 
	}
}
	if ($thisUtenti_gruppi_assegnatiInfo == false)
	{
?>
Utenti_gruppi_assegnati Non Trovato,Campi Chiave Errati 
<?php
		exit;
	}
if($submit=="Modifica"){
		$thisUtenti_gruppi_assegnatiInfo->Id_gruppo = $thisId_gruppo ;
		$thisUtenti_gruppi_assegnatiInfo->Id_utente = $thisId_utente ;
	$thisUtenti_gruppi_assegnatiManager->updateUtenti_gruppi_assegnati(escapeDB(clone $thisUtenti_gruppi_assegnatiInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Il gruppo assegnato è stato modificato</b><br/>"; 
	
}
if($submit=="Elimina"){
	$Op="Inserisci"; 
	$thisUtenti_gruppi_assegnatiManager->deleteUtenti_gruppi_assegnati(escapeDB(clone $thisUtenti_gruppi_assegnatiInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Il gruppo assegnato è stato eliminato</b><br/>"; 
}


                    $thisDatabaseQuery = new databaseQuery(); 
                    $result = $thisDatabaseQuery->executeDirectQuery("SELECT UG.Id_gruppo,UG.Descrizione FROM utenti_gruppi UG WHERE Id_gruppo NOT IN (SELECT UGA.Id_gruppo FROM utenti_gruppi_assegnati UGA WHERE UGA.Id_utente = ".$thisId_utente.")");
                    $rows = $result->GetRows(-1);
                    
                      if($rows[0]=="" && $Op=="Inserisci"){
                         echo "<b> Sono stati assegnati tutti i gruppi disponibili</b>";
                     }else{ ?>
        
<form autocomplete="off" name="utenti_gruppi_assegnatiEditForm"  id="utenti_gruppi_assegnatiEditForm" method="POST" action="editUtenti_gruppi_assegnati.php" onsubmit='if(document.getElementById("submit").value=="Elimina") return window.confirm("Sei sicuro di volerlo Eliminare ?"); else return true;' >
<input type="hidden" name="Return" value="<?php echo $return; ?>"></input>
<table cellspacing="8" cellpadding="0" border="0">                       

                       <?
                       if( $Op=="Inserisci" ){
                         
                    ?>

	<tr valign="top" height="20">
            
		<td id="BordatoTitolo" align="right"> <b> Gruppo : </b> </td>
                <td>
                                        <select name="Id_gruppo" >
                     <?php
                   
                     $i=0;
                     foreach ($rows as $row){
          echo "<option id='Id_gruppo' value='".$row["Id_gruppo"]."' >".$row["Descrizione"]."</option>";
          $i++;
            }          
            ?> </select>
                     </td> 
   
	</tr>
        </table>
<button id="Inserisci" type="submit"  onclick='submit2("Inserisci");'>Inserisci</button>
    <? }else {
         $result = getValore("SELECT UG.Descrizione FROM utenti_gruppi UG LEFT JOIN utenti_gruppi_assegnati UGA ON UG.Id_gruppo = UGA.Id_gruppo WHERE UGA.Id_gruppo = ".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()." AND UGA.Id_utente = ".$thisUtenti_gruppi_assegnatiInfo->getId_utente());
       ?>
<tr valign="top" height="20">
            
		<td id="BordatoTitolo" align="right"> <b> Gruppo : </b> </td>
                <td>
                    <input type="text" id="Id_gruppo" name="Id_gruppo" value="<?=$result?>" disabled/>
                     </td> 
   
	</tr>
      <input type="hidden" id="Id_gruppo" name="Id_gruppo" value="<?=$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()?>"/> 
        </table>
        <button id="Elimina" type="submit"  onclick='submit2("Elimina");'>Elimina</button>
            <? } ?> 
    <input type="hidden" id="Id_utente" name="Id_utente" value="<?=$thisId_utente?>"/> 
<input type="hidden" id="submit" name="submit" value=""/> 

      <?  } ?> 




<script> 

function submit2(valore) 
{ 
    
    
    submit=valore; 
    document.getElementById("submit").value=valore; 
    var form = document.getElementById("utenti_gruppi_assegnatiEditForm");
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
<?php if ( $Op=="Inserisci"){ ?> 

 <?php }else{ ?> 
<!--<button id="Modifica" type="submit"  onclick='submit2("Modifica");'>Modifica</button>
<button id="Copia" type="submit"  onclick='submit2("Copia");'>Copia</button>-->

 <?php } ?> 
<!--<button id="Ripristina" type="button"  onclick='ripristina();'>Ripristina</button>-->
</form>
</body>
</html>