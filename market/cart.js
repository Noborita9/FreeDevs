const cartCaller = document.getElementById("cart-caller");
const cart = document.getElementById("shop-cart");
const market = document.getElementById("market");

let visible = false;

function change_visible(){
  if(visible != true){
    cart.classList.remove("unshow");
    cart.classList.add("show");
    visible = true;
  } else{
    cart.classList.remove("show");
    cart.classList.add("unshow");
    visible = false;
  }
}

cartCaller.addEventListener("click", ()=>{
  change_visible()
})
