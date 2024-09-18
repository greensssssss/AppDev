<?php 
include "Connect.php";



try {
    
    $username=$_POST["username"];
    $password=$_POST["password"];
    

    $stmt=$conn->prepare("SELECT 
    u.userid,         
    r.roleid,
    r.Description,
    u.fullname,
    u.username
FROM 
    `user` u
LEFT OUTER JOIN 
    role r 
ON 
    u.roleid = r.roleid
WHERE 
    u.username = :username   
    AND u.`password` = :password;  
");


$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

if($stmt->execute()){
    if ($stmt->rowCount() > 0) {
        echo json_encode(array("response" => "success", "message" => "Successfully Login"));
    } else {
        echo json_encode(array("response" => "error", "message" => "Invalid username or password"));
    }
}




} catch (\Throwable $th) {
    echo "Connection failed: ", $th->getMessage();
}
?>