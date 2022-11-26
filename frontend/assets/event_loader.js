const onClickLoadEventos = (data) => {

  return data.map((item) => {
    return `

    <section class="event">
    <section class="content">
      <img src="assets/img/${item['image_name']}">
      <div>
        <h2>${item['titulo']}</h2>
        <p>${item['servicio']}</p>
        <button>mas informacion</button>
      </div>
    </section>
    </section>
`})
}

const loader = () => {
  const data = new FormData()
  data.set('item', 'eventos')
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
      let eventSpace = document.getElementById("event_container")
      eventSpace.innerHTML = " "
      let items = onClickLoadEventos(json["body"])
      items.forEach(item => {
        eventSpace.innerHTML += item
      });
    })
    .catch((err) => { console.log(err) })
}

document.addEventListener('DOMContentLoaded', ()=> {
  loader()
});
