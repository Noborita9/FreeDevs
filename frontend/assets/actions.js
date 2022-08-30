const productsInfo = document.querySelector('.content button');
const eventInfo = document.querySelector('.products button')
const content = document.querySelector('.content');
const products = document.querySelector('.products');

productsInfo.addEventListener('click', () => {
    content.classList.remove('yMoveNt');
    products.classList.remove('yMoveNt');


    content.classList.add('yMove');
    products.classList.add('yMove');
});

eventInfo.addEventListener('click', () => {
    content.classList.remove('yMove');
    products.classList.remove('yMove');

    content.classList.add('yMoveNt');
    products.classList.add('yMoveNt');

    console.log('me estas presionando');
})