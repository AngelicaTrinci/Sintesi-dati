/**
 * 
 * @param {Number} data data numerica in formato AAAAMMGG
 * @returns {Date} data convertita
 */
function conv_data8_in_data(data){
    var d = $.trim(data);
    var dd=d%100;
    var mm=(d-dd)/100%100;
    var yy=(d-mm*100-dd)/10000;
    var data_convertita = new Date(yy,mm-1,dd,0,0,0,0);
    return(data_convertita);
}

/**
 * 
 * @param {Date} d1 data1
 * @param {Date} d2 data2
 * @returns {Number} differenza (data2-data1) in giorni
 */
function data_diff_in_giorni(d1,d2){
    var diff = Math.round( (d2-d1)/(1000*60*60*24) );
    diff = parseInt(diff,10);
    return(diff);
}

function data_to_ext(data_int,data_ext){
    var val_ext = "";
    var val_int = $.trim(data_int.val());
    if( val_int.length==8 ){
        var gg = val_int.substring(6,8);
        var mm = val_int.substring(4,6);
        var aa = val_int.substring(0,4);
        val_ext=gg+"/"+mm+"/"+aa;
    }
    data_ext.val(val_ext);
}
function data_to_int(data_int,data_ext){
    var val_int="";
    var val_ext = data_ext.val();
    var val_ext_v=val_ext.split("/");
    if( val_ext_v.length == 3 ){
        val_int=val_ext_v[2]+val_ext_v[1]+val_ext_v[0];
    }
    data_int.val(val_int);
}
$(function(){
    $.datepicker.setDefaults($.datepicker.regional['it']);
    $(".data").each(function(){
        var data_int=$(this);
        var data_ext=data_int.clone();
        data_ext.removeClass("data").addClass("data-ext");
        data_ext.attr("id","ext-"+data_ext.attr("id"));
        data_ext.attr("name","ext-"+data_ext.attr("name"));
        data_ext.attr("internal",data_int.attr("id"));
        data_to_ext(data_int,data_ext);
        data_ext.change(function(){
            data_to_int($("#"+$(this).attr("internal")),$(this));
        });
        data_ext.mask('00/00/0000');
        data_int.after(data_ext);
        data_int.hide();
    });
    $(".data-ext").datepicker({
        firstDay: 1,
        dateFormat: "dd/mm/yy",
        showOn: "button",
        buttonImage: "images/calendario.png",
        buttonImageOnly: true,
        buttonText: "Seleziona data"
    });
});

function gestisci_data_ext(selettore){
    $(selettore).find(".data-ext.hasDatepicker").removeClass("hasDatepicker");
    $(selettore).find(".ui-datepicker-trigger").remove();
    data_ext=$(selettore).find(".data-ext");
    data_ext.change(function(){
        data_to_int($("#"+$(this).attr("internal")),$(this));
    });
    data_ext.mask('00/00/0000');
    data_ext.datepicker({
        firstDay: 1,
        dateFormat: "dd/mm/yy",
        showOn: "button",
        buttonImage: "images/calendario.png",
        buttonImageOnly: true,
        buttonText: "Seleziona data"
    });
}