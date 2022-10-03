
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

