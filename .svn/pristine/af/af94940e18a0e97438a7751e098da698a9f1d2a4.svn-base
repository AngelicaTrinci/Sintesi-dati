<?php

ob_start();
session_start();
include_once("base.conf.php");
include_once("include/utility.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
//$impostazioni = impostazioni();
if($_POST["Export"]==""||$_POST["Export"]==null){
$apri = $_GET['apri'] != "" ? $_GET['apri'] : $_POST['apri'];
$CodiceRegistroApri = $_GET['CodiceRegistroApri'] != "" ? $_GET['CodiceRegistroApri'] : $_POST['CodiceRegistroApri'];
$AnnoApri = $_GET['AnnoApri'] != "" ? $_GET['AnnoApri'] : $_POST['AnnoApri'];
$ProgressivoApri = $_GET['ProgressivoApri'] != "" ? $_GET['ProgressivoApri'] : $_POST['ProgressivoApri'];


                $login = 0;

                //echo " Apri :".$apri;
                $username = null;
                $password = null;
                $connessione = 0;
                $sso=$_POST['SSO'];
                //$connetti=$_POST["connetti"];
                //echo "Connetti ".$_POST["connetti"];

                if (isset($_POST["connetti"]) && stristr($_POST["connetti"], "Disconnetti") == false && stristr($_POST["connetti"], "Connetti") != false) {
                    $connessione = 1;
                    // echo "Connessione 1";
                } else if ($_POST["UserWindows"] != "") {
                    $_SESSION['login'] = 0;
                    $connessione = 1;
                } else if (isset($_SERVER["REMOTE_USER"]) || isset($_SERVER["PHP_AUTH_USER"])) {

                    $p = array();
                    if (isset($_SERVER["REMOTE_USER"])) {
                        $p = explode("\\", $_SERVER["REMOTE_USER"]);
                    } else {
                        $p = explode("\\", $_SERVER["PHP_AUTH_USER"]);
                    }
                    if (count($p) >= 2) {
                        $_SESSION['login'] = 0;
                        $connessione = 1;
                        $_POST["UserWindows"] = $p[1];
                        $_POST["DomainWindows"] = $p[0];
                    }
                }
                if (isset($_POST["connetti"]) && stristr($_POST["connetti"], "Disconnetti") != false) {
                    $_SESSION['login'] = 0;
                    disconnetti();
                    //setcookie("admin", "", time()-3600);
                    $connessione = 2;
                } else {
                    //$_SESSION['login']=0;
                    if (isset($_COOKIE["username"]) && isset($_COOKIE['password']) && $_COOKIE['username'] != "" && $_COOKIE['password'] != "") {
                        $username = $_COOKIE['username'];
                        $password = $_COOKIE['password'];
                        $domainWindows =$_COOKIE['Dominio'];
                    }
                    if ($connessione == 1) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $userWindows = $_POST['UserWindows'];
                        $domainWindows = $_POST['DomainWindows'];
                        if($domainWindows=="") $domainWindows=$_POST['Dominio'];
                        //echo "$userWindows $domainWindows";
                        //inviaMail($to[]="epocci@deltainf.it","Connessione a CRM","l'utente $username si sta collegando");
                    }
                    //echo "user:".$username." ".$password;
                    if ($_SESSION['login'] == 0) {
                        $utente = effettuaLogin($username, $password, $userWindows, $domainWindows,$sso);
                        if($utente =="MessaggioControlloAccessi"){
                            $utente=null;
                            $connessione=3;
                        }
                    }
                }
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="iso-8859-1">
        <!--<meta charset="utf-8"> -->
        <!-- no cache headers -->
 <meta http-equiv="Pragma" content="no-cache" />
 <meta http-equiv="Expires" content="-1" />
 <meta http-equiv="Cache-Control" content="no-cache" />
 <!-- end no cache headers -->
        <link rel="shortcut icon" href="<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <link rel="icon" href="<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <title><?echo $impostazioni->Denominazione; echo " - "; if ($title != null)
    echo $title; else
    echo "Delta-PI"; ?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="./js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>
        
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="./js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="./js/jquery-ui-1.8.21.custom.min.js"></script>
        
        <script src="./js/jquery.iframe-auto-height.plugin.js">
        </script>
        <script type="text/javascript">
             $.ajaxSetup({ cache: false });                          
            $(function(){
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 850,
                    height: 600,
                    modal: true,
                    close: function(event, ui) { var frame = document.getElementById("FrameModifica");
                        if(frame.src.indexOf("editProtocollo.php")>-1||frame.src.indexOf("editPubblicazione.php")>-1){
                            $.ajax({url:"list/accesso_attivo.php?Username=<?php echo str_replace('\\','\\\\',$_SESSION["username"]) ?>&NoProtocollo=S",success:function(result){}});
                        }
                        frame.src="";
                        if(grid!=null){
                            grid.refresh();
                            grid.commit();
                        }else
                            window.location=window.location;
                    }
                });
                $("#connetti").button();
            });
            function CloseDiv()
            {
                var frame = document.getElementById("FrameModifica");
                if(frame.src.indexOf("editProtocollo.php")>-1||frame.src.indexOf("editPubblicazione.php")>-1){
                            $.ajax({url:"list/accesso_attivo.php?Username=<?php echo str_replace('\\','\\\\',$_SESSION["username"]) ?>&NoProtocollo=S",success:function(result){}});
                        }
                frame.src="";
                $('#dialog').dialog('close');
                if(grid!=null){
                    grid.refresh();
                    grid.commit();
                }
                if(grid_righe!=null){
                    grid_righe.refresh();
                    grid_righe.commit();
                }
                if(grid2!=null){
                    grid2.refresh();
                    grid2.commit();
                }
                if(grid3!=null){
                    grid3.refresh();
                    grid3.commit();
                }
            }
            function DivTitle(titolo)
            {
                $('#dialog').dialog( "option", "title", titolo );
            }
            function DivTitle(titolo)
{
    $('#dialog').dialog( "option", "title", titolo );
}
function DivWidth(w)
{
    $('#dialog').dialog( "option", "width", w+50 );
     var frame = document.getElementById("FrameModifica");
     frame.width=(w)+"px";
}
function DivHeight(h)
{
    
     $('#dialog').dialog( "option", "height", (h+70) );
     var frame = document.getElementById("FrameModifica");
     frame.height=(h)+"px";
}
function OpenDiv2(title,w,h,link)
{
    DivTitle(title);
    DivWidth(w);
    DivHeight(h);
    OpenDiv(link);
}
            function OpenDiv(link)
            {
                var larghezza = window.screen.width;
                if(link.indexOf("getAllegato") != -1)
			{
                            if($.browser.opera){
                            larghezza=1700;
                            $( "#dialog" ).dialog( "option", "width", 460 );
                            $( "#dialog" ).dialog( "option", "height", 360 );
                            }else{
                                larghezza=1000;
                            }
			}
                if(larghezza<=1024||<?php
                if($utente!=null)
                {
                    $_SESSION["ApriNuovaScheda"]=$utente->ApriNuovaScheda;
                }
                if($_SESSION["ApriNuovaScheda"]=="S") echo "true";
                else echo "false";
                ?>==true)
                      
                {
                    window.open(""+link, "DeltaPI");
                }else{
                    var frame = document.getElementById("FrameModifica");
                    frame.src=""+link;
                    frame.onload=function()
                    {
                        var frame = document.getElementById("FrameModifica");
                        if(frame.contentWindow.document.body.scrollHeight>590)
                            if(frame.contentWindow.document.body.scrollHeight>700)
                        {
                            frame.height="880px";
                        }
                            else frame.height=frame.contentWindow.document.body.scrollHeight + "px";
                        else frame.height="590px";
                        //$('#dialog').height();
                        //$( "#dialog" ).dialog( "option", "height", frame.contentWindow.document.body.scrollHeight+50 );
                    }
                    $('#dialog').dialog('open').css("zIndex",999999);
                }
            }
        </script>

    </head>

    <body onLoad="load();">
        <script type="text/javascript">
 document.write('<div id="loading" align="center"><img src="images/loading.gif" alt="Caricamento" /><br><br>Attendi la pagina richiesta...</div>');
 
</script>
        <script>
            function load()
            {
                return;
            }
        </script>
        <div id="wrap">
            <div id="header" class="ui-corner-all">
                <div style="position:absolute;top:0px;right:0px;">
                    <img src="images/Delta-PI NoSfondo2.png" alt="Delta Informatica">
                </div>

                <?php
                if ($utente == null && $_SESSION['login'] == 0) { //costruisco la form di login
                ?>

                    <div style="position:absolute;">
                        <form id="loginForm" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="apri" value="<?php echo ($apri); ?>" />
                            <input type="hidden" name="CodiceRegistroApri" value="<?php echo ($CodiceRegistroApri); ?>" />
                            <input type="hidden" name="AnnoApri" value="<?php echo ($AnnoApri); ?>" />
                            <input type="hidden" name="ProgressivoApri" value="<?php echo ($ProgressivoApri); ?>" />
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><input id="username" type="text" name="username" size="15" <?PHP if ($connessione == 1)
                        echo "value=\"$username\""; ?> /> </td><td>
                                        <?PHP $domini = explode(",", $impostazioni->DominioEsterno); 
                                        if(count($domini)>1&&$domini[0]!=""){
                                        ?>
                                        <select id="Dominio" name="Dominio"><option value=""></option>
                                            <?PHP  
            
            
            foreach ($domini as $d) {
                //echo "$d - $domainWindows";
                echo "<option value=\"$d\">$d</option>\n";
            } ?></select> <?PHP } else { if(count($domini)>0){ $domini=$domini[0]; }else $domini=""; ?>
                                        <input type="hidden" id="Dominio" name="Dominio" value="<?PHP echo $domini; ?>"/>
                                   <?PHP } ?>     
                                    </td>
                                    <td><?
                    if ($connessione == 1) {
                        //echo MessaggioControlloAccessi;
                ?><b>Errore Login,controlla i dati</b>


<?
                    }
                    if ($connessione == 2) {
?><b>Disconnessione Effettuata</b>


<?
                    }
                    if ($connessione == 3) {
?><b>Troppi Utenti Collegati Contemporaneamente</b>


<?
                    }
?>

                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" id="password" name="password" size="15"  <?PHP $pass = $_POST['password'];
                                    if ($connessione == 1)
                                        echo "value=\"$pass\""; ?> /></td>
                                <td colspan="2">
                                    <input type="hidden" value="N" id="SSO" name="SSO"/>
                                    <button type="submit" value="Connetti" id="connetti" name="connetti">Connetti</button> </td></tr>
                        </table> <?
                                }else { //
                                    
                                    if ($_SESSION['login'] == 0) {
                                        $_SESSION['Nome'] = $utente->Nome;
                                        $_SESSION['Cognome'] = $utente->Cognome;
                                        $_SESSION['Admin'] = $utente->Admin;
                                        $_SESSION['Dominio']=$domainWindows;
                                        $_SESSION['username']=$utente->Username;
                                        $_SESSION["ApriNuovaScheda"]=$utente->ApriNuovaScheda;
                                        $_SESSION['login'] = 1;
                                    }
?>
                                   
                                    <div style="position:absolute;top:43px;right:123px;">
                                        <form id="loginForm" action="index.php" method="post">


                                            <b> <a href="#" <?php if ($_SESSION['Admin'] == 'S') { ?> onclick='DivTitle("Utente <?PHP echo $utente->Username; ?>");OpenDiv("editUtenti.php?Return=Close&Username=<?PHP echo $username; ?>");' <?php } ?>> <?
                                    if (isset($_SESSION['Nome'])) {
                                        echo $_SESSION['Nome'] . " ";
                                    }
                                    if (isset($_SESSION['Cognome'])) {
                                        echo $_SESSION['Cognome'];
                                    }else
                                        echo $username;
                        ?></a></b> <input type="hidden" value="Disconnetti" id="connetti" name="connetti"/><?
                                }

                                session_commit();
                        ?>
                                        <input type="hidden" id="UserWindows" name="UserWindows" value=""/>
                                        <input type="hidden" id="DomainWindows" name="DomainWindows" value=""/>
                                    </form>
                                        <?PHP if ($utente == null && $_SESSION['login'] == 0 && $connessione == 0 && $_POST["UserWindows"] == "") {
 ?>

                                <script>

                                    var browser=navigator.appName;

                                    if(browser=="Microsoft Internet Explorer"){

                                        var x = new ActiveXObject("WSCRIPT.Network");
                                        document.getElementById("UserWindows").value=x.UserName;
                                        document.getElementById("DomainWindows").value=x.UserDomain;
                                        document.getElementById("SSO").value="S";
                                        function load(){
                                            if(document.getElementById("UserWindows").value!="")
                                                document.getElementById('loginForm').submit();
                                        }
                                    }
                                </script>
<?PHP } ?>
                                    </div>
                                    <div style="position:absolute;">
<?PHP if ($utente != null || $_SESSION['login'] == 1) { ?>
                                            <div class="menuimg" onclick='DivTitle("Inserimento Protocollo");OpenDiv("editProtocollo.php?Op=Inserisci&Return=Close")'><div align="center"><img src="images/filenew.png"/></div><a href="#" class="menua">Nuovo Protocollo</a></div>
                                            <div class="menuimg" >
                                                <ul id="nav">
                                                    <li>
                                                        <div onClick="window.location='viewProtocollo_ottimizzato.php'"><div align="center"><img src="images/find.png"/></div><a href="#" class="menua">Ricerca Protocolli</a></div>
                                                        <ul style="position:absolute;top:50px;width:250px;">
                                                            <li><a onClick="window.location='viewProtocollo_ottimizzato.php'"  onmouseover="this.style.cursor='hand';">Tutti</a></li>
<?php
                                            include_once "include/utility.php";
                                            $registri = getRegistri();
                                            if (is_array($registri)) {
                                                foreach ($registri as $registro) {
?><li><a onClick="window.location='viewProtocollo_ottimizzato.php?CodiceAOO=<?php echo $registro->CodiceRegistro; ?>'"  onmouseover="this.style.cursor='hand';">Protocolli <?php echo $registro->CodiceRegistro . " - " . $registro->Descrizione; ?></a></li><?php
                                                }
                                            }
?>
                                                            <li><a onClick="window.location='viewAnnullati.php'"  onmouseover="this.style.cursor='hand';">Annullati</a></li>
                                                            <li><a onClick="window.location='viewProtocollo_respinti.php'"  onmouseover="this.style.cursor='hand';">Elenco Respinti</a></li>
                                                             <li><a onClick="window.location='ricercaProtocollo.php'"  onmouseover="this.style.cursor='hand';">Ricerca Avanzata</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="menuimg" >
                                                <ul id="nav">
                                                    <li>
                                                        <div ><div align="center"><img src="images/notif.png"/></div><a href="#" class="menua">Casella Email</a></div>
                                                        <ul style="position:absolute;top:50px;width:250px">
                                                               <li><a onClick="window.location='login.php'"  onmouseover="this.style.cursor='hand';">Protocollazione da E-mail</a></li>
                                                        <?php if ($_SESSION['Admin'] == "S")
                                                            { ?>
                                                            <li><a onclick='window.location="viewMailbox_setting.php";'  onmouseover="this.style.cursor='hand';">Gestione Account E-mail</a></li>
                                                            <?php 
                                                            
                                                            } 
                                                        ?>
                                                            
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?PHP if ($_SESSION['Admin'] == "S" || $_SESSION['Admin'] == "G") {?>
                                <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/tutor.png"/>
                                                </div>
                                                <a href="#" class="menua">Impostazioni</a></div>

                                            <ul style="position:absolute;top:50px;width:200px">
                                                <li><a onclick='window.location="viewTipolettere.php";'  onmouseover="this.style.cursor='hand';">Tipi Documenti</a></li>
                                                <li><a onclick='window.location="viewRegistro.php";'  onmouseover="this.style.cursor='hand';">AOO / Registri</a></li>
                                                <li><a onclick='window.location="viewOggetti_comuni.php";'  onmouseover="this.style.cursor='hand';">Oggetti Comuni</a></li>
                                                <li><a onclick='window.location="viewMittenti_destinatari.php";'  onmouseover="this.style.cursor='hand';">Mittenti Destinatari</a></li>
                                                <li><a onclick='window.location="viewMittenti_destinatari_esterni.php";'  onmouseover="this.style.cursor='hand';">Mittenti Destinatari Esterni</a></li>
                                                <li><a onclick='window.location="viewMittenti_destinatari_anagrafiche.php";'  onmouseover="this.style.cursor='hand';">Mittenti Destinatari Anagrafiche</a></li>
                                                <li><a onclick='window.location="viewClassificazione_liv1.php";'  onmouseover="this.style.cursor='hand';">Classificazioni e Fascicoli</a></li>
                                                <li><a onclick='window.location="viewUtenti.php";'  onmouseover="this.style.cursor='hand';">Utenti</a></li>
                                                <?PHP if ($_SESSION['Admin'] == "S" ){?>
                                                <li><hr></li>
                                                <li><a onclick='window.location="viewUtenti_attivi.php";'  onmouseover="this.style.cursor='hand';">Utenti Attivi</a></li>
                                                <li><a onclick='DivTitle("Impostazioni Generali");OpenDiv("editImpostazioni.php?Return=Close&Id=1")'  onmouseover="this.style.cursor='hand';">Impostazioni Generali</a></li>


<?PHP if ($impostazioni->getIntegrazioneAdiuto() == "S") { ?>
                                                                    <li><a onclick='DivTitle("Impostazioni Adiuto");OpenDiv("editImpostazioni_adiuto.php?Return=Close&Id=1")'  onmouseover="this.style.cursor='hand';">Impostazioni Adiuto</a></li>
<?PHP } ?>
                                                                    <li><a onclick='window.location="viewMailbox_setting.php";'  onmouseover="this.style.cursor='hand';">Gestione Account E-mail</a></li>
                                                                    <?PHP } ?>
<?PHP /* if($impostazioni->getIntegrazioneInterpro()=="S") { ?>
                                                  <li><a onclick='window.location="viewImpostazioni_interpro.php"'  onmouseover="this.style.cursor='hand';">Impostazioni Interpro</a></li>
                                                  <li><a onclick='window.location="viewInterpro_aoo.php"'  onmouseover="this.style.cursor='hand';">Elenco AOO</a></li>
                                                  <li><a onclick='window.location="viewInterpro_uo.php"'  onmouseover="this.style.cursor='hand';">Elenco UO</a></li>
                                                  <li><a onclick='window.location="viewInterpro_ade.php"'  onmouseover="this.style.cursor='hand';">Elenco Privati in Memoria</a></li>
                                                  <li><a onclick='window.location="viewInterpro_operazioni.php"'  onmouseover="this.style.cursor='hand';">Vedi Operazioni Effettuate</a></li>
                                                  <?PHP } */ ?>
                                                            </ul>

                                                        </li>
                                                    </ul>
                                                </div>
<?PHP } ?>
                                            
<?PHP if ($impostazioni->IntegrazionePubblicazione == "S") {
 ?>
                                <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/pubblicazione.png"/>
                                                </div>
                                                <a href="#" class="menua">Pubblicazione</a></div>

                                            <ul style="position:absolute;top:50px;width:300px">
                                                <li><a onclick='DivTitle("Nuova Pubblicazione");OpenDiv("editPubblicazione.php?Op=Inserisci&Return=Close")'  onmouseover="this.style.cursor='hand';">Nuova Pubblicazione</a></li>
                                                <li><hr></li>
                                                <li><a onClick="window.location='viewProtocollo_pubblicazione.php'"  onmouseover="this.style.cursor='hand';">Tutte</a></li>
                                               <?PHP include_once "include/utility.php";
                                            $registri = getRegistriPubblicazione();
                                            if (is_array($registri)) {
                                                $prev="";
                                                foreach ($registri as $registro) {
                                                    if($prev!=substr($registro->CodiceRegistro,0,1))
                                                    {
                                                        if($prev!="")
                                                            {
                                                            echo "</ul></li>";
                                                            }
                                                            $prev=substr($registro->CodiceRegistro,0,1);
                                                            $desc="Pubblicazioni ".$prev;
                                                            switch($prev)
                                                            {
                                                                case 1: $desc="Albo";
                                                                    break;
                                                                case 2: $desc="Delibere";
                                                                    break;
                                                                case 3: $desc="Determine";
                                                                    break;
                                                                case 4: $desc="Ordinanze";
                                                                    break;
                                                                case 6: $desc="Autoriz e Conc";
                                                                    break;
                                                            }
                                                            echo "<li>$desc -><ul  style='position:absolute;top:-10px;left:80px;width:300px'>";
                                                    }
                                                ?><li><a onClick="window.location='viewProtocollo_pubblicazione.php?CodiceAOO=<?php echo $registro->CodiceRegistro; ?>'"  onmouseover="this.style.cursor='hand';"><?php echo $registro->CodiceRegistro . " - " . $registro->Descrizione; ?></a></li>
                                                <?php
                                                }
                                                 if($prev!="")
                                                 {
                                                       echo "</ul></li>";
                                                  }
                                            }
                                            
                                            ?>
                                                <li><a onClick="window.location='ricercaPubblicazione.php'"  onmouseover="this.style.cursor='hand';">Ricerca Avanzata</a></li>
                                             <?PHP if (getAdmin()=="S"||getAdmin()=="G")
                                                { ?>
                                                <li><hr></li>
                                                <li><a onclick='window.location="viewPubblicazione_atto.php";'  onmouseover="this.style.cursor='hand';">Modalita Selezione</a></li>
                                                <li><a onclick='window.location="viewPubblicazione_servizio.php";'  onmouseover="this.style.cursor='hand';">Servizi</a></li>
                                                <li><a onclick='window.location="viewPubblicazione_ufficio.php";'  onmouseover="this.style.cursor='hand';">Uffici</a></li>
                                                <li><a onclick='window.location="viewPubblicazione_assoggettamento.php";'  onmouseover="this.style.cursor='hand';">Motiv. Assoggettamento</a></li>
                                                <li><a onclick='OpenDiv("legge190/createIndiceLegge190XML.php");'  onmouseover="this.style.cursor='hand';">XML Indice Legge190</a></li>
                                                <li><a onclick='OpenDiv("legge190/createLegge190XML.php");'  onmouseover="this.style.cursor='hand';">XML Dataset Legge190</a></li>
                                             <?PHP   }?>
                                            <?PHP if (getAdmin()=="S")
                                                { ?>
                                                <li><hr></li>
                                                <li><a onclick='window.location="viewRegistro_pubblicazione.php";'  onmouseover="this.style.cursor='hand';">Gestione Registri</a></li>
                                             <?PHP   }?>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                            <?PHP } ?>
<?PHP if ($impostazioni->GestionePratiche == "S") {
 ?>
                                <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/pratiche.png"/>
                                                </div>
                                                <a href="#" class="menua">Pratiche</a></div>

                                            <ul style="position:absolute;top:50px;width:300px">
                                                <li><a onclick='DivTitle("Nuova Pratica");OpenDiv("editPratiche.php?Op=Inserisci&Return=Close")'  onmouseover="this.style.cursor='hand';">Nuova Pratica</a></li>
                                                <li><hr></li>
                                                <li><a onClick="window.location='viewProtocollo_pratiche.php'"  onmouseover="this.style.cursor='hand';">Tutte</a></li>
                                               <?PHP include_once "include/utility.php";
                                            $registri = getRegistriPratiche();
                                            if (is_array($registri)) {
                                                
                                                foreach ($registri as $registro) { 
                                                ?><li><a onClick="window.location='viewProtocollo_pratiche.php?CodiceAOO=<?php echo $registro->CodiceRegistro; ?>'"  onmouseover="this.style.cursor='hand';"><?php echo $registro->CodiceRegistro . " - " . $registro->Descrizione; ?></a></li>
                                                <?php
                                                }
                                            }
                                            
                                            ?>
                                               <!-- <li><a onClick="window.location='ricercaPratica.php'"  onmouseover="this.style.cursor='hand';">Ricerca Avanzata</a></li>
                                             -->
                                            <?PHP if (getAdmin()=="S")
                                                { ?>
                                                <li><hr></li>
                                                <li><a onclick='window.location="viewRegistro_pratiche.php";'  onmouseover="this.style.cursor='hand';">Gestione Registri</a></li>
                                             <?PHP   }?>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                            <?PHP } ?>
                                <?PHP if ($impostazioni->getIntegrazioneInterpro() == "S") {
 ?>
                                <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/interpro.png"/>
                                                </div>
                                                <a href="#" class="menua">Interpro</a></div>

                                            <ul style="position:absolute;top:50px;width:250px">
<?PHP if ($impostazioni->getIntegrazioneInterpro() == "S" && $_SESSION['Admin'] == "S") { ?>
                                                    <li><a onclick='window.location="viewImpostazioni_interpro.php"'  onmouseover="this.style.cursor='hand';">Impostazioni Interpro</a></li>
                                                    <li><hr></li>
                            <?PHP } ?>
                                                                <li><a onclick='window.location="viewInterpro_aoo.php"'  onmouseover="this.style.cursor='hand';">Elenco AOO</a></li>
                                                                <li><a onclick='window.location="viewInterpro_uo.php"'  onmouseover="this.style.cursor='hand';">Elenco UO</a></li>
                                                                <li><a onclick='window.location="viewInterpro_ade.php"'  onmouseover="this.style.cursor='hand';">Elenco Privati in Memoria</a></li>
                                                                
<?php
                                                $registri = getRegistri();
                                                if (is_array($registri)) {
                                                    $cod;
                                                    foreach ($registri as $registro) {

                                                        $intepro = impostazioniInterpro($registro->CodiceRegistro);
                                                        if ($intepro != false) {
                                                            $cod = $registro->CodiceRegistro;
                                                            
?>                                                          <li><hr></li>
                                                            <li><a onClick="window.location='viewInterpro_operazioni.php?CodiceAOO=<?php echo $registro->CodiceRegistro; ?>'"  onmouseover="this.style.cursor='hand';"><?php echo $intepro->CodiceAOO ?> - Operazioni</a>
                                                                <li><a onClick="window.location='viewInterpro_operazioni.php?CodiceAOO=<?php echo $registro->CodiceRegistro; ?>&DaProtocollare=S'"  onmouseover="this.style.cursor='hand';"><?php echo $intepro->CodiceAOO ?> - Da Protocollare</a>
                                                            <li><a onClick="DivTitle('Ricevi Notifiche');OpenDiv('interpro/RiceviNotifiche.php?CodiceRegistro=<?php echo $registro->CodiceRegistro; ?>');"  onmouseover="this.style.cursor='hand';"><?php echo $intepro->CodiceAOO ?> - Ricevi Notifiche</a></li>
                                                            <li><a onClick="DivTitle('Ricevi Protocolli');OpenDiv('interpro/RiceviProtocolli.php?CodiceRegistro=<?php echo $registro->CodiceRegistro; ?>');"  onmouseover="this.style.cursor='hand';"><?php echo $intepro->CodiceAOO ?> - Ricevi Protocolli</a></li>
                                                            <li><a onClick="DivTitle('Ricevi Non Conformi');OpenDiv('interpro/RiceviNonConformi.php?CodiceRegistro=<?php echo $registro->CodiceRegistro; ?>');"  onmouseover="this.style.cursor='hand';"><?php echo $intepro->CodiceAOO ?> - Ricevi Non Conformi</a></li>

                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                                <li><hr></li>
                                                <li><a onClick="DivTitle('Carica Tutti AOO UO');OpenDiv('interpro/recuperaAOO_UO.php?CodiceRegistro=<?php echo $cod ?>');"  onmouseover="this.style.cursor='hand';">Carica Tutti AOO UO</a></li>
                                                <li><a onClick="DivTitle('Aggiorna AOO UO');OpenDiv('interpro/aggiornaAOO_UO.php?CodiceRegistro=<?php echo $cod ?>');"  onmouseover="this.style.cursor='hand';">Aggiorna AOO UO</a></li>
                                                <li><a onClick="DivTitle('Privati Per Provincia');OpenDiv('interpro/RichiediPrivatiPerProvincia.php?CodiceRegistro=<?php echo $cod ?>');"  onmouseover="this.style.cursor='hand';">Aggiorna Privati Per Provincia</a></li>
                                                <li><a onClick="DivTitle('Privati Per CfPi');OpenDiv('interpro/RichiediPrivatiPerCfPi.php?CodiceRegistro=<?php echo $cod ?>');"  onmouseover="this.style.cursor='hand';">Aggiorna Privati Per CfPi</a></li>
                                                <li><hr></li>
                                                <li><a onclick='window.location="viewInterpro_operazioni.php"'  onmouseover="this.style.cursor='hand';">Tutte le Operazioni</a></li>

                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                            <?PHP } ?>
<?PHP if ($impostazioni->getRicezioneFatturePA() == "S") {
    
 ?>
      <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/fpa.png"/>
                                                </div>
                                                <a href="#" class="menua">Fatture PA</a></div>
                                            <ul style="position:absolute;top:50px;width:250px">
                                                <li><a onClick="window.location='viewFatturepa_ricevute.php?NonGestite=S'"  onmouseover="this.style.cursor='hand';">Fatture PA Non Gestite</a></li>
                                                <li><a onClick="window.location='viewFatturepa_ricevute.php'"  onmouseover="this.style.cursor='hand';">Fatture PA Ricevute</a></li>

                                             </ul>

                                        </li>
                                    </ul>
                                </div>
<?PHP } ?>
<?PHP if (DOCUMENTALE == "S") {
     include_once(CLASS_FAMIGLIA_DOCUMENTO_MANAGER);
     $thisFamiglia_documentoManager=new famiglia_documentoDao();
 ?>
      <div class="menuimg">

                                    <ul id="nav">
                                        <li>
                                            <div><div align="center">
                                                    <img src="images/documents.png"/>
                                                </div>
                                                <a href="#" class="menua">Documenti</a></div>
                                            <ul style="position:absolute;top:50px;width:250px">
                                                 <?php 
                                                 $result=$thisFamiglia_documentoManager->searchFamiglia_documento();
                                                 if($result!=false)
                                                 {
                                                     foreach($result->getResultsArray() as $thisFamiglia_documentoInfo){
                                                 ?>
                                                 <li><a onClick="window.location='viewDocumentiFamiglia.php?IdFamigliaDocumento=<?=$thisFamiglia_documentoInfo->IdFamigliaDocumento?>'"  onmouseover="this.style.cursor='hand';"><?=$thisFamiglia_documentoInfo->Descrizione?></a></li>
                                                <?php }
                                                 }
                                                ?>
                                                <li><hr></li>
                                                
                                                <li><a onClick="window.location='viewFamiglia_documento.php'"  onmouseover="this.style.cursor='hand';">Famiglie Documenti</a></li>
                                               

                                             </ul>

                                        </li>
                                    </ul>
                                </div>
<?PHP } ?>
                            <div class="menuimg" onClick="document.getElementById('loginForm').submit();">
                                <div align="center">
                                    <img src="images/exit.png"/>
                                </div>
                                <a href="#" class="menua">Disconnetti</a>
                            </div>



<?
                                        } else {
                                            if (strpos($_SERVER['PHP_SELF'], "index.php") == false) {
?>
                                <script>
                                    window.location="index.php?<?PHP echo $_SERVER['QUERY_STRING']; ?>";
                                </script>
<?
                                            }
                                        }
?>
                        </div>
                </div>
<?PHP @ob_end_flush();  flush(); ?>
                <div id="content"><?PHP if($MessaggioLicenza!="") echo $MessaggioLicenza."<br>"; } ?>
                    