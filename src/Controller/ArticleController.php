<?php
namespace src\Controller;

use src\Model\Article;

class ArticleController{

    public function Add(){
        echo "Ici je vais devoir faire un formulaire HTML qui me permet d'ajouter un article dans ma base de donnée";
    }

    public function All(){
        $articles = new Article();
        $datas = $articles->SqlGetAll();
        echo "Ici je vais devoir aller chercher tous mes articles pour les afficher une page HTML";
    }
}