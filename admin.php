<?php include './partials/connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Admin Dashboard</title>
</head>
<body style="background-color: #efe6ea;">
    <?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-dark bglavender">
        <div class="container-fluid">
            <a class="navbar-brand page-name" href="index.php">Let's Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partials/create_book.php">Upload Books</a>
                    </li>
                   
                </ul>
            </div>
        </div>
</nav>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-6">
        <div class="card">
        <h5 class="card-header">Books</h5>
        <div class="card-body">
            <h5 class="card-title">Books that are available.</h5>
            <ul>
                <?php 
                    $sql= "SELECT * FROM `books`;";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0){
        
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li>" ."<b>". $row['book_name'] . "</b>" . " by ". "<i>" . $row['author'] ."</i>"."</li>";
                            }
                        }

                    ?>
            </ul>
            
            <a href="http://localhost/library/library/partials/create_book.php" class="btn btn-primary">Add books</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="card">
                <h5 class="card-header">Users</h5>
                <div class="card-body">
                    <h5 class="card-title">Recent Users..</h5>
                    <?php 
                        $query= "(SELECT * FROM `user` ORDER BY user_id DESC LIMIT 4) ORDER BY user_id ASC;";
                        $result_query = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result_query)>0){
                            while($user_row = mysqli_fetch_assoc($result_query)){
                                echo "<li>" . $user_row['email_id'] . " signed up on " . $user_row['signup_date'] . "</li>";
                            }
                        }
                    ?>
                    
                    <a href="http://localhost/library/library/partials/user_details.php" class="btn btn-primary">View more</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <h5 class="card-header">Feedback</h5>
                <div class="card-body">
                    <h5 class="card-title">Recent Feedbacks..</h5>
                    <dl>
                    <?php
                        $query1="(SELECT * FROM `feedback` ORDER BY feed_id DESC LIMIT 4) ORDER BY feed_id ASC;";
                        $result_query1 = mysqli_query($conn,$query1) ;
                        if(mysqli_num_rows($result_query1)>0){
                            while($feed_row = mysqli_fetch_assoc($result_query1)){
                                echo "<dt>" . $feed_row['email'] . "<br> Commented : </dt>"  ."<dd>" . $feed_row['comments'] . "</dd>" ;
                            }
                        }
                    ?>
                    </dl>
                    <a href="http://localhost/library/library/partials/feedback_list.php" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
    </div>
    </div>


</div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>