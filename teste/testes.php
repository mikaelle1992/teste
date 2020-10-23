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
                        <li><a href="questao00.php">QUESTÃO 00</a></li>
                        <li><a href="questao01.php">QUESTÃO 01</a></li>
                        <li><a href="questao02.php">QUESTÃO 02</a></li>
                        <li><a href="questao03.php">QUESTÃO 03</a></li>
                        <li><a href="questao04.php">QUESTÃO 04</a></li>

                    </ul>
                </nav>
            </div>

        </div>
    </header>

    <table>
        <tr>
            <th>Numero de serie</th>
            <th>Dispositivo</th>
            <th>OS</th>
            <th>Ciclo de bateria</th>
            <th>Nome do APP</th>
            <th>Versão do APP</th>
        </tr>

        <?php
        $dsn = "mysql:dbname=teste;host=localhost";
        $dbuser = "root";
        $dbpass = "";

        try {
            $pdo = new PDO($dsn, $dbuser, $dbpass);

            $sql = "SELECT d.serialnumber,d.device_name,d.os,d.count_battery_cycles, p.app_name, p.app_version  FROM devices d , device_apps p 
        where d.serialnumber = p.serialnumber ;";
            $sql = $pdo->query($sql);


            if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $usuario) {

                    echo '<tr>';
                    echo '<td>' . $usuario['serialnumber'] . '</td>';
                    echo '<td>' . $usuario['device_name'] . '</td>';
                    echo '<td>' . $usuario['os'] . '</td>';
                    echo '<td>' . $usuario['count_battery_cycles'] . '</td>';
                    echo '<td>' . $usuario['app_name'] . '</td>';
                    echo '<td>' . $usuario['app_version'] . '</td>';

                    echo '</tr>';
                }
            } else {
                echo "não há usuarios";
            }
        } catch (PDOException $e) {

            echo "Falhou: " . $e->getMessage();
        }
        ?>

</body>

</html>