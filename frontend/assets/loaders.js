const backendRoute = "../backend/endpoints/"
const actual_ing = new Map()
const ingred_map = new Map()
const actual_map = new Map()
let actual_unities = []
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

addEncargados.addEventListener('click', () => {
    encargadosList.innerHTML += `
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

const loadUsedIngredients = (data) => {
    return data.map((item) => {
        console.log(item)
        return `
<tr>
<td><i class="fa-solid fa-trash icon-variant"></i></td>
<td>${item.nombre}</td>
<td>${item.stock}</td>
</tr>
            `
    })
}

const add_ingr_row = (loaded = false) => {
    let actual_option = selectIngredient.selectedIndex
    if (actual_ing.has(actual_option)) {
        return
    } else {
        actual_ing.set(actual_option, {
            id: actual_option + 1,
            nombre: selectIngredient.value,
            id_producto: actual_id,
            stock: counterIngredient.value
        })
        ingredientList.innerHTML += `<tr><td><i class="fa-solid fa-trash icon-variant"></i></td>
<td>${selectIngredient.value}</td><td>${counterIngredient.value}</td></tr>`
        counterIngredient.value = 1
    }
}

const load_ingr_row = (item) => {
    let actual_option = selectIngredient.selectedIndex
    let load_ingrd = {
        id: item.id_ingrediente,
        nombre: item.nombre,
        id_producto: actual_id,
        stock: item.cantidad
    }
    actual_ing.set(actual_option,
        load_ingrd
    )
    let load_string = selectIngredient[load_ingrd.id - 1].value
    ingredientList.innerHTML += `<tr><td><i class="fa-solid fa-trash icon-variant"></i></td>
<td>${load_string}</td><td>${load_ingrd.stock}</td></tr>`
    counterIngredient.value = 1
}
addIngredient.addEventListener('click', () => {
    add_ingr_row()
})

let addVariantButton = document.querySelector('#add-variant')
const variantList = document.getElementById('variant_list')

const add_var_row = (times, add_new = false) => {
    if (add_new) {
        actual_unities = []
    }
    for (let j = actual_unities.length; j < variant_counter; j++) {
        if (j >= 1) {
            let stock, price, nombre;
            if (j == 1) {

                stock = document.querySelector(`#variant_list > span > input[type=number]:nth-child(4)`).value
                price = document.querySelector(`#variant_list > span > input[type=number]:nth-child(3)`).value
                nombre = document.querySelector(`#variant_list > span > input[type=text]:nth-child(2)`).value
            } else {

                if (document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=text]:nth-child(2)`).value.length == 0) {
                    return
                }
                nombre = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=text]:nth-child(2)`).value
                price = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=number]:nth-child(3)`).value
                stock = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=number]:nth-child(4)`).value
            }
            let new_unit = {
                id: j,
                unidad: nombre,
                precio: price,
                stock: stock
            }
            actual_unities.push(new_unit)
        }
    }
    for (let j = 0; j < times; j++) {
        let variantInput =
            `<span id='var_${variant_counter}' class="variant none_margin"><i class="fa-solid fa-trash icon-variant"></i>
<input type="text" placeholder="unidad"><input type="number" placeholder="precio"><input type="number" placeholder="stock"></span>`

        variantList.innerHTML += variantInput
        variant_counter += 1

    }
    // Restore values
    console.log(actual_unities)
    actual_unities.forEach((item, index) => {
        if (actual_unities.length < 2) {
            document.querySelector(`#variant_list > span > input[type=text]:nth-child(2)`).value = item.unidad
            document.querySelector(`#variant_list > span > input[type=number]:nth-child(3)`).value = item.precio
            document.querySelector(`#variant_list > span > input[type=number]:nth-child(4)`).value = item.stock
        } else {
            document.querySelector(`#variant_list > span:nth-child(${item.id}) > input[type=text]:nth-child(2)`).value = item.unidad
            document.querySelector(`#variant_list > span:nth-child(${item.id}) > input[type=number]:nth-child(3)`).value = item.precio
            document.querySelector(`#variant_list > span:nth-child(${item.id}) > input[type=number]:nth-child(4)`).value = item.stock
        }
    })
}


addVariantButton.addEventListener('click', () => {
    add_var_row(1, true)
});

const save_producto = () => {
    const data = new FormData(document.getElementById("form_productos"))
    let ingreds = []
    for (const [key, ingre] of actual_ing) {
        ingreds.push(ingre)
    }
    actual_unities = []
    for (let j = actual_unities.length; j < variant_counter; j++) {
        if (j >= 1) {
            let stock, price, nombre;
            if (j == 1) {

                stock = document.querySelector(`#variant_list > span > input[type=number]:nth-child(4)`).value
                price = document.querySelector(`#variant_list > span > input[type=number]:nth-child(3)`).value
                nombre = document.querySelector(`#variant_list > span > input[type=text]:nth-child(2)`).value
            } else {

                if (document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=text]:nth-child(2)`).value.length == 0) {
                    return
                }
                nombre = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=text]:nth-child(2)`).value
                price = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=number]:nth-child(3)`).value
                stock = document.querySelector(`#variant_list > span:nth-child(${j}) > input[type=number]:nth-child(4)`).value
            }
            let new_unit = {
                id: j,
                unidad: nombre,
                precio: price,
                stock: stock
            }
            actual_unities.push(new_unit)
        }
    }
    console.log(`Act unities ${actual_unities}`)
    data.set("id", actual_id)
    data.set("searching", true)
    data.set("unidades", JSON.stringify(actual_unities))
    data.set("ingredientes", JSON.stringify(ingreds))
    data.set("query_string", "id_producto=" + actual_id)
    fetch(`${backendRoute}create_producto.php`, {
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
            console.log(texto)
            loader(`${backendRoute}load_items.php`, `list_productos`, onClickLoadProductos, "productos")
        })
        .catch((err) => { console.log(err) })
}

const chargeItem = (item, id, clear) => {
    if (!clear && item == "insumos") {
        let nombre_in_form = document.querySelector("#form_insumos > input[type=text]:nth-child(3)")
        let stock_in_form = document.querySelector("#form_insumos > span > input")
        let unidad_in_form = document.querySelector("#unidad-select")
        let precio_in_form = document.querySelector("#form_insumos > input[type=number]:nth-child(5)")
        let act_item = actual_map.get(id)
        nombre_in_form.value = act_item.nombre
        stock_in_form.value = transformer(act_item.unidad, act_item.stock)
        unidad_in_form.value = units[act_item.unidad]
        precio_in_form.value = act_item.precio
        actual_id = id
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
    } else if (clear && item == "productos") {
        let nombre_in_form = document.querySelector("#form_productos > input[type=text]:nth-child(3)")
        ingredientList.innerHTML = " "
        variantList.innerHTML = " "
        actual_id = 0
        nombre_in_form.value = ""
        actual_ing.clear()
        loadUnities(id)
        loadIngredients(id)
    }
    else if (item == "productos") {
        let nombre_in_form = document.querySelector("#form_productos > input[type=text]:nth-child(3)")
        let act_item = actual_map.get(id)
        nombre_in_form.value = act_item.nombre
        actual_id = id
        loadUnities(id)
        loadIngredients(id)
    }
}

const loadIngredients = (id) => {
    const data = new FormData()
    data.set("item", "ingred_por_prod")
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
            let data = json["body"]
            ingredientList.innerHTML = " "
            data.forEach(item => {
                load_ingr_row(item)
            });
        })
        .catch((err) => { console.log(err) })
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
            add_var_row(data.length)
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
            console.log(text)
            chargeItem(type, 0, true)
        })
        .catch((text) => { console.log(text) })
}

const onClickLoadEventos = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span id='${item[' id']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
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
        return `<span onclick='chargeItem("productos", ${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2></span>`
    })
}
const onClickLoadUsuarios = (data) => {
    return data.map((item) => {
        actual_map.set(item["id"], item)
        return `<span><p id='${item['id']}'>${item['nombre_usuario']}</p></span>`
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
        return `<option>${item['nombre']}(${units[item['unidad']]})</option>`
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
    let type_dom = document.getElementById(`${type}`)
    type_dom.addEventListener('click', () => {
        loader(`${backendRoute}load_items.php`, `list_${type}`, option["loadFunction"], type)
        loader(`${backendRoute}load_items.php`, "ingredient-select", loadSelectionIngredientes, "insumos")
        actual_id = 0
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
        if (type == "productos") {
            /* save_producto(data, loadProductos, reload) */
            save_producto()
        }

    })
    buttons[2].addEventListener('click', () => {
        let data = new FormData()
        data.set("id", actual_id)
        data.set("item", type)
        create_item(data, "remove_item_by_id.php", option["loadFunction"], type)
    })
});
document.querySelector("#form_productos > button:nth-child(14)").addEventListener("click", () => {
    let data = new FormData()
    data.set("id", actual_id)
    data.set("item", "productos")
    create_item(data, "remove_item_by_id.php", onClickLoadProductos, "productos")
})
searchButton = document.getElementById("buscador_button")
searchButton.addEventListener('click', () => {
    let searchValue = document.getElementById("buscador").value
    loader(`${backendRoute}load_items.php`, `list_insumos`, onClickLoadInsumos, "insumos", true, `nombre LIKE "%${searchValue}%"`)
})

