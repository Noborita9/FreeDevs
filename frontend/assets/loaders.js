const backendRoute = "../backend/endpoints/"
const actual_map = new Map()
let actual_type = "insumos"
let actual_id = 0
const units = {
    1: "Kg",
    2: "Gr",
    3: "L",
    4: "Ml",
    5: "Unidad",
    6: "Entera",
    7: "Media",
    8: "Cuarto",
}

const transformer = (unit, quantity) => {
    let changes = {
        "Kg": () => { return quantity / 1000 },
        "Gr": () => { return quantity },
        "L": () => { return quantity / 1000 },
        "Ml": () => { return quantity },
        "Unidad": () => { return quantity },
        "Entera": () => { return quantity },
        "Media": () => { return quantity },
        "Cuarto": () => { return quantity },
    }
    return changes[units[unit]]()
}

// const ingresarPlano = document.getElementById('ingresar_plano');
// const planoChecked = document.getElementById('plano-checked');

// ingresarPlano.addEventListener('change', () => {planoChecked.classList.add('checked')})
// let actual_id = 0

function checkear(inputFile, checkTick) {
    inputFile.addEventListener('change', () => { checkTick.classList.add('checked') })
}

checkear(document.getElementById('ingresar_plano'), document.getElementById('plano-checked'))
checkear(document.getElementById('event-image'), document.getElementById('event-checked'))
checkear(document.getElementById('imagen_elaborado'), document.getElementById('producto-checked'))
checkear(document.getElementById('ingresar-imagen'), document.getElementById('imagen-checked'))


const menuList = document.getElementById('menu-list');
const addMenu = document.getElementById('add-menu');
const selectMenu = document.getElementById('select-menu');

addMenu.addEventListener('click', () => {
    menuList.innerHTML += `
    <tr>
        <td><i class="fa-solid fa-trash icon-variant"></i></td> 
        <td>${selectMenu.value}</td>
    </tr>
    `
})

const encargadosList = document.getElementById('encargados-list')
const addEncargados = document.getElementById('add-encargado')
// const selectEncargados = document.getElementById('select-encargado')
const nombreEncargados = document.getElementById('name-input-encargado')
const apellidoEncargados = document.getElementById('apellido-input-encargado')

addEncargados.addEventListener('click', () => {
    encargadosList.innerHTML += `
  <tr>
    <td><i class="fa-solid fa-trash icon-variant"></i></td>
    <td>${nombreEncargados.value}</td>
    <td>${apellidoEncargados.value}</td>
  </tr>
  `
})



const chargeItem = (item, id, clear) => {
    if (!clear && item == "insumos") {
        let nombre_in_form = document.querySelector("#form_insumos > input[type=text]:nth-child(3)")
        let stock_in_form = document.querySelector("#form_insumos > span > input")
        let unidad_in_form = document.querySelector("#unidad-select")
        let precio_in_form = document.querySelector("#form_insumos > input[type=number]:nth-child(5)")
        let act_item = actual_map.get(`${id}`)
        nombre_in_form.value = act_item.nombre
        stock_in_form.value = transformer(act_item.unidad, act_item.stock)
        unidad_in_form.value = units[act_item.unidad]
        precio_in_form.value = act_item.precio
        actual_id = id
        window.localStorage.setItem("item_id", id)
    }
    else if (clear && item == "insumos") {
        let nombre_in_form = document.querySelector("#form_insumos > input[type=text]:nth-child(3)")
        let stock_in_form = document.querySelector("#form_insumos > span > input")
        let unidad_in_form = document.querySelector("#unidad-select")
        let precio_in_form = document.querySelector("#form_insumos > input[type=number]:nth-child(5)")
        actual_id = 0
        nombre_in_form.value = ""
        stock_in_form.value = 0
        unidad_in_form.value = "Kg"
        precio_in_form.value = 0
        window.localStorage.setItem("item_id", actual_id)
    }
}



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
            let items = injector(json["body"], item_table)
            items.forEach(item => {
                elementSpace.innerHTML += item
            });
        })
        .catch((err) => { console.log(err) })
}

function create_item(data, route, loadFunction, type, reload) {
    fetch(`${backendRoute}${route}`, {
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
            loader(`${backendRoute}load_items.php`, `list_${type}`, loadFunction, type)
            console.log(text)
            chargeItem(type, 0, true)
        })
        .catch((text) => { console.log(text) })
}

const onClickLoadInsumos = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span onclick='chargeItem("insumos", ${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2><span class="list_sub_data"><p>${transformer(item['unidad'], item['stock'])} </p> <p>${units[item['unidad']]}</p></span></span>`
    })
}
const onClickLoadUsuarios = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span><p id='${item['id']}'>${item['nombre_usuario']}</p></span>`
    })
}



document.addEventListener("DOMContentLoaded", function(event) {
    loader(`${backendRoute}load_items.php`, "list_insumos", onClickLoadInsumos, "insumos")
    loader(`${backendRoute}load_items.php`, "ingredient-select", loadSelectionIngredientes, "insumos")
    loader(`${backendRoute}load_items.php`, "unidad-select", loadSelectionUnidades, "unidades")
})

const loaderFileRoute = "../backend/endpoints/load_items.php"

const options = [
    {
        "type": "insumos",
        "loadFunction": onClickLoadInsumos,
        "submitHandlerFile": "create_insumo.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
    {
        "type": "usuarios",
        "loadFunction": onClickLoadUsuarios,
        "submitHandlerFile": "create_usuario.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
]


const getLoadFunction = (data, type) => {
    if (type == "productos") {
        return data.map((item) => {
            products.set(item["id"], item)
            return `<span onclick='chargeProduct(${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2></span>`
        })
    } else if (type == "usuarios") {
        return data.map((item) => {
            users.set(`${item["id"]}`, item)
            return `<span onclick='chargeUser(${item["id"]})' id='${item['id']}'><h2>${item['username']}</h2><p>${item['rol']}</span>`
        })
    } else if (type == "eventos") {
        return data.map((item) => {
            events.set(item["id"], item)
            return `<span id='${item['id']}'><h2>${item['titulo']}</h2><p>${item['fecha']}</p></span>`
        })
    } else if (type == "insumos"){
        return onClickLoadInsumos(data)
    }
}

window.localStorage.setItem("item", "insumos")
options.forEach(option => {
    let type = option["type"]
    let type_dom = document.getElementById(`${type}`)
    type_dom.addEventListener('click', () => {
        loader(`${backendRoute}load_items.php`, `list_${type}`, option["loadFunction"], type)
        loader(`${backendRoute}load_items.php`, "ingredient-select", loadSelectionIngredientes, "insumos")
        window.localStorage.setItem("item", "insumos")
        actual_id = 0
        actual_type = type
    })
    const buttons = document.querySelectorAll(`#form_${type} button`)

    buttons[0].addEventListener('click', () => {
        chargeItem(type, 0, true)
    })
    buttons[1].addEventListener('click', () => {
        if (type == "insumos") {
            let data = new FormData(document.getElementById(`form_${type}`))
            let reload = false
            if (actual_id != 0) {
                data.set("id", actual_id)
                reload = true
            }
            create_item(data, option["submitHandlerFile"], option["loadFunction"], type, reload)
        }
    })
    document.querySelector("#cartel > span > button:nth-child(2)").addEventListener('click', () => {
        let data = new FormData()
        let item_to_remove = window.localStorage.getItem("item")
        data.set("id", window.localStorage.getItem("item_id"))
        data.set("item", item_to_remove)
        create_item(data, "remove_item_by_id.php", getLoadFunction, item_to_remove)
        document.getElementById("confirmar-accion").style.display = "none"
    })
});
searchButton = document.getElementById("buscador_button")
searchButton.addEventListener('click', () => {
    let searchValue = document.getElementById("buscador").value
    let item = window.localStorage.getItem("item")
    if (item == "usuarios"){
        loader(`${backendRoute}load_items.php`, `list_${item}`, getLoadFunction, item, true, `username LIKE "%${searchValue}%"`)
    } else {
        loader(`${backendRoute}load_items.php`, `list_${item}`, getLoadFunction, item, true, `nombre LIKE "%${searchValue}%"`)

    }
})
