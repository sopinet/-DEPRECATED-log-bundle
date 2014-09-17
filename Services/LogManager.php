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

	public function errorLog($report, $data = null)
	{
		if($data == null)
			$data = [];
		
		$this->logger->log('error', $report, $data);	
	}
}