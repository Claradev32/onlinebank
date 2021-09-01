<?php
class Contact
{
    public $msg = '';
    public $conn;

    public function __construct($conn)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->conn = $conn;
    }
    public function sendMail($name, $subject, $message)
    {
        $name = $name;
        $subject = $subject;
        $message = $message;
        $from = $this->getEmail();
        $res = $this->conn->query("INSERT INTO mail VALUES(null,'$name','$subject','$message','$from')");
        if ($res == true) {
            $this->msg =  "success";
        } else {
            $this->msg = $this->conn->error;
        }

        // $to = "zionekekenta2@gmail.com";
        // $subject = $subject;
        // //$message .= "<h1>".$message."</h1>";
         
        // $header = "Email:".$from." \r\n";
        // $header .= "MIME-Version: 1.0\r\n";
        // $header .= "Content-type: text/html\r\n";
         
        // $retval = mail($to, $subject, $message, $header);
         
        // if ($retval == true) {
        //     $this->msg = $this->sendMail($name, $subject, $message);
        //     $this->msg = "Message sent";
        // } else {
        //     //$this->sendMail($name, $subject, $message);
        //     $this->msg = "Message could not be sent...";
        // }
    }
    public function getEmail()
    {
        //get users email address from the id
        $res = $this->conn->query("SELECT * FROM customer WHERE cust_id='".$_SESSION['loggedIn_cust_id']."'");
        $row = $res->fetch_assoc();
        return $row["email"];
    }
    public function saveMail($name, $subject, $message)
    {
        $res = $this->conn->query("INSERT INTO mail VALUES(null,'$name','$subject','$message','$this->getEmail()')");
        if ($res == true) {
            return "success";
        } else {
            return $this->conn->error;
        }
    }

    public function getAllMail($id)
    {
        $res = $this->conn->query("SELECT * FROM mail WHERE id='".$id."'");
        $row = $res->fetch_assoc();
        return json_encode($row);
    }
}
