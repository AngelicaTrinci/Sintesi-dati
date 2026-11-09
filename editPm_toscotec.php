<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?
include_once(CONFIG_FILE);
include_once(CLASS_PM_TOSCOTEC_MANAGER);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
?>
<?
$return = requestUtils::getRequestObject('Return');
$Op     = requestUtils::getRequestObject('Op');
$submit = requestUtils::getRequestObject('submit');

$thisId                       = stripslashes(requestUtils::getRequestObject('Id'));
$thisNome                     = stripslashes(requestUtils::getRequestObject('Nome'));
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
        <title>Gestione Pm_toscotec</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/delta_dialog_o.js" type="text/javascript"></script>
        <!--<script type="text/javascript" src="js/livevalidation_standalone.js"></script>-->
    </head>
    <body>
<?
$thisPm_toscotecManager = new Pm_toscotecManager();
// Leggo il record richiesto
$thisPm_toscotecInfo = $thisPm_toscotecManager->getPm_toscotecByPK(escapeDBVariabile($thisId));
// Se richiesta la copia, forzo l'opzione inserimento
if ($submit == "Copia"){
    $Op = "Inserisci";
}

// Inizializzazione dei valori in caso di visualizzazione del pannello per l'inserimento
if ($Op == "Inserisci"){
    $thisPm_toscotecInfo = new pm_toscotecInfo();

    $thisPm_toscotecInfo->Id                       = $thisId ;
    $thisPm_toscotecInfo->Nome                     = $thisNome ;
    // ===========================================
    // EDIT POINT
    // Inizializzare qui i valori di default da mostrare all'apertura del pannello in inserimento
    // ===========================================
    
}

// Esecuzione dell'inserimento
if($submit=="Inserisci"){
    // Eseguo l'inserimento solo se non ho trovato il record con la chiave primaria
    if ($thisPm_toscotecInfo == false){
        $thisPm_toscotecInfo = new pm_toscotecInfo();

        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni prima dell'inserimento del record (pre sovrascrittura da input)
        // ===========================================
        
        $thisPm_toscotecInfo->Id                       = $thisId ;
        $thisPm_toscotecInfo->Nome                     = $thisNome ;
        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni prima dell'inserimento del record (post sovrascrittura da input)
        // ===========================================
        
        $thisPm_toscotecManager->createPm_toscotec(escapeDB(clone $thisPm_toscotecInfo)); 
        // ===========================================
        // EDIT POINT
        // Eseguire qui le azioni post inserimento del record
        // ===========================================
        
        ?><script> window.setTimeout("doRedirect()", 1500);</script> <?
        echo "<b> Pm_toscotec Inserito</b><br/>"; 
    }
    else{
        echo "<b> Pm_toscotec Gia Presente, Cambiare la Chiave</b><br/>"; 
    }
}

// Se non esiste il record: Visualizzazione errore
if ($thisPm_toscotecInfo == false){
    ?> Pm_toscotec Non Trovato,Campi Chiave Errati <?
    exit;
}

// Esecuzione della modifica
if($submit=="Modifica"){
        
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della modifica del record (pre sovrascrittura da input)
    // ===========================================
    
    $thisPm_toscotecInfo->Id                       = $thisId ;
    $thisPm_toscotecInfo->Nome                     = $thisNome ;
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della modifica del record (post sovrascrittura da input)
    // ===========================================
    
    $thisPm_toscotecManager->updatePm_toscotec(escapeDB(clone $thisPm_toscotecInfo)); 
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni post aggiornamento del record
    // ===========================================
    
    ?><script>window.setTimeout("doRedirect()", 1500);</script><?
    echo "<b> Pm_toscotec Modificato</b><br/>"; 
}
if($submit=="Elimina"){
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni prima della cancellazione del record
    // ===========================================
    
    $Op="Inserisci"; 
    $thisPm_toscotecManager->deletePm_toscotec(escapeDB(clone $thisPm_toscotecInfo)); 
    // ===========================================
    // EDIT POINT
    // Eseguire qui le azioni post cancellazione del record
    // ===========================================
    
    ?><script>window.setTimeout("doRedirect()", 1500);</script><?
    echo "<b> Pm_toscotec Eliminato</b><br/>"; 
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
                        title: "<?=$Op;?> Pm_toscotec",
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
                    location.href = "view./Pm_toscotec.php";
                    <? }else{ ?>
                    window.close();
                    parent.CloseDiv();
                    <? } ?>
                }
            }
        </script>
<div>
    <form name="pm_toscotecEditForm" id="pm_toscotecEditForm" method="POST" action="editPm_toscotec.php" onsubmit='if(document.getElementById("submit").value=="Elimina") return window.confirm("Sei sicuro di volerlo Eliminare ?"); else return true;' >
        <input type="hidden" name="Return" value="<?php echo $return; ?>"></input>
        <table cellspacing="8" cellpadding="0" border="0">
            <input type="hidden"  id="Id" name="Id" value="<?php echo htmlentities ($thisPm_toscotecInfo->getId(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11">
            <tr valign="top" height="20">
                <td id="BordatoTitolo" align="right"> <b> Nome : </b> </td>
        <td> <input type="text" id="Nome" name="Nome" value="<?php echo htmlentities ($thisPm_toscotecInfo->getNome(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="100"> </td>
    </tr>
</table>
<input type="hidden" id="submit" name="submit" value=""/> 
        <script>
            function submit2(valore){
                submit=valore;
                document.getElementById("submit").value=valore;
                if( typeof delta_dialog != "undefined" && typeof top.delta_dialog != "undefined" ){
                    var form = document.getElementById("pm_toscotecEditForm");
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