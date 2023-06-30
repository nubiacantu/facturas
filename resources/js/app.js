import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube una imagen aquí',
  acceptedFiles: ".pdf,.xml",
  addRemoveLinks: true,
  dictRemoveFile: "<button type='button' class='bg-green-700 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg'>Borrar archivo</button>",
  maxFiles: 2, // Se permiten hasta dos archivos
  uploadMultiple: true, // Habilitar la carga de varios archivos a la vez
  init: function () {
    if (document.querySelector('[name="imagen"]').value.trim()) {
      const imagenPublicada = {};
      imagenPublicada.size = 1234;
      imagenPublicada.name = document.querySelector('[name="imagen"]').value;
      this.options.addedfile.call(this, imagenPublicada);
      this.options.thumbnail.call(
        this,
        imagenPublicada.name,
        '/uploads/${imagenPublicada.name}'
      );
      imagenPublicada.previewElement.classList.add(
        "dz-sucess",
        "dz-complete"
      );
    }
  },
});

// Evento de envío correcto
dropzone.on('successmultiple', function (files, response) {
  const pdfFile = files.find((file) => file.type === 'application/pdf');
  const xmlFile = files.find((file) => file.type === 'text/xml');

  if (pdfFile) {
    document.querySelector('[name="pdf"]').value = response.pdf;
  }

  if (xmlFile) {
    document.querySelector('[name="xml"]').value = response.xml;
  }
});

// Evento de error
dropzone.on('error', function (file, message) {
  console.log(message);
});

// Evento de eliminación de archivo
dropzone.on('removedfile', function () {
  document.querySelector('[name="imagen"]').value = "";
});
