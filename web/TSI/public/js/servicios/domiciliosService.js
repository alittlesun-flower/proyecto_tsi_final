
getDomicilios = async()=>{
	let resp = await axios.get("api/domicilio/get");
	return resp.data;
}
crearDomicilio= async(domi)=>{
	let resp = await axios.post("api/domicilio/post", domi, {
	    headers:{
		    'Content-Type': 'application/json'
	    }
    });
    return resp.data;
}
const eliminarDomicilio = async(numero)=>{
    try{
        let resp = await axios.post("api/domicilio/eliminar", {numero}, {
            headers:{
                "Content-Type": "aplication/json"
            }
        });
        return resp.data == "ok";
    }catch(e){
        return false;
    }
}
const obtenerPorId = async (numero)=>{
    let resp = await axios.get(`api/domicilio/obtenerPorId?numero=${numero}`);
    return resp.data;
}
const findById = async (numero)=>{
    let resp = await axios.get(`api/domicilio/findById?numero=${numero}`);
    return resp.data;
}
const actualizarDomicilio = async(domi)=>{
    try{
        let resp = await axios.post("api/domicilio/actualizar", domi, {
            headers:{
                "Content-Type": "application/json"
            }
        });
        return resp.data;
    }catch(e){
        return false;
    }
}