<?php

include_once '../../Domain/Province.php';
include_once '../../Domain/Canton.php';
include_once '../../Domain/District.php';
include_once 'Data.php';

class DirectionClientData extends Data{
    
     function getProvince(){     
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn,"select * from tbprovince;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new Province();
            $currentData->setNameProvince($row['nameProvince']);
            $currentData->setIdProvince($row['idProvince']);
            array_push($array, $currentData);
        }
        return $array;
    }
    
    function getCanton($id) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbcanton` where idProvince = " .$id. " order by idCanton asc;");        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new Canton();
            $currentData->setIdCanton($row['idCanton']);
            $currentData->setIdProvince($row['idProvince']);
             $currentData->setNameCanton($row['nameCanton']);
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }
    
     function getDistrict($idCanton) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbdistrict` where idCanton = " .$idCanton. " order by idCanton asc;");        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new District();
            $currentData->setIdDistrict($row['idDistrict']);
             $currentData->setNameDistrict($row['nameDistrict']);
            $currentData->setIdCanton($row['idCanton']);
          
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }
    
}