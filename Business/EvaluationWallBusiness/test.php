<?php 
 include_once 'SendRecommendationClient.php';
 $evaluationBusiness = new SendRecommendationClient();
 $resultSend = $evaluationBusiness->sendRecommendation(); 