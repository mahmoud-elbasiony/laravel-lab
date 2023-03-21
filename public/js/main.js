const delBtns=document.querySelectorAll(".delete_post button")
const ajax=document.querySelectorAll(".ajax")
const myModal = new bootstrap.Modal(document.getElementById('viewModal'))

delBtns.forEach(btn=>{
    btn.addEventListener("click",(e)=>{
        e.preventDefault();
        e.stopPropagation();
        document.querySelector(".modal-footer").lastElementChild.addEventListener("click",(e)=>{
            btn.closest("form").submit();
        })
    })

});

ajax.forEach(btn=>{
    btn.addEventListener("click",(e)=>{
        console.log(btn.id);
        fetch(btn.id)
        .then((res)=>{
            return res.json()
        }).then((res)=>{
            console.log(res);
            
            let title = document.getElementById("title");
            title.value =res["title"];
            let description = document.getElementById("description");
            description.value = res["description"];
            let username = document.getElementById("username");
            username.value =res["user"]["name"];
            let email = document.getElementById("email");
            email.value =res["user"]["email"];
            console.log("asdasd");

            myModal.show();
        })
    })
})
