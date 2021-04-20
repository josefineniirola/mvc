<?php

declare(strict_types=1);

use Jos\Dice\DiceGraphic;

?>

<h1> Game 21 </h1>
<form class="buttons" method="POST">
    <input type="submit" name="stop" value="Stanna">

    <input type="submit" name="next" value="Nästa">

</form>

<?php

$dice = new DiceGraphic();
$computerDice = new DiceGraphic();

$res = [];
$computerResult = [];

$class = [];
$rolls = 2;



// Kollar om 'set' annars sätts den till 0
if (!isset($_SESSION["total"])) {
    $_SESSION["total"] = 0;
}
if (!isset($_SESSION["computer"])) {
    $_SESSION["computer"] = 0;
}

if (!isset($_SESSION["cCount"])) {
    $_SESSION["cCount"] = 0;
}

if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
}

if (isset($_POST["next"]) || empty($res)) {
    for ($i = 0; $i < $rolls; $i++) {
        $res[] = $dice->roll();
        $class[] = $dice->graphic();
    }

    for ($i = 0; $i < $rolls; $i++) {
        $computerResult[] = $computerDice->roll();
        $computerClass[] = $computerDice->graphic();
    }

    $_SESSION["computer"] += end($computerResult);

    $_SESSION["res"] = $res;
    $_SESSION["total"] += end($res);
    $_SESSION["class"] = $class;


    if ($_SESSION["total"] > 21) {
        ?><p><b>Du Förlorade!</b></p><?php
    } elseif ($_SESSION["total"] == 21 && $_SESSION["computer"] != 21) {
        $_SESSION["count"] += 1;
        ?><p><b>Du Vann!</b></p>
        <p><b>Datorn Förlorade!</b></p><p> Datorn fick: <?= $_SESSION["computer"] ?></p><?php
    } elseif ($_SESSION["total"] == 21 && $_SESSION["computer"] == 21) {
        $_SESSION["cCount"] += 1;
        ?><p><b>Datorn Vann!</b></p><p> Datorn fick: <?= $_SESSION["computer"] ?></p><?php
    }
}
?>

<!-- Resultat -->
<!-- Mina tärningar -->
<p class="dice-utf8">
<?php foreach ($class as $value) : ?>
    <i class="<?= $value ?>"></i>
<?php endforeach;?>
</p>

<?php
if (isset($_POST["stop"])) {
    $_SESSION["total"] -= end($res);

    while ($_SESSION["computer"] < 21) {
        $computerResult[] = $computerDice->roll();
        $computerClass[] = $computerDice->graphic();

        $_SESSION["computer"] += end($computerResult);
    }

    if ($_SESSION["computer"] >= $_SESSION["total"] && $_SESSION["computer"] <= 21) {
        ?><p><b>Du Förlorade!</b></p>
        <p><b>Datorn Vann!</b></p><p> Datorn fick: <?= $_SESSION["computer"] ?></p><?php
        $_SESSION["cCount"] += 1;
    }

    if ($_SESSION["total"] <= 21 && $_SESSION["total"] > $_SESSION["computer"] || $_SESSION["computer"] > 21 && $_SESSION["total"] <= 21) {
        ?><p><b>Du Vann!</b></p>
        <p><b>Datorn Förlorade!</b></p><p> Datorn fick: <?= $_SESSION["computer"] ?></p><?php
        $_SESSION["count"] += 1;
    }
}
?>
    <p class="total">Total: <?= $_SESSION["total"] ?></p>

<div class="win">
    <p><a class="spela-igen" href="session_dice"> Spela igen </a></p>
    <p><a class="stats" href="stats"> Se statistik </a></p>
</div>
