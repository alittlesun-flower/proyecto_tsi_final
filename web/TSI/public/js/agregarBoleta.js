getDomicilios = async()=>{
	let resp = await axios.get("api/domicilio/get");
	return resp.data;
}

const cargarDomicilio = async()=>{
    let domicilios = await getDomiciliosAñadir();
    let domicilioSelect = document.querySelector("#numero-cbx");

    domicilios.forEach(d=>{
        let option = document.createElement("option");
        option.value = d.numero;
        option.innerText = d.numero;
        Existe = 0;
        for(let i = 0; i< domicilioSelect.length; i++){
            if(domicilioSelect[i].innerText == d.numero ){
                Existe = 1;
            }
        }
        
        if (Existe == 0){
            domicilioSelect.appendChild(option);
        }
    });
};


document.querySelector("#boleta-btn").addEventListener("click", async()=>{ 
    let domicilio_id = document.querySelector("#numero-cbx").value.trim();
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-cbx").value;
    let servicios = await obtenerPorMes(mes);
    let boletaRepetida = await obtenerBoleta(domicilio_id);
    let montoTotalServiciosMes = 0;
    let montoAPagarDomicilio=0;
    let montoRegadio = 0;
    let montoIluminacion = 0;
    servicios.forEach(s=>{
        s.estado = '1';
        montoTotalServiciosMes = montoTotalServiciosMes+s.monto;
        if (s.tipo =='jardines'){
            montoRegadio = montoRegadio + s.monto;
        }else{
            montoIluminacion = montoIluminacion + s.monto;
        }
        let resp = actualizarServicio(s);
    });

    let cantDom = document.querySelector("#numero-cbx").length;
    montoAPagarDomicilio = Math.round(montoTotalServiciosMes/cantDom);
    montoRegadio = Math.round(montoRegadio/cantDom);
    montoIluminacion=Math.round(montoIluminacion/cantDom);
    document.querySelector("#montototal-num").value=montoTotalServiciosMes;
    document.querySelector("#montoboleta-num").value=montoAPagarDomicilio;
    let domi = await obtenerDomPorId(domicilio_id);
    let correo = domi.correo;
    let errores = [];
    let flag = '0';
    if(boletaRepetida.length>=1){
        boletaRepetida.forEach(boleta=>{
            if(boleta.mes == mes){
                flag='1'
            }
        });
    }
    if(flag=='1'){
        errores.push("Boleta ya existente");
    }
    if(errores.length == 0){
        let bole = {};
        bole.monto = montoTotalServiciosMes;
        bole.monto_domicilio = montoAPagarDomicilio;
        bole.monto_iluminacion = montoIluminacion;
        bole.monto_regadio = montoRegadio;
        bole.mes = mes;
        bole.anno = anno;
        bole.correo = correo;
        bole.numero = domicilio_id;
        let res = await crearBoleta(bole);
        await Swal.fire("Boleta enviada", "Boleta enviada con exito", "info")
        window.location.href = "verBoleta";
    }else{
        Swal.fire({
            title: "Errores de validación",
            icon: "warning",
            html: errores.join("<br />") 
        });
    } 
});

document.addEventListener("DOMContentLoaded",async ()=>{
    cargarDomicilio();
    let mes = document.querySelector("#mes-cbx").value.trim();
    let servicios = await obtenerPorMes(mes);
    let montoTotalServiciosMes = 0;
    let montoAPagarDomicilio=0;
    servicios.forEach(s=>{
        montoTotalServiciosMes = montoTotalServiciosMes+s.monto;
    });
    let cantDom = document.querySelector("#numero-cbx").length;
    montoAPagarDomicilio = Math.round(montoTotalServiciosMes/cantDom);
    document.querySelector("#montototal-num").value=montoTotalServiciosMes;
    document.querySelector("#montoboleta-num").value=montoAPagarDomicilio;
});

document.querySelector("#mes-cbx").addEventListener("change", async()=>{
    let mes = document.querySelector("#mes-cbx").value.trim();
    let servicios = await obtenerPorMes(mes);
    let montoTotalServiciosMes = 0;
    let montoAPagarDomicilio=0;
    servicios.forEach(s=>{
        montoTotalServiciosMes = montoTotalServiciosMes+s.monto;
    });
    let cantDom = document.querySelector("#numero-cbx").length;
    montoAPagarDomicilio = Math.round(montoTotalServiciosMes/cantDom);
    document.querySelector("#montototal-num").value=montoTotalServiciosMes;
    document.querySelector("#montoboleta-num").value=montoAPagarDomicilio;
});