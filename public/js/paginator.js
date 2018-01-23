
function stringToElement(string) {
    var temp = document.createElement('div');
    temp.innerHTML = string;
    var result = temp.firstChild;
    temp.removeChild(result);
    return result;
}


function pressBtn(pages) {
    var triple = document.getElementById('triple');
    var last = document.getElementById('last');
    var pagination = document.getElementsByClassName('pagination')[0];

    pagination.removeChild(triple);

    pages.forEach(function (currentValue) {
        pagination.insertBefore(stringToElement(currentValue), last);
    })
}