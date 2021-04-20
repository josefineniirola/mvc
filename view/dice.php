<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use Jos\Dice\DiceHand;
use Jos\Dice\DiceGraphic;

$header = $header ?? null;
$message = $message ?? null;

$diceHand = new DiceHand();
$diceHand->roll();

$dice = new DiceGraphic();
$rolls = 6;
$res = [];
$class = [];
for ($i = 0; $i < $rolls; $i++) {
    $res[] = $dice->roll();
    $class[] = $dice->graphic();
}
?>



<h1>Rolling <?= $rolls ?> graphic dices</h1>

<p class="dice-utf8">
<?php foreach ($class as $value) : ?>
    <i class="<?= $value ?>"></i>
<?php endforeach; ?>
</p>

<h1>Rolling six graphic dices</h1>

<p><?= implode(", ", $res) ?></p>
<p>Sum is: <?= array_sum($res) ?>.</p>
<p>Average is: <?= round(array_sum($res) / 6, 1) ?>.</p>



<h1><?= $header ?></h1>

<p><?= $message ?></p>
<!-- <p class="dice">$die->getLastRoll()?></p> -->

<p>DICEHAND: <?= $diceHand->getLastRoll() ?></p>