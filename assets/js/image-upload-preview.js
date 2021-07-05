// Read https://www.codingnepalweb.com/2020/07/preview-image-before-upload-in-javascript.html
console.log('Image Upload Preview enabled');

let file; //this is a global variable and we'll use it inside multiple functions

let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

$( '.acf-basic-uploader input[type="file"]' ).change(function(event) {
  file = '';
  // alert( "Image Added" );
  file = this.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      const result = reader.result;
      // get div wrapper
      var wra = event.target.closest('.acf-image-uploader');
      elt = wra.querySelector("div.image-wrap img");
      elt.src = result;

      // wrapper.classList.add("active");
      var wrap = event.target.closest('.acf-field-image');
      wrap.classList.add("active");
    };
    reader.readAsDataURL(file);
  }
  if (this.value) {
    let valueStore = this.value.match(regExp);
    //   fileName.textContent = valueStore;
  }

});
