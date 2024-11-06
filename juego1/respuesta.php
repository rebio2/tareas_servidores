<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<h1>¡Piedra, papel, tijera!</h1>

    <p>Actualice la página para mostrar otra partida.</p>

    <table>
      <tr>
        <th>Ordenador</th>
        <th>Usuario</th>
      </tr>
      <tr>
        <td><span style="font-size: 7rem"><?= $jugador1; ?></span></td>
        <td><span style="font-size: 7rem"><?= $jugador2; ?></span></td>
      </tr>
      <tr>
        <th colspan="2"><?= $mensaje ?></th>
      </tr>
    </table>
</body>
</html>