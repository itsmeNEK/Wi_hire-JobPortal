$(document).ready(function() {
    var table = $('#example').DataTable({
        select: false,
        "columnDefs": [{
            className: "Name",
            "targets": [0],
            "visible": false,
            "searchable": false,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, -1, "All"]
            ],
            createdRow: function(row, data, index) {
                if (data[5].replace(/[\$,]/g, '') * a > 150000) {
                    $('td', row).eq(5).addClass('text-success');
                }
            }
        }]
    }); //End of create main table


    $('#example tbody').on('click', 'tr', function() {

        alert(table.row(this).data()[0]);

    });
});

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