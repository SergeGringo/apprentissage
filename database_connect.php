<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connexion = mysqli_connect('localhost', 'root', '', 'ninja_pizza');
mysqli_set_charset($connexion, 'utf8mb4');
