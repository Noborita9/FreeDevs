// menu administrativo
const menuInsumos = document.getElementById('menu_insumos');
const menuEventos = document.getElementById('menu_eventos');
const menuUsuarios = document.getElementById('menu_usuarios');
const menuProductos = document.getElementById('menu_productos');
const menuRoles = document.getElementById('menu_roles');
const menuMobiliarios = document.getElementById('menu_mobiliarios');
const menuMenues = document.getElementById('menu_menues');
const menuPlatos = document.getElementById('menu_platos');
const menuFichTec = document.getElementById('menu_fichasTecnicas');
const menuImagenes = document.getElementById('menu_imagenes');
const menuPedidos = document.getElementById('menu_pedidos')

const arrayMenu = [
    menuInsumos,
    menuEventos,
    menuUsuarios,
    menuProductos,
    menuRoles,
    menuMobiliarios,
    menuMenues,
    menuPlatos,
    menuFichTec,
    menuImagenes,
    menuPedidos
];

// barra de navegacion
const insumosBoton = document.querySelectorAll('.insumos');
const eventosBoton = document.querySelectorAll('.eventos');
const usuariosBoton = document.querySelectorAll('.usuarios');
const productosBoton = document.querySelectorAll('.productos');
const rolesBoton = document.querySelectorAll('.roles');
const mobiliariosBoton = document.querySelectorAll('.mobiliarios');
const menuesBoton = document.querySelectorAll('.menues');
const platosBoton = document.querySelectorAll('.platos');
const fichTecBoton = document.querySelectorAll('.fichasTecnicas');
const imagenesBoton = document.querySelectorAll('.imagenes');
const pedidosBoton = document.querySelectorAll('.pedidos');

function mostrar(flex) {
    arrayMenu.forEach(
        (menu) => { menu === flex ? menu.style.display="flex" : menu.style.display="none" }
    )
}

mostrar(menuInsumos);

insumosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuInsumos); });})
eventosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuEventos) });})
usuariosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuUsuarios) })})
productosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuProductos) });})
rolesBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuRoles) });})
mobiliariosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuMobiliarios) });})
imagenesBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuImagenes) });})
pedidosBoton.forEach((boton) => {boton.addEventListener('click', () => { mostrar(menuPedidos); });})