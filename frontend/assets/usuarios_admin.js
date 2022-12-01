const backendRoute_usuarios = "../backend/endpoints/"
const users = new Map()
const usuarios_page = "usuarios"
let user_id = 0
const roles = [
    "admin",
    "usuario"
]
// Declare buttons

const getUsersHtml = (data) => {
    return data.map((item) => {
        users.set(`${item["id"]}`, item)
        return `<span onclick='chargeUser(${item["id"]})' id='${item['id']}'><h2>${item['username']}</h2><p>${item['rol']}</span>`
    })
}

const loadRoles = () => {
    let rol_select = document.getElementById("select-rol")
    rol_select.innerHTML = ""
    roles.forEach(role => { rol_select.innerHTML += `<option>${role}</option>`
    });
}

const chargeUser = (id, clear = false) => {
    console.log('funciono')
    let username = document.querySelector("#form_usuarios > input[type=text]:nth-child(3)")
    let password = document.querySelector("#form_usuarios > input[type=text]:nth-child(4)")
    let rol_select = document.getElementById("select-rol")
    if (clear) {
        user_id = 0
        username.value = ""
        password.value = ""
        rol_select.value = "usuario"
        window.localStorage.setItem("item_id", user_id)
    } else {
        let act_item = users.get(`${id}`)
        username.value = act_item.username
        password.value = act_item.passwd
        rol_select.value = act_item.rol
        user_id = id
        window.localStorage.setItem("item_id", user_id)
    }
}

const save_usuario = () => {
    const data = new FormData(document.getElementById("form_usuarios"))
    fetch(`${backendRoute_usuarios}create_usuario.php`, {
        method: "POST",
        body: data
    }).then((res) => {
        if (res.ok) {
            return res.text()
        } else {
            throw "Error"
        }
    }).then((texto) => {
        usersLoader(false)
        chargeUser(0, true)
    }).catch((err) => { console.log(err) })
}

const usersLoader = (is_searching) => {
    const data = new FormData()
    data.set("item", usuarios_page)
    let url = `${backendRoute_usuarios}`
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
            let itemSpace = document.getElementById(`list_${usuarios_page}`)
            itemSpace.innerHTML = " "
            let items = getUsersHtml(json["body"])
            items.forEach(item => {
                itemSpace.innerHTML += item
            });
        })
        .catch((err) => { console.log(err) })
}

document.getElementById(usuarios_page).addEventListener('click', () => {
    usersLoader(false)
    loadRoles()
    window.localStorage.setItem("item", usuarios_page)
    window.localStorage.setItem("load_func", getUsersHtml)
})

document.getElementById('usuarios_responsive').addEventListener('click', () => {
    usersLoader(false)
    loadRoles()
    window.localStorage.setItem("item", usuarios_page)
    window.localStorage.setItem("load_func", getUsersHtml)
})

document.querySelector("#form_usuarios > button:nth-child(2)").addEventListener("click", () => {
    chargeUser(0, true)
})
document.querySelector("#form_usuarios > button:nth-child(7)").addEventListener("click", () => {
    save_usuario()
    chargeUser(0, true)
})
