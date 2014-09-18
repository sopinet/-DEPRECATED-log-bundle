<?php
namespace Sopinet\Bundle\LogBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
class LogManager
{

	protected $logger;
	
	public function __construct(Container $container)
	{	
		$this->container = $container;
		
		$this->logger = $this->container->get('logger');
		
	}
	
	public function infoLog($report, $data = null)
	{
	
		if($data == null)
			$data = [];
	
		$data = $this->getExtraData($data);
	
		$this->logger->log('info', $report, $data);
	}

	public function errorLog($report, $data = null)
	{
		
		if($data == null)
			$data = [];
		
		$data = $this->getExtraData($data);
		
		$this->logger->log('error', $report, $data);	
	}
	
	public function getExtraData($data){
		
		$data['user'] = $this->container->get('security.context')->getToken()->getUser()->getId();
		$data['userAgent'] = $this->container->get('request')->headers->get('user-agent');
		$data['controller'] = $this->container->get('request')->get('_controller');
		$data['id'] = $this->container->get('request')->get('id');
		$data['route'] = $this->container->get('request')->get('_route');
		
		return $data;
		
	}
}