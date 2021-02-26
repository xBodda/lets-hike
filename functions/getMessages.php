<?php
include( '../classes/DB.php');
include('../classes/Login.php');
header('Content-Type: application/json; charset=utf-8', true);
$response = new stdClass();
// Check if request sent correctly
if(isset($_POST['ticket']) && isset($_POST['id'])){
    $ticket_id = $_POST['ticket'];
    $id = $_POST['id'];
    $ticket = DB::query('SELECT * FROM tickets WHERE id=:id',array(':id'=> $ticket_id));
    if(!$ticket){
        http_response_code(404);
        $response->error = "Not Found";
        $response->status = "Not Found";
        $response->code = "404";
        $response->time = date('Y-m-d H:i:s');
        echo json_encode($response);
        exit;
    }
    $get_last_message = DB::query('SELECT m.*,u.fullname,u.image FROM tickets_messages m, users u WHERE u.id=m.user_id AND u.id != :u_id AND ticket_id=:ticket AND m.id>:id LIMIT 1',array(':u_id'=>Login::isLoggedIn(),':id'=>$id,':ticket'=> $ticket_id));
    if(!$get_last_message){
        http_response_code(200);
        $response->message = "No messages";
        $response->code = "200";
        $response->time = date('Y-m-d H:i:s');
        echo json_encode($response);
        exit;
    }else{
        $get_last_message = $get_last_message[0];
        http_response_code(200);
        $response->message = "New messages";
        $response->data = ["name"=> $get_last_message['fullname'],
                           "message" => $get_last_message['message'],
                            "date" => $get_last_message['_date'],
                            "image" => $get_last_message['image'],
                            "id" => $get_last_message['id'],
        ];
        $response->code = "200";
        $response->time = date('Y-m-d H:i:s');
        echo json_encode($response);
        exit;
    }

}else{ // Request isn't correct (parameters not correct {$id},{$ticket_id})
    http_response_code(400);
    $response->status = "Bad request";
    $response->code = "400";
    $response->time = date('Y-m-d H:i:s');
    $response->error = "Bad request";
}
//Send JSON encoded response
echo json_encode($response);
