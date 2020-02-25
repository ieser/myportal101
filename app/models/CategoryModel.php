<?php

class CategoryModel extends BaseModel {

    public function __construct() {
        parent::__construct();
    }

    /* 
    * Ottiene una lista di categorie di articoli
    * return: array di categorie
    */
    public function getAll() {
        $idLingua = $this->session("idLinguaPannello");
        $categorie = $this->db->exec("SELECT * FROM categorie WHERE idLingua=? ORDER BY idCategoria", array($idLingua));
        return $categorie;
    }

    /* 
    * Aggiunge una categoria di articoli
    * route: POST /admin/article/category/add
    * return: idCategoriaArticoliAggiunta
    */
    public function add() {
        //Trovo il massimo di categoria inserita
        $max = $this->db->exec("SELECT MAX(idCategoria) FROM categorie", array());
        $idCategoria = $max[0]["MAX(idCategoria)"]+1;

        $lingue = $this->db->exec("SELECT * FROM lingue ", array());
        foreach($lingue as $l){
            $nomeCategoria = ($this->post("categoria_".$l["idLingua"])!="") ? $this->post("categoria_".$l["idLingua"]) : "";
            $this->db->exec("INSERT INTO categorie (idCategoria,idLingua,nomeCategoria) VALUES (?,?,?)",
             array($idCategoria,$l["idLingua"],$nomeCategoria));
        }
        return $idCategoria;
    }


    /* 
    * Ottiene le informazioni su una categoria
    * return: array di categorie
    */
    public function getCategoryDetails($idCategoria) {
        $categoria = $this->db->exec("SELECT * FROM categorie
            LEFT JOIN lingue ON categorie.idLingua=lingue.idLingua 
            WHERE idCategoria=?", array($idCategoria));
        return $categoria;
    }

    public function edit($idCategoriaModificata) {
        $lingue = $this->db->exec("SELECT * FROM lingue ", array());
        foreach($lingue as $l){
            $categoria = ($this->post("categoria_".$l["idLingua"])!="") ? $this->post("categoria_".$l["idLingua"]) : "";
            $this->db->exec("UPDATE categorie SET nomeCategoria=? WHERE idCategoria=? AND idLingua=?;",
                array($categoria,$idCategoriaModificata,$l["idLingua"]));
        }
        return $idCategoriaModificata;
    }
    /* 
    * Elimina una categoria di articoli
    * route: GET /admin/article/category/delete/@idCategoriaArticolo
    * return: true
    */
    public function delete($idCategoria) {
        $this->db->exec("DELETE FROM categorie WHERE idCategoria=?", array($idCategoria));
        $this->db->exec("UPDATE articoli SET idCategoria='0' WHERE idCategoria=?", array($idCategoria));
    }

}
