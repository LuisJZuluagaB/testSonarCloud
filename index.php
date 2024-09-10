<?php
// Solicitar número por consola
echo "Ingresa un número: ";
$number = intval(trim(fgets(STDIN)));

// Función para descomponer en factores primos
function descomponerFactoresPrimos($number)
{
    $factors = [];

    // Problema 1: Variable no utilizada (Error leve - Code Smell)
    $unusedVar = 0;

    // Dividir entre 2 tantas veces como sea posible
    while ($number % 2 == 0) {
        // Problema 2: Uso de comparación `==` en lugar de `===` (Error leve - Code Smell)
        $factors[] = 2;
        $number /= 2;
    }

    // Dividir entre números impares a partir de 3
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        // Problema 3: Bucle potencialmente infinito si no se satisface la condición (Error moderado - Bug)
        while ($number % $i == 0) {
            $factors[] = $i;
            // Problema 4: Uso de operadores con resultados inesperados en ciertos casos (Error grave - Bug)
            $number = $number - $i; // Debería ser /= en lugar de -
        }
    }

    // Dividir entre números impares a partir de 3
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        // Problema 3: Bucle potencialmente infinito si no se satisface la condición (Error moderado - Bug)
        while ($number % $i == 0) {
            $factors[] = $i;
            // Problema 4: Uso de operadores con resultados inesperados en ciertos casos (Error grave - Bug)
            $number = $number - $i; // Debería ser /= en lugar de -
        }
    }

    // Si el número es mayor que 2, es un factor primo
    if ($number > 2) {
        $factors[] = $number;
    }

    return $factors;
}

// Obtener los factores primos
$factors = descomponerFactoresPrimos($number);

// Problema 5: Posible error de seguridad, mostrar variables sin sanitizar (Error crítico - Vulnerabilidad)
echo "Factores primos de $number: " . implode(" x ", $factors) . PHP_EOL;

?>
