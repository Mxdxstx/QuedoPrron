const alerta = document.querySelector('#create-user');
const registrado = false; 

alerta.addEventListener('click',() => {
    //console.log('Diste click');
    registrado=true;
})

if(registrado){
    toastr.success('Ahora puedes iniciar sesion','Registrado Correctamente',{
        "progressBar": true,
        "positionClass": "toast-top-center"
    });
}