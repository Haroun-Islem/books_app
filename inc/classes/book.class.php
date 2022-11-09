<?php

class Book extends Database {

    protected $id;
    protected $created;
    protected $updated;
    protected $serie_id;
    protected $title;
    protected $num;
    protected $scriptwriter;
    protected $editor;
    protected $illustrator;
    protected $releaseyear;
    protected $strips;
    protected $cover;
    protected $rep;



public function __construct($d){
    parent::__construct();

    if(is_array($d)){
        
        $this->hydrate($d);
    }
    elseif( is_int($d) || (int) $d > 0){

        $r = $this->prepare("SELECT * FROM `books` WHERE id = :i");
        $r->execute([':i' => $d]);

        if($r->rowCount() > 0 ){
            $this->hydrate($r->fetch(PDO::FETCH_ASSOC));
        }
    }
    //si on a un resultat 
}
            public function setRep($d){
                $this->rep = (boolean) $d;
            }
            public function setId($d){
                $this->id = (int) $d;
            }
            public function setTitle($d){
                $this->title = (string) $d;
            }
            
            public function setCreated($d){
                $this->created = (string) $d;
            }
            public function setUpdated($d){
                $this->updated = (string) $d;
            }
            public function setNum($d){
                $this->num = (int) $d;
            }
            public function setScriptwriter($d){
                $this->scriptwriter = (string) $d;
            }
            public function setEditor($d){
                $this->editor = (string) $d;
            }

            public function setIlustrator($d){
                $this->illustrator = (string) $d;
            }

            public function setSerie_id($d){
                $this->serie_id = (int) $d;
            }

            public function setReleaseYear($d){
                $this->releaseyear = (string)$d;
            }
            public function setCover($d){
                $this->cover = (string)$d;
            }
            public function setStrips($d){
                $this->strips = (int)$d;
            }

            public function getId(){
                return $this->id;
            }
            public function getCreated(){
                $d = new DateTime($this->created);
                return $d->format('d/m/Y h:i:s');
            }
            public function getUpdated(){
                $d = new DateTime($this->updated);
                return $d->format('d/m/Y h:i:s');
            }
            public function getReleaseyear(){
                $d = new DateTime($this->releaseyear);
                return $d->format('d/m/Y h:i:s');
            }
            public function getTitle(){
                return $this->title;
            }
            
            public function getSerie_id(){
                return $this->serie_id;
            }
            public function getCover(){
                return $this->cover;
            }
            public function getStrips(){
                return $this->strips;
            }

            public function getRep(){
                return $this->rep;
            }

            public function getScriptwritter(){
                return $this->scriptwriter;
            }
            public function getEditor(){
                return $this->editor;
            }
            public function getIlustrator(){
                return $this->illustrator;
            }
            public function getNum(){
                return $this->num;
            }

}