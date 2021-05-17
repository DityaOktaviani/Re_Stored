/*===== EXPANDER MENU  =====*/ 
const showMenu = (toggleId, navbarId)=>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
        navbar.classList.toggle('expander')

    })
    }
}
showMenu('nav-toggle','navbar')
