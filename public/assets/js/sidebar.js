const sidebarparent = document.querySelector(".sidebar-parent");
const navigationbtn = document.querySelector(".mobile-nav");

navigationbtn.addEventListener('click', () => {

    if (sidebarparent.style.display === 'block') {
        sidebarparent.style.display = '';
        navigationbtn.innerText = 'Navigation';
        return;
    }
    sidebarparent.style.display = 'block';
    navigationbtn.innerText = 'Close';
});