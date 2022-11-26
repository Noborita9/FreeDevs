const backendRoute = "../backend/endpoints/"
const ingred_map = new Map()
const actual_map = new Map()
const actual_unities = []
let actual_id = 0
let variant_counter = 1
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

const addFichTec = document.getElementById('add-fichTec');
const fichTecList = document.getElementById('fichTec-list');
const selectFichTec = document.getElementById('select_fichTec');

const add_fich_tec_row = () => {
    fichTecList.innerHTML += ` <tr><td>${selectFichTec.value}</td></tr>`;
}
addFichTec.addEventListener(('click'), () => {
    add_row()
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

counterIngredient.value = 1
addIngredient.addEventListener('click', () => {
    ingredientList.innerHTML += `
<tr>
<td>${selectIngredient.value}</td>
<td>${counterIngredient.value}</td>
</tr>`
    counterIngredient.value = 1
})

let addVariantButton = document.querySelector('#add-variant')
const variantList = document.getElementById('variant_list')

const add_var_row = () => {
    let variantInput =
        `
<span id='var_${variant_counter}' class="variant none_margin">
<i class="fa-solid fa-trash icon-variant"></i>
<input type="text" placeholder="unidad">
<input type="number" placeholder="precio">
</span>
`

    variantList.innerHTML += variantInput
    variant_counter += 1

}

add_var_row()

addVariantButton.addEventListener('click', () => { 
    add_var_row()
});

const chargeItem = (item, id, clear) => {
    if (!clear && item == "insumos") {
        let nombre_in_form = document.querySelector("#form_insumos > input[type=text]:nth-child(2)")
        let stock_in_form = document.querySelector("#form_insumos > span > input")
        let unidad_in_form = document.querySelector("#unidad-select")
        let precio_in_form = document.querySelector("#form_insumos > input[type=number]:nth-child(4)")
        let act_item = actual_map.get(id)
        nombre_in_form.value = act_item.nombre
        stock_in_form.value = transformer(act_item.unidad, act_item.stock)
        unidad_in_form.value = units[act_item.unidad]
        precio_in_form.value = act_item.precio
        actual_id = id
    }
    else if (clear && item == "insumos") {
        let nombre_in_form = document.querySelector("#form_insumos > input[type=text]:nth-child(2)")
        let stock_in_form = document.querySelector("#form_insumos > span > input")
        let unidad_in_form = document.querySelector("#unidad-select")
        let precio_in_form = document.querySelector("#form_insumos > input[type=number]:nth-child(4)")
        nombre_in_form.value = ""
        stock_in_form.value = 0
        unidad_in_form.value = "Kg"
        precio_in_form.value = 0
    }
    else if (item == "productos") {
        let nombre_in_form = document.querySelector("#form_productos > input[type=text]:nth-child(2)")
        let act_item = actual_map.get(id)
        nombre_in_form.value = act_item.nombre
        actual_id = id
        loadUnities(id)
    }
}

const loadUnities = (id) => {
    const data = new FormData()
    data.set("item", "product_per_unity")
    data.set("searching", true)
    data.set("query_string", "id_producto=" + id)
    fetch(`${backendRoute}load_items.php`, {
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
            // #variant_list > span:nth-child(4) > input[type=number]:nth-child(3) 2 = unidad, 3 = precio, 4 = stock
            document.getElementById(`variant_list`).innerHTML = ""
            variant_counter = 1
            let data = json["body"]
            actual_unities = data
            for (let j = 0; j < data.length; j++) {
                add_var_row()
            }
            data.forEach((item, index) => {
                if (data.length < 2) {
                    document.querySelector(`#variant_list > span > input[type=text]:nth-child(2)`).value = item.unidad
                    document.querySelector(`#variant_list > span > input[type=number]:nth-child(3)`).value = item.precio
                } else {
                    document.querySelector(`#variant_list > span:nth-child(${item.id}) > input[type=text]:nth-child(2)`).value = item.unidad
                    document.querySelector(`#variant_list > span:nth-child(${item.id}) > input[type=number]:nth-child(3)`).value = item.precio
                }
                // ADD THIS
                /* document.querySelector(`#variant_list > span:nth-child(${index + 1}) > input[type=number]:nth-child(4)`).value = item.stock */
            })
        })
        .catch((err) => { console.log(err) })
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
            let items = injector(json["body"])
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
            chargeItem(type, 0, true)
        })
        .catch((text) => { console.log(text) })
}

const onClickLoadEventos = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span id='${item['id']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
    })
}
const onClickLoadInsumos = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span onclick='chargeItem("insumos", ${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2><span class="list_sub_data"><p>${transformer(item['unidad'], item['stock'])} </p> <p>${units[item['unidad']]}</p></span></span>`
    })
}
const onClickLoadProductos = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span onclick='chargeItem("productos", ${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2><p>${item['precio']}</p></span>`
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


const loadSelectionUnidades = (data) => {
    return data.map((item) => {
        return `<option>${item['nombre']}</option>`
    })
}

const loadSelectionIngredientes = (data) => {
    return data.map((item) => {
        return `<option>${item['nombre']} (${units[item['unidad']]})</option>`
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
        "type": "eventos",
        "loadFunction": onClickLoadEventos,
        "submitHandlerFile": "create_evento.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
    {
        "type": "insumos",
        "loadFunction": onClickLoadInsumos,
        "submitHandlerFile": "create_insumo.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
    {
        "type": "productos",
        "loadFunction": onClickLoadProductos,
        "submitHandlerFile": "create_producto.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
    {
        "type": "usuarios",
        "loadFunction": onClickLoadUsuarios,
        "submitHandlerFile": "create_usuario.php",
        "removeHandlerFile": "remove_item_by_id.php"
    },
]

options.forEach(option => {
    let type = option["type"]
    document.getElementById(`${type}`).addEventListener('click', () => {
        loader(`${backendRoute}load_items.php`, `list_${type}`, option["loadFunction"], type)
        loader(`${backendRoute}load_items.php`, "ingredient-select", loadSelectionIngredientes, "insumos")
    })
    const buttons = document.querySelectorAll(`#form_${type} button`)
    buttons[0].addEventListener('click', () => {
        let data = new FormData(document.getElementById(`form_${type}`))

        let reload = false
        if (actual_id != -1) {
            data.set("id", actual_id)
            reload = true
        }
        create_item(data, option["submitHandlerFile"], option["loadFunction"], type, reload)

    })
    buttons[1].addEventListener('click', () => {
        let data = new FormData()
        data.set("id", actual_id)
        data.set("item", type)
        create_item(data, option["removeHandlerFile"], option["loadFunction"], type)
    })
});

searchButton = document.getElementById("buscador_button")
searchButton.addEventListener('click', () => {
    let searchValue = document.getElementById("buscador").value
    loader(`${backendRoute}load_items.php`, `list_insumos`, onClickLoadInsumos, "insumos", true, `nombre LIKE "%${searchValue}%" `)
})

