const loaded_items = new Map()
const charged_items = new Map()
let buyButton = document.getElementById("comprar")

function buyCart() {
  charged_items.forEach(element => {
    const data = new FormData()
    data.set("id", element.id)
    data.set("stock", element.stock)
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
      console.log(texto)
      loader()
    }).catch((err)=> {
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
    console.log(item["nombre"])
    let newItem = `
        <div id="prod_${id}" class="registro">
          <button onclick='chargeItem(${item["id"]}, 1)'>+</button>
          <p id='stock_${item["id"]}'>${charged_items.get(id).stock}</p>
          <button onclick='chargeItem(${item["id"]}, -1)'>-</button>
          <p>${item["nombre"].slice(0,10)}</p>
          <button onclick='removeItem(${item["id"]})'>x</button>
        </div>`
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
