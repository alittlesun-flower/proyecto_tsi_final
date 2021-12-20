document.querySelector("#domi-btn").addEventListener("click", async()=>{
    let numero = document.querySelector("#numero-num").value.trim();
    let correo = document.querySelector("#correo-txt").value.trim();

    let domi = {};
    domi.numero = numero;
    domi.correo = correo;
    

    let res = await crearDomicilio(domi);
    await Swal.fire("Domicilio ingresado", "Domicilio ingresado con exito", "info")
    window.location.href = "verDomicilio";
});