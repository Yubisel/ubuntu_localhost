/* Ing. Yubisel Vega Alvarez */
/* yubiselv@gmail.com */

$(function(){
    $('input#mod-active-switch, input#mod-inactive-switch').on('change', function(e){
        hideShowMods();
    });

    var hideShowMods = function(){
        var $mod_active_switch = $('input#mod-active-switch');
        var $mod_inactive_switch = $('input#mod-inactive-switch');
    
        $('.mod-container').fadeOut();
        if ($mod_active_switch.is(':checked') && $mod_inactive_switch.is(':checked')){
            //mostrar todo
            $('.mod-container').fadeIn(300);
        }else if (($mod_active_switch.is(':checked') && !$mod_inactive_switch.is(':checked'))){
            //solo mostrar los activos
            $('.mod-enabled').parent().fadeIn(300);
        }else if ((!$mod_active_switch.is(':checked') && $mod_inactive_switch.is(':checked'))){
            //solo mostrar los inactivos
            $('.mod-disabled').parent().fadeIn(300);
        }
    }
});