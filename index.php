 
<?php

file_put_contents("fb.tx", file_get_contents("php://input"));    

$fb = fie_get_contents("fb.txt");

$fb = json_decode($fb);
$rid = $fb->entry[0]->sender-id;


$token = "EAAcShUvBPaIBAHPcQdhwA2wIi4SgNtGZAL4PkUpLHBtkjTmfYkM1bXiKqf1qXcKHHiaus47tBwoBiZCAPePiIZCMGvffhsU8ZAdohzblWWu7dkgYKvYOmmEblZCPeZBOcUYw8C92D6clSKprMa8LnWg9rqU4q2bTZCA4JZC3yv1XLZAiiEIcavbvM";

$data = array(
	'recipient' => array('id'=>"$rid"),
	'message'   => array('text' => "Nice to meet you!")
);

$options = array(
		'http' => array(
			'method' => 'POST',
			'content' => json_encode($data),
			'header' => "Content-Type: appication/jso\n"
	)
);
$context = stream_context_create($options);
file_get_contents("https://graph.facebook.com/v6.6/me/messages?access_token=$token", false, $context);
   
?>



