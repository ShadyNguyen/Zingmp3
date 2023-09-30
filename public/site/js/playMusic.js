let listSong = [];
let listSongRandom = [];

let options = {};
//elm audio
const audioElm = document.getElementById("elm-audio");
const nameSongElm = document.getElementById('play-music-name-active');
const avatarSongElm = document.getElementById('play-music-img-active');
const nameArtistSongElm = document.getElementById('play-music-name--artist-active');
const leftTimeLineElm = document.getElementById("left-time-line");
const rightTimeLineElm = document.getElementById("right-time-line");


const btnRepeatList = document.getElementById("btn-repeat-list");
const btnPrevSong = document.getElementById("btn-prev-song");
const btnNextSong = document.getElementById("btn-next-song");
const btnPauseSong = document.getElementById("btn-pause-song");
const btnRandomList = document.getElementById("btn-random-list");

const timelineCurrentElm = document.getElementById("progres-music");


//elm options
const valueVolume = document.getElementById("volume");
const toogleVolumeBtn = document.getElementById("toggle-volume");

//funcition init
getListSongLocalStorage();
getOptionLocalStorage();
renderSidebarMusic();

audioElm.volume = options.volumesValue/100;
valueVolume.value = options.volumesValue;
toogleVolumeBtn.checked = options.isMute;
if(options.isMute){
    valueVolume.value = 0;
}
if(options.isRandomList){
    btnRandomList.classList.add('active');
}
timelineCurrentElm.value = options.currentTime/options.currentSong.duration*100 || 0;

// if (listSongPlay.length < 1){
//     document.querySelector('.wrapper-play-music').classList.add('none');
//     document.querySelector('aside').classList.add('full');
// }

//Lấy danh sách phát từ local storage
function getListSongLocalStorage() {
    // Lấy chuỗi JSON từ Local Storage bằng khóa (key)
    const listSongStorage = localStorage.getItem("listSong");
    const listSongRandomStorage = localStorage.getItem("listSongRandom");

    listSong = JSON.parse(listSongStorage) || [];
    listSongRandom = JSON.parse(listSongRandomStorage) || listSong;
}

//function render sidebar splay music

function renderSidebarMusic() {
    const playListAside = document.getElementById('playlist-aside-content');
    playListAside.innerHTML='';
    let listRender = [];
    if (options.isRandomList){
        listRender = listSongRandom;
    }else{
        listRender = listSong;
    }
    for(let i = 0; i < listRender.length; i++){
        if(listRender[i].id == options.currentSong.id){
            
            playListAside.appendChild(createItemSongPlaySidebar(listRender[i],'active'));

        }else{

            playListAside.appendChild(createItemSongPlaySidebar(listRender[i]));
        }
    }
    nameSongElm.innerHTML = options.currentSong.name;
    nameArtistSongElm.innerHTML = options.currentSong.name_artist;
    avatarSongElm.src = options.currentSong.thumbnail;
    updateTimeLineElm();
}
function updateTimeLineElm(){
    leftTimeLineElm.innerHTML = secondToMinute(options.currentTime)
   
    rightTimeLineElm.innerHTML = secondToMinute(options.currentSong.duration)
}


//Lưu lại danh sách vảo local storage
function saveListSongLocalStorage() {
    const listSongJSON = JSON.stringify(listSong);
    const listSongRandomJSON = JSON.stringify(listSongRandom);

    localStorage.setItem("listSong", listSongJSON);
    localStorage.setItem("listSongRandom", listSongRandomJSON);
    renderSidebarMusic();
}

function addSongToList(song) {
    listSong.push(song);
    listSongRandom.push(song);

    saveListSongLocalStorage();
}

function addSongToFirstList(song) {
    listSong = [song, ...listSong];
    listSongRandom = [song, ...listSongRandom];
    saveListSongLocalStorage();
}

function addManySongToList(songs) {
    listSong = [...listSong, ...songs];
    listSongRandom = [...listSongRandom, ...songs];
    saveListSongLocalStorage();
}

function deleteSongFromList(idSongRemove) {
    listSong = listSong.filter((item) => item.id !== idSongRemove);
    listSongRandom = listSongRandom.filter((item) => item.id !== idSongRemove);
    saveListSongLocalStorage();
}

function setListSongByOrderPlayPlist(newList) {
    listSong = [...newList];
    listSongRandom = [...newList];

    saveListSongLocalStorage();
}

function randomListSong() {
    
    const currentSong = options.currentSong;
    // console.log(currentSong)
    const listRandom = listSongRandom.filter((item) => item.id !== currentSong.id)
    

    const newListRandom = shuffleArray(listRandom)
    // console.log(newListRandom)

    listSongRandom = [currentSong, ...listRandom];
    
    
    saveListSongLocalStorage();
}

// Hàm random
function shuffleArray(arr) {
     // Xáo trộn mảng từ vị trí thứ 1 đến cuối
    for (var i = 1; i < arr.length; i++) {
        var randomIndex = Math.floor(Math.random() * (i + 1));
        // Tráo đổi phần tử tại vị trí i với phần tử tại vị trí randomIndex
        var temp = arr[i];
        arr[i] = arr[randomIndex];
        arr[randomIndex] = temp;
    }
    // Mảng đã xáo trộn, phần tử đầu tiên vẫn ở đầu
    return arr;
}

//Option
function saveOptionLocalStorage() {
    const optionsJSON = JSON.stringify(options);
    localStorage.setItem("options", optionsJSON);
}

function getOptionLocalStorage() {
    const isRandomList = false;
    const volumesValue = 50;
    const timeCurrentSong = 0;
    const isMute = false;
    const songCurrent = "";
    const lastValueVolume = volumesValue;

    const optionsDefault = {
        isRandomList,
        volumesValue,
        lastValueVolume,
        timeCurrentSong,
        isMute,
        songCurrent,
    };
    const optionsJSON = localStorage.getItem("options");

    options = JSON.parse(optionsJSON) || optionsDefault;
}

//Even khi cái option elm change
toogleVolumeBtn.addEventListener("change", (e) => {
    if (toogleVolumeBtn.checked) {
        options.lastValueVolume = options.volumesValue;
        options.volumesValue = 0;
        options.isMute = true;
        
    } else {
        options.volumesValue = options.lastValueVolume;
        options.isMute = false;
        
        
    }
    saveOptionLocalStorage();
    audioElm.volume = options.volumesValue/100;

});

valueVolume.addEventListener("change", (e) => {
    toogleVolumeBtn.checked = false;
    options.isMute = false;
    options.volumesValue = valueVolume.value;
    saveOptionLocalStorage();

    
    audioElm.volume = options.volumesValue/100;
});

//set current song
function setCurrentSong(song) {
    options.currentSong = song;
    options.currentTime = 0;
    saveOptionLocalStorage();
    
}

//even click play song
function addSongToListBtn(idSong) {
    getSongById(idSong);
}

//call api get info song
function getSongById(idSong) {
    const urlCall = URL_WEB + "/api/getSongById"; // Thay đổi địa chỉ URL thành endpoint của bạn

    params = {
        idSong,
    };
    // Gửi yêu cầu POST bằng Axios
    // Thực hiện yêu cầu GET với params
    axios
        .get(urlCall, { params })
        .then((response) => {
            // Xử lý dữ liệu trả về từ máy chủ ở đây
            const data = response.data;
            data["id"] = data["id_song"] + "_" + generateRandomNumberString(6);
            // addSongToList(data);

            const status = response.status;
            if (status === 200) {
                setCurrentSong(data);
                addSongToFirstList(data);
                playMusic();
            }
        })

        .catch((error) => {
            // Xử lý lỗi nếu có
            addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
        });
}

//phát nhạc
function playMusic() {
    const svgElms = btnPauseSong.querySelectorAll('svg');
    svgElms[0].classList.remove('none');
    svgElms[1].classList.add('none');
    audioElm.src = options.currentSong.source;
    // Đợi cho âm thanh tải xong trước khi phát
    audioElm.addEventListener("loadedmetadata", function () {
        // Sau khi âm thanh tải xong, gọi phương thức play()
        audioElm.play();
    });
}

//dừng nhạc
function pauseMusic() {
    const svgElms = btnPauseSong.querySelectorAll('svg');

    svgElms[0].classList.add('none');
    svgElms[1].classList.remove('none');
    options.currentTime = audioElm.currentTime;
    saveOptionLocalStorage();
    audioElm.pause();
}

//tiếp tục phát
function resumeMusic() {
    const svgElms = btnPauseSong.querySelectorAll('svg');
    svgElms[0].classList.remove('none');
    svgElms[1].classList.add('none');
    audioElm.src = options.currentSong.source;
    audioElm.currentTime = options.currentTime;
    audioElm.addEventListener("loadedmetadata", function () {
        // Sau khi âm thanh tải xong, gọi phương thức play()
        audioElm.play();
    });
}

//phát theo id bài háy
function playSongById(id) {
    let listCurrentSong = options.isRandomList ?listSongRandom:listSong;
    const index = listCurrentSong.findIndex(item => item.id === id);
    const newSong = listCurrentSong[index];
 
    setCurrentSong(newSong);
    saveListSongLocalStorage();
    playMusic();

}

//tạm dừng
btnPauseSong.addEventListener('click',(e)=>{
    const svgElms = btnPauseSong.querySelectorAll('svg');
    if(!audioElm.paused){
        

        pauseMusic();
    }else{
        
        resumeMusic();
    }
    
})

//click random list
btnRandomList.addEventListener('click',(e)=>{
    if(options.isRandomList){
        options.isRandomList = false;
        //render
        saveOptionLocalStorage();
        saveListSongLocalStorage();
        btnRandomList.classList.remove('active');
    }else{
        options.isRandomList = true;
        saveOptionLocalStorage();
        randomListSong();
        btnRandomList.classList.add('active');


    }
})

//next song
btnNextSong.addEventListener('click',(e)=>{
    nextSong();
})

function nextSong(){
    const currentSong = options.currentSong;
    let listCurrentSong = options.isRandomList ?listSongRandom:listSong;
    const indexCurrentSong = listCurrentSong.findIndex(item => item.id === currentSong.id);
    const nextSongIndex = (indexCurrentSong+1) > (listCurrentSong.length -1) ? 0 : (indexCurrentSong+1);
    playSongById(listCurrentSong[nextSongIndex].id);
}

//prev song
btnPrevSong.addEventListener('click',(e)=>{
    prevSong();
})

function prevSong(){
    const currentSong = options.currentSong;
    let listCurrentSong = options.isRandomList ?listSongRandom:listSong;
    const indexCurrentSong = listCurrentSong.findIndex(item => item.id === currentSong.id);
    const nextSongIndex = (indexCurrentSong-1) < 0 ? (listCurrentSong.length -1) : (indexCurrentSong-1);
    playSongById(listCurrentSong[nextSongIndex].id);
}

//update timeline
audioElm.addEventListener('timeupdate', () =>{
    // Tính phần trăm tiến trình và đặt giá trị cho thanh trượt
    const currentTime = audioElm.currentTime;
    const duration = audioElm.duration;
    

    if (!isNaN(duration)) { // Đảm bảo duration hợp lệ (không phải NaN)
        const progressPercentage = (currentTime / duration) * 100;
        timelineCurrentElm.value = progressPercentage;
        options.currentTime = currentTime;
        saveOptionLocalStorage();
        updateTimeLineElm();
    }
})

// update view timeline
timelineCurrentElm.addEventListener('input', function() {
    const progressPercentage = timelineCurrentElm.value;
    const duration = audioElm.duration;

    if (!isNaN(duration)) {
        const currentTime = (progressPercentage / 100) * duration;
        audioElm.currentTime = currentTime;
    }
});

audioElm.addEventListener("ended", function () {
    // Thực hiện các hành động bạn muốn sau khi bài hát hoặc tệp âm thanh đã phát hết
    nextSong();
});

