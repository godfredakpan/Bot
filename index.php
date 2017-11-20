 
<?php

file_put_contents("fb.tx", file_get_contents("php://input"));    

$fb = file_get_contents("fb.txt");

$fb = json_decode($fb);
$rid = $fb->entry[0]->messaging[0]->sender->id;


$token = "EAAB6nFltrEIBAI32JwE5gxJH8ERwCSm6bRMHZCpEFtkeZCPQ8qZC3IUytXoyu21LvcRzDgJPpZCFgpaVIjlghVmWBwxLScyBnVQsfiFwIlifyrYHPKrDPdLz4D6zSszLu4Ro0nIyZAVeUnVouJ4bXstNN2eq0dNAb81CfWavjpCxkS51A4hnh";

$data = array(
	'recipient' => array('id'=>"$rid"),
	'message'   => array('text' => "Nice to meet you!")
);

$options = array(
		'http' => array(
			'method' => 'POST',
			'content' => json_encode($data),
			'header' => "Content-Type: application/jso\n"
	)
);
$context = stream_context_create($options);
file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$token", false, $context);
   
?>



