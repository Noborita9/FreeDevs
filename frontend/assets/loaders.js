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

const onClickLoadEventos = (data, element) => {
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

document.getElementById("eventos").addEventListener("click", ()=>{
  loader('../backend/api/load_items.php', "list_eventos", onClickLoadEventos, "eventos")
})
document.getElementById("insumos").addEventListener("click", ()=>{
  loader('../backend/api/load_items.php', "list_insumos", onClickLoadEventos, "insumos")
})
document.getElementById("usuarios").addEventListener("click", ()=>{
  loader('../backend/api/load_items.php', "list_usuarios", onClickLoadEventos, "usuarios")
})
document.getElementById("productos").addEventListener("click", ()=>{
  loader('../backend/api/load_items.php', "list_productos", onClickLoadEventos, "productos")
})
document.getElementById("roles").addEventListener("click", ()=>{
  loader('../backend/api/load_items.php', "list_roles", onClickLoadEventos, "role")
})

