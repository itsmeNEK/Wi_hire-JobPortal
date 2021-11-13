$(document).ready(function() {


    $('.table-responsive-stack').each(function(i) {
        var id = $(this).attr('id');
        //alert(id);
        $(this).find("th").each(function(i) {
            $('#' + id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ':</span> ');
            $('.table-responsive-stack-thead').hide();

        });



    });





    $('.table-responsive-stack').each(function() {
        var thCount = $(this).find("th").length;
        var rowGrow = 100 / thCount + '%';
        //console.log(rowGrow);
        $(this).find("th, td").css('flex-basis', rowGrow);
    });




    function flexTable() {
        if ($(window).width() < 768) {

            $(".table-responsive-stack").each(function(i) {
                $(this).find(".table-responsive-stack-thead").show();
                $(this).find('thead').hide();
            });


            // window is less than 768px
        } else {


            $(".table-responsive-stack").each(function(i) {
                $(this).find(".table-responsive-stack-thead").hide();
                $(this).find('thead').show();
            });



        }
        // flextable
    }

    flexTable();

    window.onresize = function(event) {
        flexTable();
    };






    // document ready
});

$(document).ready(function() {
    $("#myModal").modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var personId = button.data("id");
        var id = "id";
        //displays values to modal
        $(this).find("#personDetails").html($("<input name=" + id + " hidden value=" + personId +
            "></input> <b>Are you sure you want to delete this mail?</b>"))
    }).on("hide.bs.modal", function(event) {
        $(this).find("#personDetails").html("");
    });
});