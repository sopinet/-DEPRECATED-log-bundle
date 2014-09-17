<?php

namespace Sopinet\Bundle\LogBundle\Entities;

class Datetime
{
	private $date;
	private $timezone;
	
	public function __construct($data = null){

		if($data != null){
			$this->setDate($data['date']);
			$this->setTimezone($data['timezone']);
		}else{
			$this->setDate("");
		}
	}
	
	/** Getters **/
	public function getDate(){
		
		if($this->date != null)
			return $this->date;

		return "";
		
	}
	
	public function getTimezone(){
		return $this->timezone;
	}

	/** Setters **/
	public function setDate($date){
		$this->date = $date;
	}
	
	public function setTimezone($timezone){
		$this->timezone = $timezone;
	}
	
}