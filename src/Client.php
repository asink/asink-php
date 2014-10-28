<?php namespace Asink\Component;

/**
 * asink-php v0.0.1-dev
 *
 *
 * (c) Ground Six
 *
 * @package asink-php
 * @version 0.0.1-dev
 *
 * @author Harry Lawrence <http://github.com/hazbo>
 *
 * Supported for Asink v0.1.1
 *
 * License: MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Client
{
    private
        $tasks,
        $baseUrl,
        $guzzleClient,
        $requestBody;

    /**
     * Creates instance of Guzzle and defines default
     * host and port. Tasks is created as an empty
     * array
     */
    public function __construct()
    {
        $this->baseUrl      = "http://localhost:3000";
        $this->tasks        = array("tasks" => array());
        $this->guzzleClient = new \GuzzleHttp\Client();
    }

    /**
     * The base URL can be overridden at this point
     * if it needs to be changed, port included, for
     * now
     * 
     * @param string $base_url The base URL
     */
    public function setBaseUrl($base_url)
    {
        $this->baseUrl = $base_url;
    }

    /**
     * Adds a new task to the stack
     * 
     * @param string $name The name of the new task
     * @param array  $task Task and command settings
     */
    public function addTask($name, $task = array())
    {
        if (isset($task['command'])) {
            $this->tasks['tasks'][$name] = $task;
        }
    }

    /**
     * Prepares the tasks for request
     */
    private function prepareRequest()
    {
        $this->requestBody = json_encode($this->tasks);
    }

    /**
     * Sends request to Asink server
     */
    public function start()
    {
        $this->prepareRequest();
        $result = $this->guzzleClient->post(
            $this->baseUrl,
            array(
                'headers' => ['Content-type' => 'application/json'],
                'body'    => $this->requestBody,
                'future'  => true
            )
        );
    }
}
