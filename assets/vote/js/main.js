$(".carousel").owlCarousel({
    margin: 20,
    loop: true,
    // autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
      0:{
        items:1,
        nav: false
      },
      600:{
        items:2,
        nav: false
      },
      1000:{
        items:3,
        nav: false
      }
    }
  });
function hideIconBar(){
  var iconBar = document.getElementById("iconBar");
  var navigation = document.getElementById("navigation");
  iconBar.setAttribute("style", "display:none;");
  navigation.classList.remove("hide");
}

function showIconBar(){
  var iconBar = document.getElementById("iconBar");
  var navigation = document.getElementById("navigation");
  iconBar.setAttribute("style", "display:block;");
  navigation.classList.add("hide");
}

//Comment
function showComment(){
  var commentArea = document.getElementById("comment-area");
  commentArea.classList.remove("hide");
}

//Reply
function showReply(){
  var replyArea = document.getElementById("reply-area");
  replyArea.classList.remove("hide");
}