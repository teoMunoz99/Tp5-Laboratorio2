<?php
$ruta = "../css";
require_once('funciones.php');
require_once('encabezado.php');
require_once('logueo.php');

$email = "";
$password = "";
$msj = "";

//Recibo los datos que llegan en la url, uso GET porque los datos vienen en la url
if (empty($_GET['email']) && empty($_GET['password'])) {
    $msj = "Email o contraseña invalida";
} else {
    $email = $_GET['email'];
    $password = $_GET['password'];
}
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light w-25 rounded-4 p-4">
        <?php
        echo ("<p class='text-danger'>".$msj."</p>");
        echo ("<p class=''>Email:<span class='text-warning'> ".$email."</span></p>");
        echo ("<p class=''>Contraseña:<span class='text-warning'> ".$password."</span></p>");
        ?>
    </section>
</main>

<?php
require_once('pie.php');
?>