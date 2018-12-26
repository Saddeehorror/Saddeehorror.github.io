<?php
?>
<form name=\form_sasisopa_upload_files\ id=\form_sasisopa_upload_files\ method=\post\ enctype=\multipart/form-data\ onsubmit=\return upload_files_sasisopa()\>
    <div class=\col-sm-8\>
        <input  type=\file\  id=\files\ name=\files[]\ multiple=\\ class=\inputfile_caracteristicastramite\> 
        <label  for=\files\><svg aria-hidden=\true\ data-prefix=\fas\ data-icon=\upload\ class=\svg-inline--fa fa-upload fa-w-16\ role=\img\ xmlns=\http://www.w3.org/2000/svg\ width=\20\ height=\17\ viewBox=\0 0 512 512\><path fill=\currentColor\ d=\M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z\></path></svg> Elige un archivo</label>
   </div>
    <input type=\hidden\ value=\<?php echo $row['es']?>\ name=\numero_estacion_files\>
    <output id=\list\></output>
    <input type=\submit\ class=\btn btn-primary\ value=\Subir\>		
</form>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> - ',
      f.size, ' bytes', '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>