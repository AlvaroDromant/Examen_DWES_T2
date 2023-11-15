<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    
<?php
require_once 'controlador.php';

echo '<h1>Nuestro menú</h1>';
echo '<h2>Pizzas</h2>';
foreach ($articulos as $articulo) {
    if ($articulo instanceof Pizza) {
        echo '<p>' . $articulo->getNombre() . '</p>';
    }
}
echo '<h2>Bebidas</h2>';
foreach ($articulos as $articulo) {
    if ($articulo instanceof Bebida) {
        echo '<p>' . $articulo->getNombre() . '</p>';
    }
}

echo "<h2>Otros</h2>";
    foreach ($articulos as $articulo) {
        if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
            echo  '<p>' . $articulo->getNombre() . '</p>';
    }
}


echo '<h1>Los más vendidos</h1>';

usort($articulos, function ($a, $b) {
    return $b->contador - $a->contador;
});

for ($i = 0; $i < 3; $i++) {
    echo "{$articulos[$i]->nombre} - {$articulos[$i]->contador} unidades<br>";
}


echo '<h1>¡Los más lucrativos!</h1>';

usort($articulos, function ($a, $b) {
    $beneficioA = ($a->precio - $a->coste) * $a->contador;
    $beneficioB = ($b->precio - $b->coste) * $b->contador;

    return $beneficioB - $beneficioA;
});

foreach ($articulos as $articulo) {
    $beneficio = ($articulo->precio - $articulo->coste) * $articulo->contador;
    echo "{$articulo->nombre} - Beneficio: {$beneficio}€<br>";
}

?>

</body>
</html>
