<?php 
include_once "../../Data/EvaluationWallData.php";

class EvaluationWallBusiness extends EvaluationWallData {

	public function insertEvaluationWallBusiness($idProduct,$comment,$idClient){
		/*Se evalua primero el comentario*/
		$result = $this->evaluate($comment);

		return $this->insertEvaluationGeneralData($idProduct,$result,$idClient);
	}

	/*
	* Procesa el comentario, obtiniendo nuevo de apariciones
	* de determinadas palabras
	*/
	private function evaluate($comment)
	{
		
		/* Se especifican los criterios */
		$listCriterion = array( 
			array('criterion' => 'precio',
			 'metrics' => array( array('barato',0), array('caro',0))
			),
			array('criterion' => 'tamaño',
			 'metrics' => array( array('grande',0), array('pequeño',0))
			),
			array('criterion' => 'calidad',
			 'metrics' => array( array('bueno',0), array('malo',0))
			)
		);

		/*Recorremos la lista de criterios y se van analizando uno por uno*/
		
		for ($numCri=0; $numCri < count($listCriterion); $numCri++) { 
			$criterion = $listCriterion[$numCri];
			$listMetrics = $criterion['metrics'];

			/*Recorremos cada metrica del criterio obtenido del primer for*/
			for ($numMetric=0; $numMetric < count($listMetrics); $numMetric++) { 
				$metric = $listMetrics[$numMetric][0];

				/* Se llama a la funcion que realiza la busqueda */
				$result = $this->search($comment, $metric);

				/* Actualizamos el valor de la metrica */
				$listCriterion[$numCri]['metrics'][$numMetric][1] = $result;
			}

		}//Fin criterios

		/*Retornamos la lista de criterios ya aalizados en el comentario*/
		return $listCriterion;
	}

	/*
	* Retorna el numero de palabras 
	*/
	private function search($comment, $word)
	{
		 $commentTem = preg_replace('[^ A-Za-z0-9_-ñÑ]', "", $comment);	

		 $list = explode(" ",strtolower($commentTem));
		 //$list = explode(" ", strtolower($commentTem));

		 $cont = 0;
		 foreach ($list as $tem) {
		 	if(strcmp($tem, $word) == 0){
		 		$cont += 1;
		 	}
		 }
		 return $cont;
	}//Fin de la funcion que cuenta el numero de apariciones de una palabraa
}