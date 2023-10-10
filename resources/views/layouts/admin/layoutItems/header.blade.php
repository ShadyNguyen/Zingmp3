<header>
    <div class="header-container">
        <div class="header-content-left">
            <div class="header-elm hide-sidebar">
                <button class="wrapper-icon icon-hide-sidebar">
                    <i class="fa-solid fa-outdent"></i>
                </button>
                <div class="header-search">
                    <input type="text" autocomplete="off" placeholder="Search for anything...">
                    <button class="wrapper-icon icon-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="header-content-right">
            <div class="header-elm dropdown">
                <button class="wrapper-icon icon-hide-sidebar" id="btn-change-theme">
                    <i class="fa-regular fa-sun"></i>
                </button>
                <button class="wrapper-icon icon-hide-sidebar" id="dropdownMenuSetting" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-gear fa-spin"></i>
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuSetting">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>




<script>
    const toggleSideBarBtn = document.querySelector(".wrapper-icon.icon-hide-sidebar");
    toggleSideBarBtn.addEventListener('click', (e) => {
        document.getElementsByTagName('body')[0].classList.toggle('hide-side-bar');
        const imgLogo = document.querySelectorAll('.aside-logo .logo-img a');
        imgLogo.forEach(function(img) {
            img.classList.toggle('none');
        }) 
    })
</script>
