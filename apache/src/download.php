<?php
        $login = $_ENV['MONGO_USER'];
        $password = $_ENV['MONGO_PASSWORD'];
        $manager = new MongoDB\Driver\Manager("mongodb://" . $login . ":" . $password . "@" . "mongo:27017");
        $query = new MongoDB\Driver\Query(array($_GET['name'], $_GET['user']));
        $cursor = $manager->executeQuery('pdf.documents', $query);
        $cursor->rewind();
        $current = $cursor->current();
        header('Content-type: application/pdf');
        echo $current->getBytes();
    ?>