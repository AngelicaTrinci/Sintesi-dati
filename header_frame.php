<?php
ob_start();
session_start();
include_once("base.conf.php");

include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once("include/utility.php");
include_once("include/autorizzazioni.php");

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
        <script src="js/jquery.iframe-auto-height.plugin.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/delta_dialog_o.js"></script>
        <script src="js/delta_dialog_o.js" type="text/javascript"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script src="js/utility.js?v=2" type="text/javascript"></script>
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
         
            
        </script>
        <style>
           .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset{  /* */
                display: block;
                float: none;
                text-align: right;
            }
            button.sx.sep.ui-button.ui-corner-all.ui-widget{
                margin-left: 100px;
            }
            button.sx.ui-button.ui-corner-all.ui-widget{
                float: left;
            }  /* */
            @font-face { 
                font-family: cust_titilium;
                src: url(fonts/titillium-web/TitilliumWeb-Regular.ttf);
            }
            *{
                font-family: cust_titilium, Arial;
                font-size: 12px;
                color: #000000;
            }
            body {
                background-color: #eefbf8;
            }
            #delta-header{
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 50px;
                background-color: #8c857f;
            }
            #delta-header-top{
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 50px;
                background-color: #8c857f;
            }
            #delta-header .nome-app{
                position: absolute;
                left: 230px;
                line-height: 40px;
                top: 5px;
                font-weight: bold;
                font-size: 20px;
                color: #fff;
                padding-left: 20px;
            }
            #delta-header .nome-app .nome-funzione{
                font-size: 20px;
                color: #fff;
                font-weight: normal;
            }
            #delta-header .nome-app .nome-funzione:before{
                content: ":";
                margin: 0 5px;
            }
            #delta-page .nome-app{  /* */
                margin: 0 10px 10px 10px;
                font-weight: bold;
                font-size: 20px;
                color: #000;
            }
            #delta-page .nome-app .nome-funzione{
                font-size: 20px;
                color: #000;
                font-weight: normal;
            }
            #delta-page .nome-app .nome-funzione:before{
                content: ":";
                margin: 0 5px;
            } /* */
            #delta-header .logo{
                width: 230px;
                height: 50px;
                /*background-image: url(images/logo.png); */
                background-color: #3e3b38;        
                background-size: auto 44px;
                background-position: center;
                background-repeat: no-repeat;
            }
            #delta-header .logout a:hover{
                background-color: rgba(255,255,255,.3)
            }
            #delta-header .logout a{
                position: absolute;
                top: 0;
                right: 0px;
                padding: 5px;
                width: 50px;
                line-height: 40px;
                color: #fff;
                text-align: center;
                cursor: pointer;
            }
            #delta-header-top .logo{
                width: 230px;
                height: 50px;
                /*background-image: url(images/logo.png); */
                background-color: #3e3b38;        
                background-size: auto 44px;
                background-position: center;
                background-repeat: no-repeat;
            }
            #delta-header-top .logout a:hover{
                background-color: rgba(255,255,255,.3)
            }
            #delta-header-top .logout a{
                position: absolute;
                top: 0;
                right: 0px;
                padding: 5px;
                width: 50px;
                line-height: 40px;
                color: #fff;
                text-align: center;
                cursor: pointer;
            }
            #delta-header .utente{
                position: absolute;
                top: 0;
                right: 80px;
                padding: 5px;
                width: 300px;
                line-height: 40px;
                color: #fff;
                text-align: right;
            }
            #delta-header-top .utente{
                position: absolute;
                top: 0;
                right: 80px;
                padding: 5px;
                width: 300px;
                line-height: 40px;
                color: #fff;
                text-align: right;
            }
            #delta-header .utente img{
                height: 40px;
                border-radius: 20px;
                background-color: rgba(255,255,255,.5);
                vertical-align: middle;
                margin-right:10px
            }
            #delta-header-top .utente img{
                height: 40px;
                border-radius: 20px;
                background-color: rgba(255,255,255,.5);
                vertical-align: middle;
                margin-right:10px
            }
            #delta-menu{
                overflow: auto;
                position: absolute;
                top: 50px;
                left: 0;
                bottom: 0;
                width: 230px;
                background-color: #dedede;
            }
            #delta-menu-top{ /* */
                overflow: auto;
                position: absolute;
                top: 0;
                left: 230px;
                bottom: 0;
                right: 380px;
            }  /* */
            #delta-page{
                position: absolute;
                left: 230px;
                top: 50px;
                bottom: 0;
                right: 0;
                overflow: scroll;
                padding:10px;
            }
           #delta-page.fullpage{ /* */
                left: 0;
            } /* */
            .menu-header{
                background-color: #bababa;
                font-size: 16px;
                font-weight: bold;
                padding: 10px 15px;
            }
            img{
                padding-top: 1px;
                padding-bottom: 3px;
            
            width: 17px;
            display:block; 
            float:left;
            margin-right:10px;
            }
            .menu-voice {
                font-size: 16px;
                font-weight: bold;
                padding: 10px 15px;
                font-weight: normal;
                
               
                
               
            }
             .menu-voice-orizzontale{
                font-size: 16px;
                font-weight: bold;
                padding: 10px 15px;
                font-weight: normal;
                 display:block;
                float:left;
               
            }
            .menu-voice:hover{
                background-color: #b2b2b2;
            }
            #delta-menu ul{

            }

            .menu-grp>a>.menu-voice-grp{
                position: relative;
            }
            .menu-grp>a>.menu-voice-grp:after{
                content: "";
                border: solid black;
                border-width: 0 3px 3px 0;
                display: inline-block;
                position: absolute;
                right: 10px;
                top: 15px;
                width: 6px;
                height: 6px;
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
            }

            .menu-grp.expanded>a>.menu-voice{
                background-color: rgba(0,0,0,.1);
            }
            #delta-menu a.selected div{
                background-color: rgba(255,255,141,.5);
            }
            #delta-menu-top a .menu-voice{ /* */
                color: #fff;
            }
            #delta-menu-top a{
                display: inline-block;
                line-height: 30px;
                color: #fff;
            }
            #delta-menu-top div{
                display: inline-block;
                line-height: 30px;
                color: #fff;
            }
            #delta-menu-top a.selected div{
                background-color: rgba(255,255,141,.5);
            }  /* */

            .menu-grp.expanded>a>.menu-voice-grp:after{
                transform: rotate(45deg);
                -webkit-transform: rotate(45deg);
            }

            .menu-grp>.menu-sub{
                display: none;
                padding-left: 20px;
            }

            .menu-grp.expanded>.menu-sub{
                display: block;
                background-color: rgba(255,255,255,.5)
            }
            
            .freccia{
                display:block;
                float:right;
                padding-top: 5px;
            }
            
        </style>
    </head>

    <body>