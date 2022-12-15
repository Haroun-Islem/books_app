<?php

class Serie extends Database {



protected $id;
protected $title;
protected $origin;
protected $created;
protected $updated;


public function __construct($d){
    parent::__construct();

    if(is_array($d)){
        
        $this->hydrate($d);
    }
    elseif( is_int($d) || (int) $d > 0){

        $r = $this->prepare("SELECT * FROM `series` WHERE id = :i");
        $r->execute([':i' => $d]);

        if($r->rowCount() > 0 ){
            $this->hydrate($r->fetch(PDO::FETCH_ASSOC));
        }
    }
    //si on a un resultat 
}

            public function setId($d){
                $this->id = (int) $d;
            }
            public function setTitle($d){
                $this->title = (string) $d;
            }
            public function setOrigin($d){
                $this->origin = (string) $d;
            }
            public function setCreated($d){
                $this->created = (string) $d;
            }
            public function setUpdated($d){
                $this->updated = (string) $d;
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
            public function getTitle(){
                return $this->title;
            }
            public function getOrigin(){
                return $this->origin;
            }
            


            public function save(){

                if(empty($this->id)){

                    $n = $this->prepare("INSERT INTO `series` (title,origin) VALUES (:title, :origin);");
                    $n->execute([':title' => $this->title,
                                 ':origin'=> $this->origin]);
                }else{
                    $n = $this->prepare('UPDATE `series` SET title = :title, origin = :origin WHERE id =:i');
                    $n->execute([':title' => $this->title,
                                 ':origin'=> $this->origin,
                                 ':i'=> $this->id]);
                }

            }
            public function delete(){

               

                $n = $this->prepare('DELETE FROM `series` WHERE `id`=:id ');
                $n->execute([':id' => $this->id]);
            
        }




            public static function all(){
                
                //On crée une instance de BDD

                $sql = new Database();
                $tALL = [];

                //On récupère toutes les lignes 
                $r = $sql->prepare('SELECT * FROM `series` ORDER BY title;');
                $r->execute();

                while($one = $r->fetch(PDO::FETCH_ASSOC)){

                    array_push($tALL, new Serie($one));
                }

                return $tALL;

            }
}

// compte contributeur GIT => 
