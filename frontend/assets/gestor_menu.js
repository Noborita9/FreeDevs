const menuInsumos = document.getElementById('menu_insumos');
const menuEventos = document.getElementById('menu_eventos');
const insumosBoton = document.getElementById('insumos');
const eventosBoton = document.getElementById('eventos');

insumosBoton.addEventListener('click', () => {
    menuEventos.style.display = "none";
    menuInsumos.style.display = "flex";
    console.log('arriba insumos')
})

eventosBoton.addEventListener('click', () => {
    menuEventos.style.display = "flex";
    menuInsumos.style.display = "none";
    console.log('arriba eventos')
})
