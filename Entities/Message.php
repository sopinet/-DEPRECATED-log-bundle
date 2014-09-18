<?php

namespace Sopinet\Bundle\LogBundle\Entities;
use Sopinet\Bundle\LogBundle\Entities\Datetime;
use Sopinet\Bundle\LogBundle\Entities\Context;

class Message
{
	private $message;
	private $level;
	private $levelName;
	private $datetime;
	private $context;
	
	public function __Message(){
		$message = "";
		$level = "";
		$levelName = "";
		$this->datetime = new Datetime();
		$this->context = new Context();
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
	
	public function getContext(){
		return $this->context;
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
	
	public function setContext($context){
		$this->context = new Context($context);
	}
}