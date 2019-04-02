// var boton=document.getElementById('boton');
// var accion=boton.addEventListener('click',sendRequest());

function sendRequest(){
    var elObjeto = new XMLHttpRequest();
    elObjeto.open('POST','backend.php', true);
    elObjeto.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    elObjeto.onreadystatechange= function(){
        document.getElementById('title').innerHTML =  elObjeto.responseText;
    }
    elObjeto.send('username=Fazt&password=secret');

}