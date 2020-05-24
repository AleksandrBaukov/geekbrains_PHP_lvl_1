<?php include_once "../server/user.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio/reviews</title>
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
                <a href="index.php">Catalog</a>
                <a href="reviews.php">Reviews</a>
                <?php
                if(isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    echo "<a href='login.php?action=profile'>Personal account</a>";
                    echo "<a href='login.php?action=logout'>Log out</a>(".$_SESSION['login'].")";
                }else{
                    echo "<a href='login.php' class=\"nav-active\">Log in</a>";
                    echo "<a href='registration.php'>Registration</a>";
                }
                if(isset($_SESSION['login']) && isset($_SESSION['pass']) && $_SESSION['login'] == 'admin') {
                    ?>
                    <a href="../admin/">For admin</a>
                <?}?>
            </nav>
            <div class="head-icons">
                <div>
                    <button class="icon-cart" type="button" ><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                            <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" />
                            <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" /></svg>
                    </button>
                    <div class="cart-block invisible">
                        <p>Cart is empty</p>

                        <span class="counter">Items in Cart : <span class="counter-item">{{ counter }}</span></span>
                        <span class="priceCounter">Total amount : <span class="priceCounter-item">{{ priceCounter }} $</span></span>
                    </div>
                </div>
                <form action="#" class="head-form">
                    <input type="search" placeholder="search">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </header>
    <section class="login">
        <?
        if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
            echo "Welcome ".$_SESSION['login']." !";
        }else{
            echo "<h1>Log in</h1><hr>";
            echo $message?$message:"";
            ?>
            <form method="post">
                <p>Login: <input type="text" name="login" maxlength="30" placeholder="Enter login" autofocus required></p>
                <p>Пароль: <input type="password" minlength="2" name="pass" placeholder="Enter password" required></p>
                <input type="submit" name="enter" value="Login" ">
            </form>
        <?}?>
    </section>

    <? include "templates/companies.php"?>
    <? include "templates/information.php"?>
    <? include "templates/footer.php"?>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
        integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"
        crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>
</html>