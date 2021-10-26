<?php

namespace App\Controller;

use App\Model\AZERTYKeyboard;

class HomeController extends AbstractController
{
    public function index()
    {

        $keyboard = new AZERTYKeyboard();
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $text =  htmlentities(trim($_POST["keyboard"]));
            $keyboard->write($_POST["keyboard"]);
        }

        $context = $keyboard->getFingersStats();
        return $this->twig->render("Home/home.html.twig", ["stats" => $context]);
    }
}