const tbELm = document.getElementById("tbUser");
const searchElm = document.getElementById("q-name");
const sortFollowerElm = document.getElementById("sort-follower");
const statusElm = document.getElementById("status");
var typingTimer = null;
params = {};

statusElm.addEventListener("change", (e) => {
    if (statusElm.value == -1) {
        delete params.status;
    } else {
        params["status"] = statusElm.value;
    }
    // console.log(params)
    callTableUser(() => setLink("tbUser"));
});

sortFollowerElm.addEventListener("change", (e) => {
    params["sortFolower"] = sortFollowerElm.value;
    callTableUser(() => setLink("tbUser"));
});

searchElm.addEventListener("input", (e) => {
    params["name"] = searchElm.value;
    clearTimeout(typingTimer);

    typingTimer = setTimeout(function () {
        callTableUser(() => setLink("tbUser"));
    }, 500);
});

function toggleStatusUser(id, name, show) {
    showModalChangeStatusUser(name);
    document.getElementById("submit-toggle-status").onclick = () => {
        callApiToggleStatusUser(id,show,name)
    };
}
function callApiToggleStatusUser(id,show,name) {
    const urlCall= URL_WEB + "/api/admin/toggleStatusUser";
    
    const formData = new FormData();
    formData.append("id_user",__ID_USER.value)
    formData.append("id", id);
    formData.append("show", show);
    
    // Gửi yêu cầu POST bằng Axios
    // Thực hiện yêu cầu GET với params
    axios
        .post(urlCall,  formData ,{
            headers: {
                "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                Accept: "application/json", // Header Accept: application/json
            },
        })
        
        .then((response) => {
            // Xử lý dữ liệu trả về từ máy chủ ở đây
            const data = response.data;

            // addSongToList(data);

            const status = response.status;
            if (status === 200) {
                callTableUser(() => setLink("tbUser"));
                
                modalChangeStatusUser.hide();
                if(data == '1'){
                    message=`Bạn đã mở hoạt động của ${name}`;
                }else{
                    message=`Bạn đã tắt hoạt động của ${name}`;

                }
                
                toast({
                    title: "Thành công!",
                    message,
                    type: "success",
                    duration: 5000
                  });
                
            }
        })

        .catch((error) => {
            toast({
                title: "Có lỗi!",
                message: "Có lỗi! Thử lại sau",
                type: "error",
                duration: 5000
              });
        });
}
