<?php

if(isset($_POST['submit'])){
  include_once 'dbh.inc.php';
  $first = mysqli_real_escape_string($conn,$_POST['first']);
  $last = mysqli_real_escape_string($conn,$_POST['last']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $uid = mysqli_real_escape_string($conn,$_POST['uid']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

  //error handlers
  //check for empty fileds
  if(empty($first) || empty( $last) || empty( $email ) ||empty($uid) || empty ($pwd) ) {
    
    header("Location: ../sigup.php?signup=empty");
    exit();
  }else {
    //check the if input characters match are  valid 
    if(!preg_match("/[a-zA-Z]*$/",$first) || !preg_match("/[a-zA-Z]*$/",$last) ){

      header("Location: ../sigup.php?signup=invalid");
      exit();
    }else {
      //check the email  is valid
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        header("Location: ../sigup.php?signup=email");
        exit();

      }else {
        $sql ="SELECT *FROM users WHERE user_uid ='$uid'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
          header("Location: ../sigup.php?signup=username has alredy taken");
          exit();
        }else{
          //Hashing the password 
          $hashPwd = password_hash($pwd , PASSWORD_DEFAULT);
        //Insert the user in data base 
        $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first',$last,'$email,'$uid'
        '$hashPwd');";
        mysqli_query($conn,$sql);
        header("Location: ../sigup.php?signup=Success");
        exit();
        }

        }
      }
    }
  }else {
    header("Location: ../sigup.php");
    exit();

  }
    
  
