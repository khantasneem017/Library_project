<?php include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/style.css">
</head>
<body style="background-color: #efe6ea;">
    <!-- Nav Bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bglavender">
        <div class="container-fluid">
            <a class="navbar-brand page-name" href="../index.php">Let's Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn animated-btn" type="submit">Search</button>
                </form>
                <div class="mx-2">
                    <script scr="js/signup.js"></script>
                    <button class="btn btn-primary"  data-bs-target="#login" 
                     onclick="window.location.href='http://localhost/library/library/partials/loginpage.php'">
                     Login</button>
                    <button class="btn btn-primary"  data-bs-target="#signup" 
                    onclick="window.location.href='http://localhost/library/library/partials/signup.php'" >
                    SignUp</button>
                    
                </div>
            </div>
        </div>
    </nav>
    <!-- php code -->
<?php
//This script will handle login
session_start();
if(isset($_GET['signin'])){
    if($_GET['signin']=='success'){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>You have successfully signed up!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: ../index.php");
    exit;
}
require_once "connection.php";

$email = $password = "";
$err = "";
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email + password";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }
    if(empty($err))
    {
        $sql = "SELECT email_id, first_name, password,role FROM user WHERE email_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;
            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt,$email,$name,$pass,$role);
                    //echo "$role";
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $pass))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["email"] = $email;
                            $_SESSION["name"] = $name;
                            $_SESSION["role"] = $role;
                            $_SESSION["loggedin"] = true;
                            
                            //Redirect user to welcome page
                            if($role=="admin"){
                                header("location: ../admin.php");
                            }
                            else{
                                header("location: ../index.php");
                            }
                            
                        } 
                        else{
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Incorrect password.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    }
                    
                }
                else{
                    
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Wrong Email-id or password.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        }
    }
}
?>
    <!-- main content -->
    <div class="container mt-5 pt-5 ">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card shadow-lg">
                    <div class="card-body card-color">
                        <form action="" method="post" class="row g-3">
                            <h4>Login</h4>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-end" id="login" >Login</button>
                            </div>
                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0">Don't have an account yet? <a href="signup.php">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <!-- <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    
    
</body>
</html>