const iniciarEliminacion = async function(){
    let id = this.idDomicilio;
    let resp = await Swal.fire({title:"¿Esta seguro?", text:"Esta operacion es irreversible",
    icon:"error", showCancelButton:true});
    if(resp.isConfirmed){
        if(await eliminarDomicilio(id)){
            let domicilio = await getDomicilios();
            cargarTabla(domicilio);
            Swal.fire("Domicilio eliminado", "Domicilio eliminado exitosamente", "info");
        }
    }else{
        Swal.fire("Cancelado", "Cancelado a peticion del usuario","info");
    }
};

const actualizar = async function(){
    let idDomicilio = this.idDomicilio;
    let domicilio = await obtenerPorId(idDomicilio);
    let molde = this.parentNode.parentNode;
    domicilio.numero = molde.querySelector("#numero-num").value;
    domicilio.correo = molde.querySelector("#correo-txt").value;
    //domicilio.metros = molde.querySelector("#metros-cbx").value;


    await actualizarDomicilio(domicilio);
    await Swal.close();
    let domicilios = await getDomicilios();
    cargarTabla(domicilios);
};

const iniciarActualizacion = async function(){
    let idDomicilio = this.idDomicilio;
    let domicilio = await obtenerPorId(idDomicilio);
    let molde = document.querySelector(".molde-modificar").cloneNode(true);
    molde.querySelector("#numero-num").value = domicilio.numero;
    molde.querySelector("#correo-txt").value = domicilio.correo;
    //molde.querySelector("#metros-cbx").value = domicilio.metros;

    
    molde.querySelector("#domi-btn").idDomicilio = idDomicilio;
    molde.querySelector("#domi-btn").addEventListener("click", actualizar);
    await Swal.fire({
        title:"Actualizar",
        html: molde,
        confirmButtonText: "Cerrar"
    });
  
};
const cargarTabla = (domicilio)=>{
    let tbody = document.querySelector("#tbody-domicilio");
    tbody.innerHTML = "";
    for(let i=0; i < domicilio.length; ++i){
        let tr = document.createElement("tr");
        let tdNumero = document.createElement("td");
        tdNumero.innerText = domicilio[i].numero
        let tdCorreo = document.createElement("td");
        tdCorreo.innerText = domicilio[i].correo;
        // let tdMetro = document.createElement("td");
        // tdMetro.innerText = domicilio[i].metros;
        let tdAccion1 = document.createElement("td");
        //ELIMINAR
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.idDomicilio = domicilio[i].numero;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAccion1.appendChild(botonEliminar);
        //ACTUALIZAR
        let tdAccion2 = document.createElement("td");
        let botonActualizar = document.createElement("button");
        botonActualizar.innerText = "Actualizar";
        botonActualizar.classList.add("btn","btn-warning");
        botonActualizar.idDomicilio = domicilio[i].numero;
        botonActualizar.addEventListener("click", iniciarActualizacion);
        tdAccion2.appendChild(botonActualizar);


        tr.appendChild(tdNumero);
        tr.appendChild(tdCorreo);
        // tr.appendChild(tdMetro);
        tr.appendChild(tdAccion1);
        tr.appendChild(tdAccion2);

        tbody.appendChild(tr);
    }
};

document.addEventListener("DOMContentLoaded", async ()=>{
    let domicilio = await getDomicilios();
    cargarTabla(domicilio);
});