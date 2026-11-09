<?php
exit;
ob_start();
session_start();
include_once("base.conf.php");
include_once("include/utility.php");
include_once(CONFIG_FILE);

$impostazioni = impostazioni();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- no cache headers -->
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <!-- end no cache headers -->
        <title><? if ($title != null) echo $title;
else echo "Delta-PI"; ?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" href="./css/custom-theme/menu-dd.css">
        <script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="./scripts/jquery-dd.js"></script>
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
    </head>
    <body>
        <?php
        $_SESSION["language_select"] = "it";
        require "KoolControls/KoolGrid/koolgrid.php";
        require "KoolControls/KoolAjax/koolajax.php";
        require_once "config.php";
        $koolajax->scriptFolder = "KoolControls/KoolAjax";
        if (DATABASE_SERVER_TO_USE == "mysql" || DATABASE_SERVER_TO_USE == "mysqli") {
            if (DATABASE_SERVER_TO_USE == "mysqli") {
                require_once 'KoolControls/KoolGrid/ext/datasources/MySQLiDataSource.php';
                $db_con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                $ds = new MySQLiDataSource($db_con);
            } else {
                $db_con = mysql_connect($dbhost, $dbuser, $dbpass);
                mysql_select_db($dbname, $db_con);
                $ds = new MySQLDataSource($db_con);
            }
        }
        /* per mssql */
        if (DATABASE_SERVER_TO_USE == "ado_mssql") {
            require_once 'KoolControls/KoolGrid/ext/datasources/MSSQLDataSource.php';
            $db_con = mssql_connect($dbhost, $dbuser, $dbpass);
            mssql_select_db($dbname, $db_con);
            $ds = new MSSQLDataSource($db_con);
        }
        if (DATABASE_SERVER_TO_USE == "mssqlnative") {
            require_once 'KoolControls/KoolGrid/ext/datasources/SQLSRVDataSource.php';

            $connectionInfo = array("Database" => "$dbname", "UID" => "$dbuser", "PWD" => "$dbpass", "ReturnDatesAsStrings" => true);
            $db_con = sqlsrv_connect($dbhost, $connectionInfo);
            $ds = new SQLSRVDataSource($db_con);
        }

        $ds->SelectCommand = base64_decode($_GET['Sql']);
        //echo $ds->SelectCommand;
        $grid = new KoolGrid("grid");
        $grid->scriptFolder = "KoolControls/KoolGrid";
        $grid->styleFolder = "default";
        $grid->DataSource = $ds;

        $grid->AjaxEnabled = true;
        $grid->ColumnWrap = true;
        $grid->Width = "100%";
        if (isset($_GET['width'])) {

            $grid->Width = "\"" . $_GET['width'] . "\"";
        }
        $grid->PageSize = 10;
        if (isset($_GET['page'])) {

            $grid->PageSize = $_GET['page'];
        }
        $grid->RowAlternative = true;
        $grid->AllowSorting = true;
        $grid->AllowFiltering = true;
        $grid->AllowSelecting = true;
        //$grid->AllowResizing = true;
        $grid->AutoGenerateColumns = true;
        $grid->AutoGenerateColumns = true;
        $grid->Localization->Load("KoolControls/KoolGrid/localization/" . $_SESSION["language_select"] . ".xml");
        $grid->MasterTable->Pager = new GridPrevNextAndNumericPager();
        //$grid->MasterTable->ShowFunctionPanel = true;
//$grid->AllowGrouping = true;
//$grid->MasterTable->ShowGroupPanel = true;
        $grid->ClientSettings->ClientEvents["OnBeforeStartInsert"] = "OnBeforeStartInsert";
        $grid->ClientSettings->ClientEvents["OnRowDoubleClick"] = "DoubleClick";
        $grid->ClientSettings->ClientEvents["OnRowSelect"] = "Handle_OnRowSelect";
        $col = new GridCommandColumn();
        $col->CommandText = "Sel";
        $col->OnClick = "DoubleClickButton(this);";
        $col->CssClass = "ui-button-allegati ui-button-text-only ui-widget";
        $grid->MasterTable->AddColumn($col);
        $grid->Process();
        ?>
        <?php echo $koolajax->Render(); ?>
        <form id="form1" method="post">
            <script type="text/javascript">
                function OnBeforeStartInsert(sender, args)
                {
                    return false; // Approve action
                }

                function DoubleClick(sender, args)
                {
                    var row = args["Row"];
                    var dataitem = row.getDataItem(true);
                    parent.CloseDivSelezione<?php echo $_GET["NomeSelezione"]; ?>(<?php
        $campi = $_GET["Campi"];
        $nomi = explode(",", $campi);
        $i = 0;
        if (is_array($nomi)) {
            foreach ($nomi as $value) {
                if ($i > 0)
                    echo ",";
                echo "unescape(dataitem[\"$value\"])";
                $i++;
            }
        } else
            echo $campi;
        ?>);
                }
                function DoubleClickButton(id)
                {
                    var row = get_row(id);
                    var dataitem = row.getDataItem(true);
                    parent.CloseDivSelezione<?php echo $_GET["NomeSelezione"]; ?>(<?php
        $campi = $_GET["Campi"];
        $nomi = explode(",", $campi);
        $i = 0;
        if (is_array($nomi)) {
            foreach ($nomi as $value) {
                if ($i > 0)
                    echo ",";
                echo "unescape(dataitem[\"$value\"])";
                $i++;
            }
        } else
            echo $campi;
        ?>);
                }
                function Handle_OnRowSelect(sender, args)
                {

                }
            </script>
            <div class="ui-widget ui-widget-content ui-corner-all" style="padding:1 3 1 1;<?php if (isset($_GET['width']))
            echo "width:" . $_GET['width'];
        ?>">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" style="margin:0 -2 1 0">
                    <span id="ui-dialog-title-dialog" class="ui-dialog-title">Selezione <?php echo $_GET["NomeSelezione"]; ?></span>
                </div>
<?php echo $grid->Render(); ?>
            </div>
        </form>
    </body>
</html>
<?php session_commit();
ob_end_flush(); ?>
