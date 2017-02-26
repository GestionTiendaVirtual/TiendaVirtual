<?php 
include_once 'Data.php';
include_once '../../Domain/Comment.php';
include_once '../../Domain/Like.php';


class WallData extends Data {
    public $bd;

    public function WallData(){
        $connection = new Mongo();
        $this->bd = $connection->Comment;
    } 

	function getAllComments($idTypeProduct){
        $collection = $this->bd->tbComment;
        $where = array('idProduct' => intval($idTypeProduct));
        $cursor = $collection->find($where);
        $array = [];
        foreach ( $cursor as $row)
        {
            $comment = new  Comment($row['_id'], $row['idProduct'], $row['commentProduct']);
            array_push($array, $comment);
        }
        return $array;
	}


	function insertComment($idProduct,$commentProduct,$idClient){

        /*Se incerta en la coleccion de comentarios*/
        $collection = $this->bd->tbComment;
        $commentTem = array('idProduct' => intval($idProduct), 'commentProduct' => $commentProduct,
                        'idClient' => intval($idClient), 'date' => date('Y-m-d'));
        $collection->insert($commentTem);


        /* Se incerta en la coleccion de like*/
        $collectionLike = $this->bd->tbLike;
        $collectionLike->insert(array('idClient' => intval($idClient), 'state' => '', 
                                'idComment' => (string)$commentTem['_id']));

	}

    function getStateData($idClient,$idComment){

        $collection = $this->bd->tbLike;
        $where = array('idClient' => intval($idClient) , 'idComment' => (string)$idComment);
        $cursor = $collection->find($where);
        $array = [];
        foreach ( $cursor as $row)
        {
            array_push($array, $row['state']);
        }
        return $array;
    }

     function updateLIke($idComment,$user){ 
        $collection = $this->bd->tbLike;
        $collection->update(
            array("idComment" =>  (string)$idComment, "idClient" => intval($user)),
            array('$set' => array('state' => 'checked')),
            array("multiple" => true)
        );

    }

    function updateLIkeChecked($idComment,$user){ 
        $collection = $this->bd->tbLike;
        $collection->update(
            array("idComment" =>  (string)$idComment, "idClient" => intval($user)),
            array('$set' => array('state' => '')),
            array("multiple" => true)
        );
    }



    function insertNewLIke($idComment,$idClient){
        /* Se incerta en la coleccion de like*/
        $collectionLike = $this->bd->tbLike;
        $collectionLike->insert(array('idClient' => intval($idClient), 'state' => 'checked', 
                        'idComment' => (string)$idComment));

    }
}

	

?>
