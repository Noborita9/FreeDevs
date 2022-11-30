let currentId = 1;

function showEvent(newId) {
    document.getElementById(currentId).classList.remove('event-view')
    document.getElementById(currentId).classList.add('event-noView');
    document.getElementById(newId).classList.remove('event-noView')
    document.getElementById(newId).classList.add('event-view');
    currentId = newId;
}


const onClickLoadEventos = (data) => {

    return data.map((item) => {
        return `
    <div class="event-banner event-noView" id="${item['id']}">
        <img src="${item['image_name']}" alt="">
        <div class="event-info">
                <h2>${item['titulo']}</h2>
                <p>${item['servicio']}</p>
                <div>
                <li>${item['fecha']}</li>
                <li>${item['ubicacion']}</li>
                <li>${item['tipo']}</li>
                <li>${item['cantidad_personas']}</li>
                <li>${item['contacto']}</li>
                </div>
        </div>
    </div>
  `
    })
}

const onClickNavEvents = (data) => {
    return data.map((item) => {
        return `
        <p id="AA${item['id']}" onclick="showEvent( ${item['id']} )">${item['titulo']}</p>
        `
    })
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
            let eventSpace = document.querySelector(".event-space")
            eventSpace.innerHTML = ""
            let items = onClickLoadEventos(json["body"])
            items.forEach(item => {
                eventSpace.innerHTML += item
            });

            let navEvents = document.getElementById("nav-events")
            // navEvents.innerHTML = ""
            let navs = onClickNavEvents(json["body"])
            navs.forEach(navs => {
                navEvents.innerHTML += navs
            })
            document.getElementById('1').classList.add('event-view');
            document.getElementById('1').classList.remove('event-noView');

            const openPanel = document.getElementById('showButton');

            let open = false;

            openPanel.addEventListener('click', () => {
                const navPanel = document.getElementById('nav-events');
                console.log(true)
                console.log(navPanel)
                if (open == false) {
                    navPanel.classList.remove('leaveNav');
                    navPanel.classList.add('enterNav');
                    open = true;
                }
                else {
                    navPanel.classList.remove('enterNav');
                    navPanel.classList.add('leaveNav');
                    open = false;
                }

            })
            showEvent(localStorage.getItem('event_id'))
        })
        .catch((err) => { console.log(err) })
}

document.addEventListener('DOMContentLoaded', () => {
    loader()
});

