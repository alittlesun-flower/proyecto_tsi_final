document.querySelector("#repa-btn").addEventListener("click", async()=>{
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-cbx").value.trim();
    let tipo = document.querySelector("#tipo-cbx").value;
    let nombre = document.querySelector("#nombrerep-txt").value.trim();
    let descripcion = document.querySelector("#descripcion-txt").value.trim();
    let monto = document.querySelector("#montorep-num").value;
    let errores = [];
    if(nombre === ""){
        errores.push("Debes de ingresar nombre para la reparación")
    }
    if(!isNaN(nombre) && nombre != ""){
        errores.push("Un titulo no puede ser numerico");
    }
    if(descripcion === ""){
        errores.push("Debes de ingresar una descripción")
    }
    if(monto === ""){
        errores.push("Debes de ingresar monto")
    }
    if(monto<0){
        errores.push("El monto no puede ser negativo")
    }
    if(errores.length == 0){
        let repa = {};
        repa.mes = mes;
        repa.anno = anno;
        repa.tipo = tipo;
        repa.nombre = nombre;
        repa.descripcion = descripcion;
        repa.monto = monto;

        let res = await crearReparacion(repa);
        await Swal.fire("Reparacion ingresada", "Reparacion ingresada con exito", "info")
        window.location.href = "verReparacion";
    }else{
        Swal.fire({
            title: "Errores de validación",
            icon: "warning",
            html: errores.join("<br />") 
        });
    }
    
});