document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    //console.log(prefiereDarkMode.matches);

    /*if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode')
    }

    prefiereDarkMode.addEventListener('change', function (){
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode')
        }
    })*/

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);


    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    metodoContacto.forEach( input => input.addEventListener('click', mostrarMetodoContacto) );
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostar');
}

function mostrarMetodoContacto( event ) {
    const contactoDiv = document.querySelector('#contacto');

    if(event.target.value === 'Teléfono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Numero de Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

            <p>Elija la Fecha y la Hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" min="<?php echo date('Y-m-d') ?>" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">Correo</label>
            <input type="email" placeholder="Tu Correo" id="email" name="contacto[email]" required>
        `;
    }
}