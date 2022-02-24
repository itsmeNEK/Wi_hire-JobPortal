let textid = document.getElementById("body").innerHTML;

function replaceURLs(textid) {
    if (!textid) return;

    var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
    return textid.replace(urlRegex, function(url) {
        var hyperlink = url;
        if (!hyperlink.match('^https?:\/\/')) {
            hyperlink = 'http://' + hyperlink;
        }
        return '<a href="' + hyperlink + '" target="_blank" rel="noopener noreferrer">' + url + '</a>'
    });
}
var html = replaceURLs(textid);
document.getElementById("body").innerHTML = html;
