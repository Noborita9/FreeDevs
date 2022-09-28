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

menuRoles.style.display = "none";
menuProductos.style.display = "none";
menuUsuarios.style.display = "none";
menuEventos.style.display = "none";
menuMobiliarios.style.display = "none";
menuMenues.style.display = "none";
menuPlatos.style.display = "none";
menuFichTec.style.display = "none";
menuInsumos.style.display = "flex";
menuImagenes.style.display="none";

insumosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "flex";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
    menuImagenes.style.display = "none";
})

eventosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "flex";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

usuariosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "flex";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

productosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "flex";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

rolesBoton.addEventListener('click', () => {
    menuRoles.style.display = "flex";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

mobiliariosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "flex";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

menuesBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "flex";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

platosBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "flex";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "none";
})

fichTecBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "flex";
    menuImagenes.style.display = "none";
})

imagenesBoton.addEventListener('click', () => {
    menuRoles.style.display = "none";
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    menuMobiliarios.style.display = "none";
    menuMenues.style.display = "none";
    menuPlatos.style.display = "none";
    menuFichTec.style.display = "none";
    menuImagenes.style.display = "flex";
})