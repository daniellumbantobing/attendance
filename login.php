<?php
$title = "Login";
require_once 'includes/header.php';
require_once 'db/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usrnm = strtolower(trim($_POST['username']));
    $pass = $_POST['password'];

    $new_pass = md5($pass.$usrnm);

    $result = $users->getUser($usrnm, $new_pass); 
    if(!$result){
      echo '<div class="alert alert-danger" role="alert">
        Username or Password is incorrect! Please try again.
        </div>';
    }else{
            $_SESSION['username'] = $usrnm;
            $_SESSION['id'] = $result['id'];
            header('Location: view.php');
    }
}
?>

<h1 class="text-center"><?php echo $title ?> </h1>
   
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="username">Username: * </label></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password">Password: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table><br/><br/>
        <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
        <a href="#"> Forgot Password </a>
            
    </form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>