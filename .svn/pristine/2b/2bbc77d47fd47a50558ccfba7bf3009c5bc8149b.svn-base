<? $title="Elenco Utenti_gruppi_assegnati";
include "header.php"; ?>
        <?php
	$_SESSION["language_select"]="it";
	require_once "KoolControls/KoolGrid/koolgrid.php";
	require_once "KoolControls/KoolAjax/koolajax.php";
	require_once "config.php";
	$koolajax->scriptFolder = "KoolControls/KoolAjax";
       $ds->SelectCommand = "SELECT Id_gruppo,Id_utente FROM utenti_gruppi_assegnati";
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
	$grid->AutoGenerateColumns = true;
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
$col = new GridCommandColumn();
$col->CommandText = "Modifica";
$col->OnClick = "OpenEdit(\"{Id_gruppo}\",\"{Id_utente}\");";
$col->CssClass = "";
$grid->MasterTable->AddColumn($col);
$grid->Process();
	if(isset($_POST["IgnorePaging"])) $grid->ExportSettings->IgnorePaging = true;
	if(isset($_POST["Export"])&&$_POST["Export"]=='excel')
	{
		ob_end_clean();
		$grid->GetInstanceMasterTable()->ExportToExcel();
	}
	if(isset($_POST["Export"])&&$_POST["Export"]=='word'){
		ob_end_clean();
		$grid->GetInstanceMasterTable()->ExportToWord();
        }
	if(isset($_POST["Export"])&&$_POST["Export"]=='csv')
	{
		ob_end_clean();
		$grid->GetInstanceMasterTable()->ExportToCSV();
	}
	if(isset($_POST["Export"])&&$_POST["Export"]=='pdf')
	{
		ob_end_clean();
		$grid->GetInstanceMasterTable()->ExportToPDF();
	}
?>
         <?php echo $koolajax->Render();?>
        <form id="form1" method="post">
<script type="text/javascript">

function OnBeforeStartInsert(sender,args)
	{
               delta_dialog.openDialog({ 

    url:"editUtenti_gruppi_assegnati.php?Return=Close&Op=Inserisci", //stesso url della OpenDiv 

    actions:{ 

        "done": function(){ 

            // Cosa fare alla chiusura del dialog 

            grid.refresh(); 

            grid.commit(); 

        } 

    } 

});  
		return false; // Approve action
	}
        function DoubleClick(sender,args)
	{
		var row = args["Row"];
                var dataitem = row.getDataItem();
                OpenEdit(dataitem["Id_gruppo"]);
	}
       function OpenEdit(Id_gruppo,Id_utente)
        {
            
    delta_dialog.openDialog({ 

    url:"editUtenti_gruppi_assegnati.php?Return=Close&Id_gruppo="+Id_gruppo+"&Id_utente="+Id_utente, //stesso url della OpenDiv 

    actions:{ 

        "done": function(){ 

            // Cosa fare alla chiusura del dialog 

            grid.refresh(); 

            grid.commit(); 

        } 

    } 

});     
    }

        function esporta(v)
        {
            document.getElementById("Export").value=v;
        }
</script>
      <div class="ui-widget ui-widget-content ui-corner-all" style="padding:1 3 1 1;">
      <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" style="margin:0 -2 1 0">
      <span id="ui-dialog-title-dialog" class="ui-dialog-title">Utenti_gruppi_assegnati</span>
      </div>
            <?php echo $grid->Render();?>
            </div>
            <div>
		Esportazione:
                <input type="hidden" id="Export" name="Export" value=""/>
		<input type="image" src="images/icona_csv.png" onClick="esporta('csv');" width="20" height="20"/>
		<input type="image" src="images/icona_excel.png" onClick="esporta('excel');"  width="20" height="20"/>
		<input type="image" src="images/icona_word.png"  onClick="esporta('word');" width="20" height="20"/>
		<input type="image" src="images/icona_pdf.png"  onClick="esporta('pdf');" width="20" height="20"/>
               <br/><input type="checkbox" id="IgnorePaging" name="IgnorePaging" checked="checked"/> <label for="IgnorePaging">Tutte le pagine</label>
       </div>
        </form>
<? $titleMod="Utenti_gruppi_assegnati";
include "footer.php"; ?>