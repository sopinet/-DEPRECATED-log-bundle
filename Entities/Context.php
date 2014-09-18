<?php

namespace Sopinet\Bundle\LogBundle\Entities;

class Context
{
	private $user;
	private $controller;
	private $userAgent;
	private $id;
	private $route;
	
	public function __construct($data = null){

		if($data != null){
			
			if(array_key_exists('user', $data))
				$this->setUser($data['user']);
			
			if(array_key_exists('controller', $data))
				$this->setController($data['controller']);
			
			if(array_key_exists('userAgent', $data))
				$this->setUserAgent($data['userAgent']);
			
			if(array_key_exists('id', $data))
				$this->setId($data['id']);
			
			if(array_key_exists('route', $data))
				$this->setRoute($data['route']);
		}else{
			$this->setUser("");
		}
	}
	
	/** Getters **/
	public function getUser(){
		
		if($this->user != null)
			return $this->user;

		return "";
		
	}
	
	public function getController(){
		return $this->controller;
	}
	
	public function getUserAgent(){
		return $this->userAgent;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getRoute(){
		return $this->route;
	}

	/** Setters **/
	public function setUser($user){
		$this->user = $user;
	}
	
	public function setController($controller){
		$this->controller = $controller;
	}
	
	public function setUserAgent($userAgent){
		$this->userAgent = $userAgent;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setRoute($route){
		$this->route = $route;
	}
}