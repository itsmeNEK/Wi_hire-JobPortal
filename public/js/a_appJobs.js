$(document).ready(function() {
    $("#jobmodal").modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var personId = button.data("id");
        var id = "id";
        //displays values to modal
        $(this).find("#jobmodaldet").html($("<input name=" + id + " hidden value=" + personId +
            "></input> <b>Are you sure you want to approve this Job?</b>"))
    }).on("hide.bs.modal", function(event) {
        $(this).find("#jobmodaldet").html("");
    });
});