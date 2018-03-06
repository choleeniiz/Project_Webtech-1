<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <title>Login page</title>
</head>
<body>
    <?php
        //get value
        session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];

        //prevent mysql error
        // $_POST['username'] = mysql_real_escape_string($_POST['username']);
        // $_POST['password'] = mysql_real_escape_string($_POST['password']);

        echo $_POST["username"]; 
        $conn = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conn,"webtech1");

        $result = mysqli_query($conn,"select * from account where user_name = '$username' and password='$password'") 
            or die("fail to query".mysqli_error());
        $row = mysqli_fetch_array($result);
        if ($row['user_name'] == $username and $row['password'] == $password) {
            echo "login success";
         
        } else {
            echo "try again";
        }
        
    ?>
    
</body>
</html>