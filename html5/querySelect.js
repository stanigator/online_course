function bringit(){
    var list = document.querySelectorAll("#first");
    list[1].onclick = say;
}

function say(){
    alert("You clicked something!");
}

window.onload = bringit;
