<?php
header('Content-Type: application/json');
echo json_encode(array(
		array("id"=>1, "name"=>"TheCakeIsALie", "pic"=>"http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c00001?default=retro"),
		array("id"=>2, "name"=>"CrazyRobot", "pic"=>"http://www.gravatar.com/avatar/205e460b254e2e5b48aec07710c00001?default=retro"),
		array("id"=>3, "name"=>"MrsGlaDos", "pic"=>"http://www.gravatar.com/avatar/105e460b479e2e5b48aec07700c00001?default=retro")
));