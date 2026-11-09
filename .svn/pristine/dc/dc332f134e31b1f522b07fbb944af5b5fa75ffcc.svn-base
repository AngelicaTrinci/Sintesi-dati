<?
set_time_limit(0);
$title="Elenco Sintesi_dati_progetto";
include "header.php";
$_SESSION["language_select"]="it";
require_once "KoolControls/KoolGrid/koolgrid.php";
require_once "KoolControls/KoolAjax/koolajax.php";
require_once "config.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
//include_once "add_colonna.php";

$ricambi_da = requestUtils::getRequestObject("ricambi_da");
$ricambi_a = requestUtils::getRequestObject("ricambi_a");
$ricambi_def_da = requestUtils::getRequestObject("ricambi_def_da");
$ricambi_def_a = requestUtils::getRequestObject("ricambi_def_a");
$macchine_da = requestUtils::getRequestObject("macchine_da");
$macchine_a = requestUtils::getRequestObject("macchine_a");
?>
<style>
.kgrSortHeaderText {
    color: black !important;
}
#grid_mt_c1_hd,
#grid_mt_c2_hd,
#grid_mt_c3_hd,
#grid_mt_c4_hd,
#grid_mt_c5_hd,
#grid_mt_c6_hd,
#grid_mt_c7_hd,
#grid_mt_c8_hd,
#grid_mt_c9_hd,
#grid_mt_c10_hd
{
    /* Generali */
    background: #ffff00 !important;
    color: black !important;
}
#grid_mt_c11_hd,
#grid_mt_c12_hd,
#grid_mt_c13_hd,
#grid_mt_c14_hd,
#grid_mt_c15_hd,
#grid_mt_c16_hd,
#grid_mt_c17_hd,
#grid_mt_c18_hd,
#grid_mt_c19_hd,
#grid_mt_c20_hd,
#grid_mt_c21_hd,
#grid_mt_c22_hd,
#grid_mt_c23_hd,
#grid_mt_c24_hd
{
    /* 7 */
    background: #ffc000 !important;
}
#grid_mt_c25_hd,
#grid_mt_c26_hd,
#grid_mt_c27_hd
{
    /* Manualistica */
    background: #92d050 !important;
}
#grid_mt_c28_hd,
#grid_mt_c29_hd,
#grid_mt_c30_hd,
#grid_mt_c31_hd,
#grid_mt_c32_hd,
#grid_mt_c33_hd
{
    /* Training */
    background: #538dd5 !important;
    color: #ffff !important;
    
}
#grid_mt_c34_hd,
#grid_mt_c35_hd,
#grid_mt_c36_hd
{
    /* Fat */
    background: #ff0000 !important;
}
#grid_mt_c37_hd,
#grid_mt_c38_hd
{
    /* Ricambi */
    background: #e6b8b7 !important;
}
th.kgrHeader {
    height: 90px;
}
#delta-page {
    position: absolute;
    z-index: -9999;
    left: 10px;
    top: 45px;
    bottom: 0;
    right: 0;
    padding: 0;
}
#grid_mt {
    width: 100%;
    display: flex;
    flex-direction: column;
}
.kgrPartHeader {
    flex-shrink: 0;
}
.kgrSortHeaderText {
    line-height: 10px;
}
.kgrIn {
    font-size: 11px;
    line-height: 14px;
}
</style>
<?
/*
 * Per utilizzare una connessione diversa da quella predefinita
 * (vedi Connessioni e \deltamail\utenti\Comune_a_tutti\Manuali e Documentazione\PHP\Esecuzione Query.docx)
 *   $connessione = "ALTRA_CONNESSIONE";
 *   $ds = creaKoolGridConnection($connessione);
 */
$koolajax->scriptFolder = "KoolControls/KoolAjax";
$query = "SELECT
    Id_dati_progetto,
    Ragione_sociale_cliente,
    Area,
    FORMAT(Data_contratto, 'dd/MM/yyyy', 'it-IT') AS Data_contratto,
    Scopo_fornitura,
    Numero_supercommessa_job,
    Acronimo_progetto,
    Pm_tt,
    Pm_customer,
    Email,
    Delivery_address,

    CONCAT(FORMAT(Data_consegna_materiale, 'dd/MM/yyyy', 'it-IT'), ' ', Data_consegna_materiale_note) AS Data_consegna_mat,
    CONCAT(Termine_consegna, ' ', Termine_consegna_note) AS Termine_consegna,
    Dich_origine,
    Colori_macchina,
    CONCAT(Penali_su_consegna, ' ', Penali_su_consegna_note) AS Penali_consegna,

    CONCAT(FORMAT(Data_fine_smontaggio, 'dd/MM/yyyy', 'it-IT'), ' ', Data_fine_smontaggio_note) AS Data_fine_smont,
    CONCAT(FORMAT(Data_inizio_spedizione, 'dd/MM/yyyy', 'it-IT'), ' ', Data_inizio_spedizione_note) AS Data_inizio_sped,
    CONCAT(FORMAT(Data_inizio_montaggio, 'dd/MM/yyyy', 'it-IT'), ' ', Data_inizio_montaggio_note) AS Data_inizio_mont,

    CONCAT(FORMAT(Data_avviamento_da_contratto, 'dd/MM/yyyy', 'it-IT'), ' ', Data_avviamento_da_contratto_note) AS Data_avviamento_contr,
    CONCAT(FORMAT(Data_avviamento_atteso, 'dd/MM/yyyy', 'it-IT'), ' ', Data_avviamento_atteso_note) AS Data_avviamento_att,
    CONCAT(FORMAT(Data_avviamento_effettivo, 'dd/MM/yyyy', 'it-IT'), ' ', Data_avviamento_effettivo_note) AS Data_avv_effettivo,

    CONCAT(FORMAT(Data_mesi_accettazione, 'dd/MM/yyyy', 'it-IT'), ' ', Data_mesi_accettazione_note) AS Data_mesi_acc,
    CONCAT(FORMAT(Garanzia_meccanica_contrattuale, 'dd/MM/yyyy', 'it-IT'), ' ', Garanzia_meccanica_contrattuale_note) AS Garanzia_meccanica_contrattuale,
    CONCAT(FORMAT(Documentazione_contrattuale, 'dd/MM/yyyy', 'it-IT'), ' ', Documentazione_contrattuale_note) AS Documentazione_contrattuale,

    CONCAT(FORMAT(Data_primo_invio_doc_cliente, 'dd/MM/yyyy', 'it-IT'), ' ', Data_primo_invio_doc_cliente_note) AS Data_primo_invio,
    CONCAT(FORMAT(Data_estrazione_doc_site_manager, 'dd/MM/yyyy', 'it-IT'), ' ', Data_estrazione_doc_site_manager_note) AS Data_estrazione,
    CONCAT(FORMAT(Data_primo_invio_doc_disegni, 'dd/MM/yyyy', 'it-IT'), ' ', Data_primo_invio_doc_disegni_note) AS Data_invio_doc_disegni,

    CONCAT(Doc_training_tt_startup, ' ', Doc_training_tt_startup_note) AS Doc_training,
    CONCAT(Training_richiesto, ' ', Training_richiesto_note) AS Training_rich,
    CONCAT(FORMAT(Data_training, 'dd/MM/yyyy', 'it-IT'), ' ', Data_training_note) AS Data_train,

    Tipologia_training_richiesta,
    CONCAT(Incluso_pagamento, ' ', Incluso_pagamento_note) AS Incluso_pag,
    Lingua_training,
    CONCAT(Interno, ' ', Interno_note) AS Intern,
    CONCAT(Cliente, ' ', Cliente_note) AS Cli,
    CONCAT(Esterno, ' ', Esterno_note) AS Est,
    
    CONCAT(CASE WHEN Non_richiesta_preliminare = 'S' THEN 'Non richiesta ' ELSE '' END, FORMAT(Data_consegna_ricambi, 'dd/MM/yyyy', 'it-IT'), ' ', Data_consegna_ricambi_note) AS Data_consegna_ric,
    CONCAT(CASE WHEN Non_richiesta_definitiva = 'S' THEN 'Non richiesta ' ELSE '' END, FORMAT(Data_consegna_lista_ricambi_definitiva, 'dd/MM/yyyy', 'it-IT'), ' ', Data_consegna_lista_ricambi_definitiva_note) AS Data_consegna_ric_def

FROM sintesi_dati_progetto
WHERE 1=1 ";
if($ricambi_da) $query .= " AND Data_consegna_ricambi >= '" . $ricambi_da . "'";
if($ricambi_a) $query .= " AND Data_consegna_ricambi <= '" . $ricambi_a . "'";
if($ricambi_def_da) $query .= " AND Data_consegna_lista_ricambi_definitiva >= '" . $ricambi_def_da . "'";
if($ricambi_def_a) $query .= " AND Data_consegna_lista_ricambi_definitiva <= '" . $ricambi_def_a . "'";
if($macchine_da) $query .= " AND Data_inizio_spedizione >= '" . $macchine_da . "'";
if($macchine_a) $query .= " AND Data_inizio_spedizione <= '" . $macchine_a . "'";
$ds->SelectCommand = $query;
//$ds->SelectCommand = "SELECT * FROM sintesi_dati_progetto";
$grid = new KoolGrid("grid");
$grid->scriptFolder = "KoolControls/KoolGrid";
$grid->styleFolder=(defined("DEFAULT_KOOLGRID_STYLE")?DEFAULT_KOOLGRID_STYLE:"default");
$grid->DataSource = $ds;
$grid->AjaxEnabled = true;
$grid->Width = "calc(100vw - 40px)";
$grid->Height = "calc(100vh - 120px)";
$grid->PageSize = 20;
$grid->RowAlternative = true;
$grid->AllowSorting = true;
$grid->AllowFiltering = true;
$grid->AllowSelecting = true;
$grid->AllowResizing = false;
$grid->AllowScrolling = true;
$grid->AutoGenerateColumns = false;
$grid->ColumnWrap = false;
$grid->Localization->Load("KoolControls/KoolGrid/localization/".$_SESSION["language_select"].".xml");
$grid->MasterTable->Pager = new GridPrevNextAndNumericPager();
$grid->MasterTable->Pager->ShowPageSize = true; //visualizza la scelta per il numero righe paginazione
$grid->MasterTable->ShowFunctionPanel = true;
$grid->MasterTable->FunctionPanel->Position = "top";
$grid->MasterTable->TableLayout  = "fixed"; // Dimensione fissa griglia
$grid->MasterTable->MultiSortingOrder = "LCFS"; // Last click first sort
$grid->MasterTable->FrozenColumnsCount = 2;
//$grid->AllowGrouping = true;
//$grid->MasterTable->ShowGroupPanel = true;

//$grid->MasterTable->Height = "900px";
$grid->ShowFooter=false;
//$grid->MasterTable->FrozenColumnsCount = 2;

$grid->ClientSettings->ClientEvents["OnBeforeStartInsert"] = "OnBeforeStartInsert";
$grid->ClientSettings->ClientEvents["OnRowDoubleClick"] = "DoubleClick";
$col = new GridCommandColumn();
$col->CommandText = "Modifica";
$col->OnClick = "OpenEdit(\"{Id_dati_progetto}\");";
$col->Width = "35px";
//$col->CssClass = "ui-button ui-button-text-only ui-widget";
$grid->MasterTable->AddColumn($col);

add_colonna($grid->MasterTable, "Ragione_sociale_cliente", "RAGIONE SOCIALE CLIENTE", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Area", "AREA", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_contratto", "DATA CONTRATTO", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Scopo_fornitura", "SCOPO DI FORNITURA", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Numero_supercommessa_job", "NUMERO SUPERCOMMESSA /<br> JOB", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Acronimo_progetto", "ACRONIMO PROGETTO", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Pm_tt", "P.M. TT", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Pm_customer", "PM customer", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Email", "E-MAIL", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Delivery_address", "DELIVERY ADDRESS", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_consegna_mat", "DATA CONSEGNA MATERIALE", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Termine_consegna", "TERMINE CONSEGNA", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Dich_origine", "DICH ORIGINE", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Colori_macchina", "COLORI MACCHINA", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Penali_consegna", "PENALI SU CONSEGNA", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_fine_smont", "DATA FINE SMONTAGGIO <br>MACCHINA IN TOSCOTEC", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_inizio_sped", "DATA INIZIO <br>SPEDIZIONE <br>MACCHINA", ["larghezza"=>"100px"]);
add_colonna($grid->MasterTable, "Data_inizio_mont", "DATA INIZIO <br>MONTAGGIO", ["larghezza"=>"100px"]);
add_colonna($grid->MasterTable, "Data_avviamento_contr", "DATA DI <br>AVVIAMENTO <br>DA<br>CONTRATTO", ["larghezza"=>"100px"]);
add_colonna($grid->MasterTable, "Data_avviamento_att", "DATA DI <br>AVVIAMENTO <br>ATTESO", ["larghezza"=>"100px"]);
add_colonna($grid->MasterTable, "Data_avv_effettivo", "DATA <br>AVVIAMENTO <br>EFFETTIVO", ["larghezza"=>"100px"]);
add_colonna($grid->MasterTable, "Data_mesi_acc", "DATA / MESI <br>ENTRO CUI <br>OTTENERE<br> ACCETTAZIONE", ["larghezza"=>"120px"]);
add_colonna($grid->MasterTable, "Garanzia_meccanica_contrattuale", "GARANZIA <br>MECCANICA<br> CONTRATTUALE", ["larghezza"=>"140px"]);
add_colonna($grid->MasterTable, "Documentazione_contrattuale", "DOCUMENTAZIONE <br>CONTRATTUALE", ["larghezza"=>"150px"]);
add_colonna($grid->MasterTable, "Data_primo_invio", "DATA DI <br>PRIMO INVIO <br>DOCUMENTAZIONE<br> CLIENTE", ["larghezza"=>"190px"]);
add_colonna($grid->MasterTable, "Data_estrazione", "DATA DI <br>ESTRAZIONE <br>DOCUMENTAZIONE<br> SITE MANAGER", ["larghezza"=>"150px"]);
add_colonna($grid->MasterTable, "Data_invio_doc_disegni", "DATA DI <br>PRIMO INVIO <br>DOCUMENTAZIONE <br>PER DISEGNI<br> COSTRUTTIVI E <br>PROCUREMENT<br> CLIENTE", ["larghezza"=>"150px"]);
add_colonna($grid->MasterTable, "Doc_training", "Documentazione <br> per training <br> in TT/allo startup", ["larghezza"=>"150px"]);
add_colonna($grid->MasterTable, "Training_rich", "Training richiesto<br>NO<br>SI - in TT<br>SI - allo start-up /baby sitting", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_train", "Data training<br>-IN TT<br>-PRESSO CLIENTE", ["larghezza"=>"180px"]);
add_colonna($grid->MasterTable, "Tipologia_training_richiesta", "TIPOLOGIA DI TRAINING <br>RICHIESTO<br>-Manutentori<br>-Operatori<br>-Sicurezza", ["larghezza"=>"180px"]);
add_colonna($grid->MasterTable, "Incluso_pag", "INCLUSO / <br>A PAGAMENTO", ["larghezza"=>"120px"]);
add_colonna($grid->MasterTable, "Lingua_training", "LINGUA <br>TRAINING", ["larghezza"=>"80px"]);
add_colonna($grid->MasterTable, "Intern", "INTERNO", ["larghezza"=>"80px"]);
add_colonna($grid->MasterTable, "Cli", "CLIENTE", ["larghezza"=>"80px"]);
add_colonna($grid->MasterTable, "Est", "ESTERNO", ["larghezza"=>"80px"]);
add_colonna($grid->MasterTable, "Data_consegna_ric", "DATA CONSEGNA LISTA<br>RICAMBI PRELIMINARE", ["larghezza"=>"200px"]);
add_colonna($grid->MasterTable, "Data_consegna_ric_def", "DATA CONSEGNA LISTA<br>RICAMBI PREDEFINITA", ["larghezza"=>"120px"]);

$grid->ClientSettings->ClientEvents["OnBeforeGridCommit"] = "OnBeforeGridCommit";

$grid->Process();
if(isset($_POST["IgnorePaging"])) $grid->ExportSettings->IgnorePaging = true;
if(isset($_POST["Export"])&&$_POST["Export"]=='excel'){
    ob_end_clean();
    //$grid->GetInstanceMasterTable()->ExportToExcel();
    $db = open_DatabaseQuery();
    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    // Generale
    $activeWorksheet->mergeCells('A1:J1');
    $activeWorksheet->setCellValue("A1", "GENERALE");
    $activeWorksheet->getStyle('A1:J1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff00');
    $activeWorksheet->getStyle('A1:J1')->getFont()->setItalic(true);
    // 7
    $activeWorksheet->mergeCells("K1:AH1");
    $activeWorksheet->setCellValue("K1", "7");
    $activeWorksheet->getStyle('K1:AH1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffc000');
    $activeWorksheet->getStyle('K1:AH1')->getFont()->setItalic(true);
    // Manualistica
    $activeWorksheet->mergeCells("AI1:AN1");
    $activeWorksheet->setCellValue("AI1", "MANUALISTICA");
    $activeWorksheet->getStyle('AI1:AN1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('92d050');
    $activeWorksheet->getStyle('AI1:AN1')->getFont()->setItalic(true);
    // Training
    $activeWorksheet->mergeCells("AO1:AU1");
    $activeWorksheet->setCellValue("AO1", "Training");
    $activeWorksheet->getStyle('AO1:AU1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('538dd5');
    $activeWorksheet->getStyle('AO1:AU1')->getFont()->setItalic(true);
    // Fat
    $activeWorksheet->mergeCells("AV1:AX1");
    $activeWorksheet->setCellValue("AV1", "FAT");
    $activeWorksheet->getStyle('AV1:AX1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ff0000');
    $activeWorksheet->getStyle('AV1:AX1')->getFont()->setItalic(true);
    // Ricambi
    $activeWorksheet->mergeCells("AY1:BE1");
    $activeWorksheet->setCellValue("AY1", "RICAMBI");
    $activeWorksheet->getStyle('AY1:BE1')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('e6b8b7');
    $activeWorksheet->getStyle('AY1:BE1')->getFont()->setItalic(true);

    $intestazione = [];
    $intestazione = [
        "Ragione sociale cliente",
        "Area",
        "Data contratto",
        "Scopo fornitura",
        "Numero supercommessa / job",
        "Acronimo progetto",
        "Pm tt",
        "Pm customer",
        "Email",
        "Delivery address",
        "Data consegna materiale",
        "Data consegna materiale note",
        "Termine consegna",
        "Dich origine",
        "Colori macchina",
        "Penali su consegna",
        "Data fine smontaggio",
        "Data fine smontaggio note",
        "Data inizio spedizione",
        "Data inizio spedizione note",
        "Data inizio montaggio",
        "Data inizio montaggio note",
        "Data avviamento da contratto",
        "Data avviamento da contratto note",
        "Data avviamento atteso",
        "Data avviamento atteso note",
        "Data avviamento effettivo",
        "Data avviamento effettivo note",
        "Data mesi accettazione",
        "Data mesi accettazione note",
        "Garanzia meccanica contrattuale",
        "Garanzia meccanica contrattuale note",
        "Documentazione contrattuale",
        "Documentazione contrattuale note",
        "Data primo invio doc cliente",
        "Data primo invio doc cliente note",
        "Data estrazione doc site manager",
        "Data estrazione doc site manager note",
        "Data primo invio doc disegni",
        "Data primo invio doc disegni note",
        "Doc training tt startup",
        "Training richiesto",
        "Data training",
        "Data training note",
        "Tipologia training richiesta",
        "Incluso pagamento",
        "Lingua training",
        "Interno",
        "Cliente",
        "Esterno",
        "Data consegna ricambi",
        "Data consegna ricambi note",
        "Data consegna lista ricambi definitiva",
        "Data consegna lista ricambi definitiva note"
    ];
    $activeWorksheet->fromArray($intestazione, NULL, "A2");
    $activeWorksheet->getStyle('A2:J2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff00');

    $activeWorksheet->getStyle('K2:AH2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffc000');

    $activeWorksheet->getStyle('AI2:AN2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('92d050');

    $activeWorksheet->getStyle('AO2:AU2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('538dd5');

    $activeWorksheet->getStyle('AV2:AX2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ff0000');

    $activeWorksheet->getStyle('AY2:BE2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('e6b8b7');

    $styleArray = [
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => 'FFFF0000'],
        ],
    ],
    'font' => [
        'bold' => true,
    ],
];
$spreadsheet->getActiveSheet()->getStyle('A2:BE2')
    ->getAlignment()->setWrapText(true);

$activeWorksheet->getStyle('A2:BE2')->applyFromArray($styleArray);
    $num = 3;
    foreach($ds->GetData() as $riga) {
        $query = "SELECT 
            Id_dati_progetto,
            Data_consegna_materiale,
            Data_consegna_materiale_note,
            Termine_consegna,
            Termine_consegna_note,
            Penali_su_consegna,
            Penali_su_consegna_note,
            Data_fine_smontaggio,
            Data_fine_smontaggio_note,
            Data_inizio_spedizione,
            Data_inizio_spedizione_note,
            Data_inizio_montaggio,
            Data_inizio_montaggio_note,
            Data_avviamento_da_contratto,
            Data_avviamento_da_contratto_note,
            Data_avviamento_atteso,
            Data_avviamento_atteso_note,
            Data_avviamento_effettivo,
            Data_avviamento_effettivo_note,
            Data_mesi_accettazione,
            Data_mesi_accettazione_note,
            Garanzia_meccanica_contrattuale,
            Garanzia_meccanica_contrattuale_note,
            Documentazione_contrattuale,
            Documentazione_contrattuale_note,
            Data_primo_invio_doc_cliente,
            Data_primo_invio_doc_cliente_note,
            Data_estrazione_doc_site_manager,
            Data_estrazione_doc_site_manager_note,
            Data_primo_invio_doc_disegni,
            Data_primo_invio_doc_disegni_note,
            Data_training,
            Data_training_note,
            Non_richiesta_preliminare,
            Data_consegna_ricambi,
            Data_consegna_ricambi_note,
            Non_richiesta_preliminare,
            Non_richiesta_definitiva,
            Data_consegna_lista_ricambi_definitiva,
            Data_consegna_lista_ricambi_definitiva_note
        FROM sintesi_dati_progetto
        WHERE Id_dati_progetto =" . $riga["Id_dati_progetto"];
        $rs = $db->executeDirectQuery($query);
        if(!$rs) {
            die("Errore durante il recupero dei dati");
        }
        $dbRighe = $rs->GetRows(-1);
        
        foreach($dbRighe as $dbDati) {
            if($dbDati["Penali_su_consegna"] == 'S') {
                $penali = "Si";
            } else if($dbDati["Penali_su_consegna"] == 'N') {
                $penali = "No";
            } else {
                $penali = "";
            }
            $res = [
                $riga["Ragione_sociale_cliente"],
                $riga["Area"],
                $riga["Data_contratto"],
                $riga["Scopo_fornitura"],
                $riga["Numero_supercommessa_job"],
                $riga["Acronimo_progetto"],
                $riga["Pm_tt"],
                $riga["Pm_customer"],
                $riga["Email"],
                $riga["Delivery_address"],
                ($dbDati["Data_consegna_materiale"]) ? date("d/m/Y", strtotime($dbDati["Data_consegna_materiale"])) : "",
                $dbDati["Data_consegna_materiale_note"],
                $dbDati["Termine_consegna"] . " " . $dbDati["Termine_consegna_note"],
                $riga["Dich_origine"],
                $riga["Colori_macchina"],
                $penali . " " . $dbDati["Penali_su_consegna_note"],
                ($dbDati["Data_fine_smontaggio"]) ? date("d/m/Y", strtotime($dbDati["Data_fine_smontaggio"])) : "",
                $dbDati["Data_fine_smontaggio_note"],
                ($dbDati["Data_inizio_spedizione"]) ? date("d/m/Y", strtotime($dbDati["Data_inizio_spedizione"])) : "",
                $dbDati["Data_inizio_spedizione_note"],
                ($dbDati["Data_inizio_montaggio"]) ? date("d/m/Y", strtotime($dbDati["Data_inizio_montaggio"])) : "",
                $dbDati["Data_inizio_montaggio_note"],
                ($dbDati["Data_avviamento_da_contratto"]) ? date("d/m/Y", strtotime($dbDati["Data_avviamento_da_contratto"])) : "",
                $dbDati["Data_avviamento_da_contratto_note"],
                ($dbDati["Data_avviamento_atteso"]) ? date("d/m/Y", strtotime($dbDati["Data_avviamento_atteso"])) : "",
                $dbDati["Data_avviamento_atteso_note"],
                ($dbDati["Data_avviamento_effettivo"]) ? date("d/m/Y", strtotime($dbDati["Data_avviamento_effettivo"])) : "",
                $dbDati["Data_avviamento_effettivo_note"],
                ($dbDati["Data_mesi_accettazione"]) ? date("d/m/Y", strtotime($dbDati["Data_mesi_accettazione"])) : "",
                $dbDati["Data_mesi_accettazione_note"],
                ($dbDati["Garanzia_meccanica_contrattuale"]) ? date("d/m/Y", strtotime($dbDati["Garanzia_meccanica_contrattuale"])) : "",
                $dbDati["Garanzia_meccanica_contrattuale_note"],
                ($dbDati["Documentazione_contrattuale"]) ? date("d/m/Y", strtotime($dbDati["Documentazione_contrattuale"])) : "",
                $dbDati["Documentazione_contrattuale_note"],
                ($dbDati["Data_primo_invio_doc_cliente"]) ? date("d/m/Y", strtotime($dbDati["Data_primo_invio_doc_cliente"])) : "",
                $dbDati["Data_primo_invio_doc_cliente_note"],
                ($dbDati["Data_estrazione_doc_site_manager"]) ? date("d/m/Y", strtotime($dbDati["Data_estrazione_doc_site_manager"])) : "",
                $dbDati["Data_estrazione_doc_site_manager_note"],
                ($dbDati["Data_primo_invio_doc_disegni"]) ? date("d/m/Y", strtotime($dbDati["Data_primo_invio_doc_disegni"])) : "",
                $dbDati["Data_primo_invio_doc_disegni_note"],
                $riga["Doc_training_tt_startup"] . ' ' . $riga["Doc_training_tt_startup_note"],
                $riga["Training_richiesto"] . " " . $riga["Training_richiesto_note"],
                ($riga["Data_training"]) ? date("d/m/Y", strtotime($riga["Data_training"])) : "",
                $riga["Data_training_note"],
                $riga["Tipologia_training_richiesta"],
                $riga["Incluso_pagamento"] . " " . $riga["Incluso_pagamento_note"],
                $riga["Lingua_training"],
                $riga["Interno"] . " " . $riga["Interno_note"],
                $riga["Cliente"] . " " . $riga["Cliente_note"],
                $riga["Esterno"] . " " . $riga["Esterno_note"],
                ($dbDati["Non_richiesta_preliminare"] == 'S' ? 'Non richiesta ' : '') . ($dbDati["Data_consegna_ricambi"]) ? date("d/m/Y", strtotime($dbDati["Data_consegna_ricambi"])) : "" ,
                $dbDati["Data_consegna_ricambi_note"],
                ($dbDati["Non_richiesta_definitiva"] == 'S' ? 'Non richiesta ' : '') . ($dbDati["Data_consegna_lista_ricambi_definitiva"]) ? date("d/m/Y", strtotime($dbDati["Data_consegna_lista_ricambi_definitiva"])) : "" ,
                $dbDati["Data_consegna_lista_ricambi_definitiva_note"]
            ];
            $activeWorksheet->fromArray($res, NULL, "A$num");
            $num++;
        }
    }
    $highestColumn = $activeWorksheet->getHighestColumn();
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

$maxWidth = 20;

// Prima abilitiamo autosize su tutte le colonne
for ($col = 1; $col <= $highestColumnIndex; $col++) {
    $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
    $activeWorksheet->getColumnDimension($columnLetter)->setAutoSize(true);
}

// Poi calcoliamo UNA SOLA VOLTA
$activeWorksheet->calculateColumnWidths();

// Ora applichiamo il limite massimo
foreach (range(1, $highestColumnIndex) as $col) {
    $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);

    $dimension = $activeWorksheet->getColumnDimension($columnLetter);

    if ($dimension->getWidth() > $maxWidth) {
        $dimension->setAutoSize(false); // disabilita autosize
        $dimension->setWidth($maxWidth);
    }
}

    $activeWorksheet->freezePane('G1');
    /*$activeWorksheet->getStyle('A1:BE' . $num)
    ->getAlignment()->setWrapText(true);*/
    $writer = new Xlsx($spreadsheet);
        // Header per forzare il download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="sintesi_dati_progetto.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
        exit;
}
if(isset($_POST["Export"])&&$_POST["Export"]=='word'){
    ob_end_clean();
    $grid->GetInstanceMasterTable()->ExportToWord();
}
if(isset($_POST["Export"])&&$_POST["Export"]=='csv'){
    ob_end_clean();
    $grid->GetInstanceMasterTable()->ExportToCSV();
}
if(isset($_POST["Export"])&&$_POST["Export"]=='pdf'){
    ob_end_clean();
    $grid->GetInstanceMasterTable()->ExportToPDF();
}
?>
<?php echo $koolajax->Render();?>
<style>
    .button-bar{
    
    box-shadow: inset 0 0 3px rgba(0,0,0,.5);
    padding: 3px;
    background-color: #ddd;
    margin: 0 0 10px 0;
    position: relative;
    
}

.button-bar,
.nutton-bar *{
    font-family: tahoma, verdana, arial, sans-serif;
	font-size: 14px;
}

.button-bar button, 
.button-bar button.ui-button {

    vertical-align: middle;
    border-radius: 3px;
    font-weight: bold;
    font-size: 1em;
    cursor: pointer;
    padding: 3px 10px;
    color: #444;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    background-image: none;
}


.button-bar .gruppo {
    display: inline-block;
}

.button-bar .gruppo.right{
    position: absolute;
    right: 5px;
    top: 0;
}
.button-bar.quadrato .gruppo.right{
    top: 3px;
}

.button-bar .gruppo h1 {
    display: inline-block;
    font-size:.8em;
    font-weight: normal;
}

.button-bar .sep {
    display: inline-block;
    border-left:1px dotted #aaa;
    height:20px;
    vertical-align: middle;
    margin: 0 3px;
}

.button-bar button {
    background-color: #fff;
    border: 1px solid #aaa;
}
.button-bar button:hover {
    border: 1px solid #888;
}

.button-bar button:hover {
    box-shadow: 0 0 2px rgba(0,0,0,.4);
    background-color: #ffffd3;
    border-color: #aaa;
}

.button-bar button:hover:active {
    box-shadow: inset 0 0 2px rgba(0,0,0,1);
    background-color: #ffffff;
    border-color: #999;
    transform: translateY(1px);
}

.button-bar button .icona{
    display: inline-block;
    vertical-align: middle;
    width: 18px;
    height: 18px;
    background-size: cover;
    background-repeat: no-repeat;
    margin-right: 5px;
}

.button-bar.quadrato button,
button.quadrato {
    min-width: 60px;
    padding: 5px 10px;
    font-size: .8em;
}

.button-bar.quadrato button .icona,
button.quadrato .icona {
    display: block;
    margin: 0 auto 5px auto;
}

.button-bar .icona.checked{
    background-image: url(./images/checked.png);
}
.button-bar .icona.delete{
    background-image: url(./images/delete.png);
}
.button-bar .icona.refresh{
    background-image: url(./images/refresh.png);
}
.button-bar .icona.add{
    background-image: url(./images/add.png);
}
.button-bar .icona.import{
    background-image: url(./images/import.png);
}
.button-bar .icona.lista{
    background-image: url(./images/list.png);
}
.button-bar .icona.search{
    background-image: url(./images/search.png);
}
</style>
<form id="form1" method="post">
    <div class="button-bar quadrato">
        <label>Data consegna lista ricambi preliminare da</label>
        <input type="date" name="ricambi_da" id="ricambi_da">
        <label> - a</label>
        <input type="date" name="ricambi_a" id="ricambi_a">
        <label style="margin-left: 20px;">Data consegna lista ricambi definitiva da</label>
        <input type="date" name="ricambi_def_da" id="ricambi_def_da">
        <label> - a</label>
        <input type="date" name="ricambi_def_a" id="ricambi_def_a">
        <label style="margin-left: 20px;">Inizio sped. macchine da</label>
        <input type="date" name="macchine_da" id="macchine_da">
        <label> - a</label>
        <input type="date" name="macchine_a" id="macchine_a">
        <button type="button" id="esegui-filtro-button" onclick="aggiorna()" style="margin-left: 2px;"><span class="icona search"></span>Filtra</button>
        <button type="button" id="pulisci-filtro-button" onclick="pulisci()"><span class="icona delete"></span>Pulisci</button>
    </div> 
    <script type="text/javascript">
        function OnBeforeStartInsert(sender,args){
            if( typeof delta_dialog != "undefined" ){
                delta_dialog.openDialog({
                    url:"editSintesi_dati_progetto.php?Return=Close&Op=Inserisci",
                    actions:{
                        "done": function(){
                            grid.refresh();
                            grid.commit();
                        }
                    }
                });
            }
            else{
                OpenDiv("editSintesi_dati_progetto.php?Return=Close&Op=Inserisci");
            }
            return false; // Approve action
        }
        function DoubleClick(sender,args){
            var row = args["Row"];
            var dataitem = row.getDataItem();
            OpenEdit(dataitem["Id_dati_progetto"]);
        }
        function OpenEdit(Id_dati_progetto){
            if( typeof delta_dialog != "undefined" ){
                delta_dialog.openDialog({
                    url:"editSintesi_dati_progetto.php?Return=Close&Id_dati_progetto="+Id_dati_progetto,
                    actions:{
                        "done": function(){
                            grid.refresh();
                            grid.commit();
                        }
                    }
               });
            }
            else{
                OpenDiv("editSintesi_dati_progetto.php?Return=Close&Id_dati_progetto="+Id_dati_progetto);
            }
        }
        function esporta(v){
            document.getElementById("Export").value=v;
        }
        function aggiorna() {
            
            grid.refresh();
            grid.commit();
        }
        function pulisci() {
                $("#ricambi_da").val("");
                $("#ricambi_a").val("");
                $("#ricambi_def_da").val("");
                $("#ricambi_def_a").val("");
                $("#macchine_da").val("");
                $("#macchine_a").val("");
                
                aggiorna();
        }
        function OnBeforeGridCommit(sender, args) {
                grid.attachData("ricambi_da", $("#ricambi_da").val());
                grid.attachData("ricambi_a", $("#ricambi_a").val());
                grid.attachData("ricambi_def_da", $("#ricambi_def_da").val());
                grid.attachData("ricambi_def_a", $("#ricambi_def_a").val());
                grid.attachData("macchine_da", $("#macchine_da").val());
                grid.attachData("macchine_a", $("#macchine_a").val());
                
                return true;
        }
    </script>
    <div style="margin: 10px auto">
        <?php echo $grid->Render();?>
    </div>
    <div>
        Esportazione:
        <input type="hidden" id="Export" name="Export" value=""/>
        <input type="image" src="images/icona_csv.png" onClick="esporta('csv');" width="20" height="20"/>
        <input type="image" src="images/icona_excel.png" onClick="esporta('excel');"  width="20" height="20"/>
        <input type="image" src="images/icona_word.png"  onClick="esporta('word');" width="20" height="20"/>
        <input type="image" src="images/icona_pdf.png"  onClick="esporta('pdf');" width="20" height="20"/>
        <div style="display: none"><input type="checkbox" id="IgnorePaging" name="IgnorePaging" checked="checked"/> <label for="IgnorePaging">Tutte le pagine</label></div>
    </div>
</form>
<?
$titleMod="Sintesi_dati_progetto";
include "footer.php";
?>