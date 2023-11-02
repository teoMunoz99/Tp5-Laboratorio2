<?php
$ruta = "../css";
require_once('funciones.php');
require_once('encabezado.php');

//Declaro variables
$deposito = 0;
$cantidadDias = 0;
$nombre;
$msj = "";
$interes = 0;
$datos;
$datosUnidos;

//controlo los datos que llegan del formulario
if(!empty($_GET['dias'])){
    $cantidadDias = $_GET['dias'];
}else{
    echo("falta algo");
}

//guardo la ruta de la carpeta donde esta el archivo
$ubicacion = '../datos';
$nombreDelArchivo = 'inversiones.txt';
$rutaCompleta = $ubicacion . '/' . $nombreDelArchivo;

//controlo si existe la carpeta, si no existe la creo
if(!file_exists($ubicacion)){
    mkdir($ubicacion);
}
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light w-25 rounded-4 p-4">
        <h5>Inversiones a <?php echo $cantidadDias?></h5>
        <table class="table table-dark table-striped">
        <?php
        //abro el archivo en modo lectura
        $archivo = fopen($rutaCompleta, 'r');
        $contador = 1;
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            if($linea != ''){
                //separo los datos 
                $linea = explode(';', $linea);
                //controlo que tenga la cantidad de dias elegidos
                if($linea[2] == $cantidadDias){
                    //muestro los datos
                    echo '<tr class="border">';
                    echo '<td class="d-flex justify-content-between"><div><p>'.$contador.'. <span class="fw-bold">'.$linea[0].'</span></p><p class="ms-4">$'.number_format($linea[1], 2, '.', ',').'</p></div>';
                    echo '<div><p class="badge text-bg-primary d-inline">'.$cantidadDias.'</p></div>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            $contador++;
        }
        ?>
        </table>
    </section>
</main>

<?php
require_once('pie.php');
?>
