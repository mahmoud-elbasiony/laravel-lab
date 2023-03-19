const delbtns=document.querySelectorAll(".delete_post button")

delbtns.forEach(btn=>{
    btn.addEventListener("click",(e)=>{
        e.preventDefault();
        e.stopPropagation();
        document.querySelector(".modal-footer").lastElementChild.addEventListener("click",(e)=>{
            btn.closest("form").submit();
        })
    })

});
