<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    if (empty($num1) || empty($num2)) {
        echo "Error: debe introducir ambos valores numéricos.";
    } else {
        $operacion = $_POST["operacion"];
        switch ($operacion) {
            case "+":
                $resultado = $num1 + $num2;
                break;
            case "-":
                $resultado = $num1 - $num2;
                break;
            case "*":
                $resultado = $num1 * $num2;
                break;
            case "/":
                if ($num2 == 0) {
                    echo "Error: no se puede dividir por cero.";
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
        }
        $formato = $_POST["formato"];
        switch ($formato) {
            case "decimal":
                $resultado_mostrar = $resultado;
                break;
            case "binario":
                $resultado_mostrar = decbin($resultado);
                break;
            case "hexadecimal":
                $resultado_mostrar = dechex($resultado);
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
    <style>
        body {
            background-color: grey;
            width: 500px;
            align-items: center;
            justify-content: center;
            text-align: justify;
        }

        form {
            background-color: white;
        }

        header {
            background: blue;
            text-align: center;
            padding: 20px;
            color: white;
            text-shadow: black 0.1em 0.1em 0.2em;
        }

        h1 {
            color: white;
        }
    </style>
</head>

<body>
    <div class="content">
        <header>
            <h1>Mini Calculadora</h1>
        </header>
        <form action="" method="post">
            <label for="num1">Nº1:</label><input type="number" name="num1" id="num1"><br><br>
            <label for="num2">Nº2:</label><input type="number" name="num2" id="num2"><br><br>
            <input type="submit" name="operacion" value="+">
            <input type="submit" name="operacion" value="-">
            <input type="submit" name="operacion" value="*">
            <input type="submit" name="operacion" value="/">
            <button>Borrar</button>
            <br><br>
            <input type="radio" name="formato" value="decimal" checked>Decimal
            <input type="radio" name="formato" value="binario">Binario
            <input type="radio" name="formato" value="hexadecimal">Hexadecimal
            <br><br>
            <input type="reset" name="borrarReset" id="borrarReset" value="Borrar con reset">

        </form>
        <?php
        if (!empty($resultado_mostrar)) {
            echo "El resultado es: " . $resultado_mostrar;
        }
        ?>
    </div>
</body>

</html>