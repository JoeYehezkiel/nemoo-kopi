<?php
// Proses form kontak sederhana (optional)
$successMessage = '';
$errorMessage   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $nohp = htmlspecialchars($_POST['nohp'] ?? '');

    if ($nama && $email && $nohp) {
        $successMessage = "Terima kasih, $nama. Pesan kamu sudah terkirim!";
    } else {
        $errorMessage = "Mohon lengkapi semua data terlebih dahulu.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nemoo Kopi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar">
    <a href="#home" class="navbar-logo"> Nemoo<span>Kopi</span>.</a>
    <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
    </div>

    <div class="navbar-extra">
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart">
            <i data-feather="shopping-cart"></i>
            <span class="cart-count">0</span>
        </a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>

<!-- Search Form -->
<div class="search-form" aria-hidden="true">
    <input type="text" id="search-input" placeholder="Cari menu atau kata...">
    <button type="button" id="search-submit">Cari</button>
</div>

<!-- Hero -->
<section class="hero" id="home">
    <main class="content reveal">
        <h1>Ayo Menikmati Segelas <span>Kopi</span></h1>
        <p>NemooKopi adalah tempat sederhana yang menyajikan berbagai jenis minuman kopi dan camilan ringan,</p>
        <a href="#menu" class="cta">Beli Sekarang</a>
    </main>   
</section>

<!-- About -->
<section id="about" class="about">
    <h2 class="reveal"><span>Tentang</span> Kami</h2>

    <div class="row reveal">
        <div class="about-img">
            <img src="img/tentang-kami.jpg" alt="Tentang Kami">
        </div>
        <div class="content">
            <h3>Kenapa Memilih Kopi Kami?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio architecto excepturi, debitis harum dolor sesuatu.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque dolores unde temporibus illo velit aperiam! Veritatis consequatur praesentium deleniti culpa!</p>
        </div>
    </div>
</section>

<!-- Menu -->
<section id="menu" class="menu">
    <h2 class="reveal"><span>Menu</span>Kami</h2>
    <p class="reveal">Minuman dan makanan favorit pilihan pelanggan Nemoo Kopi.</p>

    <div class="row reveal">

        <!-- MENU 1 - 8 (LAMA) -->
        <div class="menu-card" data-name="Espresso" data-price="18000">
            <img src="img/menu/1.jpg" class="menu-card-img" alt="Espresso">
            <h3 class="menu-card-title">Espresso</h3>
            <p class="menu-card-price">IDR 18K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Coffee Latte" data-price="24000">
            <img src="img/menu/2.jpg" class="menu-card-img" alt="Coffee Latte">
            <h3 class="menu-card-title">Coffee Latte</h3>
            <p class="menu-card-price">IDR 24K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Macchiato" data-price="28000">
            <img src="img/menu/3.jpg" class="menu-card-img" alt="Macchiato">
            <h3 class="menu-card-title">Macchiato</h3>
            <p class="menu-card-price">IDR 28K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Mango Tea" data-price="16000">
            <img src="img/menu/4.jpg" class="menu-card-img" alt="Mango Tea">
            <h3 class="menu-card-title">Mango Tea</h3>
            <p class="menu-card-price">IDR 16K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Lemon Tea" data-price="16000">
            <img src="img/menu/5.jpg" class="menu-card-img" alt="Lemon Tea">
            <h3 class="menu-card-title">Lemon Tea</h3>
            <p class="menu-card-price">IDR 16K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Jasmine Tea" data-price="15000">
            <img src="img/menu/6.jpg" class="menu-card-img" alt="Jasmine Tea">
            <h3 class="menu-card-title">Jasmine Tea</h3>
            <p class="menu-card-price">IDR 15K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Chocolate" data-price="27000">
            <img src="img/menu/7.jpg" class="menu-card-img" alt="Chocolate">
            <h3 class="menu-card-title">Chocolate</h3>
            <p class="menu-card-price">IDR 27K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Matcha" data-price="26000">
            <img src="img/menu/8.jpg" class="menu-card-img" alt="Matcha">
            <h3 class="menu-card-title">Matcha</h3>
            <p class="menu-card-price">IDR 26K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <!-- MENU BARU 9 - 25 -->
        <div class="menu-card" data-name="Caramel Macchiato" data-price="30000">
            <img src="img/menu/9.jpg" class="menu-card-img" alt="Caramel Macchiato">
            <h3 class="menu-card-title">Caramel Macchiato</h3>
            <p class="menu-card-price">IDR 30K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Aren Latte" data-price="26000">
            <img src="img/menu/10.jpg" class="menu-card-img" alt="Aren Latte">
            <h3 class="menu-card-title">Aren Latte</h3>
            <p class="menu-card-price">IDR 26K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Hibiscus Ice Tea" data-price="20000">
            <img src="img/menu/11.jpg" class="menu-card-img" alt="Hibiscus Ice Tea">
            <h3 class="menu-card-title">Hibiscus Ice Tea</h3>
            <p class="menu-card-price">IDR 20K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Rainbow Bubble Tea" data-price="24000">
            <img src="img/menu/12.jpg" class="menu-card-img" alt="Rainbow Bubble Tea">
            <h3 class="menu-card-title">Rainbow Bubble Tea</h3>
            <p class="menu-card-price">IDR 24K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Butterscotch Milk" data-price="23000">
            <img src="img/menu/13.jpg" class="menu-card-img" alt="Butterscotch Milk">
            <h3 class="menu-card-title">Butterscotch Milk</h3>
            <p class="menu-card-price">IDR 23K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Strawberry Milkshake" data-price="25000">
            <img src="img/menu/14.jpg" class="menu-card-img" alt="Strawberry Milkshake">
            <h3 class="menu-card-title">Strawberry Milkshake</h3>
            <p class="menu-card-price">IDR 25K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Americano" data-price="20000">
            <img src="img/menu/15.jpg" class="menu-card-img" alt="Americano">
            <h3 class="menu-card-title">Americano</h3>
            <p class="menu-card-price">IDR 20K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Gyoza" data-price="22000">
            <img src="img/menu/16.jpg" class="menu-card-img" alt="Gyoza">
            <h3 class="menu-card-title">Gyoza</h3>
            <p class="menu-card-price">IDR 22K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Nasi Goreng" data-price="28000">
            <img src="img/menu/17.jpg" class="menu-card-img" alt="Nasi Goreng">
            <h3 class="menu-card-title">Nasi Goreng</h3>
            <p class="menu-card-price">IDR 28K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Artisan Brownies" data-price="22000">
            <img src="img/menu/18.jpg" class="menu-card-img" alt="Artisan Brownies">
            <h3 class="menu-card-title">Artisan Brownies</h3>
            <p class="menu-card-price">IDR 22K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Red Velvet Cake" data-price="24000">
            <img src="img/menu/19.jpg" class="menu-card-img" alt="Red Velvet Cake">
            <h3 class="menu-card-title">Red Velvet Cake</h3>
            <p class="menu-card-price">IDR 24K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="French Fries" data-price="18000">
            <img src="img/menu/20.jpg" class="menu-card-img" alt="French Fries">
            <h3 class="menu-card-title">French Fries</h3>
            <p class="menu-card-price">IDR 18K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Iced Cendol" data-price="18000">
            <img src="img/menu/21.jpg" class="menu-card-img" alt="Iced Cendol">
            <h3 class="menu-card-title">Iced Cendol</h3>
            <p class="menu-card-price">IDR 18K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Crispy Combo Platter" data-price="32000">
            <img src="img/menu/22.jpg" class="menu-card-img" alt="Crispy Combo Platter">
            <h3 class="menu-card-title">Crispy Combo Platter</h3>
            <p class="menu-card-price">IDR 32K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Katsu Rice" data-price="30000">
            <img src="img/menu/23.jpg" class="menu-card-img" alt="Katsu Rice">
            <h3 class="menu-card-title">Katsu Rice</h3>
            <p class="menu-card-price">IDR 30K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Pizza Slices" data-price="27000">
            <img src="img/menu/24.jpg" class="menu-card-img" alt="Pizza Slices">
            <h3 class="menu-card-title">Pizza Slices</h3>
            <p class="menu-card-price">IDR 27K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

        <div class="menu-card" data-name="Signature Burger" data-price="35000">
            <img src="img/menu/25.jpg" class="menu-card-img" alt="Signature Burger">
            <h3 class="menu-card-title">Signature Burger</h3>
            <p class="menu-card-price">IDR 35K</p>
            <button class="add-to-cart">Tambah</button>
        </div>

    </div>
</section>

<!-- Contact -->
<section id="contact" class="contact">
    <h2 class="reveal"><span>Kontak</span> Kami</h2>
    <p class="reveal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, repellat.</p>

    <div class="row reveal">
    <iframe
  class="map"
  src="https://www.google.com/maps?q=Kota+Semarang&output=embed"
  allowfullscreen
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
 
        
<form id="contact-form">
    <div class="input-group">
        <i data-feather="user"></i>
        <input type="text" name="nama" placeholder="Nama">
    </div>

    <div class="input-group">
        <i data-feather="mail"></i>
        <input type="email" name="email" placeholder="Email">
    </div>

    <div class="input-group">
        <i data-feather="phone"></i>
        <input type="text" name="nohp" placeholder="No Hp">
    </div>

    <div class="input-group">
        <i data-feather="message-square"></i>
        <input type="text" name="pesan" placeholder="Pesan">
    </div>

    <button type="submit" class="btn">Kirim Pesan</button>
    <p id="contact-msg"></p>
</form>
    </div>
</section>

<!-- Cart Panel -->
<div class="cart-panel" aria-hidden="true">
    <h3>Keranjang</h3>
    <div class="cart-items"></div>

    <div class="cart-total">
        <span>Total:</span>
        <span id="cart-total-price">Rp 0</span>
    </div>

    <button type="button" class="cart-checkout">Checkout</button>
</div>

<!-- Footer -->
<footer>
    <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
    </div>
    <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
        <p>Created by <a href="">Kelompok 3</a> | &copy; 2025. </p>
    </div>
</footer>

<script>
  feather.replace();
</script>

<!-- SATU-SATUNYA SCRIPT CHECKOUT -->
<script src="js/script.js"></script>

</body>
</html>