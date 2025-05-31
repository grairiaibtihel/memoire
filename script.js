let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    menu.classList.toggle('active');
};


window.onscroll = () =>{
    menu.classList.remove('fa-times');
    menu.classList.remove('active');
};

document.querySelector('#close-edit').onclick = () =>{
    document.querySelector('.edit-form-container').style.display = 'none';
    window.location.href = 'admin.php';

}