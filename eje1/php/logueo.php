<?php
$ruta = "../css";
require_once('funciones.php');
require_once('encabezado.php');

//Delcaro variables
$msj = "";
$bandera = 0;

//Guardo los datos que llegan del formulario.
if (empty($_POST['email']) && empty($_POST['password'])) {
    $msj = "Email o contraseña invalida";
} else {
    //Concateno los datos ingresados
    $datosIngresados = implode(';', $_POST);

    //Comparo los datos ingresados con los datos del archivo de texto.
    //abro el archivo con fopen
    $listaDeUsuarios = fopen('../txt/usuarios.txt', 'r');
    //Si el archivo se abrio correctamente entonces entra al if
    if ($listaDeUsuarios) {
        //feof devuelve false al llegar al final del archivo entonces lo uso para ir iterando linea por linea
        while (!feof($listaDeUsuarios)) {
            //fgets guarda una linea de texto
            $linea = fgets($listaDeUsuarios);
            //comparo lo que hay en esa linea con lo que ingresó el usuario
            //uso trim para eliminar los espacios en blanco que pueda haber
            if ($datosIngresados === trim($linea)) {
                //Si hay match bandera cambia a 1
                $bandera = 1;
                //uso un break para salir del bucle while
                break;
            }
        }
        //Si bandera es igual a 1 es porque hubo un match
        if ($bandera === 1) {
            //Muestro el msj
            echo 'Datos correctos, espere a ser redirigido';
            //Redirijo a listado.php
            //uso la funcion urlencode para codificar los datos y que no se vean en el url
            header('Location: listado.php?email=' . urlencode($_POST['email']) . '&password=' . urlencode($_POST['password']));
        } else {
            //Si bandera no es 1 entonces no hubo match
            //Muestro el msj
            echo 'Datos incorrectos, espere a ser redirigido';
            //Redirijo a index.php
            header('refresh:3; url=../index.php');
        }
    } else {
    }
}
