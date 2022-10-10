const liSelected = document.querySelector('.liSelected');
const li = document.querySelectorAll('li');
const ul = document.querySelector('.ulLogo div ul');

// console.log(typeof(li));
// console.log(li);
li.forEach( (esto) => {console.log(esto)} );

let unshow = true;

if(screen.width <= 700)
{


        liSelected.addEventListener('click', () => {
            
            if(unshow == true){

                ul.style.zIndex='999';
                li.forEach( (esto) => {
                    esto.style.display='flex';
                    esto.style.margin='0';
                    esto.style.border='none';
                } );
        
                unshow = false;
            }else{
                
                ul.style.zIndex='999';
                li.forEach( (esto) => {
                esto == liSelected ? esto.style.display='flex' : esto.style.display='none';
                } );
                unshow = true;
            }
        })

    // if(unshow == true){
    // liSelected.addEventListener('click', () => {

    //     ul.style.zIndex='999';
    //     li.forEach( (esto) => {
    //         esto.style.display='flex';
    //         esto.style.margin='0';
    //         esto.style.border='none';
    //     } );

    //     unshow = false;

    //     })
    // }
    // else{
    // liSelected.addEventListener('click', () => {

    //     ul.style.zIndex='999';
    //     li.forEach( (esto) => {
    //         esto.style.display='none';
    //     } );
    //     unshow = true;

    //     })
    // }
}