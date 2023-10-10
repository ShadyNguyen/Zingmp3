var currentThem = "purple";
initTheme();
function initTheme(){
    getThemeFromLocalStorage();
    changeThemRender();
    
}

function getThemeFromLocalStorage(){
    currentThem =  localStorage.getItem("laravel-zingmp3-them") || "purple";
    const htmlElm = document.querySelector('html')
    htmlElm.setAttribute('data-theme', currentThem);
}
function saveThemeToLocalStorage(){
    localStorage.setItem("laravel-zingmp3-them", currentThem);
}

function setTheme(theme){
    const htmlElm = document.querySelector('html')
    currentThem = theme
    htmlElm.setAttribute('data-theme', theme);
    saveThemeToLocalStorage();
    
}
function prevTheme(theme){
    
    const htmlElm = document.querySelector('html');
    htmlElm.setAttribute('data-theme', theme);
}

function changeThemRender(){
    const themes =[
        {
            nameTheme:'blue-light',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/blue-light.jpg"
        },
        {
            nameTheme:'blue',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/blue.jpg"
        },
        {
            nameTheme:'brown',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/brown.jpg"
        },
        {
            nameTheme:'green',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/green.jpg"
        },
        {
            nameTheme:'pink',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/pink.jpg"
        },
        {
            nameTheme:'purple',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/purple.jpg"
        },
        {
            nameTheme:'red',
            img:"https://zmp3-static.zmdcdn.me/skins/zmp3-v6.1/images/theme/red.jpg"
        },
        
        
    ]

    const elmThemes = document.getElementById('list-theme');
    elmThemes.innerHTML="";
    themes.forEach(function(theme) {
        elmThemes.appendChild(renderItemThem(theme));
    })
    
}

function renderItemThem(theme){
    
    const itemElm = document.createElement('div');
    itemElm.classList.add('change-them-item');
    if(currentThem==theme.name){
        itemElm.classList.add('active');
    }
    itemElm.innerHTML = `<div class="theme-bg">
                            <img src="${theme.img}" alt="">
                        </div>
                        <div class="theme-action">
                            <button class="outline-button" onclick="setTheme('${theme.nameTheme}')">
                                <span>Áp dụng</span>
                            </button>
                            <button class="outline-button active" onclick="prevTheme('${theme.nameTheme}')">
                                <span>Xem trước</span>
                            </button>
                        </div>
                        <div class="wrapper-icon theme-icon-active none">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>`
    return itemElm;
}