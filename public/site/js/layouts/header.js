const inputSearch = document.getElementById('search-input').querySelector('input');
const headerSearch = document.getElementById('header-search');
const rsSearch = document.getElementById('rs-search');
const buttons = document.getElementsByTagName('button'); // Lấy danh sách các nút


//close results search
const closeResultsSearch = ()=>{
    headerSearch.classList.remove('is-collapse');
    rsSearch.classList.add('none');
}

//show results search
function showResults(){
    headerSearch.classList.add('is-collapse');
    rsSearch.classList.remove('none');
}

const checkCloseResultsSearch = (e)=>{   
    // console.log(rsSearch.contains(e.target))
    if (!headerSearch.contains(e.target) && !rsSearch.contains(e.target)) {
        closeResultsSearch();
    }
}

//clear results search
function clearSearch() {
    document.querySelector('#icon-clear-search').classList.add('none');
    inputSearch.value = '';
    inputSearch.focus();
}


//when input
inputSearch.addEventListener('input',(e)=>{
    if(e.target.value.length < 1){
        document.querySelector('#icon-clear-search').classList.add('none');
    }else{
        document.querySelector('#icon-clear-search').classList.remove('none');
    }
})

//when focus input
inputSearch.addEventListener('focus',(e)=>{
    showResults();
    
    // document.removeEventListener('click',checkCloseResultsSearch);
    document.addEventListener('click',checkCloseResultsSearch);

});

//when unfocus input

