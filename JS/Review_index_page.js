//header shadow
const body = document.body;
let lastScroll = 0;

window.addEventListener('scroll', ()=>{
    const currentScroll = window.pageYOffset
    if(currentScroll <= 0){
        body.classList.remove("scroll-up")
    }
    else if(currentScroll > lastScroll && !body.classList.contains("scroll-down"))
    {
        body.classList.remove("scroll-down")
        body.classList.add("scroll-up")
    }

    else if(currentScroll > lastScroll && !body.classList.contains("scroll-down"))
    {
        body.classList.remove("scroll-down")
        body.classList.add("scroll-up")
    }

    lastScroll = currentScroll;
});