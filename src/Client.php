<?php namespace Asink\Component;

class Client
{
	private
		$tasks,
		$baseUrl,
		$guzzleClient,
		$requestBody;

	public function __construct()
	{
		$this->baseUrl 	    = "http://localhost:3000";
		$this->tasks 		= array("tasks" => array());
		$this->guzzleClient = new \GuzzleHttp\Client();
	}

	public function setBaseUrl($base_url)
	{
		$this->baseUrl = $base_url;
	}

	public function addTask($name, $task = array())
	{
		if (isset($task['command'])) {
			$this->tasks['tasks'][$name] = $task;
		}
	}

	private function prepareRequest()
	{
		$this->requestBody = json_encode($this->tasks);
	}

	public function start()
	{
		$this->prepareRequest();
		$result = $this->guzzleClient->post(
			$this->baseUrl,
			array(
				'headers' => ['Content-type' => 'application/json'],
				'body'    => $this->requestBody
			)
		);
	}
}