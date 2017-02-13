<?php
include "../../Data/DirectionClientData.php";

class LocationBusiness extends DirectionClientData{
	function getProvinceBusiness(){     
        return $this->getProvince();
    }
    
    function getCantonBusiness($id) {
        return $this->getCanton($id);
    }
    
     function getDistrictBusiness($idCanton) {
        return $this->getDistrict($idCanton);
    }
}
?>