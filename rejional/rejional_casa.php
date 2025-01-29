<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        abstract class  Transport{
            public $idTrans;
            public $vitesse ;
            public $capacite ;
            public function __construct($idTrans,$vitesse,$capacite){
                $this->idtrans = $idTrans ;
                $this->vitesse = $vitesse ;
                $this->capacite = $capacite ;
            }

            abstract public function infos();
            abstract public function montant();
        }

        class Autocar extends Transport{
            public $marque ;
            public $prix ;
            public $ticketPlace ;

            public function __construct($idTrans, $vitesse, $capacite ,$marque,$prix,$ticketPlace){
                parent::__construct($idTrans, $vitesse, $capacite);
                $this->marque = $marque ;
                $this->prix = $prix ;
                $this->ticket = $ticketPlace ;
            }

            public function infos(){
                return 'marque est :' .$this->marque.'<br>' ;
                return 'pris est :' .$this->prix .'DH <br>' ;
                return 'ticket par place :' .$this->ticket ;
            }
            
            public function montant(){
                $montant =  $this->prix * $this->ticket ;
                return 'montant est :' .$montant ;
            }
        }


        //objet 
        $autocar = new Autocar(1,50 ,100 , 'BMW' , 50000000 , 5);
        echo $autocar->infos();
        echo $autocar->montant();
    ?>
</body>
</html>