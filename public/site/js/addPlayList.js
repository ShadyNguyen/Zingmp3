// function addPlayList(idUser,name,status)
const btnAddPlayListUser = document.getElementById("btn-add-play-list");

const confirmDeletePlayList = new bootstrap.Modal(document.getElementById('modal-submit-delete-playlist'), {
    keyboard: false
  })



if (btnAddPlayListUser) {
    btnAddPlayListUser.addEventListener("click", (e) => {
        const parent = btnAddPlayListUser.parentNode;
        const idUser = parent.querySelector('input[type="hidden"]').value;
        const isPublic = parent.querySelector(
            'input[name="check-status-new-playlist"]'
        ).checked;
        const namePlayList = parent.querySelector("#name-new-playlist").value;

        if (!idUser || !namePlayList) {
            addNotification(ID_NOTIFICATION, "Nhập đầy đủ thông tin", 4000);
        } else {
            addPlayListCall(idUser, namePlayList, isPublic);
            parent.querySelector("#name-new-playlist").value="";
        }
    });
}

//call api add play list
function addPlayListCall(idUser, namePlayList, isPublic) {
    const urlCall = URL_WEB + "/api/addPlayList"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();

    formData.append("id_user", idUser);
    formData.append("name_playlist", namePlayList);
    formData.append("is_public", isPublic);

    // Gửi yêu cầu POST bằng Axios
    axios
        .post(urlCall, formData, {
            headers: {
                "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                Accept: "application/json", // Header Accept: application/json
            },
        })
        .then((response) => {
            // Xử lý phản hồi từ máy chủ ở đây
            const data = response.data[0];
            const status = response.status;

            if (status === 200) {
                // Load lại trang web hiện tại
                addNotification(
                    ID_NOTIFICATION,
                    setStringAction(
                        "tạo playlist",
                        namePlayList,
                        "thành công!"
                    ),
                    4000
                );
                toggleAddPlayList(false);
                if(reloadPagePlaylist){
                    setTimeout(()=>{
                        location.reload();
                    },1500)
                }
                
                
                const newElmPlayList = document.createElement("a");
                newElmPlayList.classList.add("menu-list-action-item");
                
                newElmPlayList.innerHTML = `<a class="menu-list-action-item" data-id-playlist="${data.id}">
                                            <div class="action-item-content ">
                                                <span>${data.title}</span>
                                            </div>
                                            <div class="wrapper-icon" data-id-playlist="${data.id}" data-id-user=" ${data.id_user}" onclick="showConfirmDeletePlayList(this)">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </a>`;

                    document.querySelector("nav.aside-nav .aside-nav-content.play-list").appendChild(newElmPlayList);
            }
        })
        .catch((error) => {
            const status = error.response.status;
            if (status === 422) {
                addNotification(
                    ID_NOTIFICATION,
                    "Vui lòng nhập đầy đủ thông tin!",
                    4000
                );
            } else {
            
                addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
            }
        });
}



function showConfirmDeletePlayList(btnDeletePlayList,reload=false) {
    
    confirmDeletePlayList.show();
    const submit = document.getElementById('btn-submit-delete-playlist');
    submit.dataset["idUser"] = btnDeletePlayList.dataset["idUser"];
    submit.dataset["idPlaylist"] = btnDeletePlayList.dataset["idPlaylist"];
    submit.dataset["reload"] = reload;

    

}
const deletePlayList = (e)=>{
    
    const submit = document.getElementById('btn-submit-delete-playlist');
    const id_user = submit.dataset["idUser"];
    const id_playlist = submit.dataset["idPlaylist"];
    const reload = submit.dataset["reload"];
    
    
    if (!id_user || !id_playlist) {
        addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
    } else {
        btnDeletePlayListCall(
            id_user,
            id_playlist,
            reload
            
        );
    }
}
document.getElementById('btn-submit-delete-playlist').addEventListener('click',deletePlayList);


//call api delete playlist
function btnDeletePlayListCall(id_user, id_playlist,reload) {
   
    const urlCall = URL_WEB + "/api/deletePlayList"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();

    formData.append("id_user", id_user);
    formData.append("id_playlist", id_playlist);

    // Gửi yêu cầu POST bằng Axios
    axios
        .post(urlCall, formData, {
            headers: {
                "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                Accept: "application/json", // Header Accept: application/json
            },
        })
        .then((response) => {
            // Xử lý phản hồi từ máy chủ ở đây
            
            const status = response.status;
            if (status === 204) {
                // Load lại trang web hiện tại
               return id_playlist
                
                // parentN.remove();
            }
        })
        .then((id_playlist)=>{
            confirmDeletePlayList.toggle();
            addNotification(
                ID_NOTIFICATION,
                setStringAction("Xóa playlist", " ", "thành công!"),
                4000
                );
            if(reloadPagePlaylist){
                setTimeout(()=>{
                    location.reload();
                },1500)
            }else{
                document.querySelector(`a[data-id-playlist="${id_playlist}"]`).remove();
            }
            
        })
        .catch((error) => {
            
            const status = error.response.status;

            if (status === 422) {
                addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
            } else {
                addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
            }
        });
}

function addSongToPlayList(idUser,idSong,idPlayList,namePlayList){
    const urlCall = URL_WEB + "/api/addSongToPlayList"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();

    formData.append("idUser", idUser);
    formData.append("idSong", idSong);
    formData.append("idPlayList", idPlayList);


    // Gửi yêu cầu POST bằng Axios
    axios
        .post(urlCall, formData, {
            headers: {
                "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                Accept: "application/json", // Header Accept: application/json
            },
        })
        .then((response) => {
            // Xử lý phản hồi từ máy chủ ở đây
            const data = response.data;
            const status = response.status;
            if (status === 204) {
                // Load lại trang web hiện tại

                addNotification(
                    ID_NOTIFICATION,
                    setStringAction("Thêm bài hát vào playlist", namePlayList, "thành công!"),
                    4000
                );
                
            }
        })
        .catch((error) => {
            const data = error.response.data;
            const status = error.response.status;

            if (status === 503) {
                addNotification(ID_NOTIFICATION, data.message, 4000);
            } else {
                addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
            }
        });
}

const addPlayListBtns = document.querySelectorAll('div[data-name][data-add-song-playlist-song][data-add-song-playlist-user][data-add-song-playlist-id]');
if(addPlayListBtns){
    addPlayListBtns.forEach(function(divElement) {
        // Thực hiện các hành động bạn muốn trên mỗi phần tử divElement ở đây
        // Ví dụ:
        const namePlayList = divElement.dataset.name; // Lấy giá trị của thuộc tính data-name
        const idSong = divElement.dataset.addSongPlaylistSong // Lấy giá trị của thuộc tính data-add-song-playlist-song
        const idUser = divElement.dataset.addSongPlaylistUser // Lấy giá trị của thuộc tính data-add-song-playlist-user
        const idPlayList = divElement.dataset.addSongPlaylistId // Lấy giá trị của thuộc tính data-add-song-playlist-id
    
        divElement.addEventListener('click',(e)=>{
            addSongToPlayList(idUser,idSong,idPlayList,namePlayList);
        })
        
        
    });
}


function likePlayList(btn,idPlayList,namePlayList){
    const idUser = _idUser.value;
    const urlCall = URL_WEB + "/api/likePlayList"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();

    formData.append("id_user", idUser);
    formData.append("id_playlist", idPlayList);

    // Gửi yêu cầu POST bằng Axios
    axios
        .post(urlCall, formData, {
            headers: {
                "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                Accept: "application/json", // Header Accept: application/json
            },
        })
        .then((response) => {
            // Xử lý phản hồi từ máy chủ ở đây
            const data = response.data;
            const status = response.status;

            if (status === 200) {
                
                if(data.isLike){

                    addNotification(
                        ID_NOTIFICATION,
                        setStringAction(
                            "thích playlist",
                            namePlayList,
                            "!"
                        ),
                        4000
                    );
                    btn.innerHTML = `<i class="fa-solid fa-heart"></i>`;
                }else{
                    addNotification(
                        ID_NOTIFICATION,
                        setStringAction(
                            "bỏ thích playlist",
                            namePlayList,
                            "!"
                        ),
                        4000
                    );
                    btn.innerHTML = `<i class="fa-regular fa-heart"></i>`;

                }
            }
        })
        .catch((error) => {
           
            addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
            
        });
}

