document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");
    const overlay = document.getElementById("navOverlay");

    if (toggle && menu && overlay) {
        toggle.addEventListener("click", () => {
            menu.classList.toggle("show");
            overlay.classList.toggle("show");
        });

        // Close menu if overlay is clicked
        overlay.addEventListener("click", () => {
            menu.classList.remove("show");
            overlay.classList.remove("show");
        });
    }
});



