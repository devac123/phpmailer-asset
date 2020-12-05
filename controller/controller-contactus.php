<?php
   include ('../PHPMailer/mailsend.php'); 
if (isset($_POST['callFunc']) && ($_POST['callFunc'] == "SendQuery")) 
{
    $json =  json_decode($_POST['data'], true);
    
    // this one is for user
    $recipent1 = new stdClass();
    $email = $json['person_email'];
    $name = $json['person_name'];
    $phone = $json['person_phone'];
    $msg = $json['person_msg'];
    
    $recipent1->Subject = "query";
    $recipent1->Name = 'Mandeep Saini';
    $recipent1->Address = $email; 
    $recipent1->Replyto = "help@devologix.com";
    $recipent1->FromEmail = "mandeep@devologix.com";

    $MessageBody = "";
    $MessageBody .= "Dear ".$name.",<br/><br/>";
    $MessageBody .= "We have recevied your query, Our executive will contact you with 24 working hours.<br/><br/>";
    $MessageBody .= "For futher query or information, please feel free to contact us at:<br/>";
    $MessageBody .= "Helpline: +91 97813-97819 <br/>";
    $MessageBody .= "Email: help@devologix.com <br/>";
    $MessageBody .= " <br/>";
    $MessageBody .= " Regards,<br/>";
    $MessageBody .= " Team Devologix<br/>";

    $recipent1->Body =  $MessageBody;
    $recipent1->Phone =  $phone;
    
    // this one is for admin
    $recipent2 = new stdClass();
    $recipent2->Address = 'mandeep@devologix.com';
    $recipent2->Name = $name;
    $recipent2->Body = 'Hello Admin'.$name. 'Contact us and their query is '.$msg . 'and customer detail is '.'Name'.$name.'E-mail'.$email ;
    $recipent2->Replyto = $email;
    $recipent2->FromEmail = $email;

    sendemail($recipent1);
    sendemail($recipent2);

}
else if (isset($_POST['callFunc']) && ($_POST['callFunc'] == "contactus")) 
{
    $json =  json_decode($_POST['data']);
    echo "return here";
}
else
{
    echo "undefined function";

}


?>
