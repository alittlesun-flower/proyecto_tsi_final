document.querySelector("#domi-btn").addEventListener("click", async()=>{
    let numero = document.querySelector("#numero-num").value.trim();
    let correo = document.querySelector("#correo-txt").value.trim();
    let metros = document.querySelector("#metros-cbx").value;
    let errores = []
    if(numero === ""){
        errores.push("Debes de ingresar un número para el domicilio")
    }
    if(correo === ""){
        errores.push("Debes de ingresar un correo para el domicilio")
    }
    if(errores.length == 0){
        let domi = {};
        domi.numero = numero;
        domi.correo = correo;
        domi.metros= metros;
    
        let res = await crearDomicilio(domi);
        await Swal.fire("Domicilio ingresado", "Domicilio ingresado con exito", "info")
        window.location.href = "verDomicilio";
    }else{
        Swal.fire({
            title: "Errores de validación",
            icon: "warning",
            html: errores.join("<br />") 
        });
    }
    
});