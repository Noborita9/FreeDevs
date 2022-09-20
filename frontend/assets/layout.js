const link = document.getElementById('css');
const icoMoon = document.getElementById('icoMoon');
const icoSun = document.getElementById('icoSun')
const img = document.getElementById('imgLogo');


console.log(link);
console.log(icoMoon);
console.log(icoSun);

icoMoon.addEventListener('click', () => {
    link.setAttribute('href', "assets/loginNight.css")
    imgLogo.setAttribute('src', "assets/img/LogoFDWhite.png");
});
icoSun.addEventListener('click', () => {
    link.setAttribute('href', "assets/login.css");
    imgLogo.setAttribute('src', "assets/img/LogoFD.png")
})
