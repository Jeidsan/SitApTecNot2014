/* 
 * medidas.js
 */

var spanLargura = document.getElementById("largura");
var spanAltura = document.getElementById("altura");

//captura a larguga e altura da janela
spanLargura.innerHTML = window.innerWidth + ' px';
spanAltura.innerHTML = window.innerHeight + ' px';

//ao redimensionar a janela, atualiza os valores
window.onresize = function(){
    spanLargura.innerHTML = window.innerWidth + ' px';
    spanAltura.innerHTML = window.innerHeight + ' px';
} ;