<?php
session_start();
if (isset($_SESSION['idUsuario'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Práctica Docker</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="js/bootstrap/css/bootstrap.min.css">
    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.red.css" id="theme-stylesheet">

  </head>
  <body>
     <!-- navbar-->
     <header class="header">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">  
            <!-- Navbar Header  -->
            <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            <!-- Navbar Collapse -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a href="inicio.php" class="nav-link active">Home</a>
                </li>
              </div>
            </div>
          </div>
        </nav>
      </header>
    
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="block">
              <div class="block-body">
                <p class="lead">Se ha iniciado sesi&oacuten</p>
                <p class="text-muted">
                <?php
                  echo "El usuario es: ".$_SESSION['idUsuario']; 
                ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="block">
              <div class="block-body">
                <button type='submit' class="btn btn-primary" id="logout">Cerrar Sesi&oacuten</button>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="main-footer">
      <div class="copyrights">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="text col-md-4">
              <p>Sofía Alejandra López Fernández</p>
            </div>
            <div class="text col-md-4">
              <p>Inform&aacutetica como Servicio</p>
            </div>
            <div class="text col-md-4">
              <p>M&aacutester Universitario en Ingenier&iacutea Inform&aacutetica</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie/jquery.cookie.js"> </script>
    <script src="https://kit.fontawesome.com/d62cab618e.js"></script>
    <script src="indexjs.js"></script>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>