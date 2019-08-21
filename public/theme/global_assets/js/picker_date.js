/* ------------------------------------------------------------------------------
 *
 *  # Date and time pickers
 *
 *  Demo JS code for picker_date.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var DateTimePickers = function() {


    //
    // Setup module components
    //

    // Daterange picker
    var _componentDaterange = function() {
        if (!$().daterangepicker) {
            console.warn('Warning - daterangepicker.js is not loaded.');
            return;
        }

        // Basic initialization
        $('.daterange-basic').daterangepicker({
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDaterange();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DateTimePickers.init();
});
