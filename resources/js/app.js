import Dropzone from "dropzone"
Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube un PDF aquí',
  acceptedFiles: ".pdf",
  addRemoveLinks: true,
  dictRemoveFile: "<button type='button' class='bg-green-700 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg'>Borrar archivo</button>",
  maxFiles: 1,
  uploadMultiple: false,
  // Trabajando con imagen en el contenedor de Dropzone
  init: function () {
    if (document.querySelector('[name="pdf"]').value.trim()) {
      const pdf_publicado = {};
      pdf_publicado.size = 1234;
      pdf_publicado.name = document.querySelector('[name="pdf"]').value;
      this.options.addedfile.call(this, pdf_publicado);
      this.options.thumbnail.call(
        this,
        pdf_publicado.name,
        '/uploads_pdf/${pdf_publicado.name}'
      );
      pdf_publicado.previewElement.classList.add(
        "dz-success",
        "dz-complete"
      );
    }
  },
  // Evento de envío de archivo correcto
  success: function (file, response) {
    document.querySelector('[name="pdf"]').value = response.pdf;
  },
  // Evento de error de envío
  error: function (file, message) {
    console.log(message);
  },
  // Evento de eliminación de archivo
  removedfile: function () {
    document.querySelector('[name="pdf"]').value = "";
  }
});
