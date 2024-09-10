<?php
// Solicitar número por consola
echo "Ingresa un número: ";
$number = intval(trim(fgets(STDIN)));

// Función para descomponer en factores primos
function descomponerFactoresPrimos($number)
    {
        $factors = [];
    // Dividir entre 2 tantas veces como sea posible
    while ($number % 2 == 0) {
        $factors[] = 2;
        $number /= 2;
    }

    // Dividir entre números impares a partir de 3
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        while ($number % $i == 0)
        {
            $factors[] = $i;
            $number /= $i;
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

// Imprimir los factores primos
echo "Factores primos de $number: " . implode(" x ", $factors) . PHP_EOL;
?>
