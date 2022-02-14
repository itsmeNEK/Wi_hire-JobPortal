function closeNav() {
    document.getElementById("mySidebar").style.width = "0px";
    document.getElementById("main").style.marginLeft = "0px";
    var element = document.getElementById('main');
    var element1 = document.getElementById('mySidebar');
    element.style.marginLeft = null;
    element1.style.width = null;
};

function openNav() {
    document.getElementById("mySidebar").style.width = "150px";
    document.getElementById("main").style.marginLeft = "150px";
};