var sidebar = document.querySelector('.sidebar');
var sidebarBtn = document.querySelector('.sidebar-btn');
var spanTitle = document.querySelectorAll('.spanTitle');
var nav = document.querySelectorAll('.nav');
var mainContent = document.querySelector('.main-content');
sidebarBtn.addEventListener('click', ()=>{
    if(sidebar.classList.contains('d-none')){
        sidebar.classList.remove('d-none');
        sidebar.classList.add('d-block');
        mainContent.classList.remove('col-md-12');
        mainContent.classList.add('col-md-10');

    }else if(sidebar.classList.contains('d-block')){
        sidebar.classList.remove('d-block');
        sidebar.classList.add('d-none');
        mainContent.classList.remove('col-md-10');
        mainContent.classList.add('col-md-12');
    }
})