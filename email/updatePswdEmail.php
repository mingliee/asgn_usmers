<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
    require '../config.php';

    $selectSQL="select email,password from user where email='$email'";
    $selectResult = mysqli_query($conn,$selectSQL);

    if(mysqli_num_rows($selectResult)==1)
    {
        while($row=mysqli_fetch_assoc($selectResult))
        {
        $email=md5($row['email']);
        $pass=md5($row['password']);
        }

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername('usmers21@gmail.com')
                    ->setPassword('fyp.usmers');

        $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
        require_once('phpmail/PHPMailerAutoload.php');
        $mail = new Swift_Mailer($transport);
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;                  
        // GMAIL username
        $mail->Username = "your_email_id@gmail.com";
        // GMAIL password
        $mail->Password = "your_gmail_password";
        $mail->SMTPSecure = "ssl";  
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From='your_gmail_id@gmail.com';
        $mail->FromName='your_name';
        $mail->AddAddress('reciever_email_id', 'reciever_name');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';

        
        if($mail->Send())
        {
        echo "Check Your Email and Click on the link sent to your email";
        }
        else
        {
        echo "Mail Error - >".$mail->ErrorInfo;
        }
  }	
}
?>