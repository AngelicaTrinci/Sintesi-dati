<?

class Class_campo_valore_std{
    
    static function values(){
        return [];
    }
    
    static function get_values( $add_blank_value = false, $label_blank_value = "" ){
        $values = array();
        if( $add_blank_value === true ){
            $values[""]="$label_blank_value";
        }
        foreach( static::values() as $val => $lbl ){
            $values[$val] = $lbl;
        }
        
        return $values;
    }
    
    static function get_values_key( ){
        $values = array();
        foreach( static::values() as $val => $lbl ){
            $values[] = $val;
        }
        
        return $values;
    }
    
    static function set_koolgrid_column_values( $col, $add_blank_value = true, $label_blank_value = "" ){
        $values = static::get_values($add_blank_value, $label_blank_value);
        foreach( $values as $val=>$label ){
            $col->AddItem($label,$val);
        }
    }

    static function show_select( $id, $name, $initial_value, $add_blank_value = false, $label_blank_value = "", $style=false, $attributes=false, $add_select_tag=true  ){
        $html="";
        $values = static::get_values( $add_blank_value, $label_blank_value );
        if( !($add_select_tag===false) ){
            $html.="<select";
            if( $id != "" ){
                $html.=" id='$id'";
            }
            if( $name != "" ){
                $html.=" name='$name'";
            }
            if( $style != "" ){
                $html.=" style='$style'";
            }
            if( $attributes != "" ){
                $attrs=explode(";",$attributes);
                foreach($attrs as $attr){
                    $pars = explode("=",$attr);
                    if( count($pars)==2 ){
                        $html.= " ".$pars[0]."='".$pars[1]."'";
                    }
                }
            }
            $html.=">";
        }
        foreach( $values as $value=>$description ){
            $selected = "";
            if( trim($initial_value)==trim($value) ){
                $selected = " selected";
            }
            $html.="<option value='$value'$selected>$description</option>";
        }
        if( !($add_select_tag===false) ){
            $html.="</select>";
        }
        echo $html;
    }
    
    static function show_radio( $name, $initial_value, $add_blank_value = false, $label_blank_value = "", $style=false, $attributes=false ){
        $html="";
        $values = static::get_values( $add_blank_value, $label_blank_value );
        foreach( $values as $value=>$description ){
            $selected = "";
            if( trim($initial_value)==trim($value) ){
                $selected = " checked";
            }
            $html.="<label><input type='radio' value='$value'$selected";
            if( $name != "" ){
                $html.=" name='$name'";
            }
            if( $style != "" ){
                $html.=" style='$style'";
            }
            if( $attributes != "" ){
                $attrs=explode(";",$attributes);
                foreach($attrs as $attr){
                    $pars = explode("=",$attr);
                    if( count($pars)==2 ){
                        $html.= " ".$pars[0]."='".$pars[1]."'";
                    }
                }
            }
            $html.="/> $description </label>";
        }
        echo $html;
    }
    
    static function show_checkbox( $name, $initial_values, $style=false, $attributes=false ){
        $html="";
        $values = static::get_values( );
        foreach( $values as $value=>$description ){
            $selected = "";
            if( in_array( trim($value), $initial_values ) ){
                $selected = " checked";
            }
            $html.="<label";
            if( $name != "" ){
                $html.=" name='$name'";
            }
            if( $style != "" ){
                $html.=" style='$style'";
            }
            if( $attributes != "" ){
                $attrs=explode(";",$attributes);
                foreach($attrs as $attr){
                    $pars = explode("=",$attr);
                    if( count($pars)==2 ){
                        $html.= " ".$pars[0]."='".$pars[1]."'";
                    }
                }
            }
            $html.="><input type='checkbox' value='$value'$selected/> $description </label>";
        }
        echo $html;
    }
    
}