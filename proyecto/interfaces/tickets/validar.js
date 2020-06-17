function validacion() {
    var cond = true;
    var verificar = true;
    if (!document.formul_ticket.fecha_hora.value) {
        verificar = false;
        alert("Por favor llene el campo fecha_hora");
        document.formul_ticket.fecha_hora.focus();
        cond = false;
    }

    if (!document.formul_ticket.banco_km.value && cond == true) {
        verificar = false;
        alert("Por favor llene el campo Banco_KM");
        document.formul_ticket.banco_km.focus();
        cond = false;
    }

    if (!document.formul_ticket.distancia.value && cond == true) {
        verificar = false;
        alert("No ha indicado la Distancia Actual");
        document.formul_ticket.distancia.focus();
        cond = false;
    }

    if (document.formul_ticket.Placas.value.length < 5 && cond == true) {
        verificar = false;
        alert("El num de placas deben ser minimo 6"); //No estoy seguro de esa información
        document.formul_ticket.Placas.focus();
        cond = false;
    }


    if (verificar) {
        document.formul_ticket.submit();
    }
};

window.onload = function() {
    document.getElementById("btn").onclick = this.validacion;
};
