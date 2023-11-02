<?php
$ruta = "css";
require_once('php/encabezado.php');
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light rounded-4 p-4 w-25">
        <form action="php/consulta.php" method="POST">
            <legend class="text-center fw-bold">SUELDOS</legend>
            <p class="text-secondary text-center"><small>Ingrese un legajo válido y encuentre el sueldo correspondiente.</small></p>
            <fieldset class="disabled">
                <section class="mb-3">
                    <label for="legaj" class="form-label">N° de legajo:</label>
                    <input type="number" class="form-control" min="0" max="359" id="legaj" name="legajo" required>
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