<?

class Delta_upload{
    
    CONST TIPI_DOCUMENTO   = "doc|docx|xls|xlsx|pdf|msg|txt";
    CONST TIPI_ZIP         = "zip|7z|rar";
    CONST TIPI_IMMAGINE    = "jpeg|jpg|gif|png|bmp|ico";
    CONST TIPI_DOC_IMG_ZIP = "doc|docx|xls|xlsx|pdf|msg|txt|zip|7z|rar|jpeg|jpg|gif|png|bmp|ico";
    
    private $input_name    = false;
    private $tipi_ammessi  = false;
    private $max_size      = false;
    private $last_error    = false;
    private $original_name = false;
    private $uploaded_name = false;
    private $uploaded_path = false;
    private $uploaded_abspath = false;
    private $extension     = false;
    private $tmp_name      = false;
    
    /**
     * Gestione upload di file sicuri
     * @param string $input_name Nome del campo della form ricevuto
     * @param array/string $tipi_ammessi Elenco di estensioni ammesse. E' possibile specificare i valori in un array o in una stringa separata dal carattere <b>|</b>.
     * @param int $maximum_size Dimensione massima del file ammessa. Un valore pari a 0 indica nessuna restrizione.
     */
    public function __construct( $input_name, $tipi_ammessi, $maximum_size = 0 ) {
        $this->input_name = $input_name;
        $this->max_size = $maximum_size;
        if( is_array( $tipi_ammessi ) || $tipi_ammessi==false ){
            $this->tipi_ammessi = $tipi_ammessi;
        }
        else{
            $this->tipi_ammessi = explode("|",$tipi_ammessi);
        }
        foreach( $this->tipi_ammessi as $k=>$tipo){
            $this->tipi_ammessi[$k] = strtolower($tipo);
        }
    }
    
    /**
     * Aggiunge un valore all'elenco delle estenzioni ammesse
     * @param string $ext Estensione da aggiungere
     */
    public function add_extension( $ext ){
        if( $ext!=false ){
            $this->tipi_ammessi[] = $ext;
        }
    }
    
    /**
     * Verifica se il campo è vuoto
     * @return boolean <b>true</b> non è stato selezionato nessun file per l'upload
     */
    public function is_empty(){
        $file = $_FILES[$this->input_name];
        if( $file["size"] == 0 ){
            return true;
        }
        return false;
    }
    
    /**
     * Verifica la validità del file. In caso di esito negativo
     * @return boolean <b>true</b> il file è valido. <b>false</b> il file non è valido.
     */
    public function check(){
        
        $this->last_error = false;
        $this->original_name = false;
        
        $file = $_FILES[$this->input_name];
        $this->tmp_name = $file["tmp_name"];
        $name = $file["name"];
        $dimensione = $file["size"];
        if($this->tipi_ammessi!==false){
            $this->extension  = strtolower( pathinfo($name, PATHINFO_EXTENSION) );
            if( !in_array($this->extension, $this->tipi_ammessi) ){
                $this->last_error = "Tipo di file non ammesso";
                return false;
            }
        }
        
        if( $this->max_size!=0 ){
            if( $dimensione > $this->max_size ){
                $this->last_error = "File troppo grande";
                return false;
            }
        }

        $this->original_name = $name;
        
        return true;
        
    }
    
    /**
     * Effettuo l'upload del file
     * @param string $root_folder Cartella di destinazione del file. La cartella deve essere specificata, non può essere vuota.
     * @param string $sub_folder Sottocartella di destinazione del file.
     * @param string $file_name Nome del file. Il parametro viene ignorato de specificato $rename_file = true.
     * @param bool $create_folder <b>true</b>: Se non esiste, crea la cartella specificata in $sub_folder.
     * @param bool $rename_file <b>true</b>: Assegna un nome nuovo al file caricato. Per reperire il nome assegnato richiamare get_uploaded_name().
     * @param bool $keep_extension <b>true</b>: Mantiene l'estensione del file originale. PArametro utilizzato solo se $rename_file = true.
     * @return boolean In caso di esito positivo viene restituito <b>true</b>. In caso di esito negativo, richiamare get_last_error() per leggere il messaggio di errore.
     */
    public function upload( $root_folder, $sub_folder, $file_name, $create_folder=false, $rename_file=true, $keep_extension=true ){
        
        $this->uploaded_name = false;
        $this->uploaded_path = false;
        $this->uploaded_abspath = false;
        
        // Verifico la correttezza del file caricato
        //
        if( !$this->check() ){
            return false;
        }
        
        // Se la cartella di destinazione è vuota do errore
        //
        if( $root_folder=="" ){
            $this->last_error = "Cartella root di destinazione non valida";
            return false;
        }
        
        // Se il nome del file è vuoto, e $rename_file è false, do errore
        //
        if( $file_name=="" && $rename_file==false ){
            $this->last_error = "Nome del file non valido";
            return false;
        }
        
        // Se richiesta la creazione della cartella, verifico se già esiste.
        // Nel caso procedo a crearla
        //
        if( $create_folder==true ){
            if (!file_exists($root_folder.$sub_folder)){
                mkdir($root_folder.$sub_folder, 0777, true);
            }
        }
        
        // Se la cartella di destinazione non esiste, do errore
        //
        if (!file_exists($root_folder.$sub_folder)){
            $this->last_error = "Cartella di destinazione non valida";
            return false;
        }
        
        // Se richiesco, assegno un nuovo nome al file
        //
        if( $rename_file==true ){
            $file_name = uniqid("attach_", true);
            if( $keep_extension==true ){
                $file_name .= ".".$this->extension;
            }
        }
        
        $this->uploaded_name = $file_name;
        $this->uploaded_path = $sub_folder . "\\" . $file_name;
        $this->uploaded_abspath = $root_folder . $sub_folder . "\\" . $file_name;
        
        if(!move_uploaded_file($this->tmp_name, $this->uploaded_abspath)){
            $this->last_error = "Errore durante la copia del file";
            return false;
        }
        
        return true;
        
    }
    
    /**
     * Restituisce l'ultimo errore che si è verificato.
     * @return string
     */
    public function get_last_error(){
        return $this->last_error;
    }
    
    /**
     * Restituisce il nome del file originale
     * @return string
     */
    public function get_original_name(){
        return $this->original_name;
    }
    
    /**
     * Restituisce il nome del file caricato
     * @return string
     */
    public function get_uploaded_name(){
        return $this->uploaded_name;
    }
    
    /**
     * Restituisce il nome del file caricato compreso di percorso (relativo)
     * @return string
     */
    public function get_uploaded_filepath(){
        return $this->uploaded_path;
    }
    
    /**
     * Restituisce il nome del file caricato compreso di percorso (assoluto)
     * @return string
     */
    public function get_uploaded_absfilepath(){
        return $this->uploaded_abspath;
    }
    
}