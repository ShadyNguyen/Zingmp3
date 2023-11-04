const tabs = document.querySelectorAll(".menu-tab ul li");
const moreShows = document.querySelectorAll(".more-show");
const searchFollower = document.getElementById("");
const URL_FOLLOWING = "";
const URL_SONG = "";
const URL_FOLLOWER = "";

const loadList = {};

init();

function init() {}

tabs.forEach(function (tab) {
    loadList[tab.dataset.show] = false;
    tab.addEventListener("click", (e) => {
        tabs.forEach(function (tab) {
            tab.classList.remove("active");
        });
        tab.classList.add("active");

        setShow(tab.dataset.show);
    });
});
loadList["info-show"] = true;

function setShow(id) {
    moreShows.forEach(function (show) {
        show.classList.add("none");
    });
    const idElmShow = document.getElementById(id);
    idElmShow.classList.remove("none");
    if (!loadList[id]) {
        loadNav(id);
    }
}
function loadNav(id) {
    switch (id) {
        case "following-show":
            callNav(id, { type: "followings" });
            loadList[id] = true;

            break;
        case "follower-show":
            callNav(id, { type: "followers" });
            loadList[id] = true;

            break;
        default:
            console.log("error: unknown");
            break;
    }
}

function callNav(id, params) {
    url = URL_WEB + "/api/admin/user/detailUser";
    // params = {
    //   idSong  ,
    // };
    // Gửi yêu cầu POST bằng Axios
    // Thực hiện yêu cầu GET với params
    params["id_admin"] = __ID_USER.value;
    params["id_user"] = document.getElementById("__ID_USER_DETAIL").value;

    axios
        .get(url, { params })
        .then((response) => {
            // Xử lý dữ liệu trả về từ máy chủ ở đây
            const data = response.data;

            // addSongToList(data);

            const status = response.status;
            if (status === 200) {
                document.querySelector(`div[data-table="${id}"]`).innerHTML =
                    data;
                paginations(id);
            }
        })

        .catch((error) => {
            // Xử lý lỗi nếu có
            // addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
        });
}
function paginations(id) {
    const pgElm = document.getElementById("paginations");
    const listA = pgElm.querySelectorAll("a");
    listA.forEach(function (a) {
        a.addEventListener("click", (e) => {
            e.preventDefault();
            url = a.href;
            axios
                .get(url)
                .then((response) => {
                    // Xử lý dữ liệu trả về từ máy chủ ở đây
                    const data = response.data;

                    // addSongToList(data);

                    const status = response.status;
                    if (status === 200) {
                        document.querySelector(
                            `div[data-table="${id}"]`
                        ).innerHTML = data;
                        paginations(id);
                    }
                })

                .catch((error) => {
                    // Xử lý lỗi nếu có
                    // addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
                });
        });
    });
}
