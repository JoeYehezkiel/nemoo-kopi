# ☕ NemooKopi

NemooKopi adalah website coffee shop modern yang dikembangkan menggunakan HTML5, CSS3, JavaScript, PHP Native, dan MySQL. Website ini menyediakan katalog menu makanan dan minuman, fitur keranjang belanja (shopping cart), sistem checkout yang terintegrasi dengan database, serta form kontak untuk menerima pesan dari pelanggan.

---

## 🚀 Fitur Utama

### 🏠 Landing Page
- Hero Section interaktif
- Informasi tentang NemooKopi
- Desain modern dan responsif

### 📋 Menu Produk
- Menampilkan berbagai menu makanan dan minuman
- Gambar produk
- Harga produk
- Efek hover interaktif
- Fitur pencarian menu

### 🛒 Shopping Cart
- Menambahkan produk ke keranjang
- Mengurangi dan menambah jumlah item
- Menghapus item dari keranjang
- Perhitungan total harga otomatis
- Badge jumlah item pada ikon keranjang

### 💳 Checkout System
- Input nama pelanggan
- Input nomor telepon
- Pembuatan nomor order otomatis
- Penyimpanan data pesanan ke database
- Penyimpanan detail item pesanan

### 📞 Contact Form
- Input nama pelanggan
- Input email
- Input nomor telepon
- Input pesan
- Penyimpanan pesan ke database MySQL

### 🔍 Search Feature
- Pencarian menu berdasarkan nama
- Highlight hasil pencarian

### 📱 Responsive Design
- Desktop
- Tablet
- Mobile Device

---

## 🛠️ Teknologi yang Digunakan

### Frontend
- HTML5
- CSS3
- JavaScript (Vanilla JS)

### Backend
- PHP Native

### Database
- MySQL
- phpMyAdmin

### Library
- Feather Icons

---

## 📂 Struktur Folder

```plaintext
nemookopi/
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── img/
│   ├── header-bg.jpg
│   ├── tentang-kami.jpg
│   └── menu/
│       ├── 1.jpg
│       ├── 2.jpg
│       ├── 3.jpg
│       └── ...
│
├── config.php
├── create_order.php
├── save_contact.php
├── index.php
└── README.md
```

---

## 🗄️ Database Structure

### Table: orders

```sql
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(50),
    customer_name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Table: order_items

```sql
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    item_name VARCHAR(100),
    price INT,
    qty INT,
    subtotal INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Table: contacts

```sql
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## ⚙️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/nemookopi.git
```

### 2. Pindahkan ke Folder XAMPP

```plaintext
C:\xampp\htdocs\nemookopi
```

### 3. Buat Database

Buka phpMyAdmin:

```plaintext
http://localhost/phpmyadmin
```

Buat database:

```sql
CREATE DATABASE nemoo_kopi;
```

Kemudian import tabel yang diperlukan.

### 4. Konfigurasi Database

Edit file:

```php
config.php
```

Contoh konfigurasi:

```php
<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "nemoo_kopi"
);

if (!$conn) {
    die("Koneksi database gagal.");
}
```

### 5. Jalankan Project

Aktifkan Apache dan MySQL melalui XAMPP, lalu buka:

```plaintext
http://localhost/nemookopi
```

---

## 📸 Fitur yang Telah Diimplementasikan

- ✅ Landing Page
- ✅ About Section
- ✅ Menu Section
- ✅ Shopping Cart
- ✅ Checkout System
- ✅ Order Database Integration
- ✅ Contact Form
- ✅ Contact Database Integration
- ✅ Search Menu
- ✅ Responsive Design

---

## 👨‍💻 Tim Pengembang

| Nama | Peran |
|--------|--------|
| Joe Yehezkiel | Frontend Developer, Backend Developer, Database Integration |
| Raichan Dimas | Frontend Developer, UI/UX Designer |

---

## 🎓 Tujuan Project

Project NemooKopi dibuat sebagai implementasi pembelajaran pengembangan website fullstack menggunakan:

- HTML5
- CSS3
- JavaScript
- PHP Native
- MySQL

serta untuk memahami integrasi frontend, backend, dan database dalam sebuah aplikasi web sederhana.

---

## 📄 License

MIT License © 2025

Developed with ☕ by **Joe Yehezkiel** & **Raichan Dimas**
