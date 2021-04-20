<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Mos\Functions\url;

?><!doctype html>
<html>
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/css/style.css") ?>">
</head>

<body>

<header>
    <h1 class="namn"> Josefine </h1>
    <nav class="shift">
    <ul>
        <li><a href="<?= url("/") ?>">Home</a></li>
        <li><a href="<?= url("/session") ?>">Session</a></li>
        <!-- <li><a href="<?= url("/debug") ?>">Debug</a></li> -->
        <!-- <li><a href="<?= url("/twig") ?>">Twig view</a></li> -->
        <li><a href="<?= url("/session_dice") ?>">Game 21</a></li>
        <!-- <li><a href="<?= url("/dice") ?>">Dice</a></li> -->
        <!-- <li><a href="<?= url("/no/such/path") ?>">Show 404 example</a></li> -->
    </ul>
    </nav>
</header>
<main>
