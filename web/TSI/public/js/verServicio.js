const iniciarEliminacion = async function(){
    let id = this.idServicio;
    let resp = await Swal.fire({title:"¿Esta seguro?", text:"Esta operacion es irreversible",
    icon:"error", showCancelButton:true});
    if(resp.isConfirmed){
        if(await eliminarServicio(id)){
            let servicio = await getServicios();
            cargarTabla(servicio);
            Swal.fire("Servicio eliminado", "Servicio eliminado exitosamente", "info");
        }
    }else{
        Swal.fire("Cancelado", "Cancelado a peticion del usuario","info");
    }
};

const actualizar = async function(){
    let idServicio = this.idServicio;
    let servicio = await obtenerPorId(idServicio);
    let molde = this.parentNode.parentNode;
    servicio.mes = molde.querySelector("#mes-cbx").value;
    servicio.anno = molde.querySelector("#anno-cbx").value;
    servicio.tipo = molde.querySelector("#servicios-cbx").value;
    servicio.consumo = molde.querySelector("#consumo-num").value;
    servicio.monto = molde.querySelector("#monto-num").value;

    await actualizarServicio(servicio);
    await Swal.close();
    let servicios = await getServicios();
    cargarTabla(servicios);
};

const iniciarActualizacion = async function(){
    let idServicio = this.idServicio;
    let servicio = await obtenerPorId(idServicio);
    let molde = document.querySelector(".molde-modificar").cloneNode(true);
    molde.querySelector("#mes-cbx").value = servicio.mes;
    molde.querySelector("#anno-cbx").value = servicio.anno;
    molde.querySelector("#servicios-cbx").value = servicio.tipo;
    molde.querySelector("#consumo-num").value = servicio.consumo;
    molde.querySelector("#monto-num").value = servicio.monto;
    molde.querySelector("#actualizar-btn").idServicio = idServicio;
    molde.querySelector("#actualizar-btn").addEventListener("click", actualizar);
    await Swal.fire({
        title:"Actualizar",
        html: molde,
        confirmButtonText: "Cerrar"
    });
  
};
const cargarTabla = (servicio)=>{
    //1. obtener una referencia al cuerpo de la tabla
    let tbody = document.querySelector("#tbody-servicio");
    tbody.innerHTML = "";
    //2. recorrer todas las tablas
    for(let i=0; i < servicio.length; ++i){
        //3. por cada consola generar una fila
        let tr = document.createElement("tr");
        //4. generar por cada atributo de la consola, un td
        let tdMes = document.createElement("td");
        tdMes.innerText = servicio[i].mes
        let tdAnno = document.createElement("td");
        tdAnno.innerText = servicio[i].anno;
        let tdServicio = document.createElement("td");
        tdServicio.innerText = servicio[i].tipo;
        let tdConsumo = document.createElement("td");
        tdConsumo.innerText = servicio[i].consumo;
        let tdMonto = document.createElement("td");
        tdMonto.innerText = servicio[i].monto;
        let tdAccion1 = document.createElement("td");
        //ELIMINAR
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.idServicio = servicio[i].id;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAccion1.appendChild(botonEliminar);
        //ACTUALIZAR
        let tdAccion2 = document.createElement("td");
        let botonActualizar = document.createElement("button");
        botonActualizar.innerText = "Actualizar";
        botonActualizar.classList.add("btn","btn-warning");
        botonActualizar.idServicio = servicio[i].id;
        botonActualizar.addEventListener("click", iniciarActualizacion);
        tdAccion2.appendChild(botonActualizar);

        //5. agregar los td al tr
        tr.appendChild(tdMes);
        tr.appendChild(tdAnno);
        tr.appendChild(tdServicio);
        tr.appendChild(tdConsumo);
        tr.appendChild(tdMonto);
        tr.appendChild(tdAccion1);
        tr.appendChild(tdAccion2);
        //6. agregar el tr al cuerpo de la tabla
        tbody.appendChild(tr);
    }
};

document.addEventListener("DOMContentLoaded", async ()=>{
    let servicio = await getServicios();
    cargarTabla(servicio);
});