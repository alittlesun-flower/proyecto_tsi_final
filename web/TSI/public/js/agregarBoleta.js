getDomicilios = async()=>{
	let resp = await axios.get("api/domicilio/get");
	return resp.data;
}

const cargarDomicilio = async()=>{
    let domicilios = await getDomicilios();
    let domicilioSelect = document.querySelector("#numero-cbx");

    domicilios.forEach(d=>{
        let option = document.createElement("option");
        option.id = d.id;
        option.innerText = d.numero;
        domicilioSelect.appendChild(option);
    });
};

const cargarCorreo = async()=>{
    let correo = await getDomicilios();
    let correoSelect = document.querySelector("#correo-cbx");

    correo.forEach(d=>{
        let option = document.createElement("option");
        option.id = d.id;
        option.innerText = d.correo;
        correoSelect.appendChild(option);
    });
};

document.addEventListener("DOMContentLoaded", ()=>{
    cargarDomicilio();
    cargarCorreo();
});

