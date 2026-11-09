<?php
ob_start();
session_start();
include_once("base.conf.php");

include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
include_once("include/autorizzazioni.php");


//
//?><!DOCTYPE html>
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
        <link rel="shortcut icon" href="////<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <link rel="icon" href="////<?php echo URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <title>Progetto Vuoto</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>
        
        <link type="text/css" href="css/custom-theme/jquery-ui.min.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/livevalidation_standalone.js"></script>
        <script src="js/jquery.iframe-auto-height.plugin.js">
        </script>
        <script type="text/javascript">
                      $.ajaxSetup({ cache: false });                          
            $(function(){
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 1000,
                    height: 600,
                    modal: true,
                    close: function(event, ui) { var frame = document.getElementById("FrameModifica");
                        frame.src="";
                        if (typeof grid !== 'undefined') {
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
                frame.src="";
                $('#dialog').dialog('close');
                if (typeof grid !== 'undefined') {
                    grid.refresh();
                    grid.commit();
                }
                
            }
            function DivTitle(titolo)
            {
                $('#dialog').dialog( "option", "title", titolo );
            }
function DivWidth(w)
{
    $('#dialog').dialog( "option", "width", w );
    
}
function DivHeight(h)
{
     /*if(jQuery.browser.version.substring(0, 2) == "8.")
        $('#dialog').dialog( "option", "height", (h+70)+"px" );
    else  */$('#dialog').dialog( "option", "height", (h) );
   
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
                
                if(larghezza<=1024)
                {
                    window.open(""+link, "DeltaPI");
                }else{
                    var frame = document.getElementById("FrameModifica");
                    frame.src=""+link;
                    $('#dialog').dialog('open').css("zIndex",999999);
                }
            }
        </script>

    </head>

    <body onLoad="load();">
        <script type="text/javascript">
 document.write('<div id="loading" align="center"><img src="images/loading.gif" alt="Caricamento" /><br><br>Attendi la pagina richiesta... </div>');

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
                    <img src="images/Delta-PI NoSfondo2.png" alt="Delta Informatica" style="z-index: 990;">
                </div>


                            <div class="menuimg" onClick="document.getElementById('loginForm').submit();">
                                <div align="center">
                                    <img src="images/exit.png"/>
                                </div>
                                <a href="logout.php" class="menua">Disconnetti</a>
                            </div>


                        </div>
                </div>
