$('#toggle-login').click(function(){
  $('#login').toggle();
});

window.onload = function () {
    var allElem = document.getElementsByName("sl");
    for (i = 0; i < allElem.length; i++) {
        allElem[i].addEventListener('change', toggleDisplay);
    }

}

function toggleDisplay(e) {
   var id = 's' + this.value;
    var currentSelect = document.getElementsByClassName("active")[0];
    if (currentSelect) {
        currentSelect.className = "";
    }
    document.getElementById(id).className = "active";
}