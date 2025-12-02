function tampilkanPreview(input, idPreview) {
  var preview = document.getElementById(idPreview);
  
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    }

    reader.readAsDataURL(input.files[0]);
  }
}