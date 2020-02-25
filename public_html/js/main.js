
$(document).ready(function(){

    $('.sidenav').sidenav();
    $('.tabs').tabs();
    $('.fixed-action-btn').floatingActionButton();
    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});

    $('.tooltipped').tooltip();
    
    /*Inizializza i datepicker*/
    $('.timepicker').timepicker({
        defaultTime: 'now',
        twelveHour: false
    });
    $('.datepicker').datepicker({
        firstDay: 1,
        format: 'dd/mm/yyyy',
        i18n: {
            months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Diciembre"],
            monthsShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
            weekdays: ["Domenica", "Lunedì", "Martedì", "mercoledì", "Giovedì", "Venerdì", "Sabato"],
            weekdaysShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
            weekdaysAbbrev: ["D", "L", "M", "M", "G", "V", "S"]
        }
    });
    /* Serve per lo stickty navbar on top */
    $('.pushpin').pushpin({
        top: $('#' + $('.pushpin').attr("data-target")).offset().top,
    });

    /*Inizializza i sottomenu */
    $('select').formSelect();
    $(".dropdown-trigger").dropdown({
        constrainWidth: true,
        hover: true
    });

    /* Funzione per il funzionamento dei campi di ricerca */
    $("input.src").keyup(function () {
        if ($(this).val() != "")
        {
            $("table.main tbody>tr").hide();
            if($("table.main td:contains('" + $(this).val() + "')").parent("tr").lenght != 0){
                $("table.main td:contains('" + $(this).val() + "')").parent("tr").show();
            }else{
                $("table.main td:contains-ci('" + $(this).val() + "')").parent("tr").show();
            }
        } else {
            $("table.main tbody>tr").show();
        }
    });

    // jQuery expression for case-insensitive filter
    $.extend($.expr[":"], { "contains-ci": function (elem, i, match, array)
       { return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0; } });


    $('tr.linkedRows[data-href]').on("click", function () {
        document.location = $(this).data('href');
    });

    /* Init menu laterale admin */
    var elems_sidemenu = document.querySelector('#sidemenu');
    instances_sidemenu = M.Collapsible.init(elems_sidemenu, {accordion: true});

    var elems_dropdown = document.querySelectorAll('.dropdown-trigger-sidemenu');
    instances_sidemenu_dropdown = M.Dropdown.init(elems_dropdown, { constrainWidth: false, hover: true,  container: 'Element'});

   

});
// polyfill for RegExp.escape
if (!RegExp.escape) {
    RegExp.escape = function (s) {
        return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
    };
}
function readURL(input, number) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('img#preview' + number).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});