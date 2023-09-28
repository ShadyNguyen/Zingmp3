const mySlide = document.querySelector("#slide-page");
const slide = new bootstrap.Carousel(mySlide, {
    interval: 2000,
    wrap: true,
});
setInterval(()=>{
    slide.next()
},5000)
