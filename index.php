<?php
session_start();
$name =isset($_SESSION['name'])?$_SESSION['name']:'';
$email =isset($_SESSION['email'])?$_SESSION['email']:'';
$username =isset($_SESSION['username'])?$_SESSION['username']:'';
$password =isset($_SESSION['password'])?$_SESSION['password']:'';
$password1 =isset($_SESSION['password1'])?$_SESSION['password1']:'';
$birthday = isset($_SESSION['birthday'])?$_SESSION['birthday']:'';
$gender = isset($_SESSION['gender'])?$_SESSION['gender']:'';
$merital = isset($_SESSION['merital'])?$_SESSION['merital']:'';
$address = isset($_SESSION['address'])?$_SESSION['address']:'';
$city = isset($_SESSION['city'])?$_SESSION['city']:'';
$postalcode = isset($_SESSION['postalcode'])?$_SESSION['postalcode']:'';
$homenumber = isset($_SESSION['homenumber'])?$_SESSION['homenumber']:'';
$mobilephone = isset($_SESSION['mobilenumber'])?$_SESSION['mobilenumber']:'';
$card = isset($_SESSION['card'])?$_SESSION['card']:'';
$card_date = isset($_SESSION['card_date'])?$_SESSION['card_date']:'';
$salary = isset($_SESSION['salary'])?$_SESSION['salary']:'';
$site = isset($_SESSION['site'])?$_SESSION['site']:'';
$gpa = isset($_SESSION['gpa'])?$_SESSION['gpa']:'';

$nameValid = true;
$emailValid=true;
$usernameValid=true;
$passwordValid=true;
$password1Valid=true;
$addressValid=true;
$cityValid=true;
$postalcodeValid=true;
$homenumberValid=true;
$mobilephoneValid=true;
$cardValid=true;
$card_dateValid=true;
$salaryValid=true;
$siteValid=true;
$gpaValid=true;


if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username=$_REQUEST['username'];
    $password =$_REQUEST['password'];
    $password1 =$_REQUEST['password1'];
    $birthday =$_REQUEST['birthday'];
    $gender =isset($_REQUEST['gender'])?$_REQUEST['gender']:'';
    $merital =isset($_REQUEST['merital'])?$_REQUEST['merital']:'';
    $address =$_REQUEST['address'];
    $city =$_REQUEST['city'];
    $postalcode = $_REQUEST['postalcode'];
    $homenumber = $_REQUEST['homenumber'];
    $mobilephone =$_REQUEST['mobilenumber'];
    $card =$_REQUEST['card'];
    $card_date=$_REQUEST['card_date'];
    $salary =$_REQUEST['salary'];
    $site =$_REQUEST['site'];
    $gpa =$_REQUEST['gpa'];


    $nameValid =preg_match('/^[a-z\-].*[a-z]+$/i',$name);
    $emailValid = preg_match('/^[a-z0-9].*[\-]\w*@mail\.(com|ru)$/i',$email);
    $usernameValid=preg_match('/^[a-z]{2}[a-z0-9\_]{3,12}$/i',$username);
    $passwordValid=preg_match('/^[a-z]{1,10}[a-z0-9]+$/i',$password);
    if($password!=$password1){
        $passwordValid=false;
        $password1Valid=false;
    }
    $addressValid = preg_match('/^[a-z0-9]{2}[a-z0-9\s]+$/i',$address);
    $cityValid=preg_match('/^[a-z0-9]{2}[a-z0-9\s]+$/i',$city);
    $postalcodeValid=preg_match('/^[0-9]{6}$/',$postalcode);
    $homenumberValid=preg_match('/^[0-9]{2}[0-9]{7}$/',$homenumber);
    $mobilephoneValid=preg_match('/^[0-9]{2}[0-9]{7}$/',$mobilephone);
    $cardValid=preg_match('/^[0-9]{16}$/',$card);
    $salaryValid=preg_match('/^SUM\s[0-9]+$/i',$salary);
    $siteValid=preg_match('/^http:\/\/\w+\.(com|ru)$/',$site);
    $gpaValid=preg_match('/^[0-4]{1}[\.][0-5]{1}$/',$gpa);

    $VALID = $nameValid && $emailValid && $usernameValid && $password1Valid
        && $addressValid && $cityValid && $postalcodeValid && $homenumberValid
        && $mobilephoneValid && $cardValid && $salaryValid  && $siteValid
        && $gpaValid;
    if($VALID){
    header('Location:thanks.php',TRUE,301);
    }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
	
	<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Registration Form</h1>

                <p>
                    This form validates user input and then displays "Thank You" page.
                </p>

                <hr />

                <h2>Please, fill below fields correctly</h2>

                <form action="index.php" method="post">
                    <dl>
                        <dt>Name</dt>
                        <dd>
                            <input type="text" class="form-control <?= $nameValid?'':'is-invalid'?>" id="name" name="name" value="<?=$name?>"  placeholder="Enter your name">
                        </dd>
                        <div class="invalid-feedback">
                            <p>not matching</p>
                        </div>
                    </dl>
                    <dl>
                        <dt>Email</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $emailValid?'':'is-invalid'?>" id="email" name="email" value="<?= $email?>" placeholder="Enter your email">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>

                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Username</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $usernameValid?'':'is-invalid'?>" id="username" name="username"  value="<?= $username?>" placeholder="Enter your username">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Password</dt>
                        <dd>
                            <input type="password" class="form-control  <?= $passwordValid?'':'is-invalid'?>" id="password" name="password"
                                   minlength="5" required placeholder="Enter your password">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Confirm Password</dt>
                        <dd>
                            <input type="password" class="form-control <?= $password1Valid?'':'is-invalid'?>" id="password1" name="password1"  placeholder="Confirm your password">
                        </dd>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Date of birth</dt>
                        <dd>
                            <input type="date" id="birthday" name="birthday" value="<?= $birthday?>">
                        </dd>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Gender</dt>
                        <dd>
                            <input type='radio'  id="gender" name="gender" value="Male" >
                            <label for="Male">Male</label>
                            <input type='radio' id="gender" name="gender" value="Female" >
                            <label for="Female">Female</label>
                        </dd>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Marital status</dt>
                        <dd>
                            <input type='radio' id="merital" name="merital" value="Single" >
                            <label for="Single">Single</label>
                            <input type='radio' id="merital" name="merital" value="Married" >
                            <label for="Married">Married</label>
                            <input type='radio' id="merital" name="merital" value="Divorced" >
                            <label for="Divorced">Divorced</label>
                            <input type='radio' id="merital" name="merital" value="Widowed" >
                            <label for="Widowed">Widowed</label>
                        </dd>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Address</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $addressValid?'':'is-invalid'?>" id="address" name="address" value="<?= $address?>"placeholder="Enter your adress">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>City</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $cityValid?'':'is-invalid'?>" id="city" name="city" value="<?= $city?>" placeholder="Enter your city">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Postal code</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $postalcodeValid?'':'is-invalid'?>" id="postalcode" name="postalcode" value="<?= $postalcode?>"
                                    placeholder="Enter your postal code">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Home Phone</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $homenumberValid?'':'is-invalid'?>" id="homenumber" value="<?= $homenumber?>" name="homenumber">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Mobile phone</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $mobilephoneValid?'':'is-invalid'?>" id="mobilenumber" name="mobilenumber"  value="<?= $mobilephone?>"placeholder="Enter your mobilenumber">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Credit card number</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $cardValid?'':'is-invalid'?>" id="card" name="card" value="<?= $card?>"placeholder="Enter your credit card">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Credit card expiry date</dt>
                        <dd>
                            <input type="date" class="form-control" id="card_date" name="card_date" value="<?= $card_date?>">
                        </dd>

                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Monthly salary</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $salaryValid?'':'is-invalid'?>" id="salary" name="salary" value="<?= $salary?>" placeholder="Enter your salary">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>Web-site url</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $siteValid?'':'is-invalid'?>" id="site" name="site" value="<?= $site?>" placeholder="Enter your web site">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <dl>
                        <dt>OverAll GPA</dt>
                        <dd>
                            <input type="text" class="form-control  <?= $gpaValid?'':'is-invalid'?>" id="gpa" name="gpa" value="<?= $gpa?>" placeholder="Enter your GPA">
                        </dd>
                        <div class="invalid-feedback">
                            incorrect format
                        </div>
                        <!-- Write other fiels similar to Name as specified in lab6.pdf -->
                    </dl>
                    <div>
                        <input type="submit" id="submit" name="submit" value="Registrate">
                    </div>
                </form>
            </div>
        </div>
    </div>


	</body>
</html>