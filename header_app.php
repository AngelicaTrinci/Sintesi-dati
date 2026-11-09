<?php
ob_start();
session_start();
include_once("base.conf.php");
include_once("include/utility.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);

?><!DOCTYPE html>
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
        <title>Base</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>
        
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="./js/jquery-ui-1.8.21.custom.min.js"></script>
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
     /*if(jQuery.browser.version.substring(0, 2) == "8.")
        $('#dialog').dialog( "option", "height", (h+70)+"px" );
    else  */$('#dialog').dialog( "option", "height", (h+70) );
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
                
                if(larghezza<=1024)
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
                <div style="position:absolute;">
                                            <div class="menuimg" onclick='DivTitle("Inserimento");OpenDiv("vuoto.php")'><div align="center"><img src="images/filenew.png"/></div><a href="#" class="menua">Nuovo</a></div>
                                            <div class="menuimg" >
                                                <ul id="nav">
                                                    <li>
                                                        <div onClick="window.location='index.php'"><div align="center"><img src="images/find.png"/></div><a href="#" class="menua">A tendina</a></div>
                                                        <ul style="position:absolute;top:50px;width:250px;">
                                                            <li><a onClick="window.location='index.php'"  onmouseover="this.style.cursor='hand';">Esempio voce a tendina</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                               
                        </div>
                </div>
                <div id="content">
                    