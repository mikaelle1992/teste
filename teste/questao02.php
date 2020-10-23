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
                        <li><a href="testes.php">PÁGINA INICIAL</a></li>

                    </ul>
                </nav>
            </div>

        </div>
    </header>
<table>
    <tr>
        <th>Numero de serie</th>
        <th>Nome do APP</th>     
    </tr>


    <?php
    $dsn = "mysql:dbname=teste;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

        $sql = "SELECT * FROM device_apps";
        $sql = $pdo->query($sql);


        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $usuario) {

                if($usuario["app_name"]!="Mosyle" && $usuario["app_version"]!="5.2.1"){
                   
                echo '<tr>';
                echo '<td>' . $usuario['app_version'] . '</td>';
                echo '<td>' . $usuario['app_name'] . '</td>';

                echo '</tr>';
                
                }

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