<?php
  include("./get_events.php");
  foreach ($data as $event) {
    echo "<section class='event_post'><section class='content'><div><h2>".$event["titulo"]."</h2><p>".$event["tipo"]."</p><button>VER PRODUCTOS</button></div><img src='".$event["link_img"]."'/></section></section>";
  }
