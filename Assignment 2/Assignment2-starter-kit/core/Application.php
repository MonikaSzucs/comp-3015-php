<?php

namespace core;

class Application {

	private Router $router;
	private Request $request;
	private Response $response;

	public function __construct() {
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
	}

	// run on every single request to application
	// one session start call in our entire application we don't need it anywhere else.
	public function run(): void {
		session_start();
		$this->router->resolve();
	}

}
