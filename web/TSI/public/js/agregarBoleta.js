


getDomicilios = async()=>{
	let resp = await axios.get("api/domicilio/get");
	return resp.data;
}

const cargarDomicilio = async()=>{
    let domicilios = await getDomicilios();
    let domicilioSelect = document.querySelector("#numero-cbx");

    domicilios.forEach(d=>{
        let option = document.createElement("option");
        option.value = d.id;
        option.innerText = d.numero;
        domicilioSelect.appendChild(option);
    });
};


document.querySelector("#boleta-btn").addEventListener("click", async()=>{
    let domicilio_id = document.querySelector("#numero-cbx").value.trim();
    let monto = document.querySelector("#montorep-num").value.trim();
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-cbx").value;



    let bole = {};
    bole.monto = monto;
    bole.mes = mes;
    bole.anno = anno;
    bole.domicilio_id = domicilio_id;
    let res = await crearBoleta(bole);
    await Swal.fire("Boleta enviada", "Boleta enviada con exito", "info")
    window.location.href = "verBoleta";
});

document.addEventListener("DOMContentLoaded", ()=>{
    cargarDomicilio();
});


