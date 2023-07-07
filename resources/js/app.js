import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;
// Dropzone para archivo pdf
const dropzonePDF = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu factura en PDF',
    acceptedFiles: '.pdf',
    addRemoveLinks: true,
    dictRemoveFile: '<button type="button" class="bg-blue-700 mt-1 hover:bg-blue-600 transition-colors cursor-pointer uppercase font-bold p-2 text-sm text-white rounded-lg">Borrar archivo</button>',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // cuando se seleccione un documento llena los atributos de dropzone
        if (document.querySelector('[name="pdf"]').value.trim()) {
            const pdfAgregado = {};

            pdfAgregado.size = 1234;
            pdfAgregado.name = document.querySelector('[name="pdf"]').value;

            this.options.addedfile.call(this, pdfAgregado);
            this.options.thumbnail.call(this, pdfAgregado, `/uploads_pdf/${pdfAgregado.name}`);

            pdfAgregado.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});
//Dropzon para archivo XML
const dropzoneXML = new Dropzone('#dropzone2', {
    dictDefaultMessage: 'Sube aquí tu factura en XML',
    acceptedFiles: '.xml',
    addRemoveLinks: true,
    dictRemoveFile: '<button type="button" class="bg-blue-700 mt-1 hover:bg-blue-600 transition-colors cursor-pointer uppercase font-bold p-2 text-sm text-white rounded-lg">Borrar archivo</button>',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // cuando se seleccione un documento llena los atributos de dropzone
        if (document.querySelector('[name="xml"]').value.trim()) {
            const xmlAgregado = {};

            xmlAgregado.size = 1234;
            xmlAgregado.name = document.querySelector('[name="xml"]').value;

            this.options.addedfile.call(this, xmlAgregado);
            this.options.thumbnail.call(this, xmlAgregado, `/uploads_xml/${xmlAgregado.name}`);

            xmlAgregado.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzonePDF.on('success', function (file, response) {
    // Asigna el valor del pdf en el input oculto del create
    console.log(response);
    document.querySelector('[name="pdf"]').value = response.pdf;
});

dropzonePDF.on('removedfile', function () {
    // Para resetear el valor cuando se elimine el pdf en el campo oculto
    document.querySelector('[name="pdf"]').value = '';
});

dropzoneXML.on('success', function (file, response) {
    // Asigna el valor del xml en el input oculto del formulario de create 
    console.log(response);
    document.querySelector('[name="xml"]').value = response.xml;
});

dropzoneXML.on('removedfile', function () {
    // se elimina el valor de la imagen en el input oculto de xml
    document.querySelector('[name="xml"]').value = '';
});


