<?php 
include "Connect.php";



try {
    
    $studentno=$_POST["studentno"];
    $firstname=$_POST["firstname"];
    $middlename=$_POST["middlename"];
    $lastname=$_POST["lastname"];
    $contact=$_POST["contact"];
    $email=$_POST["email"];
    $birthday=$_POST["birthday"];

    $stmt=$conn->prepare("INSERT INTO students (studentno, firstname, middlename, lastname, contact, email, birthday)
                            VALUES(:studentno, :firstname, :middlename, :lastname, :contact, :email, :birthday)");


$stmt->bindParam(':studentno', $studentno);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':middlename', $middlename);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':birthday', $birthday);

if($stmt->execute()){
        echo json_encode(array("response" => "success", "message" => "New Record Created"));
    } 
    else {
        echo json_encode(array("response" => "error", "message" => "Try Again!"));
    }
}




catch (PDOException $e) {
    echo json_encode(array("response" => "error", "message" => "Invalid username or password"));
}
?>