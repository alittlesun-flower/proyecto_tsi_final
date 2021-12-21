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

const cargarTabla = (boleta)=>{
    let tbody = document.querySelector("#tbody-boleta");
    tbody.innerHTML = "";
    for(let i=0; i < boleta.length; ++i){
        let tr = document.createElement("tr");
        let tdMonto = document.createElement("td");
        tdMonto.innerText = boleta[i].monto;
        let tdMes = document.createElement("td");
        tdMes.innerText = boleta[i].mes;
        let tdAnno = document.createElement("td");
        tdAnno.innerText = boleta[i].anno;
        let tdDomicilio = document.createElement("td");
        tdDomicilio.innerText = boleta[i].domicilio_id;
        let tdAccion1 = document.createElement("td");
        //ELIMINAR
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.idBoleta = boleta[i].id;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAccion1.appendChild(botonEliminar);

        tr.appendChild(tdMonto);
        tr.appendChild(tdMes);
        tr.appendChild(tdAnno);
        tr.appendChild(tdDomicilio);
        tr.appendChild(tdAccion1);

        tbody.appendChild(tr);
    }
};

document.addEventListener("DOMContentLoaded", async ()=>{
    let boleta = await getBoletas();
    cargarTabla(boleta);
});