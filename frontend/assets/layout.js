const link = document.getElementById('css');
const icoMoon = document.getElementById('icoMoon');
const icoSun = document.getElementById('icoSun')


console.log(link);
console.log(icoMoon);
console.log(icoSun);

icoMoon.addEventListener('click', () => (link.setAttribute('href', "assets/loginNight.css")));
icoSun.addEventListener('click', () => (link.setAttribute('href', "assets/login.css")))