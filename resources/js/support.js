const supportBtns = document.querySelectorAll('.support-btn');
const countNumSupports = document.querySelectorAll('.count-num-supports');

supportBtns.forEach((supportBtn) => {
  supportBtn.addEventListener("click", async (e) =>{
    const post = String(e.target.id).replace("_support", "");
    // const post = e.target.id;
    await fetch(`/posts/${post}/support`, {
      method:"POST",
      headers:{
        "content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      },
    })
    .then((res) => res.json())
    .then((data) =>{
      if(data.supportsCount){
        countNumSupports.innerHTML = data.supportsCount;
        if(e.target.classList.contains("text-pink-500")){
          e.target.classList.remove("text-pink-500");
          e.target.setAttribute("name", "flame-outline");
        }else{
          e.target.classList.add("text-pink-500");
          e.target.setAttribute("name", "flame");
        }
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