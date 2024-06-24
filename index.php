<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operacion = filter_input(INPUT_POST, 'operacion', FILTER_SANITIZE_STRING);

    if ($num1 === false || $num2 === false) {
        echo "Error: Entrada no válida.";
        exit;
    }

    if ($operacion === '/' && $num2 == 0) {
        echo "Error: No se puede dividir entre cero.";
    } else {
        $resultado = calcular($num1, $num2, $operacion);
        echo "Resultado: $resultado";
    }
}
function calcular($a, $b, $op) {
    switch ($op) {
        case '+':
            return sumar($a, $b);
        case '-':
            return restar($a, $b);
        case '*':
            return multiplicar($a, $b);
        case '/':
            return dividir($a, $b);
        default:
            return "Operación no válida.";
    }
}
function sumar($a, $b) {
    return $a + $b;
}
function restar($a, $b) {
    return $a - $b;
}
function multiplicar($a, $b) {
    return $a * $b;
}
function dividir($a, $b) {
    return $a / $b;
}
?>
