const tbELm = document.getElementById('tbUser');
const searchElm = document.getElementById('q-name');
const sortFollowerElm = document.getElementById('sort-follower');
const statusElm = document.getElementById('status');

sortFollowerElm.addEventListener('change',(e)=>{
    
})



function callTableUser(params=null){
    const urlCall = URL_WEB + "/api/admin/tableUser"; // Thay đổi địa chỉ URL thành endpoint của bạn
    
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
                tbELm.innerHTML = data
                // console.log(data)
            }
        })

        .catch((error) => {
            // Xử lý lỗi nếu có
            // addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
        });
}
callTableUser();
