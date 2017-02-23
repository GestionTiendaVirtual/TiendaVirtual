<?php

include_once '../../Domain/SpecificationProduct.php';
include_once './SpecificationproductBusiness.php';
include_once '../ModificationsProduct/ModificationsProductBusiness.php';

if(isset($_POST['optionCreateSpe'])){
    
    $countSpe = $_POST['countSpe'];   
    $idProduct = $_POST['idProduct'];
    $arraySpecifications = [];
    for ($j = 0; $j < $countSpe; $j++) {
        $nameSpecification = $_POST['txtNameSpe' . $j];
        $valueSpecification = $_POST['txtValueSpe' . $j];

        if (strlen($nameSpecification) > 2 && strlen($valueSpecification) > 2) {
            $specification = new SpecificationProduct($nameSpecification, $valueSpecification);
            array_push($arraySpecifications, $specification);
        }
    }
    
    //-------------------Registro de modificaciones-----------------------------
    $modificationBusiness = new ModificationsProductBusiness();
    $resultModification = $modificationBusiness->setAttributeSpecification($idProduct);   
    //-----------------------------------------------------------------------------
    
    $specificationBusiness = new SpecificationproductBusiness();
    $result = $specificationBusiness->insertSpecificationProduct($arraySpecifications, $idProduct);
    
    if($result){
        header('location: ../../Presentation/Product/ProductSpecificationCreate.php?success=success&idProduct=' . $idProduct);
    }else{
        header('location: ../../Presentation/Product/ProductSpecificationCreate.php?error=error&idProduct=' . $idProduct);
    }
    
    
}else if (isset($_POST['optionUpdateSpe'])) {

    $cont = $_POST['cont'];
    $idProduct = $_POST['idProduct'];

    //-------------------Registro de modificaciones-----------------------------
    $modificationBusiness = new ModificationsProductBusiness();
    $resultModification = $modificationBusiness->setAttributeSpecification($idProduct);   
    //-----------------------------------------------------------------------------
    
    for ($i = 0; $i < $cont; $i++) {

        $nameSpecification = $_POST{'txtNameSpe' . $i};
        $valueSpecification = $_POST['txtValueSpe' . $i];
        $idSpecification = $_POST['idSpe' . $i];
        if (strlen($nameSpecification) > 2 && strlen($valueSpecification) > 2) {

            $specification = new SpecificationProduct($nameSpecification, $valueSpecification);
            $specification->setIdSpecification($idSpecification);
            $specificationBusiness = new SpecificationproductBusiness();
            $result = $specificationBusiness->updateSpecificationProduct($specification);
        }
    }
    if ($result) {
        header('location: ../../Presentation/Product/ProductSpecification.php?success=success&idProduct=' . $idProduct);
    } else {
        header('location: ../../Presentation/Product/ProductSpecification.php?error=error&idProduct=' . $idProduct);
    }
} else if(isset ($_POST['optionDelete'])){
    
    $idSpecification = $_POST['idSpe'];
    $idProduct = $_POST['idProduct'];
    
    $specificationBusiness = new SpecificationproductBusiness();
    $result = $specificationBusiness->deleteSpecificationProduct($idSpecification);
    
    if($result){
        header('location: ../../Presentation/Product/ProductSpecificationDelete.php?success=success&idProduct=' . $idProduct); 
    }else{
         header('location: ../../Presentation/Product/ProductSpecificationDelete.php?success=success&idProduct=' . $idProduct);
    }
    
    
}