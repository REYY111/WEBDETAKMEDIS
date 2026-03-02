// script.js

// URL halaman login
const loginURL = "index.html"; // ganti dengan path halaman loginmu

// Fungsi untuk memulai transisi fade dan pindah halaman
function goToLogin() {
    // Tambahkan efek fade ke body
    document.body.style.transition = "opacity 0.5s ease";
    document.body.style.opacity = "0";

    // Setelah 500ms (sama dengan durasi fade), pindah halaman
    setTimeout(() => {
        window.location.href = loginURL;
    }, 500);
}

// Tambahkan event listener klik ke seluruh halaman
document.addEventListener("click", goToLogin);
