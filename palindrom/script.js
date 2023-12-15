
document.querySelector("#i").addEventListener("input",(e)=>{
    console.log(e.target);
    if (e.target.value===e.target.value.split("").reverse().join("")) {
        console.log(`${e.target.value} is palindrom`);
    }else{
        console.log(`${e.target.value} is NOT palindrom`);
}

})
