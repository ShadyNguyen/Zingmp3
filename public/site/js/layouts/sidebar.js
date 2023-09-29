const addPlayListSideBar = document.getElementById("add-play-list-sidebar");

if (addPlayListSideBar) {
    addPlayListSideBar.addEventListener("click", (e) => {
        toggleAddPlayList(true);
    });
}