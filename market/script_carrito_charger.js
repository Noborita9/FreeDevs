let map_productos_carrito = new Map();
let carrito = document.getElementById("shop-cart");
let msg_counter = 0

function display_message(message){
  document.getElementById("body").innerHTML += `<p class='added_message' id='msg_${msg_counter}'>${message}</p>`
  setTimeout(() => {
    document.getElementById(`msg_${msg_counter}`).remove()
  }, 2000);
}

function change_stock(id, num){
  let cantElem = document.getElementById(`cant_${id}`)
  let cantidad = parseInt(cantElem.innerHTML)
  if (cantidad + num < 1){
    if (map_productos_carrito.delete(`${id}`)){
    }
    document.getElementById(`cart_prod_${id}`).remove()
    return
  }
  cantElem.innerHTML = cantidad + num
}

function carrito_charger(id, nombre, precio)
{
  display_message(`Se ha agregado ${nombre} al carrito`)
  carrito = document.getElementById("shop-cart")
  let prod = document.getElementById(`prod_${id}`)
  prod.style.animation = "highlight 1s"
  if (map_productos_carrito.has(id)){
    console.log("Item is already at cart")
  } else {
    let info_prod = `<div class='cart-product' id='cart_prod_${id}'><span>${nombre}</span><button onclick='change_stock(${id}, (-1))'>-</button ><p id='cant_${id}'>1</p><button onclick='change_stock(${id}, (1))'>+</button><p>$${precio}</p></div>`
    carrito.innerHTML += info_prod
    let nuevo_producto = 
      {
        nombre: nombre,
        precio: precio
      }

    map_productos_carrito.set(id, nuevo_producto);
  }
  setTimeout(() => {
    prod.style.animation = ""
  }, 1000);
}

function generar_compra()
{
  for(const [k,v] of map_productos_carrito.entries())
{
    fetch_async_compra(k);
  }

}

function fetch_async_compra(id)
{
  const data = new FormData();
  data.set("id", id);
  data.set("cantidad", parseInt(document.getElementById(`cant_${id}`).innerHTML))

  fetch('update_bd.php', 
    {
      method: 'POST',
      body: data
    })
    .then(function(response) 
    {
        if(response.ok) 
      {
          return response.text();
        } else 
      {
          throw "Error";
        }
      })
    .then(function(texto) 
    {
        console.log(texto);
        load_shop();
      })
    .catch(function(err) 
    {
        console.log(err);
      });
}
