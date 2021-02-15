<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio/catalog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fonts.css">
    <link rel="SHORTCUT ICON" href="img/logos.png" type="image/png">
</head>
<body>
    <div class="container">
        <header class="header catalog-header">
            <div class="head catalog-head">
                <div class="logo">
                    <a href="#" class="logo-icon"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="56" viewBox="0 0 64 56">
                            <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" />
                            <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" /></svg></a>
                    <a href="#" class="logo-title"><span class="logo_name">Waxom</span></a>
                </div>
                <nav>
                    <a href="#">Home</a>
                    <a href="#" class="nav-active">Catalog</a>
                    <a href="reviews.php">Reviews</a>
                    <?php
                    if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                        echo "<a href='login.php?action=profile'>Personal account</a>";
                        echo "<a href='login.php?action=logout'>Log out</a><span class='test'>( ".$_SESSION['login']." )</span>";
                        echo "<a href='order.php'>Order</a>";
                    }else{
                        echo "<a href='login.php'>Log in</a>";
                        echo "<a href='registration.php'>Registration</a>";
                    }
                    if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login'] == 'admin') {
                        ?>
                        <a href="../admin/">For admin</a>
                    <?}?>
                </nav>
                <?php
                include_once "cart.php";
                ?>
            </div>
        </header>
        <section class="progects">
            <div class="progects-head">
                <h1 class="progects-title">Here you can check and buy our products.</h1>
            </div>
                <div class="progects-blocks">
                    <?= include_once "../server/product.php"?>
                </div>
        </section>
        <? include "templates/companies.php"?>
        <? include "templates/information.php"?>
        <? include "templates/footer.php"?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
            integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"
            crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>
</html>