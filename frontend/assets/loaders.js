const loader = (url, element) => {
  fetch(url)
    .then((res)=> {
      if (res.ok){
        return res.text()
      } else{
        throw "Error"
      }
    })
    .then((texto)=> {
      let json = JSON.parse(texto)
      let elementSpace = document.getElementById(element)
      elementSpace.innerHTML = " "
      let organizedData = json.map((item) => {
        return `<p id='event_${item['id_evento']}'>${item['titulo']}</p>`
      })
      console.log(organizedData)
      organizedData.forEach(item => {
        elementSpace.innerHTML += item
      });
    })
    .catch((err)=>{console.log(err)})
}

const onClickLoadInsumos = () => {

}

document.getElementById("eventos").addEventListener("click", ()=>{
  loader('../backend/api/event_getter.php', "list_eventos")
})
