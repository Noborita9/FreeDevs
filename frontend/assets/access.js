let whatImg = true;

function reveal() {
  const showImg = document.getElementById('showImg');
  const inPass = document.getElementById('inPass');
  if( whatImg ){
  showImg.setAttribute("src", 'assets/img/desbloquear.png');
  inPass.setAttribute('type', 'text');
  whatImg = false;
  }else{
  showImg.setAttribute("src", 'assets/img/candado.png');
  inPass.setAttribute('type', 'password')
  whatImg = true;
  }
}

// function changeColors() {
//   const bgColor = document.getElementById('bgColor');
//   bgColor.classList.add('go')
//   console.log('llego hasta aca')
// }
