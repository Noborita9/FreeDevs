const openPanel = document.querySelector('#stageCaller');
const closePanel = document.querySelector('.fa-backward');
const filterPanel = document.querySelector('.stage');

openPanel.addEventListener('click', () => {
    filterPanel.classList.remove('leave');
    filterPanel.classList.add('enter');
})

closePanel.addEventListener('click', () => {
    filterPanel.classList.remove('enter');
    filterPanel.classList.add('leave');
})
