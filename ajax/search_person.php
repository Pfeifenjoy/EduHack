<?php
header('Content-Type: application/json');
echo json_encode(array(
		array(
				"id"=>1, 
				"name"=>"TheCakeIsALie", 
				"pic"=>"http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c00001?default=retro", 
				"description"=>"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua."
		),
		array(
				"id"=>2, 
				"name"=>"CrazyRobot", 
				"pic"=>"http://www.gravatar.com/avatar/205e460b254e2e5b48aec07710c00001?default=retro", 
				"description"=>"At vero eos et accusam et justo duo dolores et ea rebum. "
		),
		array(
				"id"=>3, 
				"name"=>"MrsGlaDos", 
				"pic"=>"http://www.gravatar.com/avatar/105e460b479e2e5b48aec07700c00001?default=retro", 
				"description"=>"Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
		)
));
