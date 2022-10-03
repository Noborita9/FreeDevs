const backend_route = "../backend/api/"

const loader = (url, element, injector, item_table) => {
  const data = new FormData()
  data.set("item", item_table)
  fetch(url,{
    method: "POST",
    body: data
  })
    .then((res)=> {
      if (res.ok){
        return res.text()
      } else{
        throw "Error"
      }
    })
    .then((texto)=> {
      let json = JSON.parse(texto)
      let elementSpace = document.getElementById(element)
      elementSpace.innerHTML = " "
      let items = injector(json["body"], element)
      items.forEach(item => {
        elementSpace.innerHTML += item
      });
    })
    .catch((err)=>{console.log(err)})
  // [{}]
}

function create_item(data, route){

  fetch(`${backend_route}${route}`,{
    method: "POST",
    body: data
  })
  .then((res)=> {
      if (res.ok) {
        return res.text() } else {
        throw "Error"
      }
    })
  .then((text)=> {
      console.log(text)
    })
  .catch((text)=> {console.log(text)})
}

const onClickLoadEventos = (data, element) => {
  if (element == "list_eventos") {
    return data.map((item) => {
      return `<span id='event_${item['id_evento']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
  })}
}
const onClickLoadInsumos = (data,element) => {
  if (element == "list_insumos") {
    return data.map((item) => {
      return `<span id='event_${item['id']}'><h2>${item['nombre']}</h2><span class="list_sub_data"><p>${item['stock']} </p> <p>${item['unidad']}</p></span></span>`
  })}
}
const onClickLoadProductos = (data,element) => {
  if (element == "list_productos") {
    return data.map((item) => {
      return `<p id='event_${item['id_evento']}'>${item['titulo']}</p>`
  })}
}
const onClickLoadUsuarios = (data,element) => {
  if (element == "list_usuarios") {
    return data.map((item) => {
      return `<p id='event_${item['id_evento']}'>${item['titulo']}</p>`
  })}
}
const onClickLoadRoles = (data,element) => {
  if (element == "list_roles") {
    return data.map((item) => {
      return `<span id='event_${item['id']}'><h2>${item['nombre']}</h2></span>`
  })}
}

document.addEventListener("DOMContentLoaded", function(event) {
  loader('../backend/api/load_items.php', "list_insumos", onClickLoadInsumos, "insumos")
})

const backendRoute = "../../backend/api/"
const loaderFileRoute = "../backend/api/load_items.php"

const options = [
  {
    "type": "eventos",
    "loadFunction": onClickLoadEventos,
    "submitHandlerFile": "create_evento.php",
    "removeHandlerFile": "remove_evento.php"
  },
  {
    "type": "roles",
    "loadFunction": onClickLoadRoles,
    "submitHandlerFile": "create_role.php",
    "removeHandlerFile": "remove_role.php"
  },
  {
    "type": "insumos",
    "loadFunction": onClickLoadInsumos,
    "submitHandlerFile": "create_insumo.php",
    "removeHandlerFile": "remove_insumo.php"
  },
  {
    "type": "productos",
    "loadFunction": onClickLoadProductos,
    "submitHandlerFile": "create_producto.php",
    "removeHandlerFile": "remove_producto.php"
  },
  {
    "type": "usuarios",
    "loadFunction": onClickLoadUsuarios,
    "submitHandlerFile": "create_usuario.php",
    "removeHandlerFile": "remove_usuario.php"
  },
]

options.forEach(option => {
  let type = option["type"]
  console.log(`list_${type}`)
  document.getElementById(`${type}`).addEventListener('click', ()=>{
    loader(`${backend_route}load_items.php`, `list_${type}`, option["loadFunction"], type)
  })
  document.querySelector(`#form_${type} span button:nth-child(1)`).addEventListener('click', ()=>{
    create_item(new FormData(document.getElementById(`form_${type}`)), option["submitHandlerFile"])
    loader(`${backend_route}load_items.php`, `list_${type}`, option["loadFunction"], type)
  })
  document.querySelector(`#form_${type} span button:nth-child(2)`).addEventListener('click', ()=>{
    create_item(new FormData(document.getElementById(`form_${type}`)), option["submitHandlerFile"] )
    loader(`${backend_route}load_items.php`, `list_${type}`, option["loadFunction"], type)
  })
});
