<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;

$message = $message ?? null;
$title = $title ?? null;

?><h1><?= $header ?></h1>

<p><?= $message ?></p>


<!doctype html>
<meta charset="utf-8">
    <form class="button-dice" method="POST">
        <input type="radio" name="dices" value="1" required>
        <label for="dices">1</label><br>

        <input type="radio" name="dices" value="2" required>         
        <label for="dices">2</label><br>

        <input type="submit" name="submit" value="Submit">
    </form>

<?php


unset($_SESSION["total"]);
unset($_SESSION["computer"]);
// var_dump($_SESSION["total"]);
// var_dump($_SESSION["computer"]);
