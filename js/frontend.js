var navbar = document.querySelector('.navbar');
var hero = document.querySelector('.hero');

if(screen.width <= 768){
    navbar.classList.add('mobile');
    navbar.classList.remove('fixed-top');
    hero.classList.add('mobile');
}

window.onscroll = () =>{
    if(document.documentElement.scrollTop >= 200){
        navbar.classList.add('bg-dark');
        if(screen.width <= 768){
            navbar.classList.add('fixed-top');
        }
        document.querySelector('#navbar-logo').setAttribute('width','50');
    }else{
        navbar.classList.remove('bg-dark');
        if(screen.width <= 768){
            navbar.classList.remove('fixed-top');
        }
        document.querySelector('#navbar-logo').setAttribute('width','100');
    }
}