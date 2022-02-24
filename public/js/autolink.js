let textid = document.getElementById("body").innerHTML;

function urlify(text) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function(url) {
        return '<a target="_blank" href="' + url + '">' + url + '</a>';
    })
}
var html = urlify(textid);
document.getElementById("body").innerHTML = html;
