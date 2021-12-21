
getBoletas = async()=>{
	let resp = await axios.get("api/boleta/get");
	return resp.data;
}
const crearBoleta = async(bole)=>{
    let resp = await axios.post("api/boleta/post", bole, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return resp.data;
};
const eliminarBoleta = async(id)=>{
    try{
        let resp = await axios.post("api/boleta/eliminar", {id}, {
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
    let resp = await axios.get(`api/boleta/obtenerPorId?id=${id}`);
    return resp.data;
}