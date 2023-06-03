<?php

    $search = $_POST['search'];
    $smartphones = $_POST['smartphones'];
    $smartwatch = $_POST['smartwatch'];
    $laptop = $_POST['laptop'];
    $tablet = $_POST['tablet'];
    $tv = $_POST['tv'];
    $headphones = $_POST['headphones'];
    $acoustics = $_POST['acoustics'];
    $accessories = $_POST['accessories'];
    $consoles = $_POST['consoles'];
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];

    header('Location: ../catalog.php?search=' . $search . '&smartphones=' . $smartphones . '&smartwatch=' . $smartwatch . '&laptop=' . $laptop . '&tablet=' . $tablet . '&tv=' . $tv . '&headphones=' . $headphones . '&acoustics=' . $acoustics . '&accessories=' . $accessories . '&consoles=' . $consoles . '&maxPrice=' . $maxPrice);