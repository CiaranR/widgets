<?php
  require 'vendor/autoload.php';
  
  $widgets = new \Slim\Slim();
  
  $widgets->response->headers->set('Content-Type', 'application/json');

  $widgets->get('/', function () {
	$result = new stdClass();	
	$result->item = [["text" => "Hello World"]];
	echo json_encode($result);
  });  
  
  $widgets->get('/text/:text', function ($text) {
	$result = new stdClass();	
	$result->item = [["text" => $text]];
	echo json_encode($result);
  });
  
  $widgets->get('/number/:number', function ($number) {
	$result = new stdClass();	
	$result->item = [["value" => $number]];	
	echo json_encode($result);
  })->conditions(array('number' => '[0-9]{1,}'));
  
  $widgets->get('/keypair/:text/:number', function ($text, $number) {
	$result = new stdClass();	
	$result->item = [["value" => $number, "text" => $text]];	
	echo json_encode($result);
  });
  
  $widgets->get('/countdown/:date', function ($date) {
	$now = new DateTime('now');
	$date2 = new DateTime($date);
	$interval = $now->diff($date2);
	$result = new stdClass();	
	$result->item = [["value" => $interval->format('%r%a'), "text" => "days until ".$date]];	
	echo json_encode($result);
  });  
  
  $widgets->run();