<?php
$ruta = "css";
require_once('php/encabezado.php');
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light rounded-4 p-4 w-25">
        <form action="php/logueo.php" method="POST">
            <legend class="text-center fw-bold">INICIAR SESIÓN</legend>
            <p class="text-secondary text-center"><small>Ingrese su usuario y contraseña</small></p>
            <fieldset class="disabled">
                <section class="mb-3">
                    <label for="nombre" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="email">
                </section>
                <section>
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="password">
                </section>
            </fieldset>
            <section class="d-flex justify-content-center mt-3">
                <button class="btn btn-warning" type="submit">Loguin</button>
            </section>
        </form>
    </section>
</main>

<?php
require_once('php/pie.php');
?>