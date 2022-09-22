const menuInsumos = document.getElementById('menu_insumos');
const menuEventos = document.getElementById('menu_eventos');
const menuUsuarios = document.getElementById('menu_usuarios');
const menuProductos = document.getElementById('menu_productos')
const insumosBoton = document.getElementById('insumos');
const eventosBoton = document.getElementById('eventos');
const usuariosBoton = document.getElementById('usuarios');
const productosBoton = document.getElementById('productos');


insumosBoton.addEventListener('click', () => {
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "flex";
    console.log('arriba insumos')
})

eventosBoton.addEventListener('click', () => {
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "flex";
    menuInsumos.style.display = "none";
    console.log('arriba eventos')
})

usuariosBoton.addEventListener('click', () => {
    menuProductos.style.display = "none";
    menuUsuarios.style.display = "flex";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    console.log('usuarios eventos')
})

productosBoton.addEventListener('click', () => {
    menuProductos.style.display = "flex";
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    console.log('usuarios eventos')
})