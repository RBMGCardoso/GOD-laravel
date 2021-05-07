var button = document.getElementById("dropdown-button");  
var estadoButton = false;

function mudarButton() {
    //false = fechado , true = aberto

    estadoButton = !estadoButton;
    if(estadoButton)
    {
        button.style.transform = "rotate(180deg)";
    }
    else
    {
        button.style.transform = "rotate(0deg)";
    }
}