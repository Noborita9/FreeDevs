const avisos = document.getElementById('avisos');

const invocarAviso = () => {
  console.log(avisos)
}


const loginCallerBg = document.getElementById('login-caller-bg');
const dropdownLogBg = document.getElementById('dropdown-log-bg');
const loginCallerSm = document.querySelectorAll('.login-caller-sm');
const dropdownLogSm = document.getElementById('dropdown-log-sm');
const gestorIndiceSm = document.getElementById('opciones-gestor-responsive');
const gestorOptionsSm = document.getElementById('opciones-drop');

loginCallerSm.forEach((boton) => {console.log(boton)} )

function doDisplay(affected, monitor){
affected.style.display=monitor
}

dropdownLogSm.style.display="none";
dropdownLogBg.style.display="none";

loginCallerBg.onfocus=() => {setTimeout(doDisplay, 100, dropdownLogBg, "flex")};
loginCallerBg.onblur=() => {setTimeout(doDisplay, 100, dropdownLogBg, "none")};
loginCallerSm.forEach((boton) => {boton.onfocus=() => {setTimeout(doDisplay, 100, dropdownLogSm, "flex")};})
loginCallerSm.forEach((boton) => {boton.onblur=() => {setTimeout(doDisplay, 100, dropdownLogSm, "none")};})
gestorIndiceSm.onfocus=() => {setTimeout(doDisplay, 100, gestorOptionsSm, "flex")};
gestorIndiceSm.onblur=() => {setTimeout(doDisplay, 100, gestorOptionsSm, "none")};


gestorOptionsSm.style.display="none";