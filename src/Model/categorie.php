<?php
namespace src\Model;

class categorie {
    private $id;
    private $libelle;
    private $icone;


    public function SqlAdd(\PDO $bdd)
    {
        try {
            $requete = $bdd->prepare("INSERT INTO categorie (libelle, icone) VALUES(:libelle, :icone)");

            $requete->execute([
                "libelle" => $this->getlibelle(),
                "icone" => $this->geticone(),
            ]);
            return $bdd->lastInsertid();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }


    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM categorie");
        $requete->execute();
        //$datas =  $requete->fetchAll(\PDO::FETCH_ASSOC);
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\categorie');
        return $datas;

    }


    public function SqlGetById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT * FROM categorie WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }



    public function SqlDeleteById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("DELETE FROM categorie WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        return true;
    }
    public function SqlTruncate(\PDO $bdd){
        $requete = $bdd->prepare("TRUNCATE TABLE categorie");
        $requete->execute();
    }


    public function SqlUpdate(\PDO $bdd)
    {


        try {
            $requete = $bdd->prepare("UPDATE categorie set libelle= :libelle, icone = :icone WHERE id = :id");

            $requete->execute([
                "libelle" => $this->getlibelle(),
                "icone" => $this->geticone(),
                "id" => $this->getid()
            ]);
            return "OK";
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * @return mixed
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return categorie
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     * @return categorie
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * @param mixed $icone
     * @return categorie
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;
        return $this;
    }




}