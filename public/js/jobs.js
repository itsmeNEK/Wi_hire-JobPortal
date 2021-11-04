function showcontent(id) {
    var x = document.getElementById("content_" + id);
    if (x.style.display = "none") {
        x.style.display = "inline-block";
    }

};

function hidecontent(id) {
    var x = document.getElementById("content_" + id);
    if (x.style.display = "inline-block") {
        x.style.display = "none";
    }
};

function applyclick(id) {
    if (confirm("You Must Login First")) {
        location.replace("user_login");
    } else {

    }
}