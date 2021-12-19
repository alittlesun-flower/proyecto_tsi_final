getReparaciones = async()=>{
	let resp = await axios.get("api/reparacion/get");
	return resp.data;
}
crearReparacion = async(servi)=>{
	let resp = await axios.post("api/reparacion/post", servi, {
	    headers:{
		    'Content-Type': 'application/json'
	    }
    });
    return resp.data;
}
const eliminarReparacion = async(id)=>{
    try{
        let resp = await axios.post("api/reparacion/eliminar", {id}, {
            headers:{
                "Content-Type": "aplication/json"
            }
        });
        return resp.data == "ok";
    }catch(e){
        return false;
    }
}
const obtenerPorId = async (id)=>{
    let resp = await axios.get(`api/reparacion/obtenerPorId?id=${id}`);
    return resp.data;
}
const actualizarReparacion = async(servi)=>{
    try{
        let resp = await axios.post("api/reparacion/actualizar", servi, {
            headers:{
                "Content-Type": "application/json"
            }
        });
        return resp.data;
    }catch(e){
        return false;
    }
}