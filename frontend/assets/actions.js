const productsInfo = document.querySelectorAll('.content button');
const eventInfo = document.querySelectorAll('.products button')
const content = document.querySelectorAll('.content');
const products = document.querySelectorAll('.products');
const navContent = document.querySelectorAll('.navContent');
const nav = document.querySelector('#nav');

let navWidth = 0;

navContent.forEach(() => navWidth = navWidth + 10);

nav.style.width = `${navWidth}%`;
nav.style.margin = `0 0 0 ${(100 - navWidth) / 2}%`;


console.log(navWidth);



productsInfo.forEach((element)=> { element.addEventListener('click', () => {


    content.forEach((element) => element.classList.add('yMove'));
    products.forEach((element) => element.classList.add('yMove'));

    content.forEach((element) => element.classList.remove('yMoveNt'));
    products.forEach((element) => element.classList.remove('yMoveNt'));

    })
});

eventInfo.forEach((element)=> { element.addEventListener('click', () => {

        content.forEach((element) => element.classList.add('yMoveNt'));
        products.forEach((element) => element.classList.add('yMoveNt'));

        content.forEach((element) => element.classList.remove('yMove'));
        products.forEach((element) => element.classList.remove('yMove'));

    })
});