<?php
namespace src\Controller;

use src\Model\categorie;
use src\Model\BDD;

class categorieController extends AbstractController
{

    public function Add()
    {
        if ($_POST) {
            $objcategorie = new categorie();
            $objcategorie->setlibelle($_POST["libelle"]);
            $objcategorie->seticone($_POST["icone"]);

            //Exécuter l'insertion
            $id = $objcategorie->SqlAdd(BDD::getInstance());
            header("Location:/categorie/show/$id");
        } else {
            return $this->twig->render("categorie/add.html.twig");
        }

    }

    public function All()
    {
        $categorie = new categorie();
        $datas = $categorie->SqlGetAll(BDD::getInstance());

        return $this->twig->render("categorie/all.html.twig", [
            "categorieList" => $datas
        ]);
    }

    public function Show($id)
    {
        $categorie = new categorie();
        $datas = $categorie->SqlGetById(BDD::getInstance(), $id);

        return $this->twig->render("categorie/show.html.twig", [
            "categorie" => $datas
        ]);
    }

    public function Delete($id)
    {
        $categorie = new categorie();
        $datas = $categorie->SqlDeleteById(BDD::getInstance(), $id);

        header("Location:/categorie/All");
    }


    public function Update($id)
    {
        $categorie = new categorie();
        $datas = $categorie->SqlGetById(BDD::getInstance(), $id);

        if ($_POST) {
            $objcategorie = new categorie();
            $objcategorie->setlibelle($_POST["libelle"]);
            $objcategorie->seticone($_POST["icone"]);
            $objcategorie->setId($id);

            //Exécuter la mise à jour
            $objcategorie->SqlUpdate(BDD::getInstance());
            // Redirection
            header("Location:/categorie/show/$id");
        } else {
            return $this->twig->render("categorie/update.html.twig", [
                "categorie" => $datas
            ]);
        }
    }
}