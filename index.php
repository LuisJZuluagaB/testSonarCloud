<?php

// Problema: Función sin tipo de retorno declarado.
function suma($a, $b) {
    return $a + $b;
}

// Problema: Uso de una variable no definida.
echo $resultado;

// Problema: Conexión a la base de datos sin usar PDO (vulnerabilidad de inyección SQL).
$conexion = mysqli_connect("localhost", "root", "", "mi_base_datos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Problema: Consulta sin sanitizar, vulnerable a inyección SQL.
$id = $_GET['id'];
$resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = $id");

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "Usuario: " . $fila['nombre'] . "<br>";
}

// Problema: Función que podría no devolver un valor.
function dividir($dividendo, $divisor) {
    if ($divisor == 0) {
        echo "No se puede dividir por cero.";
        // Faltante: Return para manejar el caso de división por cero.
    }
    return $dividendo / $divisor;
}

// Uso incorrecto de la función dividir.
echo dividir(10, 0);

// Problema: Clave secreta hardcoded (mala práctica de seguridad).
$secret_key = "123456";

// Problema: Múltiples variables sin usar.
$unused_variable = "No estoy siendo usada";
$another_unused_variable = 12345;

?>
