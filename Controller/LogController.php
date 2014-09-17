<?php

namespace Sopinet\Bundle\LogBundle\Controller;
use Sopinet\Bundle\LogBundle\Entities\Message;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogController extends Controller
{
    public function logErrorAction()
    {
    	
    	$fileName = "/var/log/symfony/error.log";
    	
    	$messages = $this->getMessages($fileName);
    	
        return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => array_reverse($messages)));
    }
    
    public function logInfoAction()
    {
    	 
    	$fileName = "/var/log/symfony/info.log";
    	 
    	$messages = $this->getMessages($fileName);
    	 
    	return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => array_reverse($messages)));
    }
    
    public function logDebugAction()
    {
    	 
    	$fileName = "/var/log/symfony/debug.log";
    	 
    	$messages = $this->getMessages($fileName);
    	 
    	return $this->render('SopinetLogBundle:Log:log.html.twig', array('messages' => array_reverse($messages)));
    }
    
    private function getMessages($fileName){

    	$normalizer = new GetSetMethodNormalizer();
    	$encoder = new JsonEncoder();
    	 
    	$serializer = new Serializer(array($normalizer), array($encoder));
    	$normalizer->setCamelizedAttributes(array('level_name'));
    	
    	$messages = [];
    	
    	$file = fopen($fileName, "r") or exit("Unable to open file!");
    	//Output a line of the file until the end is reached
    	while(!feof($file))
    	{
    		$data = fgets($file);
    		$messages[] = $serializer->deserialize($data,'Sopinet\Bundle\LogBundle\Entities\Message','json');
    		
    	}
    	fclose($file);
    	
    	return $messages;
    	
    }
}