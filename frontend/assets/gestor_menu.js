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
    menuImagenes
];

// barra de navegacion
const insumosBoton = document.getElementById('insumos');
const eventosBoton = document.getElementById('eventos');
const usuariosBoton = document.getElementById('usuarios');
const productosBoton = document.getElementById('productos');
const rolesBoton = document.getElementById('roles');
const mobiliariosBoton = document.getElementById('mobiliarios');
const menuesBoton = document.getElementById('menues');
const platosBoton = document.getElementById('platos');
const fichTecBoton = document.getElementById('fichasTecnicas');
const imagenesBoton = document.getElementById('imagenes');

function mostrar(flex) {
    arrayMenu.forEach(
        (menu) => { menu === flex ? menu.style.display="flex" : menu.style.display="none" }
    )
}

mostrar(menuInsumos);


insumosBoton.addEventListener('click', () => { mostrar(menuInsumos) });
eventosBoton.addEventListener('click', () => { mostrar(menuEventos) });
usuariosBoton.addEventListener('click', () => { mostrar(menuUsuarios) });
productosBoton.addEventListener('click', () => { mostrar(menuProductos) });
rolesBoton.addEventListener('click', () => { mostrar(menuRoles) });
mobiliariosBoton.addEventListener('click', () => { mostrar(menuMobiliarios) });
menuesBoton.addEventListener('click', () => { mostrar(menuMenues) });
platosBoton.addEventListener('click', () => { mostrar(menuPlatos) });
fichTecBoton.addEventListener('click', () => { mostrar(menuFichTec) });
imagenesBoton.addEventListener('click', () => { mostrar(menuImagenes) });