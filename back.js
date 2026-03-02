// ===============================
// UNIVERSAL BACK BUTTON
// ===============================

document.addEventListener("DOMContentLoaded", () => {

  // buat tombol
  const backBtn = document.createElement("button");
  backBtn.innerText = "←";
  backBtn.className = "universal-back-btn";

  // fungsi back
  backBtn.onclick = () => {
    window.history.back();
  };

  // masukin ke body
  document.body.appendChild(backBtn);
});
