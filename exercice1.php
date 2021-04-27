<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice1.php</title>
    <style>
        .container {
            display: flex;
        }
        
        .item {
            width: 50px;
            height: 40px;
            padding: 5px;
            border: 1px solid black;
            border-right: 0px;
        }

        .item:last-child {
            border-right: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        function genererTableau() {
            $arr = []; 
            
            for($i = 0; $i < 10; $i++)
                $arr[$i] = rand(1,20);

            return $arr;
        }

        foreach(genererTableau() as $number)
            echo '<div class="item">' . $number . '</div>'; 
        ?>
    </div>
</body>
</html>
