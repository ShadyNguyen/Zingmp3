function setLink(id){
    
    
    paginationsElm = document.getElementById('paginations');
    aElms = paginationsElm.querySelectorAll('a');
    
    aElms.forEach(a => {
        a.addEventListener('click', (e) =>{
            e.preventDefault();
            
            callTableUser(()=>setLink(id),a.href);
        });
    });
}
