<?
namespace Articoli;

// Eseguo il codice solo se è stata richiamata la pagina da sola
//
if( strtolower( basename( $_SERVER["PHP_SELF"] ) ) == strtolower( basename( __FILE__ ) ) ){
    
    session_start();
    require_once("../toscotec_commesse.conf.php");
    require_once("../include/utility.php");
    require_once(CONFIG_FILE);
    require_once(CLASS_REQUEST_UTILS);
    require_once(CLASS_DATABASE_QUERY);

    $op = $_REQUEST["op"];
    $tipo_articolo_disegno = "";
    if($_REQUEST["tipo_articolo_disegno"]){
        $tipo_articolo_disegno = $_REQUEST["tipo_articolo_disegno"];
    }

    switch( $op ){
        case "check": verifica_codice(); break;
        case "select": griglia_selezione($tipo_articolo_disegno); break;
        case "test": test(); break;
    }
    
}

// =============================================================================
class Articoli{
    
    public $id = false;
    
    public $input_CDPAR = false;
    
    public $output_CDPAR = false;
    public $output_CDPAR_TRIM = false;
    public $output_DEPAR = false;
    
    public $function_selected      = false;
    public $function_check_error   = false;
    public $function_check_success = false;
    
    public $controlla_subito = false;
    
    public $tipo_articolo_disegno = false;
    
    public function __construct( $id ){
        $this->id = $id;
    }
    
    public function crea_dettaglio(){
        ?>
        <img src="<?=URL_ROOT_ADDRESS;?>/images/detail.png" style="cursor:pointer;vertical-align: middle;width: 20px;height: 20px;" id="CDPAR-<?=$this->id;?>-button-dett">
        <script>
            $(function(){
                $("#CDPAR-<?=$this->id;?>-button-dett").click(function(){
                    var CDPAR = $("#<?=$this->input_CDPAR;?>").val();
                    if( $.trim(CDPAR) == "" ){
                        return false;
                    }
                    var par = {
                        CDPAR: $("#<?=$this->input_CDPAR;?>").val()
                    };
                    delta_dialog.openDialog({
                        url: "<?=URL_ROOT_ADDRESS;?>/editArticoli.php?"+$.param(par)
                    });
                });
            });
        </script>
        <?
    }
    
    public function crea_controllo(){
        ?>
        <script>
            var <?=$this->id;?>_ajax = [];
            var <?=$this->id;?>_davalidare = true;
            var <?=$this->id;?>_valida = false;
            var <?=$this->id;?>_CDPAR = false;
            var <?=$this->id;?>_CDPAR_TRIM = false;
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
                <? if($this->output_CDPAR_TRIM){ ?>
                else if( <?=$this->id;?>_CDPAR_TRIM != $("#<?=$this->output_CDPAR_TRIM;?>").val() ){
                    esegui_controllo_<?=$this->id;?>("sync");
                }
                <? } ?>
                
                return <?=$this->id;?>_valida;
                
            }

            function esegui_controllo_<?=$this->id;?>( sync ){
                
                <?=$this->id;?>_davalidare = true;
                <?=$this->id;?>_valida = false;
                <?=$this->id;?>_CDPAR = false;
                <?=$this->id;?>_CDPAR_TRIM = false;
                <?=$this->id;?>_controllo_in_corso = true;
                $("#<?=$this->input_CDPAR;?>").removeClass("errore");
                
                async = true;
                if( sync == "sync" ){
                    async = false;
                    for( var i in <?=$this->id;?>_ajax ){
                        <?=$this->id;?>_ajax[i].abort();
                    }
                    <?=$this->id;?>_ajax = [];
                }
                
                var req = $.ajax({
                    url: "<?=URL_ROOT_ADDRESS;?>/Select/selectArticoli.php",
                    data:{
                        op: "check",
                        CDPAR: $("#<?=$this->input_CDPAR;?>").val()
                    },
                    type: "post",
                    async: async,
                    dataType: "json",
                    success: function(data){
                        <?=$this->id;?>_controllo_in_corso = false;
                        <?=$this->id;?>_davalidare = false;
                        if( data.esito=="OK" ){
                            var record = data.record;
                            <? if($this->output_CDPAR){ ?>
                                $("#<?=$this->output_CDPAR;?>").val(record.CDPAR);
                            <? } ?>
                            <? if($this->output_CDPAR_TRIM){ ?>
                                $("#<?=$this->output_CDPAR_TRIM;?>").val(record.CDPAR_TRIM);
                            <? } ?>
                            <? if($this->output_DEPAR){ ?>
                                $("#<?=$this->output_DEPAR;?>").val(record.DEPAR);
                            <? } ?>
                            <?=$this->id;?>_valida = true;
                            <?=$this->id;?>_CDPAR = record.CDPAR;
                            <?=$this->id;?>_CDPAR_TRIM = record.CDPAR_TRIM;
                            <? if($this->function_check_success){ ?>
                                <?=$this->function_check_success;?>(record);
                            <? } ?>
                        }
                        else{
                            <?=$this->id;?>_valida = false;
                            <?=$this->id;?>_CDPAR = $("#<?=$this->input_CDPAR;?>").val();
                            <?=$this->id;?>_CDPAR_TRIM = $("#<?=$this->input_CDPAR;?>").val();
                            $("#<?=$this->input_CDPAR;?>").addClass("errore");
                            <? if($this->function_check_error){ ?>
                                <?=$this->function_check_error;?>();
                            <? } ?>
                        }
                    },
                    error: function( jqXHR, status, error ){
                        if( status == "abort" ){
                            return false;
                        }
                        <? if($this->function_check_error){ ?>
                            <?=$this->function_check_error;?>();
                        <? } ?>
                        <?=$this->id;?>_valida = false;
                        <?=$this->id;?>_CDPAR = false;
                        <?=$this->id;?>_CDPAR_TRIM = false;
                        <?=$this->id;?>_controllo_in_corso = $("#<?=$this->input_CDPAR;?>").val();
                        <?=$this->id;?>_davalidare = false;
                        $("#<?=$this->input_CDPAR;?>").addClass("errore");
                    }
                });
                <?=$this->id;?>_ajax.push(req);
            }
            $(function(){
                $("#<?=$this->input_CDPAR;?>").change(function(){
                    esegui_controllo_<?=$this->id;?>();
                });
                $("#<?=$this->input_CDPAR;?>").on("input",function(){
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
        <img class="cerca-button" src="<?=URL_ROOT_ADDRESS;?>/images/cerca.jpg" style="cursor:pointer;vertical-align: middle;width: 20px;height: 20px;" id="CDPAR-<?=$this->id;?>-button">
        <script>
            $(function(){
                $("#CDPAR-<?=$this->id;?>-button").click(function(){
                    var par = {
                        op: "select",
                    <? if($this->option_master_plant){ ?>
                        master_plan: "S",
                    <? }?>
                    <? if($this->tipo_articolo_disegno){?>
                       tipo_articolo_disegno: "D", 
                    <?}?>
                    };
                    delta_dialog.openDialog({
                        url: "<?=URL_ROOT_ADDRESS;?>/Select/selectArticoli.php?"+$.param(par),
                        actions:{
                            "select": function(record){
                                <? if($this->output_CDPAR){ ?>
                                    $("#<?=$this->output_CDPAR;?>").val(record.CDPAR).change();
                                <? } ?>
                                <? if($this->output_CDPAR_TRIM){ ?>
                                    $("#<?=$this->output_CDPAR_TRIM;?>").val(record.CDPAR_TRIM).change();
                                <? } ?>
                                <? if($this->output_DEPAR){ ?>
                                    $("#<?=$this->output_DEPAR;?>").val(record.DEPAR);
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
    $CDPAR = $_REQUEST["CDPAR"];
    $CDPAR = strtoupper( sprintf("%15s",trim($CDPAR)) );
    
    // Leggo i dati dal DB
    //
    $db = \open_DatabaseQuery("JOB_PROGRESS");
    $row = legge_record_articolo( $db, $CDPAR );
    if( $row ){
        $risposta = [
            "esito" => "OK",
            "record" => $row
        ];
    }
    
    // Restituisco la risposta in formato JSON
    //
    echo json_encode( $risposta );
    
}

function legge_record_articolo( $db, $CDPAR ){
    $record = false;
    
    if($db==false){
        $db = \open_DatabaseQuery("JOB_PROGRESS");
    }
    $query = "select    CDPAR,
                        DEPAR
              from      Toscotec_produzione..ACG_ANPA200F
              where     ATA26 = '' and
                        CDPAR = ? ";
    $param = [
        $CDPAR
    ];
    $rs = $db->executeDirectQueryPar( $query, $param );
    if( $rs ){
        $rows = $rs->GetRows(-1);
        foreach( $rows as $row ){
            $record = $row;
        }
    }
    
    return $record;
    
}



function griglia_selezione($tipo_articolo_disegno=false){
    
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

        <title>Seleziona articolo</title>
        <style>
            #my-tooltip{
                border: 1px solid #aaa;
                border-radius: 5px;
                box-shadow: -3px -3px 12px 0 rgb(0 0 0 / 50%);
                width: 400px;
                min-height: 80px;
                position: absolute;
                top: 100px;
                left: 20px;
                background-color: #fff8e7;
                display: none;
                z-index: 10;
            }
            .defaultKGR .kgrCell{
                position: relative;
            }
            .defaultKGR .kgrCell .ui-icon-grip-diagonal-se{
                position: absolute;
                bottom: 0px;
                right: 0px;
            }
            .defaultKGR tbody .kgrIn{
                max-height: 20px;
            }
        </style>
        <script>
            
            $(function(){
                
                delta_dialog.SetOptions({
                    title: "Seleziona articolo",
                    width: 700,
                    height: 800,
                    position: "center"
                });
                
                attiva_tooltip();
                
                $(document).on("mouseenter",".my-tooltip-el",function(){
                    
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();
                    
                    var position = $(this).offset();
                    var width = $(this).outerWidth()+100;
                    var html = $(this).find(".kgrIn").html();
                    var left = position.left-100;
                    var top = position.top + $(this).outerHeight();
                    $("#my-tooltip").show();
                    $("#my-tooltip").html(html);
                    $("#my-tooltip").css({
                        left: left+"px",
                        top: top+"px",
                        width: width+"px"
                    });
                    
                    var e_height = $("#my-tooltip").outerHeight();
                    if( top+e_height>viewportBottom ){
                        top = position.top-e_height;
                        $("#my-tooltip").css({
                            top: top+"px",
                        });
                    }
                    
                });
                $(document).on("mouseleave",".my-tooltip-el",function(){
                    $("#my-tooltip").hide();
                });
                
            });
            
            function DoubleClick(sender,args){
                var row = args["Row"];
                var dataitem = row.getDataItem();
                delta_dialog.close("select",dataitem);
            }
            function attiva_tooltip(){
                $(".multiline").each(function(){
                    var el = $(this).children(".kgrIn");
                    if( el.prop("offsetHeight") < el.prop("scrollHeight") || el.prop("offsetWidth") < el.prop("scrollWidth") ){
                        var testo = $.trim(el.text());
                        if(testo!=""){
                            //$(this).attr("title",$(this).text());
                            $(this).append("<span class='ui-icon ui-icon-grip-diagonal-se'></span>");
                        }
                        $(this).addClass("my-tooltip-el");//.tooltip();
                    }
                    $(this).removeClass("multiline");//.tooltip();
                });
            };
            function grid_OnLoad(sender,args){
                attiva_tooltip();
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
    $ds->SelectCommand = "select    CDPAR,
                                    DEPAR
                          from      Toscotec_produzione..ACG_ANPA200F
                          where     ATA26 = ''";

    if($tipo_articolo_disegno){
        $ds->SelectCommand .= " where PATART = '$tipo_articolo_disegno'";
    }
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
            $PADEXE_righe = explode("§",$row->DataItem["PADEXE"]);
            $PADEXE_righe_2=[];
            foreach( $PADEXE_righe as $riga ){
                $valori = explode(":",$riga);
                if(count($valori)==2){
                    $valori[0]="<i>".$valori[0]."</i>";
                    $valori[1]="<b>".$valori[1]."</b>";
                    $PADEXE_righe_2[] = implode(" : ", $valori);
                }
                else{
                    $PADEXE_righe_2[] = $riga;
                }
            }
            $row->DataItem["PADEXE"] = implode("<br>", $PADEXE_righe_2 );
        }
    }
    $grid->EventHandler = new Grid_EventHandler();

    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "CDPAR";
    $col->HeaderText = "Codice";
    $col->Width = "90px";
    $col->Filter = array("Value"=>"","Exp"=>"Contain");
    $grid->MasterTable->AddColumn($col);
    
    $col = new \GridBoundColumn();
    $col->NullDisplayText = " ";
    $col->DataField = "DEPAR";
    $col->HeaderText = "Descrizione";
    $col->Width = "300px";
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
        <table>
            <tr>
                <th>Codice</th>
                <td>
                    <input id="CODICE" name="CODICE">
                    <?
                    $p = new Articoli("test");
                    $p->input_CDPAR = "CODICE";
                    $p->output_CDPAR = "CODICE";
                    $p->output_DEPAR = "DESCRIZIONE";
                    $p->crea_select();
                    $p->crea_controllo();
                    ?>
                </td>
            </tr>
            <tr>
                <th>Descrizione</th>
                <td><input id="DESCRIZIONE" disabled></td>
            </tr>
        </table>
    </body>
</html>
    <?
}
