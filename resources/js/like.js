const likeBtns = document.querySelectorAll('.like-btn');

likeBtns.forEach((likeBtn) => {
  likeBtn.addEventListener("click", async (e) =>{
    const post = String(e.target.id).replace("_like", "");
    // const post = e.target.id;
    await fetch(`/posts/${post}/like`, {
      method:"POST",
      headers:{
        "content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      },
    })
    .then((res) => res.json())
    .then((data) =>{
      if(data.likesCount){
        e.target.nextElementSibling.innerHTML = data.likesCount;
        if(e.target.classList.contains("text-pink-500")){
          e.target.classList.remove("text-pink-500");
          e.target.setAttribute("name", "heart-outline");
        }else{
          e.target.classList.add("text-pink-500");
          e.target.setAttribute("name", "heart");
        }
      }else{
        window.alert(data.message);
      }
    })
    .catch(error => {
      console.error('通信に失敗しました', error);
    })
  });
});