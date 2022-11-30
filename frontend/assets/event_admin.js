const backendRoute_events = "../backend/endpoints/"
const events = new Map()
const event_page = "eventos"
let events_id = 0
// Declare buttons

const getEventsHtml = (data) => {
    return data.map((item) => {
        events.set(item["id"], item)
        return `<span id='${item[' id']}'><h2>${item['titulo']}</h2><p>fecha xx/xx/xxxx</p></span>`
    })
}

const eventLoader = (is_searching) => {
    const data = new FormData()
    data.set("item", event_page)
    let url = `${backendRoute_events}`
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
            let itemSpace = document.getElementById(`list_${event_page}`)
            itemSpace.innerHTML = " "
            let items = getEventsHtml(json["body"])
            items.forEach(item => {
                itemSpace.innerHTML += item
            });
        })
        .catch((err) => { console.log(err) })
}

document.getElementById(event_page).addEventListener('click', ()=>{
    eventLoader(false)
    window.localStorage.setItem("item", event_page)
})
