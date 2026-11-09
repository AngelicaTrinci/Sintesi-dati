<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?
include_once(CONFIG_FILE);
include_once(CLASS_TERMINI_DI_CONSEGNA_MANAGER);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
include_once("autorizzazioni_applicativo.php");

?>
<?
$return = requestUtils::getRequestObject('Return');
$Op     = requestUtils::getRequestObject('Op');
$submit = requestUtils::getRequestObject('submit');
$autorizzazioni = new Autorizzazioni_applicativo();

$thisCodice                   = stripslashes(requestUtils::getRequestObject('Codice'));
$thisDescrizione              = stripslashes(requestUtils::getRequestObject('Descrizione'));
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
        <title>Gestione Termini_di_consegna</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/delta_dialog_o.js" type="text/javascript"></script>
        <!--<script type="text/javascript" src="js/livevalidation_standalone.js"></script>-->
    </head>
    <body>
<?
$thisTermini_di_consegnaManager = new Termini_di_consegnaManager();
// Leggo il record richiesto
$thisTermini_di_consegnaInfo = $thisTermini_di_consegnaManager->getTermini_di_consegnaByPK(escapeDBVariabile($thisCodice));
// Se richiesta la copia, forzo l'opzione inserimento
if ($submit == "Copia"){
    $Op = "Inserisci";
}

// Inizializzazione dei valori in caso di visualizzazione del pannello per l'inserimento
if ($Op == "Inserisci"){
    $thisTermini_di_consegnaInfo = new termini_di_consegnaInfo();

    $thisTermini_di_consegnaInfo->codice                   = $thisCodice ;
    $thisTermini_di_consegnaInfo->descrizione              = $thisDescrizione ;
    // ===========================================
    // EDIT POINT
    // Inizializzare qui i valori di default da mostrare all'apertura del pannello in inserimento
    // ===========================================
    
}

// Esecuzione dell'inserimento
if($submit=="Inserisci"){
    // Eseguo l'inserimento solo se non ho trovato il record con la chiave primaria
    if ($thisTermini_di_consegnaInfo == false){
        $thisTermini_di_consegnaInfo = new termini_di_consegnaInfo();

        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni prima dell'inserimento del record (pre sovrascrittura da input)
        // ===========================================
        
        $thisTermini_di_consegnaInfo->codice                   = $thisCodice ;
        $thisTermini_di_consegnaInfo->descrizione              = $thisDescrizione ;
        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni prima dell'inserimento del record (post sovrascrittura da input)
        // ===========================================
        
        $thisTermini_di_consegnaManager->createTermini_di_consegna(escapeDB(clone $thisTermini_di_consegnaInfo)); 
        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni post inserimento del record
        // ===========================================
        
        ?><script> window.setTimeout("doRedirect()", 1500);</script> <?
        echo "<b> Termini_di_consegna Inserito</b><br/>"; 
    }
    else{
        echo "<b> Termini_di_consegna Gia Presente, Cambiare la Chiave</b><br/>"; 
    }
}

// Se non esiste il record: Visualizzazione errore
if ($thisTermini_di_consegnaInfo == false){
    ?> Termini_di_consegna Non Trovato,Campi Chiave Errati <?
    exit;
}

// Esecuzione della modifica
if($submit=="Modifica"){
        
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della modifica del record (pre sovrascrittura da input)
    // ===========================================
    
    $thisTermini_di_consegnaInfo->codice                   = $thisCodice ;
    $thisTermini_di_consegnaInfo->descrizione              = $thisDescrizione ;
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della modifica del record (post sovrascrittura da input)
    // ===========================================
    
    $thisTermini_di_consegnaManager->updateTermini_di_consegna(escapeDB(clone $thisTermini_di_consegnaInfo)); 
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni post aggiornamento del record
    // ===========================================
    
    ?><script>window.setTimeout("doRedirect()", 1500);</script><?
    echo "<b> Termini_di_consegna Modificato</b><br/>"; 
}
if($submit=="Elimina"){
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della cancellazione del record
    // ===========================================
    
    $Op="Inserisci"; 
    $thisTermini_di_consegnaManager->deleteTermini_di_consegna(escapeDB(clone $thisTermini_di_consegnaInfo)); 
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni post cancellazione del record
    // ===========================================
    
    ?><script>window.setTimeout("doRedirect()", 1500);</script><?
    echo "<b> Termini_di_consegna Eliminato</b><br/>"; 
}

// ===========================================
// EDIT POINT
// Eseguire qui le azioni prima della visualizzazione del pannello
// ===========================================

?>
        <script>
            $(function(){
                if( typeof delta_dialog != "undefined" && typeof top.delta_dialog != "undefined" ){
                    $(".edit-button").hide();
                    delta_dialog.SetOptions({
                        title: "<?=$Op;?> Termini_di_consegna",
                        //width: -larghezza dialog-,
                        //height: -altezza dialog-
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
                }
                else{
                    $("#Inserisci").button();
                    $("#Modifica").button();
                    $("#Elimina").button();
                    $("#Copia").button();
                    $("#Ripristina").button();
                }
            });
            function doRedirect() { //funzione con il link alla pagina che si desidera raggiungere
                if( typeof delta_dialog != "undefined" && typeof top.delta_dialog != "undefined" ){
                    delta_dialog.close("done");
                }
                else{
                    <? if($return!="Close"){ ?>
                    location.href = "view./Termini_di_consegna.php";
                    <? }else{ ?>
                    window.close();
                    parent.CloseDiv();
                    <? } ?>
                }
            }
        </script>
<div>
    <form name="termini_di_consegnaEditForm" id="termini_di_consegnaEditForm" method="POST" action="editTermini_di_consegna.php" onsubmit='if(document.getElementById("submit").value=="Elimina") return window.confirm("Sei sicuro di volerlo Eliminare ?"); else return true;' >
        <input type="hidden" name="Return" value="<?php echo $return; ?>"></input>
        <table cellspacing="8" cellpadding="0" border="0">
            <tr valign="top" height="20">
                <td id="BordatoTitolo" align="right"> <b> Codice : </b> </td>
        <td> <?php if($Op=="Inserisci"){ ?> 
             <input type="text" id="Codice" name="Codice" value="<?php echo htmlentities ($thisTermini_di_consegnaInfo->getCodice(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="3" maxlength="3">         <?php }else{ ?>
             <input type="hidden"  id="Codice" name="Codice" value="<?php echo htmlentities ($thisTermini_di_consegnaInfo->getCodice(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="3"> <?php echo htmlentities ($thisTermini_di_consegnaInfo->getCodice(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>        <?php } ?></td>
    </tr>
            <tr valign="top" height="20">
                <td id="BordatoTitolo" align="right"> <b> Descrizione : </b> </td>
        <td> <input type="text" id="Descrizione" name="Descrizione" value="<?php echo htmlentities ($thisTermini_di_consegnaInfo->getDescrizione(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="100"> </td>
    </tr>
</table>
<input type="hidden" id="submit" name="submit" value=""/> 
        <script>
            function submit2(valore){
                submit=valore;
                document.getElementById("submit").value=valore;
                if( typeof delta_dialog != "undefined" && typeof top.delta_dialog != "undefined" ){
                    var form = document.getElementById("termini_di_consegnaEditForm");
                    if (form){
                        if(form.onsubmit()){
                            HTMLFormElement.prototype.submit.call(form);
                        }
                    }
                    return false;
                }
                return true;
            }
            function ripristina(){
                window.location=window.location;
            }
        </script>
        <div class='edit-button'>
            <? if ( $Op=="Inserisci"){ ?> 
            <button id="Inserisci" type="submit"  onclick='submit2("Inserisci");'>Inserisci</button>
            <? }else{ ?> 
            <button id="Modifica" type="submit"  onclick='submit2("Modifica");'>Modifica</button>
            <button id="Copia" type="submit"  onclick='submit2("Copia");'>Copia</button>
            <button id="Elimina" type="submit"  onclick='submit2("Elimina");'>Elimina</button>
            <? } ?> 
            <button id="Ripristina" type="button"  onclick='ripristina();'>Ripristina</button>
        </div>
</form>
</div>
    </body>
</html>