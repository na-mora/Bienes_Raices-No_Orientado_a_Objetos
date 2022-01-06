/*Codigo JavaScript*/ 

// Codigo para el menu de hamburguesa
document.addEventListener('DOMContentLoaded', function(){
    //Tan pronto como se cargue el html ejecute la funcion
    eventListeners();

    // Dark-Mode
    darkMode()

});

function eventListeners(){
    //Selector para el mobileMenu
    const mobileMenu = document.querySelector('.mobile-menu');

    // Cuando de Click en mobileMenu
    mobileMenu.addEventListener('click', navegacionResponsive)

}

function navegacionResponsive(){

    
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar') ){
        navegacion.classList.remove('mostrar')
    }
    else{
        navegacion.classList.add('mostrar')
    }
}

function darkMode(){

    const preferencia = window.matchMedia('(prefers-color-scheme: dark)');

    if(preferencia.matches){
        document.body.classList.add('dark-mode')
    }
    else{
        document.body.classList.remove('dark-mode')
    }


    // Cambios de tema instantaneo desde la configuracion del sistema (Windows)
    preferencia.addEventListener('change', ()=>{
        if(preferencia.matches){
            document.body.classList.add('dark-mode')
        }
        else{
            document.body.classList.remove('dark-mode')
        }
    })
    //Vamos al boton 

    const botonDark = document.querySelector('.dark-mode-boton');

    botonDark.addEventListener('click', () => {
    
        // Toogle pone la clase si no la tiene y la quita si ya la tiene
        document.body.classList.toggle('dark-mode');
    })
}