const backend_route = "../backend/api/"
const actual_map = new Map()

const addFichTec = document.getElementById('add-fichTec');
const fichTecList = document.getElementById('fichTec-list');
const selectFichTec = document.getElementById('select_fichTec');

addFichTec.addEventListener(('click'), () => {
  fichTecList.innerHTML += `
  <tr>
  <td>${selectFichTec.value}</td>
  </tr>
  `
})

const encargadosList = document.getElementById('encargados-list')
const addEncargados = document.getElementById('add-encargado')
// const selectEncargados = document.getElementById('select-encargado')
const nombreEncargados = document.getElementById('name-input-encargado')
const apellidoEncargados = document.getElementById('apellido-input-encargado')

addEncargados.addEventListener('click', () => {encargadosList.innerHTML += `
  <tr>
    <td>${nombreEncargados.value}</td>
    <td>${apellidoEncargados.value}</td>
  </tr>
  `
})

const addIngredient = document.getElementById('add-ingredient');
const selectIngredient = document.getElementById('ingredient-select');
const counterIngredient = document.getElementById('ingredient-counter')
const ingredientList = document.getElementById('ingredient-list');

counterIngredient.value= 1
addIngredient.addEventListener('click', () => {
  ingredientList.innerHTML += `
  <tr>
  <td></td>
  <td>${ selectIngredient.value }</td>
  <td>${ counterIngredient.value }</td>
  </tr>`
  counterIngredient.value= 1
  })

const addVariantButton = document.getElementById('add-variant');
const variantList = document.getElementById('variant_list');
const variantInput = 
`
<span class="variant none_margin">
<i class="fa-solid fa-trash icon-variant"></i>
<input type="text" placeholder="unidad">
<input type="number" placeholder="precio">
</span>
`

variantList.innerHTML += variantInput

addVariantButton.addEventListener('click', () => { variantList.innerHTML += variantInput });



const loader = (url, element, injector, item_table, is_searching, search_query) => {
  const data = new FormData()
  data.set("item", item_table)
  if (is_searching) {
    data.set("searching", true)
    data.set("query_string", search_query)
  }
  fetch(url, {
    method: "POST",
    body: data
  })
    .then((res) => {
      if (res.ok) {
        return res.text()
      } else {
        throw "Error"
      }
    })
    .then((texto) => {
      let json = JSON.parse(texto)
      let elementSpace = document.getElementById(element)
      elementSpace.innerHTML = " "
      let items = injector(json["body"])
      items.forEach(item => {
        elementSpace.innerHTML += item
      });
    })
    .catch((err) => { console.log(err) })
}

function create_item(data, route, loadFunction, type) {

  fetch(`${backend_route}${route}`, {
    method: "POST",
    body: data
  })
    .then((res) => {
      if (res.ok) {
        return res.text()
      } else {
        throw "Error"
      }
    })
    .then((text) => {
      loader(`${backend_route}load_items.php`, `list_${type}`, loadFunction, type)
    })
    .catch((text) => { console.log(text) })
}

const onClickLoadEventos = (data) => {
  return data.map((item) => {
    actual_map.set(item["id"], item)
    return `<span onclick='chargeItem(${item['id']})' id='${item['id']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
  })
}
const onClickLoadInsumos = (data) => {
  return data.map((item) => {
    actual_map.set(item["id"], item)
    return `<span onclick='chargeItem(${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2><span class="list_sub_data"><p>${item['stock']} </p> <p>${item['unidad']}</p></span></span>`
  })
}
const onClickLoadProductos = (data) => {
  return data.map((item) => {
    actual_map.set(item["id"], item)
    return `<p id='${item['id']}'>${item['nombre']}</p>`
  })
}
const onClickLoadUsuarios = (data) => {
  return data.map((item) => {
    actual_map.set(item["id"], item)
    return `<span> <p id='${item['id']}'>${item['nombre_usuario']}</p> </span>`
  })
}
const onClickLoadRoles = (data) => {
  return data.map((item) => {
    actual_map.set(item["id"], item)
    return `<span id='${item['id']}'><h2>${item['nombre']}</h2></span>`
  })
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
  document.getElementById(`${type}`).addEventListener('click', () => {
    loader(`${backend_route}load_items.php`, `list_${type}`, option["loadFunction"], type)
  })
  const buttons = document.querySelectorAll(`#form_${type} button`)
  buttons[0].addEventListener('click', () => {
    create_item(new FormData(document.getElementById(`form_${type}`)), option["submitHandlerFile"], option["loadFunction"], type)
  })
  buttons[1].addEventListener('click', () => {
    create_item(new FormData(document.getElementById(`form_${type}`)), option["submitHandlerFile"], option["loadFunction"], type)
  })
});

searchButton = document.getElementById("buscador_button")
searchButton.addEventListener('click', () => {
  let searchValue = document.getElementById("buscador").value
  loader(`${backend_route}load_items.php`, `list_insumos`, onClickLoadInsumos, "insumos", true, `nombre LIKE "%${searchValue}%" `)
})
