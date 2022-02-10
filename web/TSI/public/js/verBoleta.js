//filtro
const cargarDomicilios = async ()=>{
    //1. Ir a buscar el filtro-cbx
    let filtroCbx = document.querySelector("#filtro-cbx");

    let domi = await getDomicilios();
    domi.forEach(d=>{
        let option = document.createElement("option");
        option.innerText = d.numero;
        option.value = d.numero;
        Existe = 0;
        for(let i = 0; i< filtroCbx.length; i++){
            if(filtroCbx[i].innerText == d.numero ){
                Existe = 1;
            }
        }
        
        if (Existe == 0){
            filtroCbx.appendChild(option);
        }

    });
};
//fin filtro
const iniciarEliminacion = async function(){
    let id = this.idBoleta;
    let resp = await Swal.fire({title:"¿Esta seguro?", text:"Esta operacion es irreversible",
    icon:"error", showCancelButton:true});
    if(resp.isConfirmed){
        if(await eliminarBoleta(id)){
            let boleta = await getBoletas();
            cargarTabla(boleta);
            Swal.fire("Boleta eliminada", "Boleta eliminada exitosamente", "info");
        }
    }else{
        Swal.fire("Cancelado", "Cancelado a peticion del usuario","info");
    }
};
const Envio = async function(){
    let id = this.idBoleta;
    let resp = await obtenerPorIdBoletaExportar(id);
    let convertir = URL.createObjectURL(new Blob([resp]));//ese archivo se almacena temporalmente en el navegador
    const linkToDownloadImage = document.createElement("a"); 
    linkToDownloadImage.setAttribute("href", convertir);
	linkToDownloadImage.setAttribute("download", "tabla-boleta.pdf"); 
    linkToDownloadImage.click();
    console.log(resp);
    return resp.data;
    
    //location.href="boletas.descargar-tabla-boletas";
}
const cargarTabla = (boleta)=>{
    let tbody = document.querySelector("#tbody-boleta");
    tbody.innerHTML = "";
    for(let i=0; i < boleta.length; ++i){
        let tr = document.createElement("tr");
        let tdMonto = document.createElement("td");
        tdMonto.innerText = boleta[i].monto;
        let tdMontoDomicilio = document.createElement("td");
        tdMontoDomicilio.innerText = boleta[i].monto_domicilio;
        let tdMontoRegadio = document.createElement("td");
        tdMontoRegadio.innerText = boleta[i].monto_regadio;
        let tdMontoIluminacion = document.createElement("td");
        tdMontoIluminacion.innerText = boleta[i].monto_iluminacion;
        let tdCorreo = document.createElement("td");
        tdCorreo.innerText = boleta[i].correo;
        let tdMes = document.createElement("td");
        tdMes.innerText = boleta[i].mes;
        let tdAnno = document.createElement("td");
        tdAnno.innerText = boleta[i].anno;
        let tdDomicilio = document.createElement("td");
        tdDomicilio.innerText = boleta[i].numero;
        let tdAccion1 = document.createElement("td");

        let tdAccion2 = document.createElement("td");
        let botonExportar = document.createElement("button");
        botonExportar.innerText="Expotar PDF";
        botonExportar.classList.add("btn", "btn-warning");
        botonExportar.idBoleta = boleta[i].id;
        botonExportar.addEventListener("click", Envio);
        tdAccion2.appendChild(botonExportar);

        //ELIMINAR
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.idBoleta = boleta[i].id;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAccion1.appendChild(botonEliminar);

        tr.appendChild(tdMonto);
        tr.appendChild(tdMontoDomicilio);
        tr.appendChild(tdMontoRegadio);
        tr.appendChild(tdMontoIluminacion);
        tr.appendChild(tdCorreo);
        tr.appendChild(tdMes);
        tr.appendChild(tdAnno);
        tr.appendChild(tdDomicilio);
        tr.appendChild(tdAccion1);
        tr.appendChild(tdAccion2);

        tbody.appendChild(tr);
    }
};
document.querySelector("#filtro-cbx").addEventListener("change", async ()=>{
    let filtro = document.querySelector("#filtro-cbx").value;
    let boleta = await getDomicilios(filtro);
    cargarTabla(boleta);
});
document.addEventListener("DOMContentLoaded", async ()=>{
    await cargarDomicilios();
    let boleta = await getBoletas();
    cargarTabla(boleta);
    //filtro
    
});