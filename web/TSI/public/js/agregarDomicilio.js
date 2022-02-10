document.querySelector("#domi-btn").addEventListener("click", async()=>{
    let numero = document.querySelector("#numero-num").value.trim();
    let correo = document.querySelector("#correo-txt").value.trim();
    // let metros = document.querySelector("#metros-cbx").value;
    let domRepetido = await findById(numero);
    let errores = [];
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}.){1,125}[A-Z]{2,63}$/i;
    if (!(emailRegex.test(correo))) {
        errores.push("Ingrese un correo valido");
    }
    if(numero === ""){
        errores.push("Debes de ingresar un número para el domicilio")
    }
    if(numero < 0){
        errores.push("El número del domicilio no puede ser negativo")
    }
    if(correo === ""){
        errores.push("Debes de ingresar un correo para el domicilio")
    }
    if(!(domRepetido=="")){
        errores.push('Ya existe el domicilio ingresado');
    }
    if(errores.length == 0){
        let domi = {};
        domi.numero = numero;
        domi.correo = correo;
        // domi.metros= metros;
    
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