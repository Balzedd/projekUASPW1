document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const navItems = document.querySelectorAll(".nav-item");

    // Toggle sidebar
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
        });
    }

    // Highlight menu aktif
    navItems.forEach((item) => {
        item.addEventListener("click", function () {
            navItems.forEach((i) => i.classList.remove("active"));
            this.classList.add("active");
        });
    });
});