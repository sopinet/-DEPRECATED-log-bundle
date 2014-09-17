<?php

namespace Sopinet\Bundle\LogBundle\Entities;
use Sopinet\Bundle\LogBundle\Entities\Datetime;

class Message
{
	private $message;
	private $level;
	private $levelName;
	private $datetime;
	
	public function __Message(){
		$message = "";
		$level = "";
		$levelName = "";
		$this->datetime = new Datetime();
	}
	
	/** Getters **/
	public function getMessage(){
		return $this->message;
	}
	
	public function getLevel(){
		return $this->level;
	}
	
	public function getLevelName(){
		return $this->levelName;
	}
	
	public function getDatetime(){
		return $this->datetime;
	}
	
	/** Setters **/
	public function setMessage($message){
		$this->message = $message;
	}
	
	public function setLevel($level){
		$this->level = $level;
	}
	
	public function setLevelName($levelName){
		$this->levelName = $levelName;
	}

	public function setDatetime($datetime){
		$this->datetime = new Datetime($datetime);
	}
}