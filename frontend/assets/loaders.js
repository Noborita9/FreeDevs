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

const itemAdder = (handlerFile, data) => {
  fetch(handlerFile, {
    method: "POST",
    body: data
  })
}


const onClickLoadItem = (data, element) => {
  if (element == "list_eventos") {
    return data.map((item) => {
      return `<span id='event_${item['id_evento']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
  })}
  if (element == "list_insumos") {
    return data.map((item) => {
      return `<span id='event_${item['id']}'><h2>${item['nombre']}</h2><span class="list_sub_data"><p>${item['stock']} </p> <p>${item['unidad']}</p></span></span>`
  })}
  if (element == "list_productos") {
    return data.map((item) => {
      return `<p id='event_${item['id_evento']}'>${item['titulo']}</p>`
  })}
  if (element == "list_usuarios") {
    return data.map((item) => {
      return `<p id='event_${item['id_evento']}'>${item['titulo']}</p>`
  })}
  if (element == "list_roles") {
    return data.map((item) => {
      return `<span id='event_${item['id']}'><h2>${item['nombre']}</h2></span>`
  })}
}

document.addEventListener("DOMContentLoaded", function(event) {
  loader('../backend/api/load_items.php', "list_insumos", onClickLoadItem, "insumos")
})

const backendRoute = "../../backend/api/"
const loaderFileRoute = "../backend/api/load_items.php"

const options = [
  {
    "type": "roles",
    "submitHandlerFile": "create_role",
    "removeHandlerFile": "remove_role",
  },
  {
    "type": "insumos",
    "submitHandlerFile": "create_insumo",
    "removeHandlerFile": "remove_insumo",
  },
  {
    "type": "usuarios",
    "submitHandlerFile": "create_usuario",
    "removeHandlerFile": "remove_usuario",
  },
  {
    "type": "eventos",
    "submitHandlerFile": "create_evento",
    "removeHandlerFile": "remove_evento",
  },
  {
    "type": "productos",
    "submitHandlerFile": "create_producto",
    "removeHandlerFile": "remove_producto",

  },
]
options.forEach(option => {
  let type = option["type"]
  document.getElementById(`button_${type}_save`).addEventListener("click", (event)=>{
    let itemData = new FormData(document.getElementById(`${type}_form`))
    itemAdder(option["submitHandlerFile"], itemData)
    loader()
  })
  document.getElementById(`button_${type}_remove`).addEventListener("click", (event)=>{

  })
  document.getElementById(type).addEventListener("click", ()=>{
    loader('../backend/api/load_items.php', `list_${type}`, onClickLoadItem, type)
  })
})
