<?php 
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
		function send_mail_to_customer()
      {
        $to = 'rasha08@gmail.com';
        $subject = 'Message from orthoicon.com - '.$_POST['subject'].'';

        $message = 'Sender name '.'\r\n'.$_POST['message'].'';

        // Always set content-type when sending HTML email
        $headers = 'MIME-Version: 1.0' . '\r\n';
        $headers .= 'Content-type:text/html;charset=UTF-8' . '\r\n';


        $headers .= 'From: <'.$_POST['email'].'>' . '\r\n';

        mail($to,$subject,$message,$headers);
      }
      send_mail_to_customer();
      print('<h4 class="text-center alert alert-success">Message Sent!</h4>');
	}else if(@$_POST['send_message'] == "Send Message"){
		 print('<h4 class="text-center alert alert-danger">All fields must be filed!</h4>');
	}
?>