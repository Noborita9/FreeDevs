const menuInsumos = document.getElementById('menu_insumos');
const menuEventos = document.getElementById('menu_eventos');
const insumosBoton = document.getElementById('insumos');
const eventosBoton = document.getElementById('eventos');

console.log(menuInsumos);
console.log(menuInsumos);
console.log(insumosBoton);
console.log(eventosBoton);

insumosBoton.addEventListener('click', () => 
{
menuEventos.style.zIndex = "1";
menuInsumos.style.zIndex = "2";
console.log('arriba insumos')
})

eventosBoton.addEventListener('click', () => 
{
menuInsumos.style.zIndex = "1";
menuEventos.style.zIndex = "2";
console.log('arriba eventos')
})