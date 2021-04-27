<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        if ( array_key_exists('nom', $_POST) 
            && array_key_exists('mail', $_POST)
            && array_key_exists('commentaire', $_POST)) {

            // Creation de fichier
            $fileContent = file_get_contents('livredor.txt');

            if (strlen($fileContent) == 0)
                $fileContent = '{ "commentaires": [] }';

            // Lecture du JSON
            $comments = json_decode($fileContent, true);
        
            // Mise a jour
            $newComment = [
                "nom" => $_POST['nom'],
                "mail" => $_POST['mail'],
                "commentaire" => $_POST['commentaire'],
                "time" => time()
            ];

            // ou bien l'usage de array_push
            $comments['commentaires'][] = $newComment;

            file_put_contents('livredor.txt', json_encode($comments));
        } 
        header('Location: ' . '/livredor.html'); // Pour la redirection
    }

    else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $fileContent = file_get_contents('livredor.txt');

        if (strlen($fileContent) == 0) 
            echo '{ "commentaires": []  }';
        else
            echo $fileContent;
    }
?>
