<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice3</title>
</head>
<?php
    function createFileAndAlertUser($filename) {
        echo 'Pas de connexions';

        $newFile = fopen($filename, 'w+');
        
        fwrite($newFile, time());
        fclose($newFile);
    }

    function writeFileContentAndAppendTime($filename) {
        $connections = fopen($filename, 'r+');
        
        writeFileContent($connections);

        fwrite($connections, PHP_EOL . time());
        fclose($connections);
    }

    function writeFileContent($connections) {
        while( !feof($connections) ) 
        {    
            echo '<tr>';
                echo '<td>';
                echo date('j-F g:i:s', fgets($connections));
                echo '</td>';
            echo '</tr>';
        }
    }
?>

<body>
    <table>
        <tr>
            <th>Le temp</th>
        </tr>
    <?php
    define('connectionsFile', 'connexion.txt');

    if (!file_exists(connectionsFile))
        createFileAndAlertUser(connectionsFile);
    else 
        writeFileContentAndAppendTime(connectionsFile);
    ?>
    </table>
</body>
</html>
