document.querySelector("#servi-btn").addEventListener("click", async()=>{
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-txt").value.trim();
    let tipo = document.querySelector("#servicios-cbx").value;
    let consumo = document.querySelector("#consumo-num").value;
    let monto = document.querySelector("#monto-num").value;
    let estado = '0';
    let errores = [];
    if(consumo === ""){
        errores.push("Debes de ingresar un consumo")
    }
    if(monto === ""){
        errores.push("Debes de ingresar monto")
    }
    if(consumo<0){
        errores.push("El consumo no puede ser negativo")
    }
    if(monto<0){
        errores.push("El monto no puede ser negativo")
    }
    if (errores.length == 0){
        let servi = {};
        servi.mes = mes;
        servi.estado = estado;
        servi.anno = anno;
        servi.tipo = tipo;
        servi.consumo = consumo;
        servi.monto = monto;

        let res = await crearServicio(servi);
        await Swal.fire("Servicio ingresado", "Servicio ingresado con exito", "info")
        window.location.href = "verServicio";
    }else{
        Swal.fire({
            title: "Errores de validación",
            icon: "warning",
            html: errores.join("<br />") 
        });
    }
    
});
document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelector("#anno-txt").value="2022";
});