const URL_WEB = document.querySelector('meta[name="root-url"]').dataset.index;
const ID_NOTIFICATION = "notification";

var closeNotificationId = null;
// addNotification('notification','toanf',10000);

function setStringAction(action,strStrong,messPlus=''){
    return `Bạn đã ${action} <strong>${strStrong}</strong> ${messPlus}`
}
// notification
function addNotification(id, mess, time = 2000) {
    if(closeNotificationId){
        clearTimeout(closeNotificationId);
    }

    const notiElm = document.getElementById(id);
    notiElm.querySelector("p").innerHTML = mess;
    document.getElementById(id).classList.remove("hidden");
    closeNotificationId = setTimeout(() => {
        closeNotification(id);
    }, time);
}

function closeNotification(id) {
    
    document.getElementById(id).classList.add("hidden");
}

// sidebar
const closeOverlay = () => {
    // this.preventDefault();
    document.querySelector("aside").classList.remove("hidden");
    document
        .querySelector(".bg-overlay")
        .classList.remove("bg-overlay-sidebar");
};

function toggleSidebar(show) {
    if (show) {
        document.querySelector("aside").classList.add("hidden");
        document
            .querySelector(".bg-overlay")
            .classList.add("bg-overlay-sidebar");
        document
            .querySelector(".bg-overlay-sidebar")
            .addEventListener("click", closeOverlay);
    } else {
        document
            .querySelector(".bg-overlay-sidebar")
            .removeEventListener("click", closeOverlay);
        closeOverlay();
    }
}

//add play list
const modalAddPlayList = new bootstrap.Modal(
    document.getElementById("modal-add-play-list"),
    {
        keyboard: false,
    }
);
function toggleAddPlayList(show) {
   
    if (show) {
        
        modalAddPlayList.show();
    } else {
        
        modalAddPlayList.toggle();

    }
}

//even show add play list
const elmAdds = document.querySelectorAll(".add-play-list-show");
for (const elm of elmAdds) {
    elm.addEventListener("click", (e) => {
        toggleAddPlayList(true);
    });
}

//even show playlist sidebar
const togglePlayMusicSidebarElm = document.querySelector(
    "#toggle-play-music-sidebar"
);
const playMusicSidebarElm = document.querySelector("#playlist-aside");
togglePlayMusicSidebarElm.addEventListener("click", (e) => {
    playMusicSidebarElm.classList.toggle("hidden");
    togglePlayMusicSidebarElm.classList.toggle("active");
});

//show tooltip
let tooltipelements = document.querySelectorAll(
    "[data-bs-toggle-tooltip='tooltip']"
);
tooltipelements.forEach((el) => {
    new bootstrap.Tooltip(el);
});


