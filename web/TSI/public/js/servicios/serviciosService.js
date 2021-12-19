getServicios = async()=>{
	let resp = await axios.get("api/servicio/get");
	return resp.data;
}
crearServicio = async(servi)=>{
	let resp = await axios.post("api/servicio/post", servi, {
	    headers:{
		    'Content-Type': 'application/json'
	    }
    });
    return resp.data;
}
const eliminarServicio = async(id)=>{
    try{
        let resp = await axios.post("api/servicio/eliminar", {id}, {
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
    let resp = await axios.get(`api/servicio/obtenerPorId?id=${id}`);
    return resp.data;
}
const actualizarServicio = async(servi)=>{
    try{
        let resp = await axios.post("api/servicio/actualizar", servi, {
            headers:{
                "Content-Type": "application/json"
            }
        });
        return resp.data;
    }catch(e){
        return false;
    }
}