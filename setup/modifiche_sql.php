        <?php
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_DATABASE_QUERY);
include_once("include/utility.php");

$query = new databaseQuery();


$sql = "CREATE TABLE IF NOT EXISTS utenti(
            Id_utente           int not null auto_increment primary key,
            Utente_creazione    int,
            Data_ora_creazione  datetime,
            Utente_modifica     int,
            Data_ora_modifica   datetime,
            Nome                varchar(250),
            Cognome             varchar(250),
            Email               varchar(250),
            Utente              varchar(250),
            Dominio             varchar(250),
            Password            varchar(250),
            Obbligo_cambio_password  char(1),
            Reset_password       char(1),
            Data_password       date,
            TipoLogin           char(1),
            Attivo              char(1),
            Amministratore      char(1)
)";


esegui_query( $sql );

$sql ="CREATE TABLE IF NOT EXISTS utenti_gruppi(
     
    Id_gruppo              int not null auto_increment,
    Descrizione            varchar(200),
    Note                   text,
    Utente_creazione       int,
    Data_ora_creazione     datetime,
    Utente_modifica        int,
    Data_ora_modifica      datetime,
    
    primary key( Id_gruppo )
    
)
";

esegui_query( $sql );

$sql ="CREATE TABLE IF NOT EXISTS utenti_gruppi_assegnati(
     
    Id_gruppo              int,
    Id_utente              int,
    
    primary key( Id_gruppo, Id_utente )
    
)
";


esegui_query( $sql );

$sql = "CREATE TABLE IF NOT EXISTS utenti_token_accesso(

    Token               varchar(500),
    Id_utente           int,
    Data_ora_creazione  datetime,
    Utente_modifica     int,
    Data_ora_modifica   datetime,

    Info                varchar(500),
    Attivo              char(1),

    primary key( Token )

)";
esegui_query( $sql );

$sql = "CREATE TABLE IF NOT EXISTS voci_menu(

    Id_voce             int not null auto_increment,
    Voce                varchar(255),
    File_php            varchar(255), 

    primary key( Id_voce )

)";
esegui_query( $sql );


$sql = "ALTER TABLE Voci_menu ADD Tipo char(1)";
esegui_query( $sql );

$sql = "ALTER TABLE Voci_menu ADD Id_voce_padre int";
esegui_query( $sql );

$sql = "ALTER TABLE Voci_menu ADD Posizione int";
esegui_query( $sql );

$sql = "ALTER TABLE Voci_menu ADD Attivo char(1)";
esegui_query( $sql );

$sql = "ALTER TABLE Voci_menu ADD Immagine varchar(255)";
esegui_query( $sql );


function esegui_query( $query ){
    
    switch( DATABASE_SERVER_TO_USE ){
        
        case "mysql":
        case "mysqli":
            $query = str_replace( "dbo.", "", $query );
            break;
        
        case "mssqlnative":
            $query = str_replace( "auto_increment", "IDENTITY(1,1)", $query );
            $query = str_replace( "AUTO_INCREMENT", "IDENTITY(1,1)", $query );
            $query = str_replace( "if not exists", "", $query );
            $query = str_replace( "IF NOT EXISTS", "", $query );
            break;
        
    }
    
    
    $db = open_DatabaseQuery();
    $rs = $db->dbConn->execute( $query );
    if( $rs ){
        echo "<div style='background-color:rgb(220,255,220);'>Aggiornamento Effettuato Con Successo</div>";
    }
    else{
        echo "<div style='background-color:rgb(255,220,220);'>Errore durante l'aggiornamento!</div>";
    }
    echo "<div style='margin-bottom:10px; max-height: 60px; background-color:rgb(255,255,220); padding: 2px; border: 1px solid #eee; overflow:scroll;'><pre style='padding:0;margin:0;'>$query</pre></div>";
    
}