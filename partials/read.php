<?php
    include 'connection.php';
    if (isset($_GET["id"])) {
        $read_sql="SELECT book_file_url FROM `books` where book_id=?;";
        $read_stmt=mysqli_prepare($conn,$read_sql);
        if($read_stmt){
            mysqli_stmt_bind_param($read_stmt,"s",$_GET['id']);
            
        }
        if(mysqli_stmt_execute($read_stmt)){
            mysqli_stmt_store_result($read_stmt);
            if(mysqli_stmt_num_rows($read_stmt)==1){
                mysqli_stmt_bind_result($read_stmt,$book_url);
                if(mysqli_stmt_fetch($read_stmt)){
                    
                    $_GET['book_file_url']=$book_url;
                    $filename= $_GET['book_file_url'];
                    header("Content-type: application/pdf");
                    header("Content-Length: " . filesize($filename));
                    header('Content-Disposition: inline; filename="' . $filename.'"');
                    @readfile($filename);
                }

            }
        }
    }
    else{
        header("location: ../index.php");
    }
?>
