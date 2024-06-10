<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Database\Managers\LanguageManager;
use App\Database\Managers\DifficultyManager;
use App\Database\Managers\TimeManager;
use App\Validator;

final class ViewController extends Controller
{
    protected LanguageManager $languageManager;
    protected DifficultyManager $difficultyManager;
    protected TimeManager $timeManager;
    function showIndex()
    {
        //set title
        $this->setPageTitle("Kahoot Generator");

        //render the view index

        $this->render('index', ['title' => $this->getPageTitle(), "backgroundName" => "home"]);

    }
    function showGenerate()
    {
        $this->languageManager = new LanguageManager();
        $this->difficultyManager = new DifficultyManager();

        // Get languages and difficulties
        $languages = $this->languageManager->getLanguages();
        $difficulties = $this->difficultyManager->getDifficulties();
        //set title
        $this->setPageTitle("Choix des options !");

        //render the view generate
        $this->render('/kahoot/generate', ['title' => $this->getPageTitle(), "backgroundName" => "generation", "languages" => $languages, "difficulties" => $difficulties]);
    }
    function showRegister()
    {
        //set title
        $this->setPageTitle("Creation de votre compte !");

        //render the view generate
        $this->render('account/register');
    }
    function showLogin()
    {
        //set title
        $this->setPageTitle("Connexion à votre compte !");

        //render the view generate
        $this->render('account/login');
    }

    public function showOneKahoot(string $id): void
    {
        // Get times
        $this->timeManager = new TimeManager();
        $times = $this->timeManager->getTimes();

        //Set title
        $this->setPageTitle("Votre Kahoot !");

        //Render the view show
        $this->render('/kahoot/show', ['title' => $this->getPageTitle(), "backgroundName" => "kahoot", "id" => $id, "times" => $times]);
    }
}