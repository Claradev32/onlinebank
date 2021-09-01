<?php
class Transfer
{
    public $msg;
    public $conn;
    public $sender_id;

    public function __construct($conn)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->conn = $conn;
    }

    public function TransferFund($id)
    {
        $this->sender_id = $_SESSION['loggedIn_cust_id'];
        $qry = $this->conn->query("SELECT * FROM pending_transaction WHERE id=".$id);
        $trans = $qry->fetch_assoc();
        $receiver_id = $trans['user_to'];

        // $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pin='".$password."'";
        // $result0 = $this->conn->query($sql0);
        // $row0 = $result0->fetch_assoc();

        $sql5 = "SELECT * FROM customer WHERE account_no=".$receiver_id;
        $result5 = $this->conn->query($sql5);
        if ($result5->num_rows >0) {
            $row5 = $result5->fetch_assoc();
        }

        $sql1 = "SELECT balance FROM passbook".$this->sender_id." ORDER BY trans_id DESC LIMIT 1";
        $result1 = $this->conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $sender_balance = $row1["balance"];

        $updated_sender_balance =  $sender_balance - $trans['amount'];
        if ($result5->num_rows >0) {
            $sql2 = "SELECT balance FROM passbook".$row5['cust_id']." ORDER BY trans_id DESC LIMIT 1";
            $result2 = $this->conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $receiver_balance = $row2["balance"];

            $updated_receiver_balance = $receiver_balance + $trans['amount'];
        }

        $sql3 = "INSERT INTO passbook".$this->sender_id." VALUES(
                NULL,
                NOW(),
                'Sent to: ".$trans['user_to']."',
                '$trans[amount]',
                '0',
                '$updated_sender_balance'
            )";

        if ($result5->num_rows >0) {
            $sql4 = "INSERT INTO passbook".$row5['cust_id']." VALUES(
                NULL,
                NOW(),
                'Received from: ".$trans['user_from']."',
                '0',
                '$trans[amount]',
                '$updated_receiver_balance'
            )";
            $this->conn->query($sql4);
        }
        $sql5 = "INSERT INTO transaction".$this->sender_id." VALUES(
            null,
            '$trans[user_from]',
            '$trans[user_to]',
            '$trans[amount]',
            '$trans[trans_date]',
            '$trans[bank_name]'
            )";
        if ($result5->num_rows >0) {
            $sql6 = "INSERT INTO transaction".$row5['cust_id']." VALUES(
            null,
            '$trans[user_from]',
            '$trans[user_to]',
            '$trans[amount]',
            '$trans[trans_date]',
            '$trans[bank_name]'
            )";
            $this->conn->query($sql6);
        }
        if ($this->conn->query($sql3) == true && $this->conn->query($sql5) ==true) {
            $this->msg = $this->reverseTransaction($trans['amount'], $sender_balance, $this->sender_id, $this->conn, $updated_sender_balance);
            $this->msg = "transacted";
        } else {
            $this->msg = $this->conn->error;
        }
    }
    public function reverseTransaction($trans, $sender_balance, $sender_id, $conn, $updated_sender_balance)
    {
        $reversed_sender_balance =  $sender_balance + $trans;
        $revSql = "SELECT * FROM passbook".$sender_id." ORDER BY trans_id DESC";
        if (!$resQ = $conn->query($revSql)) {
            $this->msg = $conn->error;
        } else {
            $r= $resQ->fetch_assoc();
            $reversed_sender_balance =  $updated_sender_balance + $trans;
            $revSql = "UPDATE passbook".$this->sender_id." SET balance ='$reversed_sender_balance' WHERE trans_id='$r[trans_id]'";
            if (!$conn->query($revSql)) {
                return $conn->error;
            }
        }
    }

    public function pendTransaction($bank_name, $acct_name, $acct_number, $amt)
    {
        $this->sender_id = $_SESSION['loggedIn_cust_id'];
        $qry = $this->conn->query("SELECT * FROM customer WHERE cust_id = '$this->sender_id'");
        $sender = $qry->fetch_assoc();
    
        $passQury = $this->conn->query("SELECT balance FROM passbook".$this->sender_id." ORDER BY trans_id DESC LIMIT 1");
        $passbook = $passQury->fetch_assoc();
        
        $date = Date('Y:d:m');
        $bank_name = mysqli_real_escape_string($this->conn, $bank_name);
        $acct_name = mysqli_real_escape_string($this->conn, $acct_name);
        $acct_number = mysqli_real_escape_string($this->conn, $acct_number);
        $amt = mysqli_real_escape_string($this->conn, $amt);
        // $password = mysqli_real_escape_string($this->conn, $password);
        
        $receiver_id = $acct_number;
        // if ($sender['pin'] != $password) {
        //     $this->msg = "incorrect";
        if ($passbook['balance'] < $amt) {
            $this->msg = "insufficient";
        } else {
            $res = $this->conn->query("INSERT INTO pending_transaction VALUES(null,'$sender[account_no]','$acct_number','$amt','$date','$bank_name')");
            $last_id = $this->conn->insert_id;
            if ($res==true) {
                $this->msg = $last_id;
            } else {
                $this->msg = "failed";
            }
        }
    }
    public function deletePending($id)
    {
        $res = $this->conn->query("DELETE FROM pending_transaction WHERE id=".$id);
        if ($res==true) {
            $this->msg =  "deleted";
        } else {
            $this->msg = null;
        }
    }
    public function varifyTaskCode($code)
    {
        $sender_id = $_SESSION['loggedIn_cust_id'];
        $res = $this->conn->query("SELECT * FROM customer WHERE cust_id='$sender_id' and taskCode=".$code);
        if ($res->num_rows >0) {
            $this->msg = "found";
        } else {
            $this->msg = $this->conn->error;
        }
    }

    public function Card($card_brand, $card_number, $cvc, $card_holder, $inputExpDate)
    {
        $res = $this->conn->query("INSERT INTO card VALUES(null,'$_SESSION[loggedIn_cust_id]','$card_brand','$card_number','$cvc','$card_holder','$inputExpDate')");
        if ($res == true) {
            $this->msg = "success";
        } else {
            $this->msg = $this->conn->error;
        }
    }
    public function getAmount($id)
    {
        $res = $conn->query("SELECT * FROM passbook".$id."");
        $row = $res->fetch_assoc();
        $this->msg = json_encode($row);
    }
}
