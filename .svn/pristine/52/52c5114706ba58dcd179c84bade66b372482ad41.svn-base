<?php

if (DATABASE_SERVER_TO_USE == "ado_mssql") {
    $dbhost = explode(";", DATABASE_HOST);
    $dbname = explode("=", $dbhost[1]);
    $dbhost = $dbhost[0];
    $dbname = $dbname[1];
    $dbuser = DATABASE_USER_NAME;
    $dbpass = DATABASE_PASSWORD;
    
}else
{
    $dbhost = DATABASE_HOST;
    $dbuser = DATABASE_USER_NAME;
    $dbpass = DATABASE_PASSWORD;
    $dbname = DATABASE_NAME;
    //$dbport = DATABASE_PORT;
}  

if (DATABASE_SERVER_TO_USE == "mysql" || DATABASE_SERVER_TO_USE == "mysqli") {
    if (DATABASE_SERVER_TO_USE == "mysqli") {
        require_once 'KoolControls/KoolGrid/ext/datasources/MySQLiDataSource_ottimizzata.php';
        $db_con = mysqli_connect("p:".$dbhost, $dbuser, $dbpass, $dbname);
        if (CHARSET == "UTF-8") {
            mysqli_set_charset($db_con, "utf8");
        }
        $ds = new MySQLiDataSource_ottimizzata($db_con);
        function getNewDs($db_con) {
            return new MySQLiDataSource_ottimizzata($db_con);
        }

    } else {
        $db_con = mysql_connect($dbhost, $dbuser, $dbpass);
        if (CHARSET == "UTF-8") {
            mysql_set_charset("UTF-8", $db_con);
        }
        mysql_select_db($dbname, $db_con);

        $ds = new MySQLDataSource($db_con);

        function getNewDs($db_con) {
            return new MySQLDataSource($db_con);
        }
    }
}
if (DATABASE_SERVER_TO_USE == "ado_mssql") {

    require_once 'KoolControls/KoolGrid/ext/datasources/MSSQLDataSource.php';
    $db_con = mssql_connect($dbhost, $dbuser, $dbpass);
    mssql_select_db($dbname, $db_con);
    $ds = new MSSQLDataSource($db_con);

    function getNewDs($db_con) {
        return new MSSQLDataSource($db_con);
    }
}
if (DATABASE_SERVER_TO_USE == "mssqlnative") {

    require_once 'KoolControls/KoolGrid/ext/datasources/SQLSRVDataSource.php';
    $connectionInfo = array("Database" => "$dbname", "UID" => "$dbuser", "PWD" => "$dbpass", "ReturnDatesAsStrings" => true);
    if (CHARSET == "UTF-8") {
        $connectionInfo["CharacterSet"] = "UTF-8";
    }
    $db_con = sqlsrv_connect($dbhost, $connectionInfo);
    $ds = new SQLSRVDataSource($db_con);

    function getNewDs($db_con) {
        return new SQLSRVDataSource($db_con);
    }
}
if(DATABASE_SERVER_TO_USE=="pdo"){ 
    require_once 'KoolControls/KoolGrid/ext/datasources/PDOAS400DataSource.php'; 
    $db_con = new PDO($dbhost,$dbuser,$dbpass);
    $ds = new PDOAS400DataSource($db_con);
    function getNewDs($db_con) {
        return new PDOAS400DataSource($db_con);
    }
}
if(DATABASE_SERVER_TO_USE=="odbc"){
    require_once 'KoolControls/KoolGrid/ext/datasources/ODBCAS400DataSource.php';
    $db_con = odbc_connect( $dbhost,$dbuser,$dbpass ); 
    $ds = new ODBCAS400DataSource($db_con);
    function getNewDs($db_con) {
        return new ODBCAS400DataSource($db_con);
    }
}

function creaKoolGridConnection( $connessione="" ){
    global $ds;
    
    if( trim($connessione)!="" ){
        $SERVER_TO_USE = constant("DATABASE_SERVER_TO_USE_".$connessione);
        $HOST = constant("DATABASE_HOST_".$connessione);
        $USER_NAME = constant("DATABASE_USER_NAME_".$connessione);
        $PASSWORD = constant("DATABASE_PASSWORD_".$connessione);
        $NAME = constant("DATABASE_NAME_".$connessione);
        if($SERVER_TO_USE == "ado_mssql") {
            $dbhost = explode(";", $HOST);
            $dbname = explode("=", $dbhost[1]);
            $dbhost = $dbhost[0];
            $dbname = $dbname[1];
            $dbuser = $USER_NAME;
            $dbpass = $PASSWORD;
        }else
        {
            $dbhost = $HOST;
            $dbuser = $USER_NAME;
            $dbpass = $PASSWORD;
            $dbname = $NAME;
        }  

        if ($SERVER_TO_USE == "mysql" || $SERVER_TO_USE == "mysqli") {
            if ($SERVER_TO_USE == "mysqli") {
                require_once 'KoolControls/KoolGrid/ext/datasources/MySQLiDataSource.php';
                $db_con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (CHARSET == "UTF-8") {
                    mysqli_set_charset($db_con, "utf8");
                }
                $ds_new = new MySQLiDataSource($db_con);
            } else {
                $db_con = mysql_connect($dbhost, $dbuser, $dbpass);
                if (CHARSET == "UTF-8") {
                    mysql_set_charset("UTF-8", $db_con);
                }
                mysql_select_db($dbname, $db_con);
                $ds_new = new MySQLDataSource($db_con);
            }
        }
        if ($SERVER_TO_USE == "ado_mssql") {
            require_once 'KoolControls/KoolGrid/ext/datasources/MSSQLDataSource.php';
            $db_con = mssql_connect($dbhost, $dbuser, $dbpass);
            mssql_select_db($dbname, $db_con);
            $ds_new = new MSSQLDataSource($db_con);
        }
        if ($SERVER_TO_USE == "mssqlnative") {

            require_once 'KoolControls/KoolGrid/ext/datasources/SQLSRVDataSource.php';
            $connectionInfo = array("Database" => "$dbname", "UID" => "$dbuser", "PWD" => "$dbpass", "ReturnDatesAsStrings" => true);
            if (CHARSET == "UTF-8") {
                $connectionInfo["CharacterSet"] = "UTF-8";
            }
            $db_con = sqlsrv_connect($dbhost, $connectionInfo);
            $ds_new = new SQLSRVDataSource($db_con);
        }
        if($SERVER_TO_USE=="pdo"){ 
            require_once 'KoolControls/KoolGrid/ext/datasources/PDOAS400DataSource.php'; 
            $db_con = new PDO($dbhost,$dbuser,$dbpass);
            $ds_new = new PDOAS400DataSource($db_con);
        }
        if($SERVER_TO_USE=="odbc"){
            require_once 'KoolControls/KoolGrid/ext/datasources/ODBCAS400DataSource.php';
            $db_con = odbc_connect( $dbhost,$dbuser,$dbpass ); 
            $ds_new = new ODBCAS400DataSource($db_con);
        }
    }
    else{
        $ds_new = $ds;
    }
    return $ds_new;
}
?>