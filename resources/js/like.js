const likeBtns = document.querySelectorAll('.like-btn');
const countNumLike = document.getElementById('count-num-like');

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
      // console.log(data.likesCount);
      if(data.likesCount){
        console.log(data);
        console.log(countNumLike);
        countNumLike.innerHTML = data.likesCount;
      }else{
        window.alert(data.message);
      }
    })
    .catch(error => {
      console.error('通信に失敗しました', error);
    })

  });
});