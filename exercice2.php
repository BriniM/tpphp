<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice2</title>
    <style>
        table {
            width: 400px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<?php 
    function populateTableFromFile() {
        define('fileName', 'personne.txt');

        if (!file_exists(fileName))
            return false;

        $fileContent = file(fileName);

        foreach($fileContent as $line)
        {
            $lineValues = explode(';', $line);

            echo '<tr>';
                echo '<td>' . $lineValues[0] . '</td>';
                echo '<td>' . $lineValues[1] . '</td>';
                echo '<td>' . $lineValues[2] . '</td>';
                echo '<td>' . $lineValues[3] . '</td>';
            echo '</tr>';
        }

        return true;
    }
?>
<body>
    <table>
    <tr>
        <th>Login</th>
        <th>Mot de passe</th>
        <th>Nom</th>
        <th>Prenom</th>
    </tr>
    <?php
        if (!populateTableFromFile())
            echo 'Fichier introuvable';
    ?>
    </table>
</body>
</html>
