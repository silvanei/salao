/**
 * Created by silvanei on 25/04/2017.
 */
$(document).ready(function(){


    // Maskara para telefone
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    var spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $('.mask-phone').mask(SPMaskBehavior, spOptions);

});