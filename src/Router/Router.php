<?php

declare(strict_types=1);

namespace Mos\Router;

use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Josefines MVC",
                "message" => "Hej och välkommen!",
            ];
            $body = renderView("layout/index.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session_dice") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/session_dice") {
            // $data = [
            //     "header" => "Dice",
            //     "message" => "",
            //     "title" => "Game 21"
            // ];
            // $body = renderView("layout/gameSessionPage.php", $data);
            // sendResponse($body);
            if ($_POST["dices"] == 1) {
                redirectTo(url("/gameSession"));
            } else if ($_POST["dices"] == 2) {
                redirectTo(url("/gameSessionDice2"));
            }
            return;
        } else if ($method === "GET" && $path === "/dice") {
            $callable = new \Jos\Dice\Game();
            $callable->playGame();
            // $data = [
            //     "header" => "Dice Game",
            //     "message" => "",
            // ];
            // $body = renderView("layout/dice.php", $data);
            // sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/gameSession") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/gameSessionPage.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/gameSession") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/gameSessionPage.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/gameSessionDice2") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/gameSessionPage2.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/gameSessionDice2") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/gameSessionPage2.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/stats") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/stats.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/stats") {
            $data = [
                "header" => "Dice",
                "message" => "",
                "title" => "Game 21"
            ];
            $body = renderView("layout/stats.php", $data);
            sendResponse($body);
            return;
        }
        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}
