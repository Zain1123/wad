<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from categories";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='nav-link'  href='#'>$cat_title</a></li>";
    }
}
function getBrands(){
    global $con;
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li><a class='nav-link'  href='#'>$brand_title</a></li>";
    }
}
function display_tech()
{
    global $con;
    $getproductQuery = "select * from products";
    $getproductResult = mysqli_query($con, $getproductQuery);
    while ($row = mysqli_fetch_assoc($getproductResult)) {
        $img =$row['pro_image'];
        $title = $row['pro_title'];
        $cat = $row['pro_cat'];
        $brand = $row['pro_brand'];
        $price = $row['pro_price'];
        $keyword = $row['pro_keywords'];
        $detail = $row['pro_desc'];

        echo "<div class='col-lg-4'> $title $cat $brand $price $detail $keyword</div>";
    }
}