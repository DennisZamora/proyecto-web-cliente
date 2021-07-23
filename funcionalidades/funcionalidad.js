function mostrarHora() {
    var reloj = "";
    var Digital = new Date();
    var dias = Digital.getDate();
    var meses = Digital.getMonth() + 1;
    var anio = Digital.getFullYear();
    var horas = Digital.getHours();
    var minutos = Digital.getMinutes();
    var segundos = Digital.getSeconds();
    var tiempo = "am";
    if (horas == 12) tiempo = "pm"
    if (horas > 12) {
        tiempo = "pm";
        horas = horas - 12;
    }
    if (horas == 0) horas = 12
    if (horas.toString().length == 1)
        horas = "0" + horas;
    if (minutos <= 9)
        minutos = "0" + minutos;
    var timestamp = new Date().getTime();
    var canvas = document.getElementById("anuncio");
    var ctx = canvas.getContext("2d");
    if (segundos == 0) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.font = "30px Arial";
    } else
    if (segundos > 0) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        reloj = dias + "/" + meses + "/" + anio + "," + horas + ":" + minutos + " " + tiempo;
        ctx.font = "30px Arial";
        ctx.strokeText(reloj, 10, 50);
    } 
    requestAnimationFrame(mostrarHora);
}
requestAnimationFrame(mostrarHora);