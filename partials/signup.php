<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body style="background-color: #efe6ea">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- php code start here -->

     <!-- Nav bar -->
     <nav class="navbar navbar-expand-lg navbar-dark bglavender">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Let's Read</a>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                </ul>
                <form class="d-flex" action='search.php' method='GET' >
                    <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search" required="">
                    <input class="btn animated-btn" value="Search" type="submit">
                </form>
            </div>
        </div>
    </nav>
    <?php
   //Connecting the table
   require_once "connection.php";  
   $email = $pass = $conpass = "";
   $email_err = $pass_err = $conpass_err = "";
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       //
       $fname=$_POST['first_name'];
       $lname=$_POST['last_name'];
       $phone=$_POST['phone'];
       //check if email is empty
            if(empty(trim($_POST['email-id']))){
                $email_err = "Email id cannot be blank.";
            }
            else{
                $query = "SELECT user_id FROM user WHERE email_id = ?";
                $stmt  = mysqli_prepare($conn,$query);
                if($stmt){
                    mysqli_stmt_bind_param($stmt,"s", $param_email);

                    //set the value of param_email
                    $param_email = trim($_POST['email-id']);

                    //Try to execute this statement
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt)== 1){
                            $email_err = "This user name is already taken";
                        }
                        else{
                            $email = trim($_POST['email-id']);
                        }
                    }
                    else{
                        echo '<div class="alert alert-warning" role="alert">
                        <strong>There was an error trying to add your email! </strong>Try to login or use another email-id.
                      </div>';
                    }
                }
            }
            mysqli_stmt_close($stmt);
            //check for password
            if(empty(trim($_POST['password']))){
                $pass_err= "Password cannot be blank.";
            }
            elseif(strlen(trim($_POST['password'])) < 5){
                $pass_err = "Password cannot be less than 5 charater.";
            }
            else{
                $pass =trim($_POST['password']);
            }
            //check for  confirm password
            if(trim($_POST['password']) != trim($_POST['cpassword'])){
                $pass_err = "Password should match.";
            }
            //if there were no error then insert into database
            if(empty($email_err) && empty($pass_err) && empty($conpass_err)){
                $sql="INSERT INTO `user` (`password`, `first_name`, `last_name`, `phone`, `signup_date`, `email_id`) 
                VALUES (?,'$fname', '$lname', '$phone', current_timestamp(), '$email');";
                $stmt = mysqli_prepare($conn,$sql);
                if($stmt){
                    //set these parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_pass);
                    $param_pass  = password_hash($pass,PASSWORD_DEFAULT);
                }
                // TRY tro execute the query
                if(mysqli_stmt_execute($stmt)){
                    header("location: loginpage.php?signin=success");
                }
                else{
                    echo "Something went wrong.. Cannot redirect!";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo '<div class="alert alert-warning" role="alert">
                        <strong>User already exist!</strong>Try to login or use another email-id.
                      </div>';
            }
            mysqli_close($conn);
        }
      
    ?>

    <!-- main content -->
    <form action="/library/library/partials/signup.php" method="post">
        <div class="container mt-5 shadow-lg feedback-container">
            <div class="row">
             <div class="col-md-3"></div>
                <h2 class="text-black">Sign Up</h2>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="first_name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="last_name" required="">
                    </div>

                
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="Email1" name="email-id" aria-describedby="emailHelp" required="">
                    
                </div>
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Phone No.</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="password" required="">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="cpassword" required="">
                </div>
                <div class="col-auto button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
    </form>
    
</body>
</html>