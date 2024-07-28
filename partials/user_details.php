<?php include 'connection.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/style.css">
    <title>Users</title>
</head>

<body>
    <h1 class= 'text-center display-3' style="color:#75485E;">Users List</h1>
    <table class="table table-striped">
        <tr>
            <th>User_id</th>
            <th>Name</th>
            <th>Email_id</th>
            <th>Phone no.</th>
            <th>Signup Date</th>
        </tr>
        <?php

        $view_sql = "SELECT * FROM `user`;";
        $view_result = mysqli_query($conn, $view_sql);
        if ($view_result) {
            if (mysqli_num_rows($view_result) > 0) {
                if ($row = mysqli_fetch_assoc($view_result)) {
                    while ($row = mysqli_fetch_assoc($view_result)) {

        ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                            <td><?php echo $row['email_id']; ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['signup_date'] ?></td>
                        </tr>

        <?php
                    }
                }
            }
        }

        ?>

    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>