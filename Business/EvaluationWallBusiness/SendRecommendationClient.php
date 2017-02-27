<?php
include_once './Data/RecommendationClient.php';

/**
 * Description of ModificationsProductBusiness
 *
 * @author mm
 */
class SendRecommendationClient {
    
    public $evaluationClient;
    
    public function SendRecommendationClient(){
        $this->evaluationClient = new RecommendationClient();
    }
    
    public function sendRecommendation(){
        return $this->evaluationClient->sendRecommendationClient();
    }
    
    
    
}
