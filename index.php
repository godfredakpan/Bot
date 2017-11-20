<?php
$token = "EAAcShUvBPaIBAHPcQdhwA2wIi4SgNtGZAL4PkUpLHBtkjTmfYkM1bXiKqf1qXcKHHiaus47tBwoBiZCAPePiIZCMGvffhsU8ZAdohzblWWu7dkgYKvYOmmEblZCPeZBOcUYw8C92D6clSKprMa8LnWg9rqU4q2bTZCA4JZC3yv1XLZAiiEIcavbvM";
 
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
