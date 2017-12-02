<?php
    
    // https://cst336-lab8-adiesh.c9users.io/phpMyAdmin/index.php
    
    // mysql://b5ba02fc3ba351:3f870355@us-cdbr-iron-east-05.cleardb.net/heroku_860455424cb7b6b?reconnect=true
    
    //$host = "us-cdbr-iron-east-05.cleardb.net";
    //$username = "b5ba02fc3ba351";
    //$password = "3f870355";
    //$dbname = "heroku_860455424cb7b6b";
    
    /*
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b924c277a48bcc";
    $password = "82e3f446";
    $dbname = "heroku_e0a3be7f701d904";
    */
    
    // connect to our mysql database server
    //$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //return $conn;
    // $conn = new mysqli($host, $username, $password, $dbname);
        
     
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "connect successfully";


    
function getDatabaseConnection() {
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b5ba02fc3ba351";
    $password = "3f870355";
    $dbname = "heroku_860455424cb7b6b";
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

/*
function displayUsers() {
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * from User";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    
    
    echo json_encode($records);
    
    
    foreach($records as $record) {
        echo $record["firstName"]. "<br>";
    
    }
    
    
}


displayUsers();
*/


function getUsersThatMatchUserName() {
    
    // testing the usernames
    $username = $_GET['username']; 

    //echo "username: $username <br>";
    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from User WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records);
     
}

getUsersThatMatchUserName();

//$username = $_GET['username'];
//echo "server received username: $username <br>";
/*
function validatePassword() {
    $username = $_GET['username']; 
    $password = $_GET['password'];
    
    //database logic to confirm that the password matches the stored password in the DB
    
    echo sha1($password); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
} else if ($_GET['action'] == 'validate-password') {
    
}
*/

?>
