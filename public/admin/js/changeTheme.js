var themeCurrent;
const btnChangeTheme = document.getElementById("btn-change-theme");
const htmlElm = document.querySelector("html");

initTheme();

function getTheme() {
    themeCurrent =
        localStorage.getItem("laravel-zingmp3-admin-theme") || "light";
    const htmlElm = document.querySelector("html");
    htmlElm.setAttribute("data-theme", themeCurrent);
}

function saveThemeToLocalStorage() {
    localStorage.setItem("laravel-zingmp3-admin-theme", themeCurrent);
}

function changeTheme() {
    themeCurrent = themeCurrent == "light" ? "dark" : "light";
    htmlElm.setAttribute("data-theme", themeCurrent);
    saveThemeToLocalStorage();
}

function initTheme() {
    getTheme();
    btnChangeTheme.addEventListener("click", (e) => {
        changeTheme();
    });
}
