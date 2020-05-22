<?php
include('dbconnection.php');
include('managefeedback.php');

$ManageFeedback= new ManageFeedback();

session_start();
ob_start();

    $prefix             = ($_POST['prefix']);
    $ticketnumber       = ($_POST['ticketnumber']);
    $rating             = ($_POST['rating']);
    $status             = ($_POST['status']);
    $reason             = ($_POST['reason']);
    $comments           = ($_POST['comments']);
 
if ($db) 
{
     $answer = $ManageFeedback->checkTicket($ticketnumber,$prefix);
     if($answer)
     {
            $success=0;
                $form_fields= array(
                            'prefix' => $prefix,
                            'ticket_number' => $ticketnumber,
                            'star_rating' => $rating,
                            'status' => $status,
                            'reason' => $reason,
                            'comments' => $comments);
                if($ManageFeedback->insert($form_fields))
                {
                    $success = 1;
                } 
                ob_end_clean(); 
if($success === 1){
    echo json_encode([
       'code' => 200,
    'message'=> 'You have successfully submitted your feedback'
         ]);
}
else{
    echo json_encode([
       'code' => 400,
    'message'=> 'Data Insertion Failed !'
         ]);
}
     }
     else
     {
        echo json_encode([
       'code' => 400,
    'message'=> 'Specified Ticket does not exist !'
         ]);
     }
//     $success=0;
//                 $form_fields= array(
//                             'prefix' => $prefix,
//                             'ticket_number' => $ticketnumber,
//                             'star_rating' => $rating,
//                             'status' => $status,
//                             'reason' => $reason,
//                             'comments' => $comments);
//                 if($ManageFeedback->insert($form_fields))
//                 {
//                     $success = 1;
//                 } 
//                 ob_end_clean(); 
// if($success === 1){
//     echo json_encode([
//        'code' => 200,
//     'message'=> 'You have successfully submitted your feedback'
//          ]);
// }
// else{
//     echo json_encode([
//        'code' => 400,
//     'message'=> 'Data Insertion Failed !'
//          ]);
// }
}
else 
{
    echo json_encode([
       'code' => 400,
    'message'=> 'Database connection failure'
]); 
}

?>






