const avisos = document.getElementById('avisos');
const sendMail = document.querySelector('#formularioContacto > form > div:nth-child(4) > button');

const invocarAviso = (text) => {
  avisos.innerText=text;
  avisos.style.display="flex"
  avisos.style.animationIterationCount="1";
  setTimeout(() => {avisos.style.display="none"}, 2000)
}

sendMail.addEventListener('click', (e) => {
    e.preventDefault()
    invocarAviso('se envio el correo')
})