let user_bd = new Map();
let contador = 0;

function addUser(usuario, password, key) {
  let newuser = {
    name: usuario,
    pwd: password,
  };

  if (user_bd.has(key)) {
    console.log("ya existe este usuario");
  } else {
    user_bd.set(key, newuser);
    contador++;
  }
}

addUser("pedro", "1234", contador);
console.log(user_bd);

function getData() {
  logIn(
    document.getElementById("inUsuario").value,
    document.getElementById("inPass").value
  );
}

function logIn(user, pwd) {
  let logged = false;
  for (const [k, v] of user_bd) {
    if (v.name === user) {
      if (v.pwd === pwd) {
        console.log("te has logeado exitosamente");
        logged = true;
        window.location.replace("index.html");
      }
    }
  }
  if (!logged) {
    console.log("no se a logeado");
    console.log(user);
    console.log(typeof pwd);
  }
}

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