function PopIt() { alert("Are you sure you want to leave?"); }
function UnPopIt()  { /* nothing to return */ }

$(document).ready(function() {
    window.onbeforeunload = PopIt;
    $("a").click(function(){ window.onbeforeunload = UnPopIt; });
});

