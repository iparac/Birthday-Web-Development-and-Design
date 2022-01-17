/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.addEventListener('load', function(){
    document.getElementById('access').addEventListener("click", zamjeniCSS);

})
function zamjeniCSS() {

    var tema = document.getElementsByTagName('link')[0];

    if (tema.getAttribute('href') == 'css/iparac.css') {
        tema.setAttribute('href', 'css/disleksija.css');
    } else {
        tema.setAttribute('href', 'css/iparac.css');
    }
}