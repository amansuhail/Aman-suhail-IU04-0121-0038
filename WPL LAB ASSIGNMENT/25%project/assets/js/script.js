function showPage(page) {
    document.querySelectorAll(".page").forEach(p => p.style.display = "none");
    document.getElementById(page).style.display = "block";
}

function toggleSubmenu(id) {
    let menu = document.getElementById(id);
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}
