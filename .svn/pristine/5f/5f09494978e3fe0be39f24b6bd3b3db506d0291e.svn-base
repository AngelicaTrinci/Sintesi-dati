<?
namespace AcronimoProgetto;

// Eseguo il codice solo se è stata richiamata la pagina da sola
//
if( strtolower( basename( $_SERVER["PHP_SELF"] ) ) == strtolower( basename( __FILE__ ) ) ){
    
    session_start();
    require_once("../sintesi_dati_progetto.conf.php");
    require_once("../include/utility.php");
    require_once(CONFIG_FILE);
    require_once(CLASS_REQUEST_UTILS);
    require_once(CLASS_DATABASE_QUERY);

    $op = $_REQUEST["op"];

    switch( $op ){
        case "check": verifica_codice(); break;
        case "select": griglia_selezione(); break;
        case "test": test(); break;
    }
    
}

// =============================================================================
class AcronimoProgetto{
    
    public $id = false;
    
    public $input_acronimo_progetto_compilabile = false;
    
    public $output_acronimo_progetto_compilabile = false;
    public $output_area = false;
    public $output_ragione_sociale_cliente = false;
    public $output_numero_supercommessa = false;
    
    public $function_selected      = false;
    public $function_check_error   = false;
    public $function_check_success = false;
    
    public $controlla_subito = false;
    
    public function __construct( $id ){
        $this->id = $id;
    }
    
    public function crea_controllo(){
        ?>
        <script>
            var <?=$this->id;?>_ajax = [];
            var <?=$this->id;?>_davalidare = true;
            var <?=$this->id;?>_valida = false;
            var <?=$this->id;?>_controllo_in_corso = false;
            
            // Verifica se il campo è valido, restituisce uno dei seguenti valori:
            // 1: il campo è valido
            // 0: il campo non è valido
            //
            function check_<?=$this->id;?>(){
                
                // Se il campo è da validare, eseguo il controllo
                //
                if( <?=$this->id;?>_davalidare == true ){
                    esegui_controllo_<?=$this->id;?>("sync");
                }
                
                return <?=$this->id;?>_valida;
                
            }

            function esegui_controllo_<?=$this->id;?>( sync ){
                
                <?=$this->id;?>_davalidare = true;
                <?=$this->id;?>_valida = false;
                <?=$this->id;?>_controllo_in_corso = true;
                $("#<?=$this->input_acronimo_progetto_compilabile;?>").removeClass("errore");
                
                async = true;
                if( sync == "sync" ){
                    async = false;
                    for( var i in <?=$this->id;?>_ajax ){
                        <?=$this->id;?>_ajax[i].abort();
                    }
                    <?=$this->id;?>_ajax = [];
                }
                
                var req = $.ajax({
                    url: "<?=URL_ROOT_ADDRESS;?>/Select/selectAcronimoProgetto.php",
                    data:{
                        op: "check",
                        Identificativo: $("#<?=$this->input_acronimo_progetto_compilabile;?>").val()
                    },
                    type: "post",
                    async: async,
                    dataType: "json",
                    success: function(data){
                        if( data.esito=="OK" ){
                            var record = data.record;
                            <? if($this->output_acronimo_progetto_compilabile){ ?>
                                $("#<?=$this->output_acronimo_progetto_compilabile;?>").val(record.ACRONIMO);
                            <? } ?>
                            <? if($this->output_area){ ?>
                                $("#<?=$this->output_area;?>").val(record.PJDESZONA);
                            <? } ?>
                            <? if($this->output_ragione_sociale_cliente){ ?>
                                $("#<?=$this->output_ragione_sociale_cliente;?>").val(record.D_CLIENTE);
                            <? } ?>
                            <? if($this->output_numero_supercommessa){ ?>
                                $("#<?=$this->output_numero_supercommessa;?>").val(record.COMMESSA_0);
                            <? } ?>
                            <? if($this->function_check_success){ ?>
                                <?=$this->function_check_success;?>(record);
                            <? } ?>
                            <?=$this->id;?>_valida = true;
                        }
                        else{
                            <? if($this->function_check_error){ ?>
                                <?=$this->function_check_error;?>();
                            <? } ?>
                            <?=$this->id;?>_valida = false;
                            $("#<?=$this->input_acronimo_progetto_compilabile;?>").addClass("errore");
                        }
                        <?=$this->id;?>_controllo_in_corso = false;
                        <?=$this->id;?>_davalidare = false;
                    },
                    error: function(){
                        <? if($this->function_check_error){ ?>
                            <?=$this->function_check_error;?>();
                        <? } ?>
                        <?=$this->id;?>_valida = false;
                        <?=$this->id;?>_controllo_in_corso = [
                            $("#<?=$this->input_acronimo_progetto_compilabile;?>").val(),
                        ];
                        <?=$this->id;?>_davalidare = false;
                        $("#<?=$this->input_acronimo_progetto_compilabile;?>").addClass("errore");
                    }
                });
                <?=$this->id;?>_ajax.push(req);
            }
            $(function(){
                $("#<?=$this->input_acronimo_progetto_compilabile;?>").change(function(){
                    esegui_controllo_<?=$this->id;?>();
                });
                $("#<?=$this->input_acronimo_progetto_compilabile;?>").on("input",function(){
                    <?=$this->id;?>_davalidare = true;
                    <?=$this->id;?>_controllo_in_corso = false;
                });
                <? if( $this->controlla_subito ){ ?>
                esegui_controllo_<?=$this->id;?>();
                <? } ?>
            });
        </script>
        <?
    }
    
    public function crea_select(){
        ?>
        <img class="cerca-button" src="<?=URL_ROOT_ADDRESS;?>/images/cerca.jpg" style="cursor:pointer;vertical-align: middle;width: 20px;height: 20px;" id="Progetto-<?=$this->id;?>-button">
        <script>
            $(function(){
                $("#Progetto-<?=$this->id;?>-button").click(function(){
                    var par = {
                        op: "select",
                    <? if($this->option_master_plant){ ?>
                        master_plan: "S",
                    <? }?>
                    };
                    delta_dialog.openDialog({
                        url: "<?=URL_ROOT_ADDRESS;?>/Select/selectAcronimoProgetto.php?"+$.param(par),
                        actions:{
                            "select": function(record){
                                <? if($this->output_acronimo_progetto_compilabile){ ?>
                                    $("#<?=$this->output_acronimo_progetto_compilabile;?>").val(record.ACRONIMO);
                                <? } ?>
                                <? if($this->output_area){ ?>
                                    $("#<?=$this->output_area;?>").val(record.PJDESZONA);
                                <? } ?>
                                <? if($this->output_ragione_sociale_cliente){ ?>
                                $("#<?=$this->output_ragione_sociale_cliente;?>").val(record.D_CLIENTE);
                            <? } ?>
                                <? if($this->output_numero_supercommessa){ ?>
                                    $("#<?=$this->output_numero_supercommessa;?>").val(record.COMMESSA_0);
                                <? } ?>
                                <? if($this->function_selected){ ?>
                                    <?=$this->function_selected;?>(record);
                                <? } ?>
                            }
                        }
                    });
                });
            });
        </script>
        <?
    }
    
}

function verifica_codice(){
    
    // Inizializzo la risposta
    //
    $risposta = ["esito"=>"ERR"];
    
    // Allineo a destra il codice
    //
    $Identificativo = strtoupper( $_REQUEST["Identificativo"] );
    
    // Leggo i dati dal DB
    //
    $db = \open_DatabaseQuery("JOB_PROGRESS");
    $query = "select    COMMESSA_0, ACRONIMO, PJDESZONA, D_CLIENTE
              from      WEB_MOVCPJ_lv0
              where     ACRONIMO = ? ";
    $param = [ $Identificativo ];
    
    $rs = $db->executeDirectQueryPar( $query, $param );
    if( $rs ){
        $rows = $rs->GetRows(-1);
        foreach( $rows as $row ){
            $risposta = [
                "esito" => "OK",
                "record" => $row
            ];
        }
    }
    
    // Restituisco la risposta in formato JSON
    //
    echo json_encode( $risposta );
    
}



function griglia_selezione(){
    
    // Intestazione HTML
    //
    ?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="UTF-8">
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        
        <!-- Icona applicazione -->
        <link rel="shortcut icon" href="<?= URL_ROOT_ADDRESS; ?>/favicon.ico" />
        <link rel="icon" href="<?= URL_ROOT_ADDRESS; ?>/favicon.ico" />
        
        <!-- jQuery -->
        <link rel="stylesheet" type="text/css" href="<?= URL_ROOT_ADDRESS; ?>/css/custom-theme/jquery-ui.min.css" />
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jquery-ui.min.js"></script>
        
        <!-- Librerie Delta -->
        <link rel="stylesheet" type="text/css" href="<?= URL_ROOT_ADDRESS; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= URL_ROOT_ADDRESS; ?>/css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/delta_dialog_o.js"></script>

        <title>Seleziona Identificativo</title>
        <style>
        </style>
        <script>
            
            $(function(){
                
                delta_dialog.SetOptions({
                    title: "Seleziona Identificativo",
                    width: 800,
                    height: 850,
                    position: "center"
                });
                
            });
            
            function DoubleClick(sender,args){
                var row = args["Row"];
                var dataitem = row.getDataItem();
                delta_dialog.close("select",dataitem);
            }
            
        </script>
    </head>
    <body>

        <?
    
    // Inizializzazione KOOLGRID
    //
    require_once "../KoolControls/KoolGrid/koolgrid.php";
    require_once "../KoolControls/KoolAjax/koolajax.php";
    require_once "../config.php";
    $koolajax->scriptFolder = "../KoolControls/KoolAjax";
    $ds = creaKoolGridConnection("JOB_PROGRESS");
    $ds->SelectCommand = "select    COMMESSA_0, ACRONIMO, PJDESZONA, D_CLIENTE
                        from      WEB_MOVCPJ_lv0";
    
    $grid = new \KoolGrid("grid");
    $grid->scriptFolder = "../KoolControls/KoolGrid";
    $grid->styleFolder="delta_blu";
    $grid->DataSource = $ds;
    $grid->AjaxEnabled = true;
    $grid->PageSize = 20;
    $grid->RowAlternative = true;
    $grid->AllowSorting = true;
    $grid->AllowFiltering = true;
    $grid->AllowSelecting=true;
    $grid->ColumnWrap=true;
    $grid->Localization->Load("KoolControls/KoolGrid/localization/".$_SESSION["language_select"].".xml");
    $grid->MasterTable->Pager = new \GridPrevNextAndNumericPager();
    $grid->MasterTable->Pager->ShowPageSize = true;
    $grid->MasterTable->MultiSortingOrder = "LCFS"; // Last click first sort
    $grid->ClientSettings->ClientEvents["OnRowDoubleClick"] = "DoubleClick";
    $grid->ClientSettings->ClientEvents["OnLoad"] = "grid_OnLoad";
    
    class Grid_EventHandler extends \GridEventHandler{
        function OnRowPreRender($row,$args){
        }
    }
    $grid->EventHandler = new Grid_EventHandler();

    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "ACRONIMO";
    $col->HeaderText = "Acronimo progetto compilabile";
    $col->Width = "90px";
    $col->Filter = array("Value"=>"","Exp"=>"Contain");
    $grid->MasterTable->AddColumn($col);
    
    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "D_CLIENTE";
    $col->HeaderText = "Ragione Sociale Cliente";
    $col->Width = "300px";
    $col->Filter = array("Value"=>"","Exp"=>"Contain");
    $grid->MasterTable->AddColumn($col);

    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "PJDESZONA";
    $col->HeaderText = "Area";
    $col->Width = "90px";
    $col->Filter = array("Value"=>"","Exp"=>"Contain");
    $grid->MasterTable->AddColumn($col);

    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "COMMESSA_0";
    $col->HeaderText = "Numero Supercommessa";
    $col->Width = "90px";
    $col->Filter = array("Value"=>"","Exp"=>"Contain");
    $grid->MasterTable->AddColumn($col);

    $grid->Process();
    echo $koolajax->Render();
    ?>
    <div id="my-tooltip"></div>
    <form id="form1" method="post">
        <? echo $grid->Render(); ?>
    </form>
    <?
    
}


function test(){
    ?><!DOCTYPE html>
<html>
    <head>
        <!-- jQuery -->
        <link rel="stylesheet" type="text/css" href="<?= URL_ROOT_ADDRESS; ?>/css/custom-theme/jquery-ui.min.css" />
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jsDatePick.min.1.3.js"></script>
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/jquery-ui.min.js"></script>
        <!-- Librerie Delta -->
        <script type="text/javascript" src="<?= URL_ROOT_ADDRESS; ?>/js/delta_dialog_o.js"></script>
    </head>
    <body>
        <input id="Identificativo" name="Identificativo">
        <?
        $p = new Identificativi("test");
        $p->input_Identificativo = "Identificativo";
        $p->output_Identificativo = "Identificativo";
        $p->output_Descrizione = "Descrizione";
        $p->crea_select();
        $p->crea_controllo();
        ?>
        <input id="Descrizione" name="Descrizione">
    </body>
</html>
    <?
}