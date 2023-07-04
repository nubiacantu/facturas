import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;
// Configuración del dropzone
const dropzonePDF = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu factura en PDF aquí',
    acceptedFiles: '.pdf',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // En caso que tenga value, lo tomará para llenar los atributos de dropzone
        if (document.querySelector('[name="pdf"]').value.trim()) {
            const pdfPublicada = {};

            pdfPublicada.size = 1234;
            pdfPublicada.name = document.querySelector('[name="pdf"]').value;

            this.options.addedfile.call(this, pdfPublicada);
            this.options.thumbnail.call(this, pdfPublicada, `/uploads_pdf/${pdfPublicada.name}`);

            pdfPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});
//Funcion para procesar la subida del archivo XML
const dropzoneXML = new Dropzone('#dropzone2', {
    dictDefaultMessage: 'Sube tu factura en XML aqui',
    acceptedFiles: '.xml',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // En caso que tenga value, lo tomará para llenar los atributos de dropzone
        if (document.querySelector('[name="xml"]').value.trim()) {
            const xmlPublicada = {};

            xmlPublicada.size = 1234;
            xmlPublicada.name = document.querySelector('[name="xml"]').value;

            this.options.addedfile.call(this, xmlPublicada);
            this.options.thumbnail.call(this, xmlPublicada, `/uploads_xml/${xmlPublicada.name}`);

            xmlPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzonePDF.on('success', function (file, response) {
    // Asigna el value de la imagen (nombre) en el input oculto de create.blade.php
    console.log(response);
    document.querySelector('[name="pdf"]').value = response.pdf;
});

dropzonePDF.on('removedfile', function () {
    // Para resetear el valor cuando se elimine la imagen
    document.querySelector('[name="pdf"]').value = '';
});

dropzoneXML.on('success', function (file, response) {
    // Asigna el value de la imagen (nombre) en el input oculto de create.blade.php
    console.log(response);
    document.querySelector('[name="xml"]').value = response.xml;
});

dropzoneXML.on('removedfile', function () {
    // Para resetear el valor cuando se elimine la imagen
    document.querySelector('[name="xml"]').value = '';
});