
var handleClick = function(event){
    document.getElementById("button").innerHTML = "Changed!"; 
}
var button = document.querySelector('button');
button.addEventListener('click',handleClick);