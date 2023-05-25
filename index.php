<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Iniciar sesión</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <strong>MDB</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                target="_blank">Learn Bootstrap 5</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Download MDB UI KIT</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.facebook.com/mdbootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">


              <?php
              if (isset($_POST['enviar'])) {
                if (empty($_POST['email_usr']) || empty($_POST['pass_usr'])) {
                  echo "<script languaje = 'javaScript'>
                    alert('Cedula o nombre vacios');
                    location.assign('index.php');
                    </script>";
                } else {
                  include("conexion/conexion.php");
                  $email = $_POST['email_usr'];
                  $pass = $_POST['pass_usr'];
                  $tipo = $_POST['tipo_usr'];

                  session_start();

                  $_SESSION["tipo"] = $tipo;

                  $sql = "select * from users where email_usr = '" . $email . "' AND pass_usr ='" . $pass . "' AND id_tipo = '" . $tipo . "'";

                 


                  $resultado = mysqli_query($conexion, $sql);

                  


                  if ($fila = mysqli_fetch_assoc($resultado)){
                    $nombre = $fila['nom_usr'];

                    echo $nombre;
                    echo "Prueba";
// Asignar el nombre a la variable de sesión
                    $_SESSION["nombre"] = $nombre;


                    echo "<h1>!Bienvenidsdfsdfo! ". $nombre ." </h1><br><h1>hola</h1><br><a href='user/prub.php'>Entrar</a>";
                  } else {
                    echo "<script languaje = 'javaScript'>
                      alert('Cedula o nombre incorrectos');
                      location.assign('index.php');
                      </script>";
                  }

                }
              } else {
                ?>
                <!-- form -->
                <form class="bg-white rounded shadow-5-strong p-5" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email_usr" class="form-control" required />
                    <label class="form-label" for="form1Example1">Correo electrónico</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input id="campoContra" type="password" name="pass_usr" class="form-control" required/>
                    <label class="form-label" for="campoContra">Contraseña</label>
                  </div>

                  <!-- Rol input -->
                  <div class="form-outline mb-4">
                    
                      
                    <select name="tipo_usr" class="form-select" id="select-log">
                      <?php
                      include("conexion/conexion.php");
                      $sql = "SELECT * FROM tipousr";
                      $resultado = mysqli_query($conexion, $sql);
                      while ($row = mysqli_fetch_array($resultado)) {
                        // $id_empleado=$row['id_empleado'];
                        $id_tipo = $row['id_tipo'];
                        $nom_tipo = $row['nom_tipo'];
                        ?>
                        <option value="<?php echo $id_tipo; ?>">
                          <?php echo $nom_tipo; ?>
                        </option>
                        <?php
                      }
                      ?>
                    </select><br><br>

                  </div>
                  <?php
              }
              ?>
                <!-- Submit button -->
                <button type="submit" name="enviar" class="btn btn-primary btn-block"> Iniciar sesión</button>
              </form> <!-- form -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <div class="py-4 text-center">
      <a role="button" class="btn btn-primary btn-lg m-2"
        href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">
        Learn Bootstrap 5
      </a>
      <a role="button" class="btn btn-primary btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank">
        Download MDB UI KIT
      </a>
    </div>

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Follow MDB on social media</p>
      <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>