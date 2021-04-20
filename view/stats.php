<?php

declare(strict_types=1);

use function Mos\Functions\{
    destroySession
};

if (!isset($_SESSION["cCount"])) {
    $_SESSION["cCount"] = 0;
}

if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
}
?>

<p>Du har vunnit <?= $_SESSION["count"] ?> gånger</p>
<p>Datorn har vunnit <?= $_SESSION["cCount"] ?> gånger</p>

<p><a href="session_dice"> Spela igen </a></p>
    <form class="buttons" method="POST">
        <input type="submit" name="aterstall" value="Återställ">
    </form>
<?php

if (isset($_POST['aterstall'])) {
    destroySession();
    echo("DESTROYYYYY");
}
