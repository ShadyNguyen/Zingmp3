function likeSong(button,id_user, id_song) {
    const urlCall = URL_WEB + "/api/likeSong"; // Thay đổi địa chỉ URL thành endpoint của bạn
    const formData = new FormData();
    const elm =button;
    
    
    formData.append("id_user", id_user);
    formData.append("id_song", id_song);

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
                const name = elm.dataset['nameSong'];
                const strAction = data.isLike?'đã thích':'bỏ thích' 
                
                addNotification(ID_NOTIFICATION, setStringAction(strAction+' bài hát',name), 4000);
                changeStatusLikeElm(elm,data.isLike);
            }
        })
        .catch((error) => {  
            addNotification(ID_NOTIFICATION, 'Có lối, thử lại sau!', 4000);
        });
}

function changeStatusLikeElm(elm,isLike){
    
    if(isLike){
        elm.innerHTML = `<i class="fa-solid fa-heart active"></i>`;
    }else{
        elm.innerHTML = `<i class="fa-regular fa-heart"></i>`;

    }
}

