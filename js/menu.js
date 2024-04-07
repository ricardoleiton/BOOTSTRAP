const menu = document.querySelector('.menu');
const menu1 = document.querySelector('.menu-navegacion');

console.log(menu)
console.log(menu1)

menu.addEventListener('click', ()=>{
    menu1.classList.toggle("spread")
})