const link = document.getElementById('css');
const icoMoon = document.getElementById('icoMoon');
const icoSun = document.getElementById('icoSun');
const img = document.getElementById('imgLogo');

icoMoon.addEventListener('click', () => {
    link.setAttribute('href', "assets/loginNight.css")
    img.setAttribute('src', "assets/img/greenHat.png");
});
icoSun.addEventListener('click', () => {
    link.setAttribute('href', "assets/login.css");
    img.setAttribute('src', "assets/img/darkHat.png")
})
