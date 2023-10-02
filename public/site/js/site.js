const URL_WEB = document.querySelector('meta[name="root-url"]').dataset.index;
const ID_NOTIFICATION = "notification";
const _idUser = document.getElementById('_id-user');

var closeNotificationId = null;
// addNotification('notification','toanf',10000);

function setStringAction(action, strStrong, messPlus = "") {
    return `Bạn đã ${action} <strong>${strStrong}</strong> ${messPlus}`;
}
// notification
function addNotification(id, mess, time = 2000) {
    if (closeNotificationId) {
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

// Hàm tạo chuỗi số ngẫu nhiên với độ dài xác định
function generateRandomNumberString(length) {
    let result = "";
    for (let i = 0; i < length; i++) {
        const randomDigit = Math.floor(Math.random() * 10); // Sinh số ngẫu nhiên từ 0 đến 9
        result += randomDigit.toString(); // Chuyển đổi số thành chuỗi và thêm vào chuỗi kết quả
    }
    return result;
}

//
function createItemSongPlaySidebar(song,stastus=null) {
    console.log(song);
    const itemSong = document.createElement('div');
    let strHTML=`<i class="fa-solid fa-play "></i>
                <i class="fa-regular fa-circle-pause fa-spin hidden"></i>`
    itemSong.classList.add('item-song');
    if(stastus !== null) {
        strHTML=`<i class="fa-solid fa-play hidden"></i>
                <i class="fa-regular fa-circle-pause fa-spin "></i>`
        itemSong.classList.add(stastus);
    }
    
    const wrapper = document.createElement("div");
    wrapper.classList.add("item-song-wrapper");
    wrapper.innerHTML = `<div class="item-song-content">
                            <div class="song-thumb">

                                <img src="${song.thumbnail}" alt="">
                                <button class="song-thumb-action" onclick="playSongById('${song.id}')">
                                    ${strHTML}

                                </button>
                            </div>
                            <div class="song-info">
                                <a class="song-info-name"><span>${song.name}</span></a>
                                <a href="${URL_WEB}/nghe-si/${song.slug_artist}" class="song-info-astist"><span>${song.name_artist}<i class="fa-solid fa-star"></i></span></a>
                            </div>
                            <div class="song-action">
                                <button class="item-actions" onclick="deleteSongFromList('${song.id}')">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                        </div>`;
    itemSong.appendChild(wrapper);

    if(stastus !== null){
        const foorterElm = document.createElement('div');
        foorterElm.classList.add('item-song-footer');
        foorterElm.innerHTML=`<p>Tiếp theo</p>`;
        itemSong.appendChild(foorterElm);
    }
    
    return itemSong;
}

function secondToMinute(second){
    const minutes =Math.floor(second/60);
    const secondLeft = Math.floor(second - minutes*60);
    const str = String(minutes).padStart(2, '0').slice(0, 2) +':'+ String(secondLeft).padStart(2, '0').slice(0, 2);
    return str;
}


