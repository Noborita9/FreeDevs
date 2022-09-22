const menuInsumos = document.getElementById('menu_insumos');
const menuEventos = document.getElementById('menu_eventos');
const menuUsuarios = document.getElementById('menu_usuarios')
const insumosBoton = document.getElementById('insumos');
const eventosBoton = document.getElementById('eventos');
const usuariosBoton = document.getElementById('usuarios')


insumosBoton.addEventListener('click', () => {
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "flex";
    console.log('arriba insumos')
})

eventosBoton.addEventListener('click', () => {
    menuUsuarios.style.display = "none";
    menuEventos.style.display = "flex";
    menuInsumos.style.display = "none";
    console.log('arriba eventos')
})

usuariosBoton.addEventListener('click', () => {
    menuUsuarios.style.display = "flex";
    menuEventos.style.display = "none";
    menuInsumos.style.display = "none";
    console.log('usuarios eventos')
})
