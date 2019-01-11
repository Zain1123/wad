<?php
 include "function.php";
if(isset($_POST['insert_pro'])){
    $title = $_POST['pro_title'];
    $cat = $_POST['pro_cat'];
    $brand = $_POST['pro_brand'];
    $price = $_POST['pro_price'];
    $keyword = $_POST['pro_kw'];
    $detail = $_POST['pro_desc'];

    $pro_image = $_FILES['pro_image']['name'];
    $pro_image_tmp = $_FILES['pro_image']['tmp_name'];
    move_uploaded_file($pro_image_tmp,"product_images/$pro_image");
    $insert_product = "insert into products (pro_cat, pro_brand,pro_title,pro_price,pro_desc,pro_image,pro_keywords) 
                                     VALUES ('$cat','$brand','$title','$price','$detail','$pro_image','$keyword');";
    $insert_pro = mysqli_query($con, $insert_product);
    if($insert_pro){
        header("location: ".$_SERVER['PHP_SELF']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Product</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <style>
        * {
            font-family: 'Old Standard TT', serif;
        }
        #image{
            margin-top: 13px;
        }
        .set{
            margin-top: -6px;
            margin-bottom: -15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-5"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span> Product </h1>
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div style="margin-top: 3px" class="col-lg-2 col-md-3 col-sm-3 ">
                <label for="pro_title" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"> <span class="d-sm-none d-md-inline"> Product </span> Title:</label>
            </div>
            <div class="set col-lg-4 col-md-9 col-sm-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                    </div>
                    <input type="text" class="form-control" id="pro_title" name="pro_title" placeholder="Enter Product Title" >
                </div>
            </div>
            <div style="margin-top: 8px" class="col-lg-2 col-sm-3 col-md-3">
                <label for="pro_cat" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"><span class="d-sm-none d-md-inline"> Product </span> Category:</label>
            </div>
            <div class=" mt-3 mt-lg-0 col-lg-4 col-md-9 col-sm-9 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-list-alt"></i></div>
                    </div>
                    <select class="form-control" id="pro_cat" name="pro_cat">
                        <option>Select Category</option>
                         <?php getCats();
                         ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row my-3" >
            <div  class="col-lg-2 col-md-3 col-sm-3">
                <label for="pro_brand" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"> <span class="d-sm-none d-md-inline"> Product </span> Brand:</label>
            </div>
            <div class=" set col-lg-4 col-md-9 col-sm-9" >
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-stamp"></i></div>
                    </div>
                    <select class="form-control" id="pro_brand" name="pro_brand">
                        <option>Select Brand</option>
                        <?php getBrands();?>
                    </select>
                </div>
            </div>
            <div id="image" class="col-lg-2 col-md-3 col-sm-3">
                <label for="pro_img" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"><span class="d-sm-none d-md-inline"> Product </span> Image:</label>
            </div>
            <div class=" mt-3 mt-lg-0 col-lg-4 col-md-9 col-sm-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-image"></i></div>
                    </div>
                    <input class="form-control" type="file" id="pro_image" name="pro_image">
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div  class="col-lg-2 col-md-3 col-sm-3">
                <label for="pro_price" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"> <span class="d-sm-none d-md-inline"> Product </span> Price:</label>
            </div>
            <div class=" set col-lg-4 col-md-9 col-sm-9" >
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-money-bill"></i></div>
                    </div>
                    <input class="form-control" id="pro_price" name="pro_price" placeholder="Enter Product Price">
                </div>
            </div>
            <div style="margin-top: 15px;" class="col-lg-2 col-md-3 col-sm-3">
                <label for="pro_kw" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"><span class="d-sm-none d-md-inline"> Product </span> Keyword:</label>
            </div>
            <div class=" mt-3 mt-lg-0 col-lg-4 col-md-9 col-sm-9 set">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <input class="form-control" type="text" id="pro_kw" name="pro_kw" placeholder="Enter Product Keywords">
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div style="margin-top: 5px" class="col-lg-2 col-md-3 col-sm-3">
                <label for="pro_desc" class="float-md-right d-none d-md-inline d-lg-inline d-sm-inline"><span class="d-sm-none d-md-inline"> Product </span> Detail:</label>
            </div>
            <div class="col-lg-4 col-md-9 col-sm-9 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-comment-alt"></i></div>
                    </div>
                    <textarea class="form-control" type="file" id="pro_desc" name="pro_desc" placeholder="Enter Product Detail"></textarea>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-2 col-md-3 col-sm-3"></div>
            <div class="col-lg-4 col-md-9 col-sm-9">
                <button type="submit" name="insert_pro" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Now </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
