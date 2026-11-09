<?
session_start();
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_REQUEST_UTILS);

$query_str = base64_decode( requestUtils::getRequestObject('query') );
$par   = requestUtils::getRequestObject('par');

$query=new databaseQuery();
$rs = $query->executeDirectQueryPar($query_str,$par);

$esito = array(
    esito => "ERR",
    record => null
);

if($rs){
    $rows = $rs->GetRows(1);
    foreach ($rows as $row) {
        $esito = array(
            esito => "OK",
            record => $row
        );
    }
}

echo json_encode($esito);
?>