<?php

require '../vendor/autoload.php';

use GrowthCode\DesignPatterns\PatternRenderer;
use GrowthCode\DesignPatterns\PatternFactory;

$patternsPath = '../src/DesignPatterns/';
$categories = ['creational', 'structural', 'behavioral'];
$factory = new PatternFactory();
$patterns = $factory->createPatternsFromCategories($categories, $patternsPath);

$renderer = new PatternRenderer();
foreach ($patterns as $pattern) {
    $renderer->addPattern($pattern);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <title>Design Patterns</title>
</head>

<body>
    <?php echo $renderer->renderSummary(); ?>

    <?php
    if (isset($_GET['pattern'], $_GET['category']) && in_array($_GET['category'], $categories)) {
        echo $renderer->renderPattern($_GET['pattern'], $_GET['category']);
    }
    ?>
</body>

</html>