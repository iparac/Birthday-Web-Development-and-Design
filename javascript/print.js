function ispisDiv(divIme) {
    var printContents = document.getElementById(divIme).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}