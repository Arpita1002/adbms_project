<?php
include('database.php');
session_start(); // Start session to check user login status

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch the userid
$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE user_id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-commerce Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,200&family=Poppins:ital,wght@0,400;1,200;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
        <div class="navbar">
            <div class="logo">
                <img src="images/Logo.png" width="100px">
            </div>
            <div class="search">
                <form action="/search" method="GET">
                    <input type="text" placeholder="Search..." name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            
            <nav >
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="cart.php">CART</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li class="dropdown">
                        <a class="dropbtn">PRODUCTS</a>
                        <div class="dropdown-content">
                        <a href="Kajal.php">Kajal</a>
                                <a href="Eyeliner.php">Eyeliner</a>
                                <a href="Eyeshadow.php">Eyeshadow</a>
                                <a href="Eyebrow.php">Eyebrow</a>
                                <a href="Mascara.php">Mascara</a>
                                <a href="Foundation.php">Foundation</a>
                                <a href="Concealer.php">Concealer</a>
                                <a href="FaceP.php">Face Powder</a>
                                <a href="Blush.php">Blush</a>
                                <a href="Highlighter.php">Highlighter</a>
                                <a href="Bronzer.php">Bronzer</a>
                                <a href="Contour.php">Contour</a>
                                <a href="Primer.php">Primer</a>
                                <a href="Lipstick.php">Lipstick</a>
                                <a href="LipG.php">Lip Gloss</a>
                                <a href="LipB.php">Lip Balm</a>
                                <a href="Moisturizer.php">Moisturizer</a>
                                <a href="Sunscreen.php">Sunscreen</a>
                                <a href="FaceW.php">Face Wash</a>
                                <a href="Cleanser.php">Cleanser</a>

                        </div>
                    </li>
                    <li><a href="account.php">ACCOUNT</a></li>
                </ul>
            </nav>
    </div>
    <div>
                <p>Pretty U</p align="center">
            </div>
</div>
<!------ featured categories ------>
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="images/category-1.jpg">
            </div>
            <div class="col-3">
                <img src="images/category-1.jpg">
            </div>
            <div class="col-3">
                <img src="images/category-1.jpg">
            </div>
        </div>
    </div>
</div>
<!-- Featured Products with Horizontal Scroll -->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="product-container">
        <div class="scrollable">
            <div class="row">
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/8-Mascara-post-6-Black_1.jpeg">
                        <h4><a href="p1.php">Malhotra Mascara Black</a></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 500</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/1000008983403-1000008977917_01-2100.jpg" >
                        <h4><a href="p2.php">Nykaa Skinshield Anti-Pollution Foundation</a></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 300</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/image_510aa139-4755-4b4e-976a-4c73e23d9066_1024x1024@2x.webp">
                        <h4>ColourPop Going Coconuts Nude Eyeshadow Pallette</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 645</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/Untitled3.jpg">
                        <h4>Plum Soft Blend Liquid Concealer</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 410</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/product-hugerect-3342277-442660-1687241868-89b2415d33aca6892e862b5d47598cff.jpg">
                        <h4>13 Pieces Makeup Brush Set</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 200</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/MSF001_4.webp">
                        <h4>Mul Secrets Skin Firming Face Mask</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 350</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest Products with Horizontal Scroll -->
<div class="small-container">
    <h2 class="title">Latest Products</h2>
    <div class="product-container">
        <div class="scrollable">
            <div class="row">
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/Untitled.jpg">
                        <h4>Beauty In Everything Superpower Eternal Youth Cream</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 2900</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/image1_6af4ffa3-8b6c-4495-a3d0-a19006cc82d8_800x.webp">
                        <h4>Sweet Dreams Peach Lip Mask</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 1300</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/the-face-shop-glow-starter-kit.webp">
                        <h4>Rice Water Bright Foaming Face Wash</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 750</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/2.webp">
                        <h4>Beauty In Everything Vin Rouge Resurfacing Mask</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 1700</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/everglowfacewashtonerserum-2.webp">
                        <h4>Bio:cule Everglow Foaming Face Wash</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 350</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="product-item">
                        <img src="images/Untitled1.jpg" height="493" width="520">
                        <h4>The Skin Pantry Vanilla Bean Drench Face Moisturizer + Smoothie Face Wash</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>Rs 2200</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
