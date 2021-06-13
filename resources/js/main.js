 (function(window, document, $, undefined){

     $('input[name="daterange"]').daterangepicker({
         autoUpdateInput: false,
         locale: {
             cancelLabel: 'Clear'
         }
     }, function(start, end, label) {

         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

     });

     $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
         $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
     });

     'use strict';
     window.animation = {};





     $('#website_name').multiselect({
         includeSelectAllOption: true
     });



})(window, document, jQuery);
