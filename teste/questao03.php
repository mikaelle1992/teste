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
        <th>Nome do APP</th>
        <th>Quant. de dispo. que não o possuem </th>
    </tr>
<?php
$dsn = "mysql:dbname=teste;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT COUNT(device_name) as total, p.app_name FROM devices d , device_apps p 
    where d.serialnumber = p.serialnumber GROUP by p.app_name; ";
    $sql1 = $pdo->query($sql);
    $sql2 = $pdo->query($sql);

    
 if ($sql1->rowCount() > 0) {
    
        $cont=0; 
         foreach ($sql1->fetchAll() as $usuarios) {
               $cont += $usuarios["total"] ;
        }
   
    foreach ($sql2->fetchAll() as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['app_name'] . '</td>';
        echo '<td>' .($cont-$usuario["total"]). '</td>';
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