<html>

<head>
    <meta charset="UTF-8">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
    <title>Teste</title>
    <link rel="stylesheet" type="text/css" href="stylee.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="titulo">
                Listagem
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="testes.php">PÁGINA PRINCIPAL</a></li>
                      
                    </ul>
                </nav>
            </div>

        </div>
    </header>
<table>
    <tr>
        <th>Numero de serie</th>
        <th>Dispositivo</th>
        <th>Ciclo de bateria</th>
    </tr>


    <?php
    $dsn = "mysql:dbname=teste;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

        $sql = "SELECT serialnumber, device_name, count_battery_cycles FROM devices WHERE os = 'macOS' AND count_battery_cycles >300 ";
        $sql = $pdo->query($sql);


        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $usuario) {

                echo '<tr>';
                echo '<td>' . $usuario['serialnumber'] . '</td>';
                echo '<td>' . $usuario['device_name'] . '</td>';
                echo '<td>' . $usuario['count_battery_cycles'] . '</td>';

                echo '</tr>';
            }
        } else {
            echo "não há usuarios";
        }
    } catch (PDOException $e) {

        echo "Falhou: " . $e->getMessage();
    }
    ?>