$(document).ready(function () {

    //Plugin AOS
    AOS.init();

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
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    $('.materialboxed').materialbox();

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

    $('.pushpin-demo-nav').each(function () {
        var $this = $(this);
        var $target = $('#' + $(this).attr('data-target'));
        $this.pushpin({
            top: $target.offset().top,
            bottom: $target.offset().top + $target.outerHeight() - $this.height()
        });
    });

});