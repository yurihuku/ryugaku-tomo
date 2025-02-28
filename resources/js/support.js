const supportBtns = document.querySelectorAll('.support-btn');
const countNumSupport = document.getElementById('count-num-support');

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
        countNumSupport.innerHTML = data.supportsCount;
      }else{
        window.alert(data.message);
      }
    })
    
    .catch(error => {
      console.error('通信に失敗しました', error);
    })
  });
});