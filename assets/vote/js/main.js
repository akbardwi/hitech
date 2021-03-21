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
function showReply(id){
  var replyArea = document.getElementById("reply-area-"+id);
  // document.getElementById("reply_to").value = id;
  replyArea.classList.remove("hide");
}
const submitForm = document.querySelector('.add');
const addButton = document.querySelector('.add-todo');
const todoList = document.querySelector('.todos');
const list = document.querySelectorAll('.todos li'); 

let listLenght = list.lenght;

const generateTempalate = (todo) => {
  
  const html = `<li>
                  <input type="checkbox" id="todo_${listLenght}">
                  <label for="todo_${listLenght}">
                    <span class="check"></span>
                    ${todo}
                  </label>
                  <i class="far fa-trash-alt delete"></i>
                </li>`
  todoList.innerHTML += html;
};

function addTodos(e) {
  e.preventDefault();
  const todo = submitForm.add.value.trim();
  if (todo.length) {
    listLenght = listLenght + 1;
    generateTempalate(todo);
    submitForm.reset();
  }
}

submitForm.addEventListener('submit', addTodos);
addButton.addEventListener('click', addTodos);

function deleteTodos(e) {
  if (e.target.classList.contains('delete')) {
    e.target.parentElement.remove();
  }
}

todoList.addEventListener('click', deleteTodos);
$(document).ready(function() {
  var dataTable = $('#filtertable').DataTable({
      "pageLength":5,
      'aoColumnDefs':[{
          'bSortable':false,
          'aTargets':['nosort'],
      }],
      columnDefs:[
          {type:'date-dd-mm-yyyy',aTargets:[5]}
      ],
      "aoColumns":[
          null,
          null,
          null,
          null,
          null,
          null,
          null
      ],
      "order":false,
      "bLengthChange":false,
      "dom":'<"top">ct<"top"p><"clear">'
  });
  $("#filterbox").keyup(function(){
      dataTable.search(this.value).draw();
  });
} );
