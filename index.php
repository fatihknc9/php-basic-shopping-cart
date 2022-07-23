<?php
require "product-data.php"; //PRODUCTS
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>BASIC SHOPPING CART</title>
</head>
<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Basic Shopping Cart App /php</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto pl-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Products <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Shopping Cart <span class="text-success shoppingCartNumber">(0)</span></a>
                    </li>
                </ul>
                <span class="navbar-text"><a href="https://github.com/ramfiles">Ramfiles</a></span>
            </div>
        </nav>

        <div class="jumbotron jumbotron-fluid bg-white">
            <div class="container">
                <h1 class="display-4">Homepage - Products</h1>
                <p class="lead">This is the homepage. Here is the product list.</p>
            </div>
        </div>

        <div class="row col-md-12">
            <?php foreach ($products as $key => $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <?= $product["title"] ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product["sub_title"] ?></h5>
                        <p class="card-text"><?= $product["content"] ?></p>
                        <?php if (isset($_COOKIE["product"]) && isset($_COOKIE["product"][$key])): ?>
                            <a onclick="addBasket(<?=$key?>)" class="btn btn-danger text-white basketBtn">remove from Basket</a>
                        <?php else: ?>
                            <a onclick="addBasket(<?=$key?>)" class="btn btn-success text-white basketBtn">add to Basket</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>

    <script>

        function addBasket(id)
        {
            $.ajax({
                type: "POST",
                url: "addBasket.php",
                data: {"id": id},
                dataType: "json",
                success: function(response){
                }
            });
            $(this).html("Edit");
        }

        $(document).ready(function(){
           $(".basketBtn").click(function(e){
              if ($(this).hasClass("btn btn-success text-white basketBtn"))
              {
                  $(this).removeClass("btn btn-success text-white basketBtn");
                  $(this).addClass("btn btn-danger text-white basketBtn");
                  $(this).html("remove from Basket");
              } else {
                  $(this).removeClass("btn btn-danger text-white basketBtn");
                  $(this).addClass("btn btn-success text-white basketBtn");
                  $(this).html("add to Basket");
              }
           });
        });

        function getData()
        {
            $.ajax({
                type: "POST",
                url: "getData.php",
                success: function(e){
                    if (!e){
                        e = 0;
                    }
                    $(".shoppingCartNumber").html("(" + e + ")");
                }
            });
        }

        setInterval("getData()", 1000);

    </script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>