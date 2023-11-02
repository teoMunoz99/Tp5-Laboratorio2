<?php
$ruta = "css";
require_once('php/encabezado.php');
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light rounded-4 p-4 w-50">
        <form action="php/procesa.php" method="GET">
            <legend>Consultar por plazos</legend>
            <fieldset class="disabled">
                <section>
                    <h5>Plazo: </h5>
                    <article class="form-check form-switch">
                        <input class="form-check-input" type="radio" role="switch" id="30dias" name="dias" value="30" required>
                        <label class="form-check-label" for="30dias">30 días</label>
                    </article>
                    <article class="form-check form-switch">
                        <input class="form-check-input" type="radio" role="switch" id="45dias" name="dias" value="45">
                        <label class="form-check-label" for="45dias">45 días</label>
                    </article>
                    <article class="form-check form-switch">
                        <input class="form-check-input" type="radio" role="switch" id="60dias" name="dias" value="60">
                        <label class="form-check-label" for="60dias">60 días</label>
                    </article>
                    <article class="form-check form-switch">
                        <input class="form-check-input" type="radio" role="switch" id="90dias" name="dias" value="90">
                        <label class="form-check-label" for="90dias">90 días</label>
                    </article>
                </section>
            </fieldset>
            <section class="d-flex justify-content-center mt-3">
                <button class="btn btn-warning" type="submit">Consultar</button>
            </section>
        </form>
    </section>
</main>

<?php
require_once('php/pie.php');
?>