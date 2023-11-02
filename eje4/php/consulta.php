<?php
$ruta = "../css";
require_once('funciones.php');
require_once('encabezado.php');

//Delcaro variables
$nombre;
$apellido;
$sueldo;
$bandera = 0;
$legajo;

//Guardo los datos que llegan del formulario.
if (empty($_POST['legajo'])) {
    echo 'Legajo invalido, espére a ser redireccionado...';
    header('refresh:3;url=../index.php');
} else {
    //Comparo los datos ingresados con los datos del archivo de texto.
    //abro el archivo con fopen
    $listaDeSueldos = fopen('../txt/sueldos.txt', 'r');
    //Si el archivo se abrio correctamente entonces entra al if
    if ($listaDeSueldos) {
        //feof devuelve false al llegar al final del archivo entonces lo uso para ir iterando linea por linea
        while (!feof($listaDeSueldos)) {
            //fgets guarda una linea de texto
            $linea = fgets($listaDeSueldos);
            //separo los datos para comparar el legajo
            $linea = explode(';', $linea);
            //comparo lo que hay en esa linea con lo que ingresó el usuario
            //uso trim para eliminar los espacios en blanco que pueda haber
            if (trim($_POST['legajo']) === trim($linea[0])) {
                //Si hay match bandera cambia a 1
                $bandera = 1;
                //guardo los datos
                $legajo = $linea[0];
                $apellido = $linea[1];
                $nombre = $linea[2];
                $sueldo = $linea[3];
                //uso un break para salir del bucle while
                break;
            }
        }
        //Si bandera es igual a 1 es porque hubo un match
        if ($bandera === 1) {
            //cierro el archivo
            fclose($listaDeSueldos);
        } else {
            //cierro el archivo
            fclose($listaDeSueldos);
            //Si bandera no es 1 entonces no hubo match
            //Muestro el msj
            echo 'Legajo no encontrado, espére a ser redireccionado...';
            //Redirijo a index.php
            header('refresh:3;url=../index.php');
        }
    } else {
        echo 'Error al abrir el archivo, espére a ser redireccionado...';
        //Redirijo a index.php
        header('refresh:3;url=../index.php');
    }
}

//muestro el contenido solo si se encontro el legajo
if($bandera === 1){
?>
<main class="d-flex justify-content-center">
    <section class="row container m-5 w-50">
        <article class="col-4 border border-primary border-5 p-2 rounded">
            <p class="fw-bold">Legajo:</p>
            <p><?php echo $legajo; ?></p>
        </article>
        <article class="col-8 border border-success border-5 p-2 rounded">
            <p class="fw-bold">Apellido y nombre:</p>
            <p><?php echo ($apellido . ', ' . $nombre); ?></p>
        </article>
        <article class="col-12 border border-danger border-5 p-2 rounded">
            <p class="fw-bold">Sueldo a cobrar:</p>
            <p>$<?php echo (number_format($sueldo, 2, '.', ',')); ?></p>
        </article>
    </section>
</main>
<?php
}else{
    echo '<main></main>';
}
require_once('pie.php')
?>