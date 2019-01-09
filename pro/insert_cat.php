<?php
include "server/db_connection.php";
if(isset($_POST['insert_cat'])){
    $title = $_POST['pro_title'];
    $input = "insert into categories (cat_title) values ('$title')";
    mysqli_query($con,$input);
    if(!$input){
        echo "fail";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Product</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <style>
        * {
            font-family: 'Old Standard TT', serif;
        }
        .set{
            margin-top: -6px;
            margin-bottom: -15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-5"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span> Category </h1>
    <form action="insert_cat.php" method="post">
        <div class="row">
            <div style="margin-top: 3px" class="col ">
                <label for="pro_title" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"> <span class="d-sm-none d-md-inline"> Product </span> Category:</label>
            </div>
            <div class="set col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                    </div>
                    <input type="text" class="form-control" id="pro_title" name="pro_title" placeholder="Enter Category Title" >
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <button type="submit" name="insert_cat" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Category </button>
                </div>
            </div>
    </form>
</div>
</body>
</html>