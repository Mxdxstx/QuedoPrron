const alerta = document.querySelector('#ingresado');
const registrado = localStorage; 
registrado = false;
const correotemp = localStorage;
var menu_ingresar = document.getElementById('menu-ingresar');
//menu_ingresar.style.display = 'none';

correo.addEventListener("focusout",function(){
    correotemp.setItem("mail",correo.value)
})

if(registrado){
    menu_ingresar.style.display = 'none';
}

alerta.addEventListener('click',() => {
    localStorage.registrado=false;
    localStorage.console.log(registrado);
    if(registrado){
        menu_ingresar.style.display = 'none';
    }
})

