<?php
session_start();

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_VOCI_MENU_MANAGER);
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
 
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
         <link rel="stylesheet" type="text/css" media="all" href="./css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/menu.js"></script>

        
        <link type="text/css" href="css/custom-theme/jquery-ui.min.css" rel="stylesheet" />
        <script type="text/javascript" src="./js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="./js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/livevalidation_standalone.js"></script>
        <script src="js/jquery.iframe-auto-height.plugin.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/delta_dialog_o.js"></script>
      <script src="js/delta_dialog_o.js" type="text/javascript"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script src="js/utility.js?v=2" type="text/javascript"></script>
        <script type="text/javascript">
            $.ajaxSetup({ cache: false });
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

        title: "<? if( $Op=="Inserisci" ) echo $Op; else echo "Modifica"; ?> voci menu", 

        width: 660, 

        height: 350 

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

        
	$thisId_voce = stripslashes(requestUtils::getRequestObject('Id_voce'));
	$thisVoce = stripslashes(requestUtils::getRequestObject('Voce'));
	$thisFile_php = stripslashes(requestUtils::getRequestObject('File_php'));
	$thisTipo = stripslashes(requestUtils::getRequestObject('Tipo'));
	$thisId_voce_padre = stripslashes(requestUtils::getRequestObject('Id_voce_padre'));
	$thisPosizione = stripslashes(requestUtils::getRequestObject('Posizione'));
	$thisAttivo = stripslashes(requestUtils::getRequestObject('Attivo'));
	$thisImmagine = stripslashes(requestUtils::getRequestObject('Immagine'));
	$thisImmagine_file = stripslashes(requestUtils::getRequestObject('Immagine_file'));
        
        $this_file_name = stripslashes(requestUtils::getRequestObject('_file_name'));
        $this_file_data = stripslashes(requestUtils::getRequestObject('_file_data'));
  
        
	$thisVoci_menuManager = new Voci_menuManager();
	$thisVoci_menuInfo = $thisVoci_menuManager->getVoci_menuByPK(escapeDBVariabile($thisId_voce));
	
	if ($Op == "Inserisci"){
                 
		$thisVoci_menuInfo = new voci_menuInfo();

               
                     $thisPosizione=10;
                     
                     
                     while(true){
                         
                         $dbQuery = new databaseQuery();
                         
                if($_REQUEST["IdVocePadre"] ==""){
          $result = $dbQuery->executeDirectQuery("SELECT  Posizione FROM voci_menu  WHERE Posizione='".$thisPosizione."' AND Id_voce_padre IS NULL order by Posizione DESC  ");
                       
    
                }else{
                        $result = $dbQuery->executeDirectQuery("SELECT Posizione FROM voci_menu  WHERE Posizione='".$thisPosizione."' AND Id_voce_padre='".$_REQUEST["IdVocePadre"] ."' order by Posizione DESC  ");
                
                }   
                 $rows = $result->GetRows(-1);
                   if($rows[0]!=""){
                         $thisPosizione=$thisPosizione+10;
                     }else{
                         break;
                     }
                     }
      
		$thisVoci_menuInfo->Id_voce = $thisId_voce ;
		$thisVoci_menuInfo->Voce = $thisVoce ;
		$thisVoci_menuInfo->File_php = $thisFile_php ;
		$thisVoci_menuInfo->Tipo = $thisTipo ;
		$thisVoci_menuInfo->Id_voce_padre = $thisId_voce_padre ;
		$thisVoci_menuInfo->Posizione = $thisPosizione ;
		$thisVoci_menuInfo->Attivo = $thisAttivo ;
		$thisVoci_menuInfo->Immagine = $thisImmagine ;
	}
if($submit=="Inserisci"){
	if ($thisVoci_menuInfo == false){
            
            
      
		$thisVoci_menuInfo = new voci_menuInfo();

                 $dbQuery = new databaseQuery();
            
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce FROM voci_menu order by Id_voce DESC  ");
                 $rows = $result->GetRows(-1); 
                if($rows[0]!=""){
                    
                 
                     $IdProvvisorio=(int)$rows[0]["Id_voce"]+1;
            
                 } 
 
                 if($thisPosizione==""){
         
                 $thisPosizione=10;
                           while(true){
                         
                         $dbQuery = new databaseQuery();
                         
                if($_REQUEST["IdVocePadre"] ==""){
                $result = $dbQuery->executeDirectQuery("SELECT Posizione FROM voci_menu  WHERE Posizione='".$thisPosizione."' AND Id_voce_padre IS NULL order by Posizione DESC  ");
                
                }else{
                        $result = $dbQuery->executeDirectQuery("SELECT Posizione FROM voci_menu  WHERE Posizione='".$thisPosizione."' AND Id_voce_padre='".$_REQUEST["IdVocePadre"] ."' order by Posizione DESC  ");
                
                }   
                 $rows = $result->GetRows(-1);
                   if($rows[0]!=""){
                         $thisPosizione=$thisPosizione+10;
                     }else{
                         break;
                     }
                     }
                 }
              
		$thisVoci_menuInfo->Id_voce = $thisId_voce ;
		$thisVoci_menuInfo->Voce = $thisVoce ;
		$thisVoci_menuInfo->File_php = $thisFile_php ;
		$thisVoci_menuInfo->Tipo = $thisTipo ;
               $thisVoci_menuInfo->Id_voce_padre = $thisId_voce_padre ;  
             
              $thisVoci_menuInfo->Posizione = $thisPosizione ;
		$thisVoci_menuInfo->Attivo = $thisAttivo ;
                
              
      
       	
                     if($this_file_data!=""){
                         

            $dati = explode(",",$this_file_data);
            $contenuto = base64_decode($dati[1]);
            $filelocale = PATH_IMMAGINI_MENU.$IdProvvisorio .".png";
            $nome_file = $IdProvvisorio .".png";
            file_put_contents($filelocale, $contenuto);
            $thisVoci_menuInfo->Immagine = $nome_file;
      
        }  
     
      
        foreach ($_FILES as $file) {
                                      
            if(!empty($file["name"])){
                $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
                $permessi = array('jpeg', 'jpg', 'png', 'gif', 'bmp','jfif');
                if(in_array($ext, $permessi)){
                    $contenuto = file_get_contents($file["tmp_name"]);
                    $filelocale = PATH_IMMAGINI_MENU . $IdProvvisorio . "." . $ext;
                    file_put_contents($filelocale, $contenuto);
                    $nome_file = $IdProvvisorio . "." . $ext;
                    $thisVoci_menuInfo->Immagine =$nome_file;
             
           
                }
            }
        }    
		$thisVoci_menuManager->createVoci_menu(escapeDB(clone $thisVoci_menuInfo)); 
              
         riposiziona($thisVoci_menuInfo,$thisPosizione,$submit);
                 
               
        
                     
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Voce inserita</b><br/>"; 
	}else{
	echo "<b> Voce gia presente, cambiare la chiave</b><br/>"; 
	}
}
	if ($thisVoci_menuInfo == false)
	{
?>
Voci_menu Non Trovato,Campi Chiave Errati 
<?php
		exit;
	}
if($submit=="Modifica"){
		$thisVoci_menuInfo->Id_voce = $thisId_voce ;
		$thisVoci_menuInfo->Voce = $thisVoce ;
		$thisVoci_menuInfo->File_php = $thisFile_php ;
		$thisVoci_menuInfo->Tipo = $thisTipo ;
		$thisVoci_menuInfo->Id_voce_padre = $thisId_voce_padre ;
		//$thisVoci_menuInfo->Posizione = $thisPosizione ;
		$thisVoci_menuInfo->Attivo = $thisAttivo ;
                $thisVoci_menuInfo->Immagine = $thisImmagine ;
                $thisVoci_menuManager->updateVoci_menu(escapeDB(clone $thisVoci_menuInfo)); 

		
                     if($this_file_data!=""){
                         

            $dati = explode(",",$this_file_data);
            $contenuto = base64_decode($dati[1]);
            $filelocale = PATH_IMMAGINI_MENU.$thisVoci_menuInfo->Id_voce .".png";
            $nome_file = $thisVoci_menuInfo->Id_voce .".png";
            file_put_contents($filelocale, $contenuto);
            $thisVoci_menuInfo->Immagine = $nome_file;
      
        }  
     
      
        foreach ($_FILES as $file) {
                                      
            if(!empty($file["name"])){
                $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
                $permessi = array('jpeg', 'jpg', 'png', 'gif', 'bmp','jfif');
                if(in_array($ext, $permessi)){
                    $contenuto = file_get_contents($file["tmp_name"]);
                    $filelocale = PATH_IMMAGINI_MENU . $thisVoci_menuInfo->Id_voce . "." . $ext;
                    file_put_contents($filelocale, $contenuto);
                    $nome_file = $thisVoci_menuInfo->Id_voce . "." . $ext;
                    $thisVoci_menuInfo->Immagine =$nome_file;
             
           
                }
            }
        }
                    $thisVoci_menuManager->updateVoci_menu(escapeDB(clone $thisVoci_menuInfo)); 
     if($thisPosizione!=""){
         riposiziona($thisVoci_menuInfo,$thisPosizione,$submit);
          }
        
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Voce modificata</b><br/>"; 
	
}
if($submit=="Elimina"){
    
    if($thisVoci_menuInfo->Tipo=="N"){
       $figli= getValore("SELECT Id_voce FROM Voci_menu WHERE Id_voce_padre='".$thisVoci_menuInfo->Id_voce."' ");
    }
    if($figli==""){
	$Op="Inserisci"; 
    $thisVoci_menuManager->deleteVoci_menu(escapeDB(clone $thisVoci_menuInfo)); 
?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php
	echo "<b> Voce eliminata</b><br/>"; 
        }else{
         ?><script>window.setTimeout("doRedirect()", 1500);</script>
<?php   
            echo "<b> Impossibile eliminare, sono presenti sottovoci, eliminare prima quelle</b><br/>"; 
            
        }
}

?>
<form name="voci_menuEditForm" id="voci_menuEditForm" method="POST" action="editVoci_menu.php" onsubmit='if(document.getElementById("submit").value=="Elimina") return window.confirm("Sei sicuro di volerlo Eliminare ?"); else return true;'  enctype="multipart/form-data">
<input type="hidden" name="Return" value="<?php echo $return; ?>"></input>
<table cellspacing="8" cellpadding="0" border="0">
	<input type="hidden"  id="Id_voce" name="Id_voce" value="<?php echo htmlentities ($thisVoci_menuInfo->getId_voce(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11"> 

	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Voce : </b> </td>
		<td> <input type="text" id="Voce" name="Voce" value="<?php echo htmlentities ($thisVoci_menuInfo->getVoce(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="255" required> </td>
	</tr>

	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Tipo : </b> </td>
      <td>  <select id="Tipo" name="Tipo" onchange="hiddenFile_php()">
              <?php  if($Op!="Inserisci" && $thisVoci_menuInfo->Tipo=="N"){ ?>
                 <option value="P" >PHP</option>
                 <option value="N" selected>Nodo</option>
                  <?php }else{ ?>
                     <option value="P" selected>PHP</option>
            <option value="N" >Nodo</option>
                      <?php }?>
            <select></td>
        <!--<td> <input type="text" id="Tipo" name="Tipo" value="<?php // echo htmlentities ($thisVoci_menuInfo->getTipo(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="1"  maxlength="1"> </td>-->
	</tr>
        <script>
   
    function hiddenFile_php(){
    if($('#Tipo').val()=="P"){
        $('#File_php').attr("required");
        $('#FilePhp').show();
      
        
    }else{
         $('#FilePhp').hide();
    
    }
    }
    </script>
        	<tr valign="top" height="20" id="FilePhp" >
		<td id="BordatoTitolo" align="right"> <b> File php : </b> </td>
		<td> <input type="text" id="File_php" name="File_php" value="<?php echo htmlentities ($thisVoci_menuInfo->getFile_php(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="50"  maxlength="255"> </td>
	</tr>
	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Id voce padre : </b> </td>
                  <td>  <select id="Id_voce_padre" name="Id_voce_padre" >
                          <option value=""></option>
              <?php  
                        $dbQuery = new databaseQuery();
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Voce,Posizione,Id_voce_padre FROM Voci_menu WHERE Tipo='N'  order by posizione asc;" );
                $rows = $result->GetRows(-1);
                if($rows[0] != "" ){
                    foreach ($rows as $row) {
                   
                        if($_REQUEST["IdVocePadre"] == $row["Id_voce"] ||  $thisVoci_menuInfo->Id_voce_padre==$row["Id_voce"]){
                                 ?>
                          <option value="<?=$row["Id_voce"];?>" selected><?php echo $row["Id_voce"]." - ".$row["Voce"];?></option>
                        <?php 
                        }else{
                                 ?>
                          <option value="<?=$row["Id_voce"];?>" ><?php echo $row["Id_voce"]." - ".$row["Voce"];?></option>
                        <?php 
                        }
                        
                   
                    }
                }
                ?>
              
            <select></td>
                <?php //if(isset($_REQUEST["ID_PADRE"])){ ?>
<!--		<td> <input type="text" id="Id_voce_padre" name="Id_voce_padre" value="<?php  //echo htmlentities ($_REQUEST["ID_PADRE"],ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11"  maxlength="11"> </td>-->
                <?php //}else{ ?>
                    	<!--<td> <input type="text" id="Id_voce_padre" name="Id_voce_padre" value="<?php  //echo htmlentities ($thisVoci_menuInfo->getId_voce_padre(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11"  maxlength="11"> </td>-->
         <?php // } ?>
        
        </tr>
	<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Posizione : </b> </td>
		<td> <input type="text" id="Posizione" name="Posizione" value="<?php  echo htmlentities ($thisVoci_menuInfo->getPosizione(),ENT_QUOTES|ENT_IGNORE,"UTF-8"); ?>" size="11"  maxlength="11"> </td>
	</tr>
		<tr valign="top" height="20">
		<td id="BordatoTitolo" align="right"> <b> Attivo : </b> </td>
                <td> 
                    
                    <input type="hidden" id="Attivo" name="Attivo" 
                           value="<?php if($Op=="Inserisci"){echo "S";}else{ echo htmlentities ($thisVoci_menuInfo->getAttivo(),ENT_QUOTES|ENT_IGNORE,"UTF-8");} ?>">
                    <label for="check_Attivo" style="cursor:pointer;">
                        <input style="cursor:pointer;" type="checkbox" id="check_Attivo" <?=(($thisVoci_menuInfo->getAttivo()=="S" || $Op=="Inserisci")?"checked":"")?>>
                    Si</label>
                    <script>
                        
                        
                        
                        $('#check_Attivo').change(function(){
                            if($('#check_Attivo').is(':checked')){
                                $('#Attivo').val("S");
                            }
                            else{
                                $('#Attivo').val("N");
                            }
                        });
                        
                    </script>
                </td>

       <tr valign="top" height="20" id="Img">
            <td id="BordatoTitolo" align="right"> <b> Immagine : </b> </td>
		<td><?php
                    if(!is_null($thisVoci_menuInfo->getImmagine()) && $thisVoci_menuInfo->getImmagine()!=""){
                        $path = PATH_IMMAGINI_MENU.$thisVoci_menuInfo->getImmagine();
                        $url=str_replace("\\","/",$path);
                        ?>
                    <div class="Allegato">
                        <img class="immaginee" src="<?=PATH_IMMAGINI_MENU.$thisVoci_menuInfo->getImmagine();?>" style="height:70px;" >
                        <img class="delete"  src="images/close.jpg"></img>
                    </div>
                    <? }else{ ?>
                    <div class="Allegato" style="display:none">
                        <img class="immaginee "src="<?=$thisVoci_menuInfo->getImmagine();?>">
                        <img class="delete"  src="images/close.jpg"></img>
                    </div>
                    <? } ?>
                    <script>
                        $(function(){
                     
                            $(".delete").click(function(){
                                $(".Allegato").hide();
                                $("#_file_name").val("");
                                $("#_file_data").val("");
                                
                                $("#Immagine").val("");
                                $("#Immagine_file").prop('disabled', false);
                                $("#Immagine_file").show();
                            })                            
                        })
                    
                    </script>
                            <input type="file" <?php echo $thisVoci_menuInfo->getImmagine(); if(!is_null($thisVoci_menuInfo->getImmagine()) && $thisVoci_menuInfo->getImmagine()!=""){ echo "disabled style='display:none;'";}?> id="Immagine_file" name="Immagine_file"  value="<?=PATH_IMMAGINI_MENU.$thisVoci_menuInfo->getImmagine();?>"  >
                    <input type="hidden" id="Immagine" name="Immagine" value="<?=$thisVoci_menuInfo->getImmagine();?>">                   

                <td>   
	
        </tr>
</table>
<input type="hidden" id="submit" name="submit" value=""/> 
<script>
function submit2(valore)  {  

    submit=valore;  

    document.getElementById("submit").value=valore;  

    var form = document.getElementById("voci_menuEditForm"); 

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
</form>

<?




function riposiziona( $thisVoci_menuInfo ,$thisPosizione,$submit,$IdProvvisorio=""){ //non scala
        $thisPosizione=(int)$thisPosizione;
        $posOccupate= array();
    
                if($thisPosizione%10!=0){
                    $max=$thisPosizione;
                 while($max%10!=0){
                $max--;
            }
            $max=$max+10;

                }else{
                    
                    $max=$thisPosizione;
                }  
         if($submit!="Modifica"){
         
                            $dbQuery = new databaseQuery();     
                         $result = $dbQuery->executeDirectQuery("SELECT Id_voce FROM voci_menu order by Id_voce DESC   ");
                 $rows = $result->GetRows(-1); 
                if($rows[0]!=""){

                     $IdProvvisorio=(int)$rows[0]["Id_voce"];
        
                 }
                   $thisVoci_menuManager = new Voci_menuManager();    
 $thisVoci_menuInfo = $thisVoci_menuManager->getVoci_menuByPK(escapeDBVariabile($IdProvvisorio));
         }
                
                 $dbQuery = new databaseQuery();
           
                 
                 if($thisVoci_menuInfo->Id_voce_padre==""){
                     
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Posizione FROM Voci_menu WHERE Posizione='".$max."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre IS NULL" ); //trova una voce con stessa pèosizione
                   
                 }else{
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Posizione FROM Voci_menu WHERE Posizione='".$max."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre='".$thisVoci_menuInfo->Id_voce_padre."' " );
               }
                $rows = $result->GetRows(-1);
                
                //POSIZIONE NON LIBERA
                  if($rows[0]!=""){
                       
                       
                  
                      foreach ($rows as $row){
                            $i=$row["Posizione"]+10;
                    $posOccupate[]=$row["Posizione"];
                      }
                    while(true){
                
                        $dbQuery = new databaseQuery();
                     if($thisVoci_menuInfo->Id_voce_padre==""){
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Posizione FROM Voci_menu WHERE Posizione='".$i."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre IS NULL" ); //trova una voce con stessa pèosizione
                 }else{
                $result = $dbQuery->executeDirectQuery("SELECT Id_voce,Posizione FROM Voci_menu WHERE Posizione='".$i."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre='".$thisVoci_menuInfo->Id_voce_padre."' " );
               }
                         $rows = $result->GetRows(-1);
                                 if($rows[0]!=""){
                                       foreach ($rows as $row){
        
                    $posOccupate[]=$row["Posizione"];
                      }
               $i=$i+10;
                      }else{
                          break;
                    }
                      
                    
  
                  }
  
       
                  }
                  $x=count($posOccupate);
                  
                  for($x;$x>=0;$x--){
                      $pos=$posOccupate[$x];
                      
                      $dbQuery = new databaseQuery();
                          if($thisVoci_menuInfo->Id_voce_padre==""){
                      $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".($pos+10)."'   WHERE Posizione='".$pos."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."' AND  Id_voce_padre IS NULL " );
                          }else{
                       $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".($pos+10)."'   WHERE Posizione='".$pos."' AND Id_voce<>'".$thisVoci_menuInfo->Id_voce."'  AND Id_voce_padre='".$thisVoci_menuInfo->Id_voce_padre."' " );
                            
                          }
                  $rows = $result->GetRows(-1);
                
               
                  }
                
                          
                      $dbQuery = new databaseQuery();
                      if($submit=="Modifica"){
                          
            if($thisVoci_menuInfo->Id_voce_padre==""){
           
            $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".$max."' WHERE Id_voce='".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre IS NULL " );
      
            }else{     
                    
     $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".$max."' WHERE Id_voce='".$thisVoci_menuInfo->Id_voce."' AND Id_voce_padre='".$thisVoci_menuInfo->Id_voce_padre."'  " );
           
                }
                    $rows = $result->GetRows(-1);
                    
                     }else{
                         
                         $result = $dbQuery->executeDirectQuery("SELECT Id_voce FROM voci_menu order by Id_voce DESC   ");
                 $rows = $result->GetRows(-1); 
                if($rows[0]!=""){
                    $IdProvvisorio=(int)$rows[0]["Id_voce"];
                 }
                         
           
            if(!isset($_REQUEST["Id_voce_padre"])){
    
            $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".$max."' WHERE Id_voce='".$IdProvvisorio."' AND Id_voce_padre IS NULL " );
         $rows = $result->GetRows(-1);
            }else{     
                    
     $result = $dbQuery->executeDirectQuery("UPDATE Voci_menu SET Posizione='".$max."' WHERE Id_voce='".$IdProvvisorio."' AND Id_voce_padre='".$_REQUEST["Id_voce_padre"]."'  " );
           $rows = $result->GetRows(-1);
                }   
                         
                     }
                    
                    
                return true;                     
}


 ?>
</body>
</html>