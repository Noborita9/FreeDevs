const loaded_items = new Map()
const charged_items = new Map()
let buyButton = document.getElementById("comprar")

function buyCart() {
    charged_items.forEach(element => {
        const data = new FormData()
        data.set("id", element.id)
        data.set("stock", element.stock)
        console.log(element.id, element.stock)
        console.log(data.get("stock"))
        fetch('../backend/endpoints/update_stock.php', {
            method: "POST",
            body: data
        }).then((res) => {
            if (res.ok) {
                return res.text()
            } else {
                throw "ERROR"
            }
        }
        ).then((texto) => {
            loader()
        }).catch((err) => {
            console.log(err)
        })
    });
    buyButton = document.getElementById("comprar")
}

function removeItem(id) {
    if (charged_items.has(id)) {
        charged_items.delete(id)
        let stockElement = document.getElementById(`prod_${id}`)
        stockElement.remove(stockElement)
    }
}

function chargeItem(id, amount) {
    if (charged_items.has(id)) {
        let item = charged_items.get(id)
        item.stock = item.stock + amount
        if (item.stock <= 0) {
            let stockElement = document.getElementById(`prod_${id}`).remove()
            charged_items.delete(id)
        } else {
            let stockElement = document.getElementById(`stock_${id}`)
            stockElement.innerHTML = item.stock
        }

    } else {
        charged_items.set(id, { id: id, stock: 1 })
        let item = loaded_items.get(id)
        console.log()
        let newItem = `
        <div id='prod_${id}' class="new-register">
          <p  class="register-title">${item["nombre"]}</p>
          <div class="register-options">
            <button onclick="removeItem(${id})"><i class="fa-solid fa-trash"></i></button>
            <button><i class="fa-solid fa-plus"></i></button>
            <p id='stock_${id}'>${charged_items.get(id).stock}</p>
            <button><i class="fa-solid fa-minus"></i></button>
            <p class="">${item.precio}</p>
          </div>
        </div>
`
        let chargeElement = document.getElementById("cart")
        chargeElement.innerHTML += newItem
    }
}

const loadProductos = (data) => {
    return data.map((item) => {
        loaded_items.set(item["id"], item)
        return `
      <span class="producto" id='${item["id"]}' >
        <div class="filter" onclick='chargeItem(${item["id"]}, 1)'></div>
        <h2>${item["nombre"]}</h2>
          <h3>${item["unidad"]}</h3>
        <div>
          <p>stock: ${item["stock"]}</p>
          <p>$${item["precio"]}</p>
        </div>
      </span>
`})
}

const loader = (is_searching, search_query) => {
    const data = new FormData()
    data.set('item', 'productos')
    if (is_searching) {
        data.set("searching", true)
        data.set("query_string", search_query)
    }
    data.set("market", 1)
    fetch('../backend/endpoints/load_items.php', {
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
            let eventSpace = document.getElementById("content")
            eventSpace.innerHTML = " "
            let items = loadProductos(json["body"])
            items.forEach(item => {
                eventSpace.innerHTML += item
            });
            console.log(items)
        })
        .catch((err) => { console.log(err) })
}

const searchButton = document.getElementById("buscar")
searchButton.addEventListener("click", () => {
    let searchValue = document.getElementById("buscarInput").value
    loader(true, `nombre LIKE "%${searchValue}%"`)
})


document.addEventListener('DOMContentLoaded', () => {
    loader()
});
