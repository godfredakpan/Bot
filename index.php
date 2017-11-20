<?php
$token = "EAAB6nFltrEIBAMfGFFfV8ZCU1Nz54HjG2l6EZCNZAXzznWwUYw1qmAKjF5raqvmKiKCO6J7LIbZCmoq2CDfctpHx0KHMZAqb417kv9IqeDPYfRfbbk44nY5anWA6II4mGs9wB0kjoueNKso1fmj29gGJF5KsxZBO4Gm1OFFPC1b6ZCuoBNlsM4j";
 
file_put_contents("message.txt",file_get_contents("php://input"));
$fb_message = file_get_contents("message.txt");
$fb_message = json_decode($fb_message);
$rec_id = $fb_message->entry[0]->messaging[0]->sender->id; //Sender's ID
$rec_msg= $fb_message->entry[0]->messaging[0]->message->text; //Sender's Message
$data_to_send = array(
'recipient'=> array('id'=>"$rec_id"), //ID to reply
'message' => array('text'=>"Hi I am Test Bot") //Message to reply
);
 
$options_header = array ( //Necessary Headers
'http' => array(
'method' => 'POST',
'content' => json_encode($data_to_send),
'header' => "Content-Type: application/json\n"
)
);
$context = stream_context_create($options_header);
file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$token",false,$context);

?>
