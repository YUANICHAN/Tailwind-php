<?php
    require_once 'CLASSES/shape.php';
    require_once 'CLASSES/circle.php';
    require_once 'CLASSES/rectangle.php';

    $shape = new shapes("Yuan");
    $circle = new circle("yuAN");
    $rectangle = new rectangle("YUAN");

    echo $circle->getArea(12);
    echo "           ";
    echo $rectangle->getArea(2,3);
?>