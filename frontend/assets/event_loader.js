function load_events() {
  let event_space = document.querySelector(".event_container")
  fetch('../backend/api/event_loader.php')
  .then((res) => {
      if (res.ok) {
        return res.text()
      } else{
        throw "Error"
      }
    })
  .then((text) => {
      event_space.innerHTML = ""
      event_space.innerHTML = text
    })
  .catch((text) => console.log(text) )
}

document.addEventListener("DOMContentLoaded", function(e) {
    load_events();
});
