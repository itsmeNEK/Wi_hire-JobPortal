function applyclick(id) {
    if (confirm("You Must Login First")) {
        location.replace("user_login");
    } else {}
}

$(".openbtn").click(function() {
    var id = $(this).data("id");
    var x = document.getElementById("content_" + id);
    if ((x.style.display = "none")) {
        x.style.display = "inline-block";

    }
});

$(".closebtn").click(function() {
    var id = $(this).data("id");
    var x = document.getElementById("content_" + id);
    if ((x.style.display = "inline-block")) {
        x.style.display = "none";
    }
});