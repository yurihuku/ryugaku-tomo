const likeBtns = document.querySelectorAll('.like-btn');
const countNumLikes = document.querySelectorAll('.count-num-likes');

likeBtns.forEach((likeBtn) => {
  likeBtn.addEventListener("click", async (e) =>{
    console.log('らいくクリックしました');
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
        console.log(data);
        console.log(countNumLikes);
        countNumLikes.innerHTML = data.likesCount;
        // if(e.target.classList.contains("text-pink-500")){
        //   e.target.classList.remove("text-pink-500");
        //   e.target.setAttribute("name", "heart-outline");
        // }else{
        //   e.target.classList.add("text-pink-500");
        //   e.target.setAttribute("name", "heart");
        // }
      }else{
        window.alert(data.message);
      }
      location.reload();
    })
    .catch(error => {
      console.error('通信に失敗しました', error);
    })

  });
});