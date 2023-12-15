document.querySelectorAll("button").forEach(e => {
    e.addEventListener("click",(e)=>{
        document.querySelector(".prawy").style.background = e.target.innerHTML
    })
});
document.querySelector("#sciaka").addEventListener("input",(e)=>{
    document.querySelector(".par").style.color=e.target.value

})

document.querySelector("#rozmiar").addEventListener("input",(e)=>{
    document.querySelector(".prawy").style.fontSize=e.target.value
})
document.querySelector('#ramka').addEventListener('click', (e) => {
    document.querySelector("img").style.border = e.target.checked

    if (e.target.checked) {
        document.querySelector('img').style.border = 'solid 1px white'
    } else {
        document.querySelector('img').style.border = 'solid 0px white'
    }
})
