<?php
class Controllers
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
    public function createAccount($title, $fname, $lname, $gender, $dob, $country, $idNumber, $email, $phno, $address, $currency, $accounttype, $zipcode, $acno, $pin, $taskc, $nimc, $passport, $licence, $password)
    {
        $title = mysqli_real_escape_string($this->conn, $title);
        $fname = mysqli_real_escape_string($this->conn, $fname);
        $lname = mysqli_real_escape_string($this->conn, $lname);
        $gender = mysqli_real_escape_string($this->conn, $gender);
        $dob = mysqli_real_escape_string($this->conn, $dob);
        $country = mysqli_real_escape_string($this->conn, $country);
        $idNumber = mysqli_real_escape_string($this->conn, $idNumber);
        $email = mysqli_real_escape_string($this->conn, $email);
        $phno = mysqli_real_escape_string($this->conn, $phno);
        $address = mysqli_real_escape_string($this->conn, $address);
        $currency = mysqli_real_escape_string($this->conn, $currency);
        $accounttype = mysqli_real_escape_string($this->conn, $accounttype);
        $zipcode = mysqli_real_escape_string($this->conn, $zipcode);
        $acno = mysqli_real_escape_string($this->conn, $acno);
        $pin = mysqli_real_escape_string($this->conn, $pin);
        $taskc = mysqli_real_escape_string($this->conn, $taskc);
        $nimc = mysqli_real_escape_string($this->conn, $nimc);
        $passport =  $passport['name'];
        $licence =  $licence['name'];
        $password =  mysqli_real_escape_string($this->conn, $password);
        // $hased_password = $this->hash_password($password);
         
        $sql0 = "SELECT MAX(cust_id) FROM customer";
        $result = $this->conn->query($sql0);
        $row = $result->fetch_assoc();
        $id = $row["MAX(cust_id)"] + 1;

        /*  Prevent mismatch between cust_id and benef/passbook table number.
            This is because when a row is deleted from customer AUTO_INCREMENT does
            not reset but keeps increasing.
            Hence resest AUTO_INCREMENT to $id and eleminate the error. */
        $sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$id;
        $this->conn->query($sql5);

        $sql1 = "CREATE TABLE passbook".$id."(
                    trans_id INT NOT NULL AUTO_INCREMENT,
                    trans_date DATETIME,
                    remarks VARCHAR(255),
                    debit VARCHAR(255),
                    credit VARCHAR(255) ,
                    balance VARCHAR(255),
                    PRIMARY KEY(trans_id)
                )";

        $sql2 = "CREATE TABLE beneficiary".$id."(
                    benef_id INT NOT NULL AUTO_INCREMENT,
                    benef_cust_id INT UNIQUE,
                    account_no VARCHAR(20) UNIQUE,
                    account_name VARCHAR(20),
                    PRIMARY KEY(benef_id)
                )";

        $sql3 = "CREATE TABLE transaction".$id."(
            id INT NOT NULL AUTO_INCREMENT,
            user_from VARCHAR(50),
            user_to VARCHAR(20),
            amount VARCHAR(20),
            tran_date VARCHAR(20),
            bank VARCHAR(20),
            PRIMARY KEY(id)
        )";

        $sql4 = "INSERT INTO customer VALUES(
                    NULL,
                    '$fname',
                    '$lname', 
                    '$gender', 
                    '$email', 
                    '$address',
                    '$acno',                  
                    '$pin', 
                    '$country',
                    '$idNumber',
                    '$currency', 
                    '$accounttype',
                    '$zipcode',
                    '$passport', 
                    '$licence', 
                    '$password',
                    '$taskc',
                    '$nimc', 
                    '$title',
                    '$phno',
                    '$dob'
                   
                )";

        $sql5 = "INSERT INTO passbook".$id." VALUES(
                    NULL,
                    NOW(),
                    'Opening Balance',
                    '0',
                    '0',
                    '0'
                )";
            
        if ($this->conn->query($sql4)) {
            $this->uploadPass($_FILES['passport']) ;
            $this->uploadPass($_FILES['licence']);
            $this->conn->query($sql1);
            $this->conn->query($sql2);
            $this->conn->query($sql3);
            $this->conn->query($sql5);
            $this->msg =  "success";
        } else {
            $this->msg = $this->conn->error;
        }
    }
    public function editAccount($id,$fname, $lname,$amount,$email,$phone,$acno,
    $taskc,$password,$currency,$accounttype,$dob, $idNumber, $address)
    {
        $sql4 = "UPDATE customer SET first_name ='$fname',
           last_name ='$lname', 
           email= '$email', 
            address = '$address',
            account_no ='$acno',                  
            currency = '$currency', 
            accountType = '$accounttype',
            password = '$password',
            taskCode = '$taskc',
            phone = '$phone',
            dob = '$dob',
            ID_Num = '$idNumber'

           
         WHERE  cust_id = ".$id."";

        $sql5 = "UPDATE passbook".$id." SET balance='$amount'";

        if ($this->conn->query($sql4) && $this->conn->query($sql5)) {
            $this->msg = 'success';
        } else {
            $this->msg = $this->conn->error;
        }
    }
    public function AdminLogin($uname, $pwd)
    {
        $uname = mysqli_real_escape_string($conn, $uname);
        $pwd = mysqli_real_escape_string($conn, $pwd);

        $sql0 =  "SELECT * FROM admin WHERE username='".$uname."' AND password ='".$pwd."'";
        $result = $conn->query($sql0);

        if (($result->num_rows) > 0) {
            $_SESSION['isAdminValid'] = true;
            $_SESSION['LAST_ACTIVITY'] = time();
            $this->msg =  "found";
        } else {
            session_destroy();
            $this->msg = "not found";
        }
    }
    public function customerLogin($uname, $pwd)
    {
        $uname = mysqli_real_escape_string($this->conn, $uname);
        $pwd = mysqli_real_escape_string($this->conn, $pwd);
    
        $sql0 =  "SELECT * FROM customer WHERE email='".$uname."'";
        $result = $this->conn->query($sql0);
        $row = $result->fetch_assoc();
    
        if (($result->num_rows) > 0) {
            $dbPass = $row['password'];
            if ($pwd == $dbPass) {
                $_SESSION['loggedIn_cust_id'] = $row["cust_id"];
                $_SESSION['isCustValid'] = true;
                $_SESSION['LAST_ACTIVITY'] = time();
                $this->msg = "found";
            } else {
                session_destroy();
                $this->msg  = "Incorect Password ". $dbPass.$pwd;
            }
        } else {
            session_destroy();
            $this->msg  = "Incorrect Username";
        }
    }
    protected function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, $options=[
        "cost"=>12
    ]);
    }
    protected function uploadPass($file)
    {
        $pass =  $file['name'];
        $location = ".././uploads/".$pass;

        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);

        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png");

        $response = 0;
        /* Check file extension */
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if (move_uploaded_file($file['tmp_name'], $location)) {
                return "success";
            } else {
                return "Error Uploading";
            }
        } else {
            return "Invalid Image";
        }
    }
}
