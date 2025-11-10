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

// const sidebar = document.querySelector('.itr-sidebar');
// const closeBtn = document.querySelector('.close-sidebar');
// const openBtn = document.createElement('div');

// openBtn.classList.add('open-sidebar');
// openBtn.innerHTML = '&#9654;'; // right arrow
// openBtn.style.display = 'none'; // hide arrow initially
// document.body.appendChild(openBtn);

// // Close sidebar (collapse it)
// closeBtn.addEventListener('click', () => {
//     sidebar.classList.add('itr-sidebar-collapsed');
//     openBtn.style.display = 'flex';  // show arrow when collapsed
// });

// // Open sidebar (expand it)
// openBtn.addEventListener('click', () => {
//     sidebar.classList.remove('itr-sidebar-collapsed');
//     openBtn.style.display = 'none';  // hide arrow when sidebar is open
// });


