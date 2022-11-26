const openPanel = document.querySelector('#showButton');
// const closePanel = document.querySelector('.fa-backward');
const navPanel = document.querySelector('#nav-events');

let open = false;

openPanel.addEventListener('click', () => {
    if(open == false){
        navPanel.classList.remove('leaveNav');
        navPanel.classList.add('enterNav');
        open = true;
    }
    else{
        navPanel.classList.remove('enterNav');
        navPanel.classList.add('leaveNav');
        open = false;
    }
    
})


