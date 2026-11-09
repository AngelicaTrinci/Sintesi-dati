<?
ob_start();

include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);
require_once("include/utility.php");
ob_clean();
session_start();


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Cambio password</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <link type="text/css" href="css/custom-theme/jquery-ui.min.css" rel="stylesheet" />
        <style>
            @font-face { 
                font-family: cust_titilium;
                src: url(fonts/titillium-web/TitilliumWeb-Regular.ttf);
            }
            *{
                font-family: cust_titilium, Arial;font-size: 12px;font-weight: bold;color: #000000;
            }
            body{
                background-color: #c2d1d7;
            }
            .cambio_password-div{
                margin: 100px auto 10px auto;
                width: 300px;
                background-color: #fff; 
                -webkit-box-shadow: 0px 0px 15px 0px rgb(50 50 50 / 60%);
                -moz-box-shadow: 0px 0px 15px 0px rgba(50, 50, 50, 0.6);
                box-shadow: 0px 0px 15px 0px rgb(50 50 50 / 60%);
            }
            .cambio_password-div .logo{
                background-color: #3e3b38;
                padding: 10px;
            }
            .cambio_password-div .logo img{
                width: 250px;
            }
            .cambio_password-div .campi   { padding:10px 45px; }
            .cambio_password-div .pulsanti{ padding:0 0 20px 0; text-align: center; }
            .cambio_password-div .messaggi{ padding:10px 45px; }
            .cambio_password-div .campi td,
            .cambio_password-div .campi th{
                padding: 2px;
            }
            .cambio_password-div .campi th{
                font-weight: bold;
                text-align: right;
            }
            .cambio_password-div input,
            .cambio_password-div select{
                height: 22px;
                line-height: 16px;
                font-size: 12px;
                color: #000000;
                border: 1px solid #3e3b38;
                border-radius: 2px;
                background-color: #ffffff;
                padding: 2px 4px;
                box-sizing: border-box;
                margin: 0;
            }
            .cambio_password-div button,
            .cambio_password-div .submit
            {
                font-weight: normal;
                border: 1px solid #8594b3;
                background-color: #c3cbda;
                background-image: linear-gradient( rgba(255, 255, 255, .5 ) 0%, rgba(255, 255, 255, .4 ) 20%, rgba(255, 255, 255, .4 ) 50%, rgba(255, 255, 255, .3 ) 80%, rgba(255, 255, 255, .2 ) 100% );
                font-size: 12px;
                border-radius: 4px;
                padding: 4px;
                box-sizing: border-box;
                margin: 0;
                cursor: pointer;
                width: 200px;
            }
            #cambio_password-form-app-error{
                width: 280px;
                text-align: center;
                padding: 10px;
                margin: 0 auto;
                display:none;
            }
            
            #confermaCambioPw{
                background-color:#e6ffe6;
                border: 2px black;
                text-align: center;
                width: 100%;
                color: #008000;
            padding: 4px 0px 4px 0px;
               border-top: 1px solid #008000;
                
            }
            
            #cambio_password-form-app-error{
                      background-color:#fef1ec ;
                border: 2px black;
                text-align: center;
                border-radius: 0px;
                width: 100%;
                color: #cd0a0a;
                padding: 4px 0px 4px 0px;
               border-top: 1px solid #cd0a0a;
            }
            
        </style>
        <script>

      function doRedirect() { //funzione con il link alla pagina che si desidera raggiungere
          location.href = "index.php";
      }
    
      
      function controllo() {
          
        $("#cambio_password-form-app-error").hide();
        $("#confermaCambioPw").hide();
          
          $("#login-form-app-error").hide();
          var passwordCorrente = $("#passwordCorrente").val();
          var password = $("#password").val();
          var password1 = $("#password1").val();
          var user = $("#user").val();
          var dominio = $("#dominio").val();


          $.ajax({
              url: "controlloPw.php",
              type: "POST",
              dataType: "json",
              data: {
                  "user": user,
                  "dominio": dominio,
                  "passwordCorrente": passwordCorrente,
                  "password": password,
                  "password1": password1
              },
              success: function (data) {
                  
              if (data.Uguali === "pwCorrente") {
                      
                      $("#cambio_password-form-app-error").show().text("Password immessa uguale a quella corrente ! Riprova");
                
                  } else if (data.Uguali === "noPwCorrente") {
                 
                      $("#cambio_password-form-app-error").show().text("Password corrente sbagliata! Riprova");
                  
                  } else if(data.Uguali === "N" ){
                      
                      $("#cambio_password-form-app-error").show().text("Password non corrispondenti! Riprova");
                      
                  }else if(data.Uguali === "true" ){
                       $("#cambio_password-form-app-error").hide();
                  }
              },
              error: function () {
                  $("#cambio_password-form-app-error").show().text("Si è verificato un errore imprevisto! Riprovare più tardi.");
              }
          })

      }



        </script>
    </head>
    <body onload="controllo()">

        <div class="cambio_password-div">
 
       

                    <div class="logo"><!--<img src="images/logo.png">--></div>
            <form id="cambio_password-form-app" method="post" action="controlloPw.php" >
                <div class="campi">
                    <input type="hidden" name="cambio_password-manuale" value="S">
                    <input type="hidden" name="form" value="S">
                    <input type="hidden" id="user" name="user" value="<?= $user ?>">
                    <input type="hidden" id="dominio" name="dominio" value="<?= $dominio ?>">

                    <table>
                        <tr><th>Password Corrente</th><td><input type="password" id="passwordCorrente" name="passwordCorrente" style="width:140px" onchange="controllo()" required /></td></tr>
                        <tr><th>Nuova Password</th><td><input type="password" id="password" name="password" style="width:140px" pattern="<?= PATTERN_CRITERI ?>" title="<?= CRITERI ?>" onchange="controllo()" required /></td></tr>
                        <tr><th>Conferma Password</th><td><input type="password"  id="password1" name="password1" style="width:140px" pattern="<?= PATTERN_CRITERI ?>" title="<?= CRITERI ?>" onchange="controllo()" required /></td></tr>
                    </table>

                </div>
                <div class="pulsanti" id="pulsanti">
                    <button id="cambio_password-form-button" >Cambia Password</button>
                    <script>
    $("#cambio_password-form-app").submit(function(e) {
   
    e.preventDefault(); 
    
    var form = $(this);
    var actionUrl = form.attr("action");
    
       $("#cambio_password-form-app-error").hide();
       $("#confermaCambioPw").hide();
    
    $.ajax({
        type: "POST",
        url: "controlloPw.php",
        dataType: "json",
        data: form.serialize(), 
        
        success: function(data)
        { 
                if (data.esito === "pwCorrente") {
                      
                      $("#cambio_password-form-app-error").show().text("Password immessa uguale a quella corrente ! Riprova");
                
                      
                  } else if (data.esito === "noPwCorrente") {
                 
                      $("#cambio_password-form-app-error").show().text("Password corrente sbagliata! Riprova");
                  
                  }else if(data.esito === "N" ){
                      
                      $("#cambio_password-form-app-error").show().text("Password non corrispondenti! Riprova");
                    
                      
                  }else {
            
                      $("#confermaCambioPw").show();
                 
                    window.setTimeout("doRedirect()", 2500);
                  
                  }
            
            
        },
        error: function () {
                  $("#cambio_password-form-app-error").show().text("Si è verificato un errore imprevisto! Riprovare più tardi.");
              }
        
    });
    
});
                </script>
                </div>
                
                
                <div id="cambio_password-form-app-error" class="ui-corner-all ui-state-error" style="display:none;"></div>
               <div id="confermaCambioPw" style="display:none;">
                Password cambiata correttamente! 
                </div>
            </form>
            
        </div>
    </body>
</html>