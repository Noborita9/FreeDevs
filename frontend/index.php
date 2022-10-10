<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/f4e70a9fbd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/index_media_big.css">
    <link rel="stylesheet" href="assets/index_media_small.css">
    <title>Document</title>
  </head>
  <body>

    <nav id="nav">
    <ul class="ulLogo">
        <img src="assets/img/greenHat.png" />

        <div>
          <ul>
            <li class="liSelected"><p>inicio</p></li>
            <li onclick='location.href="."'><p>eventos</p></li>
            <li onclick='location.href="."'><p>nosotros</p></li>
            <li onclick='location.href="."'><p>contacto</p></li>
            <li onclick='location.href="."'><p>admin</p></li>
            <li onclick='location.href="."'><p>market</p></li>
          </ul>
          <a href="index.html"><i class="fa-solid fa-user"></i></a>
        </div>
      </ul>
    </nav>

    <section id="carrusel">
      <div>
          <img src="assets/img/hamburger.jpg">
          <img src="assets/img/pancakes.jpg">
          <img src="assets/img/charcuterie.jpg">
          <img src="assets/img/meatloaf.jpg">
          <img src="assets/img/pancakes2.jpg">
          <img src="assets/img/hamburger.jpg">
      </div>
    </section>

  
    <section class="event">
      <section class="content">
        <img src="assets/img/pancakes.jpg">
        <div>
          <h2>Dia de la madre</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint pariatur asperiores necessitatibus repellendus.</p>
          <button>mas informacion</button>
        </div>
      </section>
    </section>

    <section id="formularioContacto">
      <form action="">
      <a href="#nav"><i class="fa-solid fa-circle-arrow-up"></i></a>
        <div>
          <input type="text" placeholder="nombre">
          <input type="text" placeholder="apellido">
        </div>
        <input type="email" placeholder="e-mail">
        <input type="number" placeholder="numero de telefono">
        <div>
          <textarea name="" id="" cols="30" rows="10" placeholder="que nos quiere comunicar?"></textarea>
          <button>enviar</button>
        </div>
      </form>
    </section>

    <script src="assets/actions.js"></script>
    <script src="assets/carousel.js"></script>
  </body>
</html>

