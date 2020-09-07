$(document).ready(function() {

    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown();
    $('.timepicker').timepicker();
    $('select').formSelect();
    $('.modal').modal();
    $('.parallax').parallax();
    $('.slider').slider({
        interval: 3000
    });
    $('.tabs').tabs();
    $('.scrollspy').scrollSpy();

    $('.datepicker').datepicker({
        container: 'body',
        disableWeekends: false,
        minDate: false,
        //maxDate: fechaLimite,
        format: 'dd-mm-yyyy',
        i18n: {
            cancel: 'CANCELAR',
            clear: 'LIMPIAR',
            done: 'ACEPTAR',
            previousMonth: '‹',
            nextMonth: '›',
            months: [
                'ENERO',
                'FEBRERO',
                'MARZO',
                'ABRIL',
                'MAYO',
                'JUNIO',
                'JULIO',
                'AGOSTO',
                'SEPTIEMBRE',
                'OCTUBRE',
                'NOVIEMBRE',
                'DICIEMBRE'
            ],
            monthsShort: [
                'ENE',
                'FEB',
                'MAR',
                'ABR',
                'MAY',
                'JUN',
                'JUL',
                'AGO',
                'SEP',
                'OCT',
                'NOV',
                'DICI'
            ],
            weekdays: ['DOMINGO', 'LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO'],
            weekdaysShort: ['DOM', 'LUN', 'MAR', 'MIÉ', 'JUE', 'VIE', 'SÁB'],
            weekdaysAbbrev: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
        }
    });

    $(".table").tablesorter({
        widgets: [],
        usNumberFormat: false,
        sortReset: true,
        sortRestart: true,
    });


});