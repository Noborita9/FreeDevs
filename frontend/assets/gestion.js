
function fetch_insumo(data){
  fetch('../backend/api/create_insumo.php',{
    method: "POST",
    body: data
  })
  .then((res)=> {
      if (res.ok) {
        return res.text() 
      } else {
        throw "Error"
      }
    })
  .then((text)=> {
      console.log(text)
    })
  .catch((text)=> {console.log(text)})
}

function verify_fetch_insumo(){
  const data = new FormData(document.getElementById("insumo_form"))
  let nombre = data.get("nombre")
  let stock = data.get("stock")
  let unidad = data.get("unidad")
  console.table(data)

  if (nombre.length > 4 && unidad.length > 3){
    fetch_insumo(data)
  }
  else {
    console.log("Datos incorrectos")
  }
}
