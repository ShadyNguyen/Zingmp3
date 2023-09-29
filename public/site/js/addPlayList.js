// function addPlayList(idUser,name,status)
const btnAddPlayListUser = document.getElementById("btn-add-play-list");

const btnDeletePlayLists = document.querySelectorAll(
    "a.menu-list-action-item div.wrapper-icon[data-id-playlist][data-id-user]"
);

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
                toggleAddPlayList(false);
                addNotification(
                    ID_NOTIFICATION,
                    setStringAction(
                        "tạo playlist",
                        namePlayList,
                        "thành công!"
                    ),
                    4000
                );
                
                const newElmPlayList = document.createElement("a");
                newElmPlayList.classList.add("menu-list-action-item");
                newElmPlayList.innerHTML = `
                    <div class="action-item-content ">
                        <span>${data.title}</span>
                    </div>
                    <div class="wrapper-icon" data-id-playlist="${data.id}" data-id-user="${data.id_user}">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>`;
                    document.querySelector("nav.aside-nav .aside-nav-content.play-list").appendChild(newElmPlayList);
                    newElmPlayList.querySelector('.wrapper-icon').addEventListener('click',()=>deletePlayList(newElmPlayList.querySelector('.wrapper-icon')));
            }
        })
        .catch((error) => {
            const data = error.response.data;
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

if (btnDeletePlayLists) {
    btnDeletePlayLists.forEach((btnDeletePlayList) => {
        btnDeletePlayList.addEventListener("click", ()=> deletePlayList(btnDeletePlayList));
    });
}

function deletePlayList(btnDeletePlayList) {
    const id_user = btnDeletePlayList.dataset["idUser"];
    const id_playlist = btnDeletePlayList.dataset["idPlaylist"];
    
    if (!id_user || !id_playlist) {
        addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
    } else {
        btnDeletePlayListCall(
            id_user,
            id_playlist,
            btnDeletePlayList.parentNode
        );
    }
}

//call api delete playlist
function btnDeletePlayListCall(id_user, id_playlist, parentN) {
   
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
            const data = response.data;
            const status = response.status;
            if (status === 204) {
                // Load lại trang web hiện tại

                addNotification(
                    ID_NOTIFICATION,
                    setStringAction("Xóa playlist", " ", "thành công!"),
                    4000
                );
                parentN.remove();
            }
        })
        .catch((error) => {
            const data = error.response.data;
            const status = error.response.status;

            if (status === 422) {
                addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
            } else {
                addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
            }
        });
}