<div class="col-sm-12 espacio">
<div class="cont0 col-md-6">
    <div>
        <h1>¿ Quieres saber quien hizo un mueble ?</h1>
        <h2>¡ escanea el código con tu celular !</h2>
        <h3><a href="consultarqr.php">¡¡ Presiona Aquí !! </a></h3>

        <h2> Conoce a nuestros mejores mueblistas</h2>
        <h3><a href="ranking_mueblistas.php">¡¡ Presiona Aquí !! </a></h3>
    </div>
</div>
<div class="col-md-1">
</div>
 <div class="cont1 col-md-5 col-sm-12 col-xs-12  ">
 <div class="cuadro altura">
      <ul class="nav nav-tabs nav-justified">
      <li class="<?php echo $pagina == 'login_cliente' ? 'active' : ''; ?>"><a href="?p=login_cliente">Usuario</a>
      </li>

      <li class="<?php echo $pagina == 'login_mueblista' ? 'active' : ''; ?>"><a href="?p=login_mueblista">Mueblista</a>
      </li>

      <li class="<?php echo $pagina == 'login_administrador' ? 'active' : ''; ?>"><a href="?p=login_administrador">Administrador</a>
      </li>

   </ul>

  <p>
    hola mundo
  </p>

<script>
$(document).ready(function() {
    var heights = $(".altura").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".altura").height(maxHeight);
});
</script>
