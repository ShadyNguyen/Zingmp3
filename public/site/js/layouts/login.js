const loginBtn = document.getElementById("btn-login-click");
const registerBtn = document.getElementById("btn-register-click");
const _token = document.querySelector('input[name="_token"]').value;

const swicthRegisterBtn = document.getElementById("btn-swicth-register");
const swicthLoginBtn = document.getElementById("btn-swicth-login");
const formLogin = document.getElementById("login-form");

function toggleShowPassword(id) {
    const inputPassElm = document.getElementById(id);
    if (inputPassElm.type === "password") {
        inputPassElm.type = "text";
        document
            .querySelector(`div[data-show="${id}"]`)
            .querySelector("i").classList.value = "fa-regular fa-eye-slash";
    } else {
        inputPassElm.type = "password";
        document
            .querySelector(`div[data-show="${id}"]`)
            .querySelector("i").classList.value = "fa-regular fa-eye";
    }
}


const formRegister = document.getElementById("register-from");
swicthRegisterBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formLogin.classList.add("none");
    formRegister.classList.remove("none");
});
swicthLoginBtn.addEventListener("click", (e) => {
    e.preventDefault();

    formLogin.classList.remove("none");
    formRegister.classList.add("none");
});

//login
function checkLogin(username, password) {
    const urlCall = URL_WEB + "/loginAjax"; // Thay đổi địa chỉ URL thành endpoint của bạn

    const formData = new FormData();
    
    formData.append("username", username);
    formData.append("password", password);
    formData.append("_token", _token);
   

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
                addNotification(ID_NOTIFICATION, data.message, 4000);
                setTimeout(() => {
                    location.reload();
                }, 1000);
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
            } else if (status === 401) {
                addNotification(ID_NOTIFICATION, data.message, 4000);
            } else if (status === 403) {
                addNotification(ID_NOTIFICATION, data.message, 4000);
            }
            // Xử lý lỗi nếu có
        });
}

if (loginBtn) {
    loginBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const username = document.getElementById("username-login").value;
        const password = document.getElementById("password-login").value;
        
        if (!username || !password) {
            addNotification("notification", "Nhập đầy đủ thông tin", 5000);
        } else {
            checkLogin(username, password);
        }
    });
}

//register
function checkRegister(username, password, name) {
    const urlCall = URL_WEB + "/registerAjax";
    const formData = new FormData();

    formData.append("username", username);
    formData.append("password", password);
    formData.append("name", name);

    formData.append("_token", _token);

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
                addNotification(ID_NOTIFICATION, "Tạo tài khoản thành công.", 4000);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        })
        .catch((error) => {
            const data = error.response.data;
            const status = error.response.status;
           
            if (status === 422) {
                addNotification(
                    ID_NOTIFICATION,
                    data.message,
                    4000
                );
            } else {
                addNotification(ID_NOTIFICATION, 'Có lỗi vui lòng thử lại sau!', 4000);
            } 
            // Xử lý lỗi nếu có
        });
}

if(registerBtn){
    registerBtn.addEventListener('click',(e)=>{
        e.preventDefault();
        const username = document.getElementById("username-register").value;
        const name = document.getElementById("name-register").value;

        const password = document.getElementById("new-password").value;
        const confirmPassword = document.getElementById("confirm-new-password").value;

        if (!username || !password || !name || !confirmPassword){
            addNotification("notification", "Nhập đầy đủ thông tin", 5000);
        }else if(password!==confirmPassword){
            addNotification("notification", "Mật khẩu phải trùng khớp!", 5000);
        }else{
            checkRegister(username,password,name);
        }

    })
}