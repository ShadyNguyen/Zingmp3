
function callTableUser(callback, url = null) {
    let urlCall;
    if (url == null) {
        urlCall = URL_WEB + "/api/admin/tableUser"; // Thay đổi địa chỉ URL thành endpoint của bạn
    } else {
        urlCall = url; // Thay đổi địa chỉ URL thành endpoint của bạn
    }

    // params = {
    //   idSong  ,
    // };
    // Gửi yêu cầu POST bằng Axios
    // Thực hiện yêu cầu GET với params
    axios
        .get(urlCall, { params })
        .then((response) => {
            // Xử lý dữ liệu trả về từ máy chủ ở đây
            const data = response.data;

            // addSongToList(data);

            const status = response.status;
            if (status === 200) {
                tbELm.innerHTML = data;
                callback();
            }
        })

        .catch((error) => {
            // Xử lý lỗi nếu có
            // addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
        });
}
