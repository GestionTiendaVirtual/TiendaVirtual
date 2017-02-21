<?php
/**
* Descripcion de preferencia sexual
*/
class SexualPreferences
{
	public $idPreference;
	public $namePreference;

	function SexualPreferences($idPreference, $namePreference)
	{
		$this->idPreference = $idPreference;
		$this->namePreference = $namePreference;
	}
}
?>