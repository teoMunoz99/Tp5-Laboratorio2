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
if(!empty($_GET['deposito']) && !empty($_GET['dias']) && !empty($_GET['nombre'])){
    $nombre = trim($_GET['nombre']);
    //calculo el interes
    $deposito = trim($_GET['deposito']);
    $cantidadDias = $_GET['dias'];
    //creo un array con los datos
    $datos = [$nombre, $deposito, $cantidadDias];
    //uno los datos
    $datosUnidos = implode(';', $datos);
}else{
    echo("falta algo");
}

//Primero veo si ya existe el archivo inversiones.txt
//guardo la ruta de la carpeta donde esta el archivo

$ubicacion = '../datos';
$nombreDelArchivo = 'inversiones.txt';
$rutaCompleta = $ubicacion . '/' . $nombreDelArchivo;

//controlo si existe la carpeta, si no existe la creo
if(!file_exists($ubicacion)){
    mkdir($ubicacion);
}
//abro el archivo para escritura, si no existe intenta crearlo
$archivo = fopen($rutaCompleta,'w');
//guardo los datos recibidos en el archivo
fputs($archivo, $datosUnidos);
//cierro el archivo
fclose($archivo);
?>

<main class="container d-flex justify-content-center align-items-center">
    <section class="bg-dark text-light w-25 rounded-4 p-4">
        <h5>Intereses</h5>
        <?php
        //Leo los datos del archivo y muestro
        /*if (!empty($msj)) {
            echo '<p>' . $msj . '</p>';
        } else {
            $interes = round($interes,2);
            echo '<p>Interés generado: $' . $interes . '</p>';
        }*/
        //abro el archivo en modo lectura
        $archivo = fopen($rutaCompleta, 'r');
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            if($linea != ''){
                //separo los datos 
                $linea = explode(';', $linea);
                //calculo el interes
                $interes = calcularIntereses($linea[1], $linea[2]);
                //muestro los datos
                echo '<p>Nombre: ' . $linea[0] . '</p>';
                echo '<p>Interés generado: $' . number_format($interes, 2) . '</p>';
            }

        }

        ?>
    </section>
</main>

<?php
require_once('pie.php');
?>
