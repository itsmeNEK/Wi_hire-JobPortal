function applyclick(id) {
    if (confirm("You Must Login First")) {
        location.replace("user_login");
    }
}

$(".openbtn").click(function() {
    var id = $(this).data("id");
    var x = document.getElementById("content_" + id);
    if ((x.style.display = "none")) {
        x.style.display = "inline-block";
    }
});



$(document).ready(function() {
    $(".closebtn").click(function() {
        var id = $(this).data("id");
        var x = document.getElementById("content_" + id);
        if ((x.style.display = "inline-block")) {
            x.style.display = "none";
        }
    });

});

$(document).ready(function() {
    $(".openbtn").click(function() {
        var id = $(this).data("id");
        var x = document.getElementById("content_" + id);
        if ((x.style.display = "none")) {
            x.style.display = "inline-block";
        }
    });

});