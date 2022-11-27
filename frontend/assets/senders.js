function sendToAdmin() {
  window.open("./adminIndex.php", "_self")
}

function sendToMarket() {
  window.open("./market.php", "_self")
}

function sendToEvent() {
  window.open("./event.php", "_self")
}

function sendToIndex() {
  window.open("./index.php", "_self")
}

document.getElementById("inicio_nav_move").addEventListener("click", ()=>{
    sendToIndex()
})

document.getElementById("evento_nav_move").addEventListener("click", ()=>{
    sendToEvent()
})
