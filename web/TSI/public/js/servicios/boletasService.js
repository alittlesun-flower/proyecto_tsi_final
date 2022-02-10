//filtro
getDomicilios = async(filtro = "todos")=>{
    let resp;
    if (filtro == "todos") {
        resp = await axios.get("api/boleta/get");
    }else{
        resp = await axios.get(`api/boleta/filtrar?filtro=${filtro}`);
    }
    //console.log(resp);
	return resp.data;
}
getDomiciliosAñadir = async()=>{
    let resp = await axios.get("api/domicilio/get");
	return resp.data;
}
//acaba filtro

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
const obtenerPorIdBoletaExportar = async (id)=>{
    let resp = await axios.get(`api/boleta/obtenerPorIdBoletaExportar?id=${id}`, {
        responseType:"blob" //recibir un archivo y convertir en tipo blob
    });
    return resp.data;
}
const obtenerPorMes = async (mes)=>{
    let resp = await axios.get(`api/servicio/obtenerPorMes?mes=${mes}`);
    return resp.data;
}
const obtenerDomPorId = async (numero)=>{
    let resp = await axios.get(`api/domicilio/obtenerPorId?numero=${numero}`);
    return resp.data;
}

const obtenerBoleta = async (numero)=>{
    let resp = await axios.get(`api/boleta/obtenerBoleta?numero=${numero}`);
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