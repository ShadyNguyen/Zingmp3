function setFolowerArtist(button, id_artist) {

    const urlCall = URL_WEB + "/api/followArtist"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();
    const elm =button;
    const id_user = _idUser.value;
    formData.append("id_user", id_user);
    formData.append("id_artist", id_artist);

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
                // Load lại trang web hiện tại
                const strAction = data.isFollowing?'theo dõi':'bỏ theo dõi';
                addNotification(ID_NOTIFICATION, setStringAction(strAction,elm.dataset['nameArtist']), 4000);
                changeStatusFollowElm(elm,data.isFollowing);
            }
        })
        .catch((error) => {      
            addNotification(ID_NOTIFICATION, 'Có lối, thử lại sau!', 4000);   
        });
}

function changeStatusFollowElm(elm,isLike){
    
    if(isLike){
        elm.classList.add('active');
        elm.querySelector('.artist-action-title').innerHTML = "Bỏ theo dõi";
    }else{
        elm.classList.remove('active');
        elm.querySelector('.artist-action-title').innerHTML = "Theo dõi";
    }
}


