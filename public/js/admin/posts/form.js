ClassicEditor
.create( document.querySelector( '#extract' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
} )
.catch( error => {
    console.log( error );
} );

ClassicEditor
.create( document.querySelector( '#body' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
} )
.catch( error => {
    console.log( error );
} );

ClassicEditor
.create( document.querySelector( '#joder' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
} )
.catch( error => {
    console.log( error );
} );


// Cambiar imagen
document.getElementById("file").addEventListener('change', cambiarImagen);
function cambiarImagen(event){
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
}

function crearURLAmigable(slug){

    slug = slug.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    // Reemplaza los carácteres especiales | simbolos con un espacio
    slug = slug.replace(/[`´¡°¬~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

    // Corta los espacios al inicio y al final del sluging
    slug = slug.replace(/^\s+|\s+$/gm,'');

    // Reemplaza el espacio con guión
    slug = slug.replace(/\s+/g, '-');

    // Creo la URL en el campo de texto 'url'
    var input = document.getElementById('slug');
    input.value = slug;

}

$('.formulario-guardar').submit(function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de realizar estos cambios?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        denyButtonText: `No Guardar`,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            this.submit()
        } else if (result.isDenied) {
            Swal.fire('No se guardaron los cambios', '', 'info')
        }
    })
})





