<?php

namespace Sopinet\Bundle\LogBundle\Controller;
use Sopinet\Bundle\LogBundle\Entities\Message;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogController extends Controller
{
	
	public function logsAction(){
		
		$numberOfLines = 5;
		
		$fileName = "/var/log/symfony/debug.log";
		$debug = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/info.log";
		$info = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/notice.log";
		$notice = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/warning.log";
		$warning = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/error.log";
		$error = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/critical.log";
		$critical = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/alert.log";
		$alert = $this->getMessages($fileName, $numberOfLines);
		
		$fileName = "/var/log/symfony/emergency.log";
		$emergency = $this->getMessages($fileName, $numberOfLines);
		
		$view  = 'SopinetLogBundle:Log:logs.html.twig';
		
		$data = array('debug' => $debug, 'info' => $info,
					  'notice' => $notice, 'warning' => $warning,
					  'error' => $error, 'critical' => $critical,
		              'alert' => $alert, 'emergency' => $emergency);
		
		return $this->render($view, $data);
		
	}
	
	public function logDebugAction()
	{
	
		$fileName = "/var/log/symfony/debug.log";
		$numberOfLines = 50;
	
		$messages = $this->getMessages($fileName, $numberOfLines);
	
		return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
	}
	
	public function logInfoAction()
	{
	
		$fileName = "/var/log/symfony/info.log";
		$numberOfLines = 50;
	
		$messages = $this->getMessages($fileName, $numberOfLines);
	
		return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
	}
	
	public function logNoticeAction()
	{
	
		$fileName = "/var/log/symfony/notice.log";
		$numberOfLines = 50;
	
		$messages = $this->getMessages($fileName, $numberOfLines);
	
		return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
	}
	
	public function logWarningAction()
	{
	
		$fileName = "/var/log/symfony/warning.log";
		$numberOfLines = 50;
	
		$messages = $this->getMessages($fileName, $numberOfLines);
	
		return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
	}
	
    public function logErrorAction()
    {
    	
    	$fileName = "/var/log/symfony/error.log";
    	$numberOfLines = 50;
    	
    	$messages = $this->getMessages($fileName, $numberOfLines);
    	
        return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
    }
    
    public function logCriticalAction()
    {
    
    	$fileName = "/var/log/symfony/critical.log";
    	$numberOfLines = 50;
    
    	$messages = $this->getMessages($fileName, $numberOfLines);
    
    	return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
    }
    
    public function logAlertAction()
    {
    
    	$fileName = "/var/log/symfony/alert.log";
    	$numberOfLines = 50;
    
    	$messages = $this->getMessages($fileName, $numberOfLines);
    
    	return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
    }
    
    public function logEmergencyAction()
    {
    
    	$fileName = "/var/log/symfony/emergency.log";
    	$numberOfLines = 50;
    	
    	$messages = $this->getMessages($fileName, $numberOfLines);
    
    	return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => $messages));
    }
    
    public function contextAction($context){
    	
    	$view = 'SopinetLogBundle:Log:context.html.twig';
    	$data = array('context' => $context);
    	
    	return $this->render($view, $data);
    	
    }
    
    private function getMessages($fileName, $numberOfLines){

    	$normalizer = new GetSetMethodNormalizer();
    	$encoder = new JsonEncoder();
    	 
    	$serializer = new Serializer(array($normalizer), array($encoder));
    	$normalizer->setCamelizedAttributes(array('level_name'));
  
    	
    	$messages = [];
    	
    	$file = array_reverse(file($fileName));
    	
    	foreach($file as $line){
    		$messages[] = $serializer->deserialize($line,'Sopinet\Bundle\LogBundle\Entities\Message','json');
    		
    		if(count($messages) == $numberOfLines)
    			break;
    	}
    	    	
    	return $messages;
    	
    }
}