// notification
function addNotification(id){         
    document.getElementById(id).classList.remove('hidden');
}

function closeNotification(id){
    document.getElementById(id).classList.add('hidden');
}

// sidebar
const closeOverlay = ()=>{
        // this.preventDefault(); 
        document.querySelector('aside').classList.remove('hidden');
        document.querySelector('.bg-overlay').classList.remove('bg-overlay-sidebar');
}

function toggleSidebar(show){ 
    if(show){
        document.querySelector('aside').classList.add('hidden');
        document.querySelector('.bg-overlay').classList.add('bg-overlay-sidebar');
        document.querySelector('.bg-overlay-sidebar').addEventListener('click',closeOverlay );

    }else{
        document.querySelector('.bg-overlay-sidebar').removeEventListener('click',closeOverlay );
        closeOverlay();
    }    
}

//add play list
const myModal = new bootstrap.Modal(document.getElementById('modal-add-play-list'), {
    keyboard: false
})
function toggleAddPlayList(show) {
if (show) {
    myModal.show();
}else{
    myModal.hidden();
}
}

//even show add play list
const elmAdds =  document.querySelectorAll('.add-play-list-show');
for(const elm of elmAdds) {

    elm.addEventListener('click', (e)=>{
        toggleAddPlayList(true)
    });
}

//even show playlist sidebar
const togglePlayMusicSidebarElm = document.querySelector('#toggle-play-music-sidebar');
const playMusicSidebarElm = document.querySelector('#playlist-aside');
togglePlayMusicSidebarElm.addEventListener('click',(e)=>{
    
    playMusicSidebarElm.classList.toggle('hidden');
})