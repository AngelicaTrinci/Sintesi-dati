<?php
ob_start();
session_start();
include_once("base.conf.php");

include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
include_once("include/autorizzazioni.php");
include_once("autorizzazioni_applicativo.php");
$autorizzazioni = new Autorizzazioni_applicativo();

?> <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="UTF-8">
      <!--<meta charset="iso-8859-1"> -->
       
        <!-- no cache headers -->
 <meta http-equiv="Pragma" content="no-cache" />
 <meta http-equiv="Expires" content="-1" />
 <meta http-equiv="Cache-Control" content="no-cache" />
 <title>Sintesi dati progetto</title>
 <!-- end no cache headers -->
        <link rel="shortcut icon" href="////<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <link rel="icon" href="////<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <title>Progetto Vuoto</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <? if(HOVER=="S"){ ?>
        <link rel="stylesheet" type="text/css" href="./css/navbarHover.css" />
        <? }else{ ?>
        <link rel="stylesheet" type="text/css" href="./css/navbar.css" />
         <? } ?>
        <link rel="stylesheet" type="text/css" href="./css/headerVerticale.css" />
          <link type="text/css" href="css/custom-theme/jquery-ui.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/livevalidation_standalone.js"></script>
        <script src="js/jquery.iframe-auto-height.plugin.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/delta_dialog_o.js"></script>
        <script src="js/delta_dialog_o.js" type="text/javascript"></script>
        <script type="text/javascript">
            $.ajaxSetup({ cache: false });
        </script>
        <script type="text/javascript">
            $.ajaxSetup({cache: false});
            $(function () {
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 1000,
                    height: 600,
                    modal: true,
                    close: function (event, ui) {
                        var frame = document.getElementById("FrameModifica");
                        frame.src = "";
                        if (typeof grid !== 'undefined') {
                            grid.refresh();
                            grid.commit();
                        } else
                            window.location = window.location;
                    }
                });
                $("#connetti").button();
            });
            function CloseDiv()
            {
                var frame = document.getElementById("FrameModifica");
                frame.src = "";
                $('#dialog').dialog('close');
                if (typeof grid !== 'undefined') {
                    grid.refresh();
                    grid.commit();
                }

            }
            function DivTitle(titolo)
            {
                $('#dialog').dialog("option", "title", titolo);
            }
            function DivWidth(w)
            {
                $('#dialog').dialog("option", "width", w);

            }
            function DivHeight(h)
            {
                /*if(jQuery.browser.version.substring(0, 2) == "8.")
                 $('#dialog').dialog( "option", "height", (h+70)+"px" );
                 else  */$('#dialog').dialog("option", "height", (h));

            }
            function OpenDiv2(title, w, h, link)
            {
                DivTitle(title);
                DivWidth(w);
                DivHeight(h);
                OpenDiv(link);
            }
            function OpenDiv(link)
            {
                var larghezza = window.screen.width;

                if (larghezza <= 1024)
                {
                    window.open("" + link, "DeltaPI");
                } else {
                    var frame = document.getElementById("FrameModifica");
                    frame.src = "" + link;
                    $('#dialog').dialog('open').css("zIndex", 999999);
                }
            }
            
   function mostraFigli(idPadre){
            if($("."+idPadre).is(':hidden')) {
                            $("."+idPadre).show();
	
		   } else {
		   $("."+idPadre).hide();
		   	 
		   } 
       
   }
   function mostraFigliVerticale(idPadre){
            if($("."+idPadre).is(':hidden')) {
                            $("."+idPadre).show();
                            $("#"+idPadre).css("background-color","rgba(0,0,0,.1)");
		   } else {
		   $("."+idPadre).hide();
		   $("#"+idPadre).css("background-color","#dedede");	 
		   } 
       
   }
   function mostraFigliTutti(idPadre){
            if($("."+idPadre).is(':hidden')) {
                            $("."+idPadre).show();
	
		   } else {
		   $(".figlio").hide();
		   	 
		   } 
       
   }
   function mostraFigliCascata(idPadre){
            if($("."+idPadre).is(':hidden')) {
                            $("."+idPadre).show();
		
		   } else {
		   $("."+idPadre).hide();
		   	 
		   } 
   }
         
            
        </script>
        <style>
@font-face { 
                font-family: cust_titilium;
                src: url(fonts/titillium-web/TitilliumWeb-Regular.ttf);
            }
        </style>
    </head>
    
                    
        <?php
        if (TIPO_MENU == "orizzontale") { ?>
                 <style>
                 #delta-page{
                position: absolute;
                z-index:-9999;
                left: 25px;
                top: 75px;
                bottom: 0;
                right: 0;
                overflow: scroll;
                padding:10px;
                
            }
            
                .freccia{
                    width: 15px;
                display:block;
                float:right;
                padding-top: 8px;
                margin-left: 10px;
            }
            
            .frecciaDestra{
                 width: 7px;
                 height: 12px;
                display:block;
                float:right;
                 padding-top: 5.5px;
                margin-left: 12px;
            }

            .logo {
                background-image: url("images/logo.png");
            }
            
                   </style>
                <body style="background: #f6f0f0; line-height:25px;">
       
        
            <!--<ul id="delta-header-top">-->
            <ul id="headerNav" style="padding-left: 0; ">
                <!--<div class="nome-app"><?//= TITOLO; ?><span class="nome-funzione"><?//= $title; ?></span></div>-->
                <li class="liNav" style="padding: 0 0 0 0; margin-left:0px; " > <div class="logo" ></div></li>
                <!--<div id="delta-menu-top">-->
             <?php 
             $dbQuery = new databaseQuery();
             $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Voce,File_php,Tipo,Id_voce_padre,Immagine FROM Voci_menu WHERE  Attivo='S' AND Id_voce_padre IS NULL order by Posizione ");
             $rows = $result->GetRows(-1);
             if ($rows[0] != "" && $autorizzazioni->amministratore == true) {
             foreach ($rows as $row) {
                 if($row["Tipo"]=="P"){
                      if (stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false) {
                     ?> <li class="liNav" style="background-color:#efefb6;">  <a href="<?=$row["File_php"];?>"><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }  echo $row["Voce"];?></a> </li>   <?
                      }else{
                     ?> <li class="liNav" >  <a href="<?=$row["File_php"];?>"><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }  echo $row["Voce"];?></a> </li>   <?
                      }
                     
                     }else if($row["Tipo"]=="N"){
                     ?>   
<!--                    <div id="container">-->
                        <li class="liNav"  style="cursor:pointer;" >   <a  <? if(HOVER!="S"){  echo  "onclick=mostraFigliTutti(".$row["Id_voce"].")"; }?> > <? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }   echo $row["Voce"]; ?><img class="freccia" src="img_caricate/freccia_padre_bianca.png" > </a> <ul >
                      <?php creaFigli($row["Id_voce"]); ?></ul> </li> 
            <!--</div>-->
          <?     
                }
             }
         }
             ?>
            
           <li class="liNav" style="float:right;">   <div class="utente">
            <? echo ucfirst($utente->Nome), " ", ucfirst($utente->Cognome); ?>
                </div></li>
              <li class="liNav" style="float:right;">  <div class="logout"><a href="logout.php">Esci</a></div></li>
               
            <!--</div>-->

            </ul>
          <?
                } else if (TIPO_MENU == "verticale") {
                    ?>
              <style>
          #delta-page{
                position: absolute;
                z-index:-999;
                left: 230px;
                top: 50px;
                bottom: 0;
                right: 0;
                overflow: scroll;
                padding:10px;
            }
            
            
            
                   </style>
  <body style="background: #f6f0f0;" >

            <div id="delta-header">
                <div class="nome-app"><?= TITOLO; ?><span class="nome-funzione"><?= $title; ?></span></div>
                <div class="logo"></div>
                <div class="utente">
            <? echo ucfirst($utente->Nome), " ", ucfirst($utente->Cognome); ?>
                </div>
                <div class="logout"><a href="logout.php">Esci</a></div>
            </div>

            <div id="delta-menu">
                <div class="menu-header">Menu</div>
    <?php
    creaFigliVerticale();
                }
                
              
      function creaFigli($thisId_voce){ 
                 $dbQuery = new databaseQuery();

                 $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Voce,File_php,Tipo,Id_voce_padre,Immagine FROM Voci_menu WHERE Attivo='S' AND Id_voce_padre='".$thisId_voce."' order by Posizione  ");
    
    $rows = $result->GetRows(-1);
    if ($rows[0] != "") {
        foreach ($rows as $row) {

            if($row["Tipo"]=="P"){
                
              if (stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false) {
                           ?> <li class="<?=$row["Id_voce_padre"];?> figlio" <? if(HOVER!="S"){  echo "hidden"; }?>>  <a href="<?=$row["File_php"];?>" style="background-color:#efefb6;"><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }  echo $row["Voce"];?></a> </li>   <?
              }else{
                           ?> <li class="<?=$row["Id_voce_padre"];?> figlio"  <? if(HOVER!="S"){  echo "hidden"; }?> >  <a href="<?=$row["File_php"];?>"><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }  echo $row["Voce"];?></a> </li>   <?
                       
              }      
            }else if($row["Tipo"]=="N"){
              
                ?>      <li class="<?=$row["Id_voce_padre"];?> figlio" style="cursor:pointer;"   <? if(HOVER!="S"){  echo "hidden"; }?> >   <a  <? if(HOVER!="S"){  echo  "onclick=mostraFigliTutti(".$row["Id_voce"].")"; }?>  > <? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? }   echo $row["Voce"]; ?> <img class="frecciaDestra" src="img_caricate/freccia_padre_bianca_destra.png" ></a> <ul>
                      <?php creaFigli($row["Id_voce"]); ?></ul> </li> 
          <?                     
 
                }
                
                
                
            
                
            }
            
                        }
                  }
           
  
                
                
       function creaFigliVerticale($thisId_voce=""){ 
     
                 $dbQuery = new databaseQuery();
    if($thisId_voce!=""){
                 $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Voce,File_php,Tipo,Id_voce_padre,Immagine FROM Voci_menu WHERE Attivo='S' AND  Id_voce_padre='".$thisId_voce."' order by Posizione ");
    }else{
           $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Voce,File_php,Tipo,Id_voce_padre,Immagine FROM Voci_menu WHERE Attivo='S' AND Id_voce_padre IS NULL order by Posizione ");
    }
    $rows = $result->GetRows(-1);
    if ($rows[0] != "") {
        foreach ($rows as $row) {

            if($row["Tipo"]=="P"){
                
                if($thisId_voce==""){
                    
                     if (stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false) {
                      
          ?>   <a href="<?=$row["File_php"];?>" ><div class=" menu-voice" style="background-color:#efefb6;"><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?></div></a>    <?
               }else{
                    ?>   <a href="<?=$row["File_php"];?>" ><div class=" menu-voice" ><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?></div></a>    <?
                }
                    
                    
                    }else{
                       
                                            if (stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false) {
                                                  
                         $_SESSION["voiceMenu".$row["Id_voce_padre"]]="S";
    ?>   <a href="<?=$row["File_php"];?>"><div class="<?=$row["Id_voce_padre"];?> menu-voice"  style="background-color:#efefb6;"  hidden ><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?></div></a>    <?  
             
                }else{
                        
              ?>   <a href="<?=$row["File_php"];?>" ><div class="<?=$row["Id_voce_padre"];?> menu-voice"  style="background-color:rgba(255,255,255,.5) ;"  hidden><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?></div></a>    <?  
             
                }
              
              }          
                          
            }else if($row["Tipo"]=="N"){
                
                if($thisId_voce==""){
   ?>   <div class=" menu-voice padre-radice"  id="<?=$row["Id_voce"];?>" onclick="mostraFigliVerticale('<?=$row["Id_voce"];?>')" style="cursor:pointer; " ><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?><img class="freccia" src="img_caricate/freccia_padre.png" ></div> <?  
          
                
                }else{
   ?>   <div class="<?=$row["Id_voce_padre"];?> menu-voice" id="<?=$row["Id_voce"];?>" onclick="mostraFigliVerticale('<?=$row["Id_voce"];?>')" style="cursor:pointer; "  hidden ><? if($row["Immagine"]!=""){ ?><img src="<?=PATH_IMMAGINI_MENU.$row["Immagine"]?>"/> <? } echo $row["Voce"];?><img class="freccia" src="img_caricate/freccia_padre.png" ></div> <?  

                
                }
                
                
                creaFigliVerticale($row["Id_voce"]);
            
            
                
                
            }
            $id=$row["Id_voce"];
            $padre=$row["Id_voce_padre"];
            $tipo=$row["Tipo"];
       
         
                if((stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false) && $padre=="" && $tipo=="P" ){
     
    $dbQuery = new databaseQuery();
    $result = $dbQuery->executeDirectQuery("SELECT Id_voce FROM Voci_menu WHERE Attivo='S' AND Id_voce!='".$id."'");
   
    $rows = $result->GetRows(-1);
    if ($rows[0] != "") {
        foreach ($rows as $row) {
                               ?><script>
                          $('.<?=$row["Id_voce"]?>').hide();
                           </script><?
 
        }
    }
                    
                 
 while(true){
     $IdPadre=getValore("SELECT Id_voce_padre FROM Voci_menu WHERE Attivo='S' AND  Id_voce='".$row["Id_voce_padre"]."'");
     
 if($IdPadre!=""){
                   ?><script>
                          $('.<?=$IdPadre;?>').hide();
                           </script><?
 }else{
     break;
 }     
 }
                    
                }else if (stripos($_SERVER['REQUEST_URI'], $row["File_php"]) !== false ){
                ?>
                           <script>
                           mostraFigli('<?=$row["Id_voce_padre"]?>');
                           </script>
 <?
                
            }
            
 
        }
                        }
                  }
         ?>

            </div>
           
            
            
     
        <div id="delta-page">

            