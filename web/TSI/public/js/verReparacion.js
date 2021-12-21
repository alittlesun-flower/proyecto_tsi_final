const iniciarEliminacion = async function(){
    let id = this.idReparacion;
    let resp = await Swal.fire({title:"¿Esta seguro?", text:"Esta operacion es irreversible",
    icon:"error", showCancelButton:true});
    if(resp.isConfirmed){
        if(await eliminarReparacion(id)){
            let reparacion = await getReparaciones();
            cargarTabla(reparacion);
            Swal.fire("Reparacion eliminada", "Reparacion eliminada exitosamente", "info");
        }
    }else{
        Swal.fire("Cancelado", "Cancelado a peticion del usuario","info");
    }
};

const actualizar = async function(){
    let idReparacion = this.idReparacion;
    let reparacion = await obtenerPorId(idReparacion);
    let molde = this.parentNode.parentNode;
    reparacion.mes = molde.querySelector("#mes-cbx").value;
    reparacion.anno = molde.querySelector("#anno-cbx").value;
    reparacion.tipo = molde.querySelector("#tipo-cbx").value;
    reparacion.nombre = molde.querySelector("#nombrerep-txt").value;
    reparacion.descripcion = molde.querySelector("#descripcion-txt").value;
    reparacion.monto = molde.querySelector("#montorep-num").value;

    await actualizarReparacion(reparacion);
    await Swal.close();
    let reparaciones = await getReparaciones();
    cargarTabla(reparaciones);
};

const iniciarActualizacion = async function(){
    let idReparacion = this.idReparacion;
    let reparacion = await obtenerPorId(idReparacion);
    let molde = document.querySelector(".molde-modificar").cloneNode(true);
    molde.querySelector("#mes-cbx").value = reparacion.mes;
    molde.querySelector("#anno-cbx").value = reparacion.anno;
    molde.querySelector("#tipo-cbx").value = reparacion.tipo;
    molde.querySelector("#nombrerep-txt").value = reparacion.nombre;
    molde.querySelector("#descripcion-txt").value = reparacion.descripcion;
    molde.querySelector("#montorep-num").value = reparacion.monto;
    molde.querySelector("#reparacion-btn").idReparacion = idReparacion;
    molde.querySelector("#reparacion-btn").addEventListener("click", actualizar);
    await Swal.fire({
        title:"Actualizar",
        html: molde,
        confirmButtonText: "Cerrar"
    });
  
};
const cargarTabla = (reparacion)=>{
    let tbody = document.querySelector("#tbody-reparacion");
    tbody.innerHTML = "";
    for(let i=0; i < reparacion.length; ++i){
        let tr = document.createElement("tr");
        let tdMes = document.createElement("td");
        tdMes.innerText = reparacion[i].mes
        let tdAnno = document.createElement("td");
        tdAnno.innerText = reparacion[i].anno;
        let tdTipo = document.createElement("td");
        tdTipo.innerText = reparacion[i].tipo;
        let tdNombre = document.createElement("td");
        tdNombre.innerText = reparacion[i].nombre;
        let tdDescripcion = document.createElement("td");
        tdDescripcion.innerText = reparacion[i].descripcion;
        let tdMonto = document.createElement("td");
        tdMonto.innerText = reparacion[i].monto;
        let tdAccion1 = document.createElement("td");
        //ELIMINAR
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.idReparacion = reparacion[i].id;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAccion1.appendChild(botonEliminar);
        //ACTUALIZAR
        let tdAccion2 = document.createElement("td");
        let botonActualizar = document.createElement("button");
        botonActualizar.innerText = "Actualizar";
        botonActualizar.classList.add("btn","btn-warning");
        botonActualizar.idReparacion = reparacion[i].id;
        botonActualizar.addEventListener("click", iniciarActualizacion);
        tdAccion2.appendChild(botonActualizar);


        tr.appendChild(tdMes);
        tr.appendChild(tdAnno);
        tr.appendChild(tdTipo);
        tr.appendChild(tdNombre);
        tr.appendChild(tdDescripcion);
        tr.appendChild(tdMonto);
        tr.appendChild(tdAccion1);
        tr.appendChild(tdAccion2);

        tbody.appendChild(tr);
    }
};

document.addEventListener("DOMContentLoaded", async ()=>{
    let reparacion = await getReparaciones();
    cargarTabla(reparacion);
});