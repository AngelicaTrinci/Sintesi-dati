<? $title="Voci menu";
	include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_VOCI_MENU_MANAGER);
include_once(CLASS_REQUEST_UTILS);
if(isset($_REQUEST["Id_voce"])){ 
    include "header_frame.php";
    
    $thisVoci_menuManager = new Voci_menuManager();
    $thisVoci_menuInfo = $thisVoci_menuManager->getVoci_menuByPK(escapeDBVariabile($_REQUEST["Id_voce"]));

}else{
include "header.php";
}
?>

<style>
    
  
  .no .attivo{
 font-size: 0em;
    color: transparent;
    cursor:auto;

filter: alpha(opacity=0);
    opacity:0.00;
         pointer-events: none;
        cursor: default;
      
    }
    

    
   input[type="button"][value="Sottomenu"]{
     background: transparent;
    border: none !important;
    font-size:0;
            cursor:pointer ;
    background-image: url(images/sottomenu.png);
    background-size: cover;
    height:25px;
    width:25px;
    
    }
    
  .hiddenButton .buttonSottomenu{
  font-size: 0em;
    color: transparent;
    cursor:auto;

filter: alpha(opacity=0);
    opacity:0.00;
         pointer-events: none;
        cursor: default;
}
    
    
  .hiddenPhoto .photo{
  font-size: 0em;
    color: transparent;
    cursor:auto;

filter: alpha(opacity=0);
    opacity:0.00;
         pointer-events: none;
        cursor: default;
}
    
</style>
        <?php
        ?>
<script>
            $(function(){
                delta_dialog.SetOptions({
                    title: "<?=$thisVoci_menuInfo->Id_voce?> - <?=$thisVoci_menuInfo->Voce?>",
                    width: 1150,
                    height: 600
                });
                delta_dialog.setButtons({
                  
                    "Chiudi":    function(){
                        delta_dialog.close("done");
                 } 
                });
            });
            
       
            
        </script> 
            <?php
      
	$_SESSION["language_select"]="it";
	require_once "KoolControls/KoolGrid/koolgrid.php";
	require_once "KoolControls/KoolAjax/koolajax.php";
	require_once "config.php";
	$koolajax->scriptFolder = "KoolControls/KoolAjax";
        
        if(isset($_REQUEST["Id_voce"])){
             $ds->SelectCommand = "SELECT * FROM voci_menu WHERE Id_voce_padre='".$_REQUEST["Id_voce"]."' ";
        }else{
        $ds->SelectCommand = "SELECT * FROM voci_menu WHERE Id_voce_padre IS NULL ";
        
        }
	$grid = new KoolGrid("grid");
	$grid->scriptFolder = "KoolControls/KoolGrid";
	$grid->styleFolder=(defined("DEFAULT_KOOLGRID_STYLE")?DEFAULT_KOOLGRID_STYLE:"default");
	$grid->DataSource = $ds;
	$grid->AjaxEnabled = true;
        $grid->Width = "100%";
	$grid->PageSize = 20;
	$grid->RowAlternative = true;
	$grid->AllowSorting = true;
	$grid->AllowFiltering = true;
       $grid->AllowSelecting=true;
	//$grid->AllowResizing = true;
	$grid->AutoGenerateColumns = false;
	$grid->ColumnWrap=true;
        $grid->Localization->Load("KoolControls/KoolGrid/localization/".$_SESSION["language_select"].".xml");
	$grid->MasterTable->Pager = new GridPrevNextAndNumericPager();
	$grid->MasterTable->Pager->ShowPageSize = true; //visualizza la scelta per il numero righe paginazione
	$grid->MasterTable->ShowFunctionPanel = true;
	//$grid->MasterTable->TableLayout  = "fixed"; // Dimensione fissa griglia
	//$grid->MasterTable->MultiSortingOrder = "LCFS"; // Last click first sort
//$grid->AllowGrouping = true;
//$grid->MasterTable->ShowGroupPanel = true;
$grid->ClientSettings->ClientEvents["OnBeforeStartInsert"] = "OnBeforeStartInsert";
$grid->ClientSettings->ClientEvents["OnRowDoubleClick"] = "DoubleClick";
$grid->MasterTable->FunctionPanel->Position="top";

class mioEventHandler extends GridEventHandler {
    
function OnRowPreRender($row,$args) {
    
    if($row->DataItem["Tipo"]!="N"){
           $row->CssClass.=" hiddenButton ";
    }
    if($row->DataItem["Immagine"]==""){
         $row->CssClass.=" hiddenPhoto ";
    }
    
    if($row->DataItem["Attivo"]=="N"){
         $row->CssClass.=" no ";
         
}

}

}



$grid->EventHandler=new mioEventHandler();

$col = new GridCommandColumn();
$col->CommandText = "Modifica";
$col->OnClick = "OpenEdit(\"{Id_voce}\");";
$col->CssClass = "";
$grid->MasterTable->AddColumn($col);


$col = new GridCommandColumn();
$col->CommandText = "Sottomenu";
$col->OnClick = "sottomenu(\"{Id_voce}\");";
$col->CssClass = "buttonSottomenu";
$grid->MasterTable->AddColumn($col);

add_colonna($grid->MasterTable, "Id_voce", "Codice voce",array("larghezza"=>"70px","align"=>"center"));
add_colonna($grid->MasterTable, "Voce", "Voce",);
add_colonna($grid->MasterTable, "File_php", "File php");
add_colonna($grid->MasterTable, "Tipo", "Tipo",array("larghezza"=>"70px","align"=>"center"));
//add_colonna($grid->MasterTable, "Id_voce_padre", "Id voce padre");
add_colonna($grid->MasterTable, "Posizione", "Posizione",array("sort"=>1,"larghezza"=>"100px","align"=>"center"));
//add_colonna($grid->MasterTable, "Attivo", "Attivo",array("larghezza"=>"75px","align"=>"center"));


$col = new GridCustomColumn();

$col->CssClass = "attivo";

$col->ItemTemplate = "<img  class=\"foto\" src=\"images/1403640452_button_ok.png\"  style=\"margin-left:11px\" >";
$col->AllowFiltering=false;
$col->HeaderText = "Attivo";



$grid->MasterTable->AddColumn($col);

$col = new GridCustomColumn();

$col->CssClass = "photo";

$col->ItemTemplate = "<img  class=\"foto\" src=\"".PATH_IMMAGINI_MENU."{Immagine}\"  style=\"margin-left:11px\" >";
$col->AllowFiltering=false;
$col->HeaderText = "Foto";
$grid->MasterTable->AddColumn($col);


$grid->Process();
	
        echo $koolajax->Render();?>
        <form id="form1" method="post">
<script type="text/javascript">
function OnBeforeStartInsert(sender,args){
    <?php if(isset($_REQUEST["Id_voce"])){ ?>
            
                      delta_dialog.openDialog({
                url: "editVoci_menu.php?Return=Close&Op=Inserisci&IdVocePadre=<?=$_REQUEST["Id_voce"]?>",
                actions: {
                    "done": function () {
                        grid.refresh();
                        grid.commit();
                    }
                }
            });
      <?php }else{   ?>
                   delta_dialog.openDialog({
                url: "editVoci_menu.php?Return=Close&Op=Inserisci",
                actions: {
                    "done": function () {
                        grid.refresh();
                        grid.commit();
                    }
                }
            });  
      <?php } ?>
		return false; // Approve action
	}

        function DoubleClick(sender,args)
	{
		var row = args["Row"];
                var dataitem = row.getDataItem();
                OpenEdit(dataitem["Id_voce"]);
	}
       function OpenEdit(Id_voce)
        {
                    delta_dialog.openDialog({
                url: "editVoci_menu.php?Return=Close&Id_voce="+Id_voce,
                actions: {
                    "done": function () {
                        grid.refresh();
                        grid.commit();
                    }
                }
            });
        }
        
        function sottomenu(Id_voce){
                 delta_dialog.openDialog({
                url: "viewVoci_menu.php?Id_voce="+Id_voce,
                actions: {
                    "done": function () {
                        grid.refresh();
                        grid.commit();
                    }
                }
            });
 }
    
        
        
</script>



            <?php echo $grid->Render();?>
         
        </form>
<? $titleMod="Voci menu";
include "footer.php"; ?>