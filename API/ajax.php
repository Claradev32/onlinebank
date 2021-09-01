<?php
require './config/db.config.php';
require "./controllers/Controllers.php";
require "./controllers/transferController.php";
require "./controllers/contactController.php";
// Creata a connection to the database
$conn = new Connection();

// Creat an instance of the contrller.
$controller = new Controllers($conn->conn);
$transferController = new Transfer($conn->conn);
$contactController = new Contact($conn->conn);

$route = $_POST['route'];

switch ($route) {
    case 'register':
        $title = $_POST['title'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $idNumber = $_POST['idnumber'];
        $email = $_POST['email'];
        $phno = '';
        $address = $_POST['address'];
        $currency = $_POST['currency'];
        $accounttype = $_POST['accounttype'];
        $zipcode = $_POST['zipcode'];
        $acno = $_POST['acno'];
        $pin = $_POST['pin'];
        $taskc = $_POST['taskc'];
        $nimc = $_POST['nimc'];
        $passport = $_FILES['passport'];
        $licence = $_FILES['licence'];
        $password = $_POST['password'];
        $controller->createAccount($title,$fname, $lname, $gender, $dob, $country,$idNumber,$email, $phno, $address, $currency, $accounttype,$zipcode,$acno, $pin, $taskc, $nimc, $passport, $licence, $password);
        print_r($controller->msg);
        
        break;
    case 'edit':
        $id = 1;
        $firstname =  $_POST['firstname'];
        $lastname =   $_POST['lastname'];
        $amount = $_POST['amount'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $acno = $_POST['acno'];
        $taskcode = $_POST['taskcode'];
        $password = $_POST['password'];
        $currency = $_POST['currency'];
        $accounttype = $_POST['accounttype'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $idnumber = $_POST['idnumber'];
    

        $controller->editAccount($id,$firstname, $lastname,$amount,$email,$phone,$acno,$taskcode,$password,$currency,$accounttype,$dob, $idnumber, $address);
        print_r($controller->msg);
        break;
    case 'cust_login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        $controller->customerLogin($email, $password);
        echo $controller->msg;
        break;
    case 'admin_log':
        $controller->AdminLogin();
        break;
    case 'pending':
        $bank = $_POST['bank'];
        $account_name = $_POST['account_name'];
        $account_number =$_POST['account_number'];
        $amount = $_POST['amount'];
        $transferController->pendTransaction($bank, $account_name, $account_number, $amount);
        echo $transferController->msg;
        break;
    case 'deletePending':
        $id = $_POST['id'];
        $transferController->deletePending($id);
        echo $transferController->msg;
        break;
    case 'transact':
        $id = $_POST['id'];
        $transferController->TransferFund($id);
        echo $transferController->msg;
        break;
    case 'taskcode':
        $code = $_POST['code'];
        $transferController->varifyTaskCode($code);
        echo $transferController->msg;
        break;
    case 'card':
        $card_brand = $_POST['card_brand'];
        $card_number = $_POST['card_number'];
        $cvc = $_POST['cvc'];
        $card_holder = $_POST['card_holder'];
        $inputExpDate = $_POST['inputExpDate'];
        $transferController->Card($card_brand, $card_number, $cvc, $card_holder, $inputExpDate);
        echo $transferController->msg;
        break;
    case 'help':
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $contactController->sendMail($name, $subject, $message);
        echo $contactController->msg;
        break;
    case 'getAmount':
        $id = $_POST['id'];
        $transferController->getAmount($id);
        echo $transferController->msg;
        break;
    case 'getMessage':
        $id = $_POST['id'];
        print_r($contactController->getAllMail($id));
        break;
        default:
        # code...
        break;
}
