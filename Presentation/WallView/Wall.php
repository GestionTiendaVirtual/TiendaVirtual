<?php
require ('../../Data/conexion.php');


if (isset($_GET['idProduct'])) {
    $idTypeProduct = $_GET['idProduct'];
} else {
    $idTypeProduct = $_POST['cbxProducto'];
}
    
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <h1>Muro de productos</h1>
        <a href="../../Presentation/Modules/ClientView.php">Atras</a><br>
        <form action="../../Business/Wall/insertComment.php" method="POST">
            <textarea id="comment" name="comment"></textarea>
            <input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idTypeProduct; ?>"><br>
            <input type="submit" name="boton" value="Ingresar comentario" id="Registrar">
        </form>
        <h2>Comentarios</h2>
        <?php
        session_start();
        $idClient = $_SESSION["idUser"];
        include_once '../../Business/Wall/WallBusiness.php';
        $wallBusiness = new WallBusiness();
        $result = $wallBusiness->getAllCommentBusiness($idTypeProduct);

        foreach ($result as $current) {
            echo $current->getCommentProduct();
            $idComment=$current->getIdComment();
            $resultado=$wallBusiness->getStateBusiness($idClient,$idComment);
            
            $size=count($resultado);
            if($size==1){
                foreach ($resultado as $value) {
                    $state=$value;
                 }
            }
            else{
                $state="";
            }     
          
         if($state=="checked"){

                echo '<input type="checkbox"  checked="checked"
                  onclick="checkeed(id,name);" name="'. $idClient.'"   id="'.$idComment.'">';
           }
           else{
             echo '<input type="checkbox" 
                  onclick="unchecked(id,name);" name="'. $idClient.'"   id="'.$idComment.'">';
           }
          
          
            echo '<br></br>';
        }
        ?>


        <script>
            function unchecked(id,name){
              window.location = "../../Business/Wall/updateLike.php?id="+id+"&user="+name+"&idProduct="+<?php echo $idTypeProduct ?>;
            }

            function checkeed(id,name){
                window.location = "../../Business/Wall/updateLikeChecked.php?id="+id+"&user="+name+"&idProduct="+<?php echo $idTypeProduct ?>;
            }
        </script>

    </body>
</html>
