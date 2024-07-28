<?php include "connection.php"; ?>
<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheet/style.css">
    <title>Let's Read</title>
</head>

<body>

    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bglavender">
        <div class="container-fluid">
            <a class="navbar-brand page-name" href="index.php">Let's Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <form class="d-flex" action='search.php' method='GET'>
                    <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search" required="">
                    <input class="btn animated-btn" value="Search" type="submit">
                </form>
                <div class="mx-2">
                    <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) : ?>
                        <button class="btn btn-primary" data-bs-target="#login" onclick="window.location.href='http://localhost/library/library/partials/loginpage.php'">
                            Login</button>
                        <button class="btn btn-primary" data-bs-target="#signup" onclick="window.location.href='http://localhost/library/library/partials/signup.php'">
                            SignUp</button>
                    <?php else : ?>
                        <div class="navbar-collapse collapse">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <img src="../assets/icons8-user-50.png">
                                    <b style="color:white;"><?php echo "Welcome " . $_SESSION['name'] ?></b>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-target="#login" onclick="window.location.href='http://localhost/library/library/partials/logout.php'">
                                Logout</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container my-4">

        <div class="row mb-2">
            <div class="col-md-12">
                <?php
                if (isset($_GET['sub_name'])) {
                    $sub_name = $_GET['sub_name'];
                }
                echo '<h2 class= "text-center display-6" style="color:#75485E;"><b>' . $sub_name . ' </b></h2>';
                // echo $sub_name;
                $cat_query = "SELECT * FROM `books` JOIN `sub_catagory` ON 
    books.sub_id = sub_catagory.sub_id 
    WHERE sub_catagory.sub_name = '{$sub_name}';";
                // echo $cat_query;
                $cat_result = mysqli_query($conn, $cat_query);
                if ($cat_result) {

                    if (mysqli_num_rows($cat_result) > 0) {

                        while ($row = mysqli_fetch_assoc($cat_result)) {
                ?>
                            <!-- cards -->
                            <div class="card mb" style="height: 215px;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?php echo "../partials/" . $row['book_cover_url']; ?>" style="width: 170px;height: 190px; " class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <h5 class="card-title"><?php echo $row["book_name"] ?></h5>
                                        <h6 class="card-text text-muted">By <?php echo "<i>" . $row['author'] . "</i>"; ?></h6>
                                        <h6 class="card-text text-muted">Total Pages: <?php echo $row['total_pages']; ?></h6>
                                        <h6 class="card-text text-muted">Ratings: <?php echo $row['ratings'] . "&#11088" ?></h6>
                                        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) : ?>
                                            <a href="http://localhost/library/library/partials/loginpage.php" class="btn btn-primary">Read</a>
                                        <?php else : ?>
                                            <a href=<?php echo "http://localhost/library/library/partials/read.php?id=" . $row["book_id"] ?> class="btn btn-primary">Read</a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                <?php
                        }
                    }
                }
                ?>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>
</body>

</html>