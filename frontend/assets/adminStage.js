const openPanel = document.querySelector('#stageCaller');
const closePanel = document.querySelector('.fa-backward');
const formsPanel = document.querySelectorAll('.forms');

const buttonOptions = [openPanel, closePanel]

openPanel.addEventListener('click', () => {
    formsPanel.forEach((form) => {form.classList.remove('leave')});
    formsPanel.forEach((form) => {form.classList.add('enter')});
    buttonOptions.forEach((option) => { option === openPanel ? ( option.classList.remove('show'), option.classList.add('unshow') ): (option.classList.remove('unshow'), option.classList.add('show'))})
})

closePanel.addEventListener('click', () => {
    formsPanel.forEach((form) => {form.classList.remove('enter')});
    formsPanel.forEach((form) => {form.classList.add('leave')});
    buttonOptions.forEach((option) => { option === closePanel ? ( option.classList.remove('show'), option.classList.add('unshow') ): (option.classList.remove('unshow'), option.classList.add('show'))})
})
