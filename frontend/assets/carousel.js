const img_container = document.getElementById("car_img_container")
let state = 0
let times = 0
let px_count = 0
let max_dist = -485
let timeout = 2000
const moveCarousel = () => {
  if (state < max_dist){
    state = 0
    px_count = 0
    times = 0
  }
  console.log(state)
  console.log(px_count)
  img_container.style.transform = `translate(calc(${state}vw + ${px_count}px))`
  state -= 97
  px_count += 15
  times += 1
  setTimeout(() => {
    moveCarousel(timeout)
  }, timeout)
}

moveCarousel()

