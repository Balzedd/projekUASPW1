document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.getElementById("toggleBtn");
  const sidebar = document.getElementById("sidebar");
  const navItems = document.querySelectorAll(".nav-item");
 
  // Toggle sidebar (buka/tutup)
  toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
  });
 
  // Highlight menu aktif saat diklik
  navItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();
      navItems.forEach((i) => i.classList.remove("active"));
      item.classList.add("active");
 
      // TODO: arahkan ke halaman/section sesuai data-page
      const page = item.getAttribute("data-page");
      console.log("Navigasi ke:", page);
    });
  });
});