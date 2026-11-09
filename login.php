<?
ob_start();
session_start();
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);
require_once("include/utility.php");
require_once("include/autorizzazioni.php");
ob_clean();

$user=$_REQUEST["utente"];
$pw=$_REQUEST["password"];
$dominio=$_REQUEST["dominio"];
$restaConn=$_REQUEST["restaConn"];



function restaConnesso($Id_utente){

        
        $dt=new DateTime();
        $data=$dt->format("YmdHisu");
        $str=$data.$Id_utente;
        $token= hash(HASH,$str);
        
        if(eseguiQuery2("INSERT INTO Utenti_token_accesso(Token,Id_utente,Data_ora_creazione,Attivo) VALUES ('".$token."',".$Id_utente.",'".date("Y-m-d H:i:s")."','S') ")){
        setcookie("Token",$token,DURATA_COOKIE);
        
        return true;
        }else{
            return false;
        }
    
}


function accessoToken(){

    $tokenCookie=$_COOKIE["Token"];
    $Id_utente=getValore("SELECT Id_utente FROM Utenti_token_accesso WHERE Token='".$tokenCookie."' AND Attivo='S'  ");
    
    if($Id_utente!=""){
        
        return $Id_utente;
        
    }else {
        return false;
    }
    
}


function noLogin($user){
     $tipoLogin= getValore("SELECT TipoLogin FROM Utenti WHERE Utente ='".$user."' AND (Dominio IS NULL)");

    if($tipoLogin==="0"){
        return true;
    }else{
        return false;
    }

}

function resetPw($utente){
    

    $valore_reset= getValore("SELECT Reset_password from Utenti where Utente='".$utente."' AND (Dominio IS NULL)");

    if($valore_reset=="S"){
        $_SESSION[PREFISSO_SESSIONE."_user_cambio_pw"]=$utente;
       return true;
    }else{
        return false;
    }
    
}

function cambio_password($utente,$password){

     $cambio_obbligatorio= getValore("SELECT Obbligo_cambio_password FROM Utenti WHERE Utente ='".$utente."' AND (Dominio IS NULL)");
         // $dataPw=getValore("SELECT Data_password FROM Utenti WHERE Password='".md5($password)."' AND Utente ='".$utente."' AND (Dominio IS NULL)"); 
          $dataPw=getValore("SELECT Data_password FROM Utenti WHERE Utente ='".$utente."' AND (Dominio IS NULL)"); 

    if($cambio_obbligatorio!="S"){
        return false;
    }
   
    if(date("Y-m-d") >= date("Y-m-d",strtotime ( "+".PERIODO_CAMBIO_PASSWORD." days" , strtotime ( $dataPw ) ))){
        $_SESSION[PREFISSO_SESSIONE."_user_cambio_pw"]=$utente;
        $_SESSION[PREFISSO_SESSIONE."_dominio_cambio_pw"]=$dominio;

        return true;
    }else{
        return false;
    }
   
}

function login($utente,$dominio,$password){
   
     if($utente=="" && $password=="" && $tokenAttivo==""){
        return false;
    }
    //manuale o nessun login
    if(LOGIN_MANUALE=="S"){
        // Cerco tra gli utenti con login manuale previsto
        
        $pwDb=getValore("SELECT Password FROM utenti WHERE Utente='".$utente."'");
        if(password_verify($password, $pwDb)){

            $str="select *
              from   utenti
              where  Utente = ? and
                     Password = ? and
                     (TipoLogin = 0 or TipoLogin = 1) and
                     Attivo = 'S'";
        $par=array($utente,$pwDb);
                $qry=new databaseQuery();
        $rs = $qry->dbConn->Execute($str,$par);
               if($rs==true){
            $rows = $rs->GetRows(-1);
            foreach ($rows as $row) {
                $thisUtentiManager = new UtentiManager();
                $thisUtentiInfo = $thisUtentiManager->getUtentiByPK($row["Id_utente"]);
                return $thisUtentiInfo;
            }
        } 
        }else if(!password_verify($password, $pwDb)){
        }
        
//        $str="select *
//              from   utenti
//              where  Utente = ? and
//                     Password = ? and
//                     (TipoLogin = 0 or TipoLogin = 1) and
//                     Attivo = 'S'";
//        $par=array($utente,md5($password));
//        $qry=new databaseQuery();
//        $rs = $qry->dbConn->Execute($str,$par);
//        if($rs==true){
//            $rows = $rs->GetRows(-1);
//            foreach ($rows as $row) {
//                $thisUtentiManager = new UtentiManager();
//                $thisUtentiInfo = $thisUtentiManager->getUtentiByPK($row["Id_utente"]);
//                return $thisUtentiInfo;
//            }
//        } 
      
}
    
//ldap
    if(LOGIN_LDAP=="S"){
        
        //Effettua login tramite ldap
        require_once 'include/ldap.php';
        
        
        $esito=loginLdap($utente,$dominio,$password);
  
                if($esito){
            $str="select * from Utenti where Utente = ? and Dominio = ? and TipoLogin = 2 and Attivo = 'S' ";
            $par=array($esito["utente"],$esito["dominio"]);
            
            
            $qry=new databaseQuery();
            $rs = $qry->dbConn->Execute($str,$par);
            if($rs==true){
                $rows = $rs->GetRows(-1);
                $trovato=false;
                foreach ($rows as $row) {
                    $thisUtentiManager = new UtentiManager();
                    $thisUtentiInfo = $thisUtentiManager->getUtentiByPK($row["Id_utente"]);
                    $trovato=true;
                    return $thisUtentiInfo;
                }

            }
        }
    }
    
  //controlla token
    if(RESTA_CONNESSO=="S" && $tokenAttivo!=""){

    $accessoToken= accessoToken();
   
    if($accessoToken!=false){
     
     $_SESSION[PREFISSO_SESSIONE."_utente_autenticato"] = true;
        $_SESSION[PREFISSO_SESSIONE."_utente_codice"]=$accessoToken?>
<script> window.location="index.php";</script> <?
                }
    }

    
    
return false;
}

//entra solo con username
if( $_REQUEST["login-manuale"] == "S" ){
    

    $resetPw= resetPw($user);

 

    $utente = login($user,$dominio,$pw);
        if($restaConn=="S"){
    
        if(restaConnesso($utente->Id_utente)){
        $_SESSION[PREFISSO_SESSIONE."_utente_autenticato"] = true;
        $_SESSION[PREFISSO_SESSIONE."_utente_codice"]=$utente->Id_utente;
    
        }
    }
    
   
    $cambiopw= cambio_password($user, $pw);
    
     
    
    $noLogin=noLogin($user);
    
    if($noLogin && $utente){ 
        $_SESSION[PREFISSO_SESSIONE."_utente_autenticato"] = true;
        $_SESSION[PREFISSO_SESSIONE."_utente_codice"]=$utente->Id_utente;
        echo "NOLOGIN";
        exit;
}else if($utente && $cambiopw==false && $resetPw==false){
        // set the user as connected and redirect him to a home page or something
        $_SESSION[PREFISSO_SESSIONE."_utente_autenticato"] = true;
        $_SESSION[PREFISSO_SESSIONE."_utente_codice"]=$utente->Id_utente;
//        $_SESSION[PREFISSO_SESSIONE."_imponi_cambio_password"]=$utente->ImponiCambioPsw;
        echo "OK";
        exit;
    }else if(($resetPw || $cambiopw) && $utente!=false){
        echo "CAMBIO";
        exit;
    }else if($utente==false){
        echo "NO";
        exit;
    }

}   



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            #login-div{
                margin: 100px auto 10px auto;
                width: 300px;
                background-color: #fff;
                -webkit-box-shadow: 0px 0px 15px 0px rgb(50 50 50 / 60%);
                -moz-box-shadow: 0px 0px 15px 0px rgba(50, 50, 50, 0.6);
                box-shadow: 0px 0px 15px 0px rgb(50 50 50 / 60%);
            }
            #login-div .logo{
                background-color: #3e3b38;
                padding: 10px;
            }
            #login-div .logo img{
                width: 250px;
            }
            #login-div .campi   { padding:10px 45px; }
            #login-div .pulsanti{ padding:0 0 20px 0; text-align: center; }
            #login-div .messaggi{ padding:10px 45px; }
            #login-div .campi td,
            #login-div .campi th{
                padding: 2px;
            }
            #login-div .campi th{
                font-weight: bold;
                text-align: right;
            }
            #login-div input,
            #login-div select{
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
            #login-div button{
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
            #login-form-app-error{
                width: 280px;
                text-align: center;
                padding: 10px;
                margin: 0 auto;
                display:none;
            }
        </style>
        <script>
            function doRedirect() { //funzione con il link alla pagina che si desidera raggiungere
	location.href = "cambio_password.php";
}
    function doRedirectIndex() { //funzione con il link alla pagina che si desidera raggiungere
	location.href = "<?=URL_ROOT_ADDRESS;?>/index.php";
}
         
            $(function(){
                
                $("input[name=utente]").focus();
                $("#login-form-app").submit(function(){
                    $("#login-form-app-error").hide();
                    $("#login-form-button").hide();
                    $("#login-form-loading").show();
                    setTimeout(function(){
                        $.ajax({
                            type:"post",
                            url: "login.php",
                            data: $("#login-form-app").serialize(),
                            success: function(data){
                                if(data=="OK"){
                                window.location="index.php";
                                }else if(data=="NOLOGIN"){
                                    window.location="index.php";
                                }else if(data=="CAMBIO"){
                                    $("#login-form-app-error").show().text("Cambio della password necessario")
                                      $("#login-form-button").show();
                                    $("#login-form-loading").hide();
                                     window.setTimeout("doRedirect()", 1500);
                                }else if(data=="NO"){
                                    $("#login-form-app-error").show().text("Credenziali fornite errate!");
                                    $("#login-form-button").show();
                                    $("#login-form-loading").hide();
                                }
                            },
                            error: function(){
                                $("#login-form-app-error").show().text("Si è verificato un errore imprevisto! Riprovare più tardi.");
                                $("#login-form-button").show();
                                $("#login-form-loading").hide();
                            }
                        });
                    },300);
                    return false;
                });
            });

        </script>
    </head>
<?
$servers    = explode(",", IMP_LDAP_SRVAUT);
$domini_int = explode(",", IMP_LDAP_DOMINT);
$domini_est = explode(",", IMP_LDAP_DOMEST);
?>
    <body>
 
        
        <div id="login-div">
            <div class="logo"><!--<img src="images/logo.png">--></div>
     
            <form id="login-form-app" method="post" action="login.php">
                <div class="campi">
    
                    <input type="hidden" name="login-manuale" value="S">
                    <table>
                        <tr><th>Utente</th><td><input type="text" name="utente" style="width:140px"/></td></tr>
                        <tr><th>Password</th><td><input type="password" name="password" style="width:140px"/></td></tr>
                    <?php if(LOGIN_LDAP && count($domini_est)>1){ ?>
                        <tr>
                            <th>Dominio</th>
                            <td><select name="dominio" style="width:140px">
                                    <option></option>
                                    <? foreach($domini_est as $k => $dominio_est){ ?>
                                        <option value="<?=$domini_int[$k];?>"><?=$domini_est[$k];?></option>
                                    <? } ?>
                                </select>
                            </td>
                        </tr>
                    <? } ?>
                        </table>
                    <input type="checkbox" name="restaConn" id="restaConn" value="S"  style=" float: left; margin-left:60px;" ><b style=" float: left; margin-left:10px;margin-top: 1px"> Rimani connesso </b>
		 
             
            

                </div>
                <div class="pulsanti">
                    <button id="login-form-button" style="margin-top: 3px" >Login</button>
                    <button id="login-form-loading" style="display:none" disabled>...</button>
                </div>
                <div id="login-form-app-error" class="ui-corner-all ui-state-error" style="display:none;"></div>
            </form>
        </div>
    </body>
</html>