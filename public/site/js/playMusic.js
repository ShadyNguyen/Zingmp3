var listSongPlay = getListOfSongs();
var audioElm = document.getElementById('elm-audio');

const btnRepeatList = document.getElementById('btn-repeat-list');
const btnPrevSong = document.getElementById('btn-prev-song');
const btnNextSong = document.getElementById('btn-next-song');
const btnPauseSong = document.getElementById('btn-pause-song');
const btnRandomList = document.getElementById('btn-random-list');
const valueVolume = document.getElementById('volume');
const toogleVolumeBtn = document.getElementById('toggle-volume');

const leftTimeLine = document.getElementById('left-time-line');
const rightTimeLine = document.getElementById('right-time-line');

const timelineCurrentElm = document.getElementById('progres-music');

let lastValueVolume = valueVolume.value;

// const playingMusic ={
//     currentSongId: 
// }


toogleVolumeBtn.addEventListener('change', (e) => {
    if (toogleVolumeBtn.checked) {
        lastValueVolume = valueVolume.value;
        valueVolume.value = 0;
    } else {
        valueVolume.value = lastValueVolume;
    }
})




// if (listSongPlay.length < 1){
//     document.querySelector('.wrapper-play-music').classList.add('none');
//     document.querySelector('aside').classList.add('full');
// }

// Hàm để lấy danh sách bài hát từ local storage
function getListOfSongs() {
    const storedListSongJSON = localStorage.getItem("listSong");
    const storedListSong = JSON.parse(storedListSongJSON) || [];
    return storedListSong;
}

// Hàm để thêm một bài hát mới vào danh sách
function addSong(song) {
    const listSong = getListOfSongs();
    
    const listSongJSON = JSON.stringify(listSong);
    localStorage.setItem("listSong", listSongJSON);
}

// Hàm để thêm nhiều bài hát mới vào danh sách
function addSong(songs) {
    const listSong = getListOfSongs();
    listSong = [...listSong, songs];
    const listSongJSON = JSON.stringify(listSong);
    localStorage.setItem("listSong", listSongJSON);
}

// Hàm để xóa một bài hát khỏi danh sách dựa trên vị trí
function deleteSong(index) {
    const listSong = getListOfSongs();
    if (index >= 0 && index < listSong.length) {
        listSong.splice(index, 1);
        const listSongJSON = JSON.stringify(listSong);
        localStorage.setItem("listSong", listSongJSON);
    }
}

//Hàm để set lại danh sách phát
function replaceSongs(newSongs) {
    localStorage.setItem("listSong", newSongs);
}