<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../CSS/menu.css" rel="stylesheet" type="text/css"/>
        <title></title>




        <!-- ******************* Para Busquedas ******************* -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


        <script>
            $(function () {
                var typeTermNum = 0;
                function split(val) {
                    return val.split(" ");
                }
                function extractLast(term) {
                    var resultSplit = split(term);
                    typeTermNum = (resultSplit.length) - 1;
                    return resultSplit.pop();
                }

                $("#skills").bind("keydown", function (event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                })
                        .autocomplete({
                            minLength: 1,
                            source: function (request, response) {
                                // delegate back to autocomplete, but extract the last term
                                $.getJSON("../../Business/Search/GetAllBusinessForAJAX.php", {term: extractLast(request.term), typeTerm: typeTermNum}, response);
                            },
                            focus: function () {
                                // prevent value inserted on focus
                                return false;
                            },
                            select: function (event, ui) {
                                var terms = split(this.value);
                                // remove the current input
                                terms.pop();
                                // add the selected item
                                terms.push(ui.item.value);
                                // add placeholder to get the comma-and-space at the end
                                terms.push("");
                                this.value = terms.join(" ");
                                return false;
                            }
                        });
            });
        </script>
        <!-- ************* Fin para Busquedas *************** -->

    </head>
    <body lang="en">
        <?php
        if (@session_start() == false) {
            header("location: ../../index.php");
        }
        ?>
        <?php
        include_once '../../Business/Product/ProductBusiness.php';
        include_once '../../Business/TypeProduct/typeProductBusiness.php';
        require_once '../../Data/Frecuency.php';
        require_once "../../Business/Search/SearchProductBusiness.php";

        $productBusiness = new ProductBusiness();
        $typeProduct = new typeProductBusiness();
        $frecuency = new Frecuency();
        $instSearchBusiness = new SearchProductBusiness();

        $result = $typeProduct->getTypeProduct();
        ?>
        <table>
            <tr>
                <td><h1>MGA Store&emsp;&emsp;&emsp;&emsp;</h1>
                </td>
                <td><form method="POST" action="./ClientView.php">

                        <label for="skills">Buscar: </label>
                        <input id="skills" name="termSearch" size="50">
                        <button >Buscar</button>
                        <td>&emsp;&emsp;&emsp;</td>
                    </form>
                </td>
                <td>
                    <div id="header">
                        <ul class="nav">
                            <li><a href="">Categorías</a>
                                <ul>
                                    <?php
                                    foreach ($result as $cuurentType) {
                                        ?>
                                        <li><a href="ClientView.php?idTypeProduct=<?php echo $cuurentType->getIdTypeProduct(); ?>">
                                                <?php echo $cuurentType->getNameTypeProduct(); ?></a>
                                        <!--<ul>
                                            <li><a href="">Submenu1</a></li>
                                            <li><a href="">Submenu2</a></li>
                                            <li><a href="">Submenu3</a></li>
                                            <li><a href="">Submenu4</a></li>
                                        </ul>-->
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>

                            <li>
                                <a>Mi Perfil</a>
                                <ul>
                                    <li>
                                        <a href="../../Presentation/Account/AccountInterface.php">Cuenta</a>
                                        <a href="../../Presentation/Client/ClientUpdate.php">Mis datos</a>
                                    </li>
                                </ul>

                            </li>

                            <li><a href="../ShoppingCar/ShoppingCar.php">Carrito compras</a></li>
                            <li><a href="../../Business/loginAction.php?logout">Cerrar</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    <center>
        <hr>
        <h1>Productos</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>           
            <th>Precio</th>
            <th>Ver</th>
            <?php
            if (isset($_GET['idTypeProduct'])) {
                $products = $productBusiness->getProductsTypeProduct($_GET['idTypeProduct']);
            } else if (isset($_POST["termSearch"])) {
                /* Consulta frecuencia */
                $result = $frecuency->updateSearch();

                /* Consulta busqueda */
                $products = $instSearchBusiness->searchProduc($_POST["termSearch"]);
            } else {
                $products = $productBusiness->getProducts();
            }
            foreach ($products as $currentProducts) {
                ?>                
                <tr>
                    <td><label><?php echo $currentProducts->getName(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getBrand(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getModel(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php
            $price = number_format($currentProducts->getPrice());
            echo '₡ ' . $price
                ?>&emsp;&emsp;&emsp;</label></td>  
                    <td><label><a href="../Product/ProductDetail.php?idProduct=<?php echo $currentProducts->getIdProduct(); ?>">Ver</a></label></td>
                </tr>
                <tr>
                    <?php
                    $cont = 0;
                    foreach ($currentProducts->getPathImages() as $path) {
                        if ($cont < 3) {
                            ?>
                            <td><img style="width: 100px; height: 100px;"src="<?php echo $path; ?>">&emsp;&emsp;</td>
                                <?php
                            }
                            $cont++;
                        }
                        ?>

                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</body>
</html>
