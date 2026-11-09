/**
 * 
 */
function Delta_Dialog(){
    
    this.buttons = false;
    this.ultimo_id = 0;
    this.questo_frame = (window.frameElement)?window.frameElement.id:"";
    this.callback = {};
    
    this.crea_id = function(){
        this.ultimo_id++;
        return "delta_dialog_"+this.ultimo_id;
    };
    
    this.cerca_dialog_pronto = function( num_dialog ){
        num_dialog = num_dialog ? num_dialog : 1;
        var dialog = false;
        var i=0;
        $(".delta-dialog").each(function(){
            if( $(this).dialog("isOpen") == true ){
                
            }
            else{
                i++;
                if( i>= num_dialog ){
                    dialog = $(this);
                    return false;
                }
            }
        });
        return dialog;
    };

    this.crea_dialog_pronto = function(){

        // creo un id univoco per il dialog
        var id_dialog = this.crea_id();

        // creo un iframe da mettere dentro il dialog
        var frame = $("<iframe scrolling='auto'  frameborder='no' allowtransparency='yes' style='width:100%;height:100%' onload_='delta_dialog_resize(\""+id_dialog+"\")'></iframe>");
        frame.attr({name: id_dialog+"_frame",id: id_dialog+"_frame"});
        frame.addClass("delta-dialog-frame");

        // creo il dialog
        var nuovo_dialog = $("<div></div>");
        nuovo_dialog.addClass("delta-dialog");
        nuovo_dialog.attr({name: id_dialog,id: id_dialog});
        
        var div = $("<div id='FrameModifica-contenitore' style='position: absolute; top:2px; left:2px; bottom:2px; right:2px; overflow:hidden;'></div>");
        div.append(frame);
        nuovo_dialog.append(div);
        
        // Aggiungo il dialog alla pagina
        $("body").append(nuovo_dialog);
        nuovo_dialog.dialog({
            autoOpen: false,
            modal: true,
            height: 300,
            width: 600,
            close: function(){
                $(this).find(".delta-dialog-frame").attr("onload","").attr("src","");
                $(this).dialog("option","buttons",{});
                $(this).dialog("option","height",300);
                $(this).dialog("option","width",600);
                $(this).unbind();
            }
        });
        
        return nuovo_dialog;

    };
    
    this.verifica_dialog_pronto = function(){
        var that = this;
        function do_verifica_dialog_pronto(){
            if( that.cerca_dialog_pronto(2) == false ){
                that.crea_dialog_pronto();
            }
            setTimeout(do_verifica_dialog_pronto,1000);
        };
        do_verifica_dialog_pronto();
    };
    
    this.initDialog = function(){
        
        // Se sono nella finestra principale
        if( self == top ){
            
            this.verifica_dialog_pronto();

        }
        // Se sono in un frame
        else{
            
        }
        
    };
    
    this.done = function( data ){

        this.close("done",data);

    };
    
    this.cancel = function( data ){

        this.close("cancel",data);

    };
    
    this.do_action = function( action, data ){

        if( this.questo_frame && this.questo_frame!="" ){
            if( action && action != "" ){
                if(top!=this){
                    if(top.delta_dialog){
                        if(top.delta_dialog.callback[action+"_"+this.questo_frame] ){
                            return top.delta_dialog.callback[action+"_"+this.questo_frame](data);
                        }
                    }
                }
            }
        }
        
    };
    
    this.close = function( action, data ){

        if( this.questo_frame && this.questo_frame!="" ){
            var frame = parent.$("#"+this.questo_frame);
            var questo_dialog = frame.closest(".delta-dialog");
            questo_dialog.dialog('close');
            if( action && action != "" ){
                if(top!=this){
                    if(top.delta_dialog){
                        if(top.delta_dialog.callback[action+"_"+this.questo_frame] ){
                            top.delta_dialog.callback[action+"_"+this.questo_frame](data);
                        }
                    }
                }
            }
        }
        
    };
    
    this.setButtons = function(buttons){

        if( this.questo_frame && this.questo_frame!="" ){
            var frame = parent.$("#"+this.questo_frame);
            var questo_dialog = frame.closest(".delta-dialog");
            questo_dialog.dialog("option","buttons",buttons);
            //questo_dialog.dialog("option","height",questo_dialog.dialog("option","height")+60);
            this.buttons=true;
        }
        
    };
    
    /**
     * 
     * @param string event
     * @param function function_to_bind
     * <br><br>Es. Per gestire l'evento di chiusura:<br><i>delta_dialog.on("dialogclose",function(){ do_some_things(); });</i> 
     */
    this.on_event = function( event, function_to_bind, do_unbind ){
        
        if( this.questo_frame && this.questo_frame!="" ){
            
            var frame = parent.$("#"+this.questo_frame);
            var questo_dialog = frame.closest(".delta-dialog");
            
            if( do_unbind ){
                questo_dialog.unbind(event);
            }
            questo_dialog.on( event, function_to_bind );
            
        }
    }
    
    /**
     * 
     * @param json options<br>Modifica le opzioni del dialog contenitore.
     * <br><br>Es. Per impostare le dimensioni:<br><i>delta_dialog.setOptions({width:400,height:300})</i> 
     */
    this.setOptions = function(options){
        
        this.SetOptions(options);
        
    }
    /**
     * 
     * @param json options<br>Modifica le opzioni del dialog contenitore.
     * <br><br>Es. Per impostare le dimensioni:<br><i>delta_dialog.SetOptions({width:400,height:300})</i> 
     */
    this.SetOptions = function(options){
        
        if( this.questo_frame && this.questo_frame!="" ){
            
            var frame = parent.$("#"+this.questo_frame);
            var questo_dialog = frame.closest(".delta-dialog");

            for( var option in options ){
                questo_dialog.dialog("option",option,options[option]);
            }
            
        }
        
    };
    
    /**
     * 
     * @param json opzioni
     * {
     *     url: ** indirizzo da caricare nel frame **,
     *     frame_chiamante: ** id del frame chiamante **,
     *     jquery: { ** opzioni del jquery previste per il dialog ** }
     * }
     * @returns dialog jquery
     */
    this.openDialog = function(opzioni){

        // Se sono nella finestra principale
        if( self == top ){
            
            var dialog = this.cerca_dialog_pronto(1);
            if( dialog == false ){
                alert( "[openDialog]\r\nErrore non previsto" );
            }
            else{

                var frame = dialog.find(".delta-dialog-frame");
                if( opzioni.frame_chiamante ){
                    dialog.attr("frame_chiamante",opzioni.frame_chiamante);
                }
                if( opzioni.dialog_options ){
                    for( var op in opzioni.dialog_options ){
                        dialog.dialog( "option", op, opzioni.dialog_options[op] );
                    }
                }
                this.callback[dialog.attr("id")]=null;
                if( opzioni.actions ){
                    for( a in opzioni.actions){
                        this.callback[a+"_"+frame.attr("id")]=opzioni.actions[a];
                    }
                }
                dialog.dialog('open').css("zIndex",900000);

                if( opzioni.url ){
//                    frame.attr("onload",frame.attr("onload_"));
                    frame.attr("src",""+opzioni.url);
                }
                return dialog;

            }

        }
        // Se sono in un frame
        else{
            if( !opzioni.frame_chiamante ){
                opzioni.frame_chiamante = this.questo_frame;
            }
            return top.delta_dialog.openDialog(opzioni);
        }

    }
    
}

//function delta_dialog_resize(id_dialog){
//    var frame=$("#"+id_dialog+"_frame");
//    if( frame.attr("src") && frame.attr("src")!="" ){
//        frame.attr("onload","");
//        var dialog = $("#"+id_dialog);
//        var contenuto = frame.contents().find( "body" );
//        var height = contenuto.outerHeight()+120;
//        var width = contenuto.width()+40;
//        dialog.dialog( "option", "height", height );
//        dialog.dialog( "option", "width", width );
//        alert("dr");
//    }
//}

var delta_dialog = null;
$(function(){
    delta_dialog = new Delta_Dialog();
    if( self == top ){
        delta_dialog.initDialog();
    }
});