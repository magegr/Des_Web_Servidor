<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="figura">Selecciona la figura:</label>
        <select name="figura" id="figura">
            <option value="">--Selecciona--</option>
            <option value="triangulo">Triángulo</option>
            <option value="rectangulo">Rectángulo</option>
            <option value="circulo">Círculo</option>
        </select>
        <label for="figura">Añade unidades de medida</label>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $figura = $_POST['figura'];

    function calcularAreaTriangulo($base, $altura)
    {
        $areaTriangulo = ($base * $altura) / 2;
        return $areaTriangulo;
    }
    function calcularAreaRectangulo($base, $altura)
    {
        $areaRectangulo = $base * $altura;
        return $areaRectangulo;
    }
    function calcularAreaCirculo($radio)
    {
        $pi = 3.14;
        $areaCirculo = $pi * $radio;
        return $areaCirculo;
    }
    switch ($figura) {
        case 'triangulo':
        {
            echo 'El area del triangulo es'.calcularAreaTriangulo($_POST['base'], $_POST['altura']). '<br>';
            break;
        }
        case 'rectangulo':
        {
            echo 'El area del rectangulo es'.calcularAreaRectangulo($_POST['base'], $_POST['altura']) . '<br>';
            break;
        }
        case 'circulo':
        {
            echo 'El area del circulo es' .calcularAreaCirculo($_POST['radio']) . '<br>';
            break;
        }
    }
}