
function showEvent( oldId, newId){
    document.getElementById( oldId ).classList.remove('event-view')
    document.getElementById( oldId ).classList.add('event-noView');
    document.getElementById( newId ).classList.remove('event-noView')
    document.getElementById( newId ).classList.add('event-view');
}

showEvent('1', '2');

document.getElementById('titulo1').addEventListener('click', () => { showEvent('1','2') })
document.getElementById('titulo2').addEventListener('click', () => { showEvent('2','1') })