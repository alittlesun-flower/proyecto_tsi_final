document.querySelector("#repa-btn").addEventListener("click", async()=>{
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-txt").value.trim();
    let tipo = document.querySelector("#tipo-cbx").value;
    let nombre = document.querySelector("#nombrerep-txt").value.trim();
    let descripcion = document.querySelector("#descripcion-txt").value.trim();
    let monto = document.querySelector("#montorep-num").value;

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
});