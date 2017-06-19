/**
 * Created by silvanei on 17/06/17.
 */

(function ($) {
    'use strict';

    var minutesToHours = $('.minutes-to-hours');
    var minutesToHoursLabel = $('.minutes-to-hours-label');

    minutesToHours.on('keyup change mouseup input paste', function() {
        var input = $(this).val();

        if(!input) {
            input = 0;
        }

        minutesToHoursLabel.html(moment.duration(parseInt(input), "minutes").format("h[h] mm[min]", { forceLength: true }));
    });

    minutesToHours.trigger('keyup');

})(jQuery);