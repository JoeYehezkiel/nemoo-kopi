// =====================
// CONFIG
// =====================
// Jika folder projectmu beda, ubah BASE_PATH sesuai nama folder di htdocs.
// Contoh: jika folder = "nemoo-kopi" gunakan "/nemoo-kopi"
const BASE_PATH = '/nemoo-kopi';
const API_PATH = BASE_PATH + '/create_order.php';

// =====================
// NAVBAR & HAMBURGER
// =====================
const navbarNav = document.querySelector('.navbar-nav');
const hamburger = document.querySelector('#hamburger-menu');

hamburger.addEventListener('click', (e) => {
    e.preventDefault();
    navbarNav.classList.toggle('active');
});

// =====================
// SEARCH BAR + FILTER MENU REAL-TIME
// =====================
const searchIcon = document.querySelector('#search');
const searchForm = document.querySelector('.search-form');
const searchInput = document.querySelector('#search-input');
const searchSubmit = document.querySelector('#search-submit');

searchIcon.addEventListener('click', (e) => {
    e.preventDefault();
    searchForm.classList.toggle('active');
    navbarNav.classList.remove('active');

    if (searchForm && searchForm.classList.contains('active')) {
        searchInput.focus();
    }
});

// tutup navbar & search kalau klik di luar
document.addEventListener('click', function(e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }

    if (!searchIcon.contains(e.target) && !searchForm.contains(e.target)) {
        searchForm.classList.remove('active');
    }
});

// FILTER MENU REAL-TIME
function filterMenuCards(query) {
    const cards = document.querySelectorAll('.menu-card');
    const q = query.toLowerCase();

    cards.forEach(card => {
        const title = card
            .querySelector('.menu-card-title')
            .textContent
            .toLowerCase();

        if (!q || title.includes(q)) {
            card.style.display = '';      // tampilkan
        } else {
            card.style.display = 'none';  // sembunyikan
        }
    });
}

// jalan setiap user ngetik
if (searchInput) {
    searchInput.addEventListener('input', function () {
        filterMenuCards(this.value.trim());
    });
}

// tombol "Cari" + Enter -> filter + scroll + highlight
function handleSearch() {
    const query = searchInput.value.trim();
    filterMenuCards(query);

    const q = query.toLowerCase();
    if (!q) return;

    const cards = document.querySelectorAll('.menu-card');
    let found = null;

    // hapus highlight lama
    cards.forEach(card => card.classList.remove('highlight'));

    cards.forEach(card => {
        if (card.style.display === 'none') return; // skip yang disembunyiin
        const title = card
            .querySelector('.menu-card-title')
            .textContent
            .toLowerCase();

        if (!found && title.includes(q)) {
            found = card;
        }
    });

    if (found) {
        found.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        found.classList.add('highlight');
        setTimeout(() => {
            found.classList.remove('highlight');
        }, 2500);
        searchForm.classList.remove('active');
    } else {
        alert('Menu dengan kata "' + query + '" tidak ditemukan.');
    }
}

if (searchSubmit) {
    searchSubmit.addEventListener('click', (e) => {
        e.preventDefault();
        handleSearch();
    });
}
if (searchInput) {
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleSearch();
        }
    });
}

// =====================
// CART (JS ONLY)
// =====================
const cartIcon = document.querySelector('#shopping-cart');
const cartPanel = document.querySelector('.cart-panel');
const cartItemsContainer = document.querySelector('.cart-items');
const cartCount = document.querySelector('.cart-count');
const cartTotalPriceEl = document.querySelector('#cart-total-price');
const addToCartButtons = document.querySelectorAll('.add-to-cart');
const checkoutButton = document.querySelector('.cart-checkout');

let cart = []; // global cart

function formatRupiah(num) {
    return 'Rp ' + num.toLocaleString('id-ID');
}

function renderCart() {
    if (!cartItemsContainer || !cartTotalPriceEl || !cartCount) return;

    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p style="font-size:1.3rem; opacity:0.8;">Keranjang masih kosong.</p>';
        cartTotalPriceEl.textContent = 'Rp 0';
        cartCount.classList.remove('show');
        return;
    }

    let total = 0;
    let totalQty = 0;

    cart.forEach(item => {
        total += item.price * item.qty;
        totalQty += item.qty;

        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.dataset.name = item.name;

        div.innerHTML = `
            <div class="cart-item-info">
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-qty">x${item.qty} • ${formatRupiah(item.price * item.qty)}</div>
            </div>
            <div class="cart-item-actions">
                <button class="minus">-</button>
                <button class="plus">+</button>
                <button class="remove">x</button>
            </div>
        `;

        cartItemsContainer.appendChild(div);
    });

    cartTotalPriceEl.textContent = formatRupiah(total);
    cartCount.textContent = totalQty;
    cartCount.classList.add('show');
}

function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);
    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ name, price, qty: 1 });
    }
    renderCart();
    if (cartPanel) cartPanel.classList.add('active');
}

addToCartButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const card = btn.closest('.menu-card');
        const name = card.dataset.name;
        const price = parseInt(card.dataset.price, 10);
        addToCart(name, price);
    });
});

if (cartIcon) {
    cartIcon.addEventListener('click', (e) => {
        e.preventDefault();
        if (cartPanel) cartPanel.classList.toggle('active');
        navbarNav.classList.remove('active');
        if (searchForm) searchForm.classList.remove('active');
    });
}

// tutup cart kalau klik di luar
document.addEventListener('click', function(e) {
    if (cartIcon && cartPanel && !cartIcon.contains(e.target) && !cartPanel.contains(e.target)) {
        cartPanel.classList.remove('active');
    }
}, true);

// handle plus/minus/remove
if (cartItemsContainer) {
    cartItemsContainer.addEventListener('click', (e) => {
        const itemDiv = e.target.closest('.cart-item');
        if (!itemDiv) return;

        const name = itemDiv.dataset.name;
        const item = cart.find(i => i.name === name);
        if (!item) return;

        if (e.target.classList.contains('plus')) {
            item.qty += 1;
        } else if (e.target.classList.contains('minus')) {
            item.qty -= 1;
            if (item.qty <= 0) {
                cart = cart.filter(i => i.name !== name);
            }
        } else if (e.target.classList.contains('remove')) {
            cart = cart.filter(i => i.name !== name);
        }

        renderCart();
    });
}

// =====================
// CHECKOUT -> kirim ke create_order.php
// =====================

async function sendOrderToServer(customer, cartItems) {
    // customer = { name, phone, email? }
    // cartItems = [ { name, price, qty } ]
    const payload = {
        name: customer.name,
        phone: customer.phone,
        email: customer.email || null,
        items: cartItems.map(i => ({
            name: i.name,
            qty: i.qty,
            price: i.price
        }))
    };

    try {
        const res = await fetch(API_PATH, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        // jika response bukan JSON, ini akan throw
        const data = await res.json();
        return data;
    } catch (err) {
        console.error('Network or server error:', err);
        return { success: false, error: 'Network or server error' };
    }
}

if (checkoutButton) {
    checkoutButton.addEventListener('click', async () => {
        if (cart.length === 0) {
            alert('Keranjang masih kosong.');
            return;
        }

        // simple prompts (ganti nanti dengan form modal jika mau)
        const name = prompt('Masukkan nama:');
        if (!name) { alert('Nama wajib'); return; }
        const phone = prompt('Masukkan nomor HP:');
        if (!phone) { alert('No HP wajib'); return; }

        // disable tombol sementara
        checkoutButton.disabled = true;
        checkoutButton.textContent = 'Memproses...';

        const result = await sendOrderToServer({ name, phone }, cart);

        checkoutButton.disabled = false;
        checkoutButton.textContent = 'Checkout';

        if (result && result.success) {
            alert('Order sukses!\nNomor order: ' + result.order_number + '\nTotal: Rp ' + (result.total || 0).toLocaleString('id-ID'));
            // kosongkan cart
            cart.length = 0;
            renderCart();
            if (cartPanel) cartPanel.classList.remove('active');
        } else {
            const msg = (result && result.error) ? result.error : 'Gagal menyimpan order.';
            alert('Gagal menyimpan order: ' + msg);
        }
    });
}

// =====================
// SCROLL REVEAL ANIMATION
// =====================
const revealElements = document.querySelectorAll('.reveal');

const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target); // animasi sekali saja
        }
    });
}, {
    threshold: 0.2
});

revealElements.forEach(el => {
    revealObserver.observe(el);
});

const contactForm = document.getElementById('contact-form');
const contactMsg  = document.getElementById('contact-msg');

if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        e.preventDefault(); // PENTING: cegah reload

        const formData = new FormData(contactForm);

        fetch('save_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                contactMsg.style.color = '#4caf50';
                contactMsg.textContent = 'Pesan berhasil dikirim!';
                contactForm.reset();
            } else {
                contactMsg.style.color = '#f44336';
                contactMsg.textContent = data.error || 'Gagal menyimpan data';
            }
        })
        .catch(err => {
            contactMsg.style.color = '#f44336';
            contactMsg.textContent = 'Server error';
            console.error(err);
        });
    });
}
