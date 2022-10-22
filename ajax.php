<?php
    include 'db.php';
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])) {

        $id = substr(str_shuffle("0123456789"), 0, 5);


        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        
    if (empty('name') || empty($username) || empty($password)){
        echo "Please Fill Out The Form!";
        exit;
    }

    $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($user) > 0){
        echo "username Has Already Taken";
        exit;
    }

    $Sql = 'INSERT into users (id,username,password,name) VALUES("'.$id.'","'.$username.'","'.$password.'","'.$name.'")';
    if (mysqli_query($conn, $Sql)) {
        echo "successs";
    }
    }

    else if(isset($_POST['Login_user']) && isset($_POST['login_password'])){
		$username=$_POST['Login_user'];
		$password=$_POST['login_password'];
        
        $Sql = "Select * from users where username ='$username' && password = '$password'";
        $res = mysqli_query($conn,$Sql);
        
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            
            $arr = array("status" => 'success', 'message' => 'Logged Successfully');
        }else if (empty('name') || empty($username) || empty($password)){
            $arr = array("status" => 'errors', 'message' => 'Fill out the form');
        } else {
            
            $arr = array("status" => 'error', 'message' => 'Password wrong');
        }
        echo  json_encode($arr);
	}
