const backendRoute_prod = "../backend/endpoints/"
const products = new Map()
const products_page = "productos"
let prod_id = 0
let variant_counter = 1
let actual_unities = []
const ingred_map = new Map()
const actual_ing = new Map()
// Declare buttons


const addFichTec = document.getElementById('add-fichTec');
const fichTecList = document.getElementById('fichTec-list');
const selectFichTec = document.getElementById('select_fichTec');

const add_fich_tec_row = () => {
    fichTecList.innerHTML += ` <tr><td>${selectFichTec.value}</td></tr>`;
}

addFichTec.addEventListener(('click'), () => {
    add_row()
})

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

const addIngredient = document.getElementById('add-ingredient');
const selectIngredient = document.getElementById('ingredient-select');
const counterIngredient = document.getElementById('ingredient-counter')
const ingredientList = document.getElementById('ingredient-list');

counterIngredient.value = 1

const loadUsedIngredients = (data) => {
    return data.map((item) => {
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
    console.log(actual_ing)
    if (actual_ing.has(actual_option)) {
        return
    } else {
        actual_ing.set(actual_option, {
            id: actual_option + 1,
            nombre: selectIngredient.value,
            id_producto: prod_id,
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
        id_producto: prod_id,
        stock: item.cantidad
    }
    actual_ing.set(actual_option, load_ingrd)
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
            nombre = document.querySelector(`#var_${j} > input.sep_var_unidad`).value
            price = document.querySelector(`#var_${j} > input.sep_var_precio`).value
            stock = document.querySelector(`#var_${j} > input.sep_var_stock`).value
            let new_unit = {
                id: j,
                unidad: nombre,
                precio: price,
                stock: stock
            }
            actual_unities.push(new_unit)
        } else {

        }
    }
    for (let j = 0; j < times; j++) {
        let variantInput =
            `<span id='var_${variant_counter}' class="variant none_margin"><i class="fa-solid fa-trash icon-variant"></i>
<input class="sep_var_unidad" type="text" placeholder="unidad"><input class="sep_var_precio" type="number" placeholder="precio"><input class="sep_var_stock" type="number" placeholder="stock"></span>`

        variantList.innerHTML += variantInput
        variant_counter += 1

    }
    // Restore values
    actual_unities.forEach((item, index) => {
        if (actual_unities.length < 2) {
            document.querySelector(`#variant_list > span > input[type=text]:nth-child(2)`).value = item.unidad
            document.querySelector(`#variant_list > span > input[type=number]:nth-child(3)`).value = item.precio
            document.querySelector(`#variant_list > span > input[type=number]:nth-child(4)`).value = item.stock
        } else {
            document.querySelector(`#variant_list > span:nth-child(${index + 1}) > input[type=text]:nth-child(2)`).value = item.unidad
            document.querySelector(`#variant_list > span:nth-child(${index + 1}) > input[type=number]:nth-child(3)`).value = item.precio
            document.querySelector(`#variant_list > span:nth-child(${index + 1}) > input[type=number]:nth-child(4)`).value = item.stock
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
            nombre = document.querySelector(`#var_${j} > input.sep_var_unidad`).value
            price = document.querySelector(`#var_${j} > input.sep_var_precio`).value
            stock = document.querySelector(`#var_${j} > input.sep_var_stock`).value
            let new_unit = {
                id: j,
                unidad: nombre,
                precio: price,
                stock: stock
            }
            actual_unities.push(new_unit)
        }
    }
    data.set("id", prod_id)
    data.set("searching", true)
    data.set("unidades", JSON.stringify(actual_unities))
    data.set("ingredientes", JSON.stringify(ingreds))
    data.set("query", prod_id)
    data.set("query_attr", "id_producto")
    fetch(`${backendRoute_prod}create_producto.php`, {
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
            productLoader(false, getProductosHtml)
        })
        .catch((err) => { console.log(err) })
}

const loadUnities = (id) => {
    const data = new FormData()
    data.set("item", "product_per_unity")
    data.set("query", `${id}`)
    data.set("query_attr", "id_producto")
    fetch(`${backendRoute_prod}search_items.php`, {
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

const loadIngredients = (id) => {
    const data = new FormData()
    data.set("item", "ingred_por_prod")
    data.set("query", id)
    data.set("query_attr", "id_producto")
    fetch(`${backendRoute_prod}search_items.php`, {
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

const chargeProduct = (id, clear) => {
    let nombre_in_form = document.querySelector("#form_productos > input[type=text]:nth-child(3)")
    if (clear) {
        ingredientList.innerHTML = " "
        variantList.innerHTML = " "
        variant_counter = 1
        add_var_row(1, true)
        prod_id = 0
        actual_unities = []
        nombre_in_form.value = ""
        window.localStorage.setItem("item_id", prod_id)
    } else {
        let act_item = products.get(`${id}`)
        nombre_in_form.value = act_item.nombre
        prod_id = id
        window.localStorage.setItem("item_id", prod_id)
        loadUnities(id)
        loadIngredients(id)
    }
    console.log(prod_id)
}

const getProductosHtml = (data) => {
    return data.map((item) => {
        products.set(item["id"], item)
        return `<span onclick='chargeProduct(${item['id']})' id='${item['id']}'><h2>${item['nombre']}</h2></span>`
    })
}

const productLoader = (is_searching, loader) => {
    const data = new FormData()
    data.set("item", products_page)
    let url = `${backendRoute_prod}`
    if (is_searching) {
        data.set("query", document.getElementById('buscador').value)
        url += "search_items.php"
    } else {
        url += "load_items.php"
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
            let itemSpace = document.getElementById(`list_${products_page}`)
            itemSpace.innerHTML = " "
            let items = loader(json["body"])
            items.forEach(item => {
                itemSpace.innerHTML += item
            });
        })
        .catch((err) => { console.log(err) })
}


document.getElementById("productos").addEventListener('click', () => {
    productLoader(false, getProductosHtml)
    window.localStorage.setItem("item", products_page)
})

document.querySelector("#form_productos > button:nth-child(2)").addEventListener("click", () => {
    chargeProduct(prod_id, true)
})

document.querySelector("#form_productos > button:nth-child(12)").addEventListener("click", () => {
    save_producto()
})

/* document.querySelector("#form_productos > button:nth-child(13)").addEventListener("click", () => { */
/*     save_producto() */
/* }) */
