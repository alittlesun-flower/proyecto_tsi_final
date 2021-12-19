document.querySelector("#servi-btn").addEventListener("click", async()=>{
    let mes = document.querySelector("#mes-cbx").value.trim();
    let anno = document.querySelector("#anno-txt").value.trim();
    let tipo = document.querySelector("#servicios-cbx").value;
    let consumo = document.querySelector("#consumo-num").value;
    let monto = document.querySelector("#monto-num").value;

    
    let servi = {};
    servi.mes = mes;
    servi.anno = anno;
    servi.tipo = tipo;
    servi.consumo = consumo;
    servi.monto = monto;

    let res = await crearServicio(servi);
    await Swal.fire("Servicio ingresado", "Servicio ingresado con exito", "info")
    window.location.href = "verServicio";
});