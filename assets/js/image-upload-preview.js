    // remember https://www.codingnepalweb.com/2020/07/preview-image-before-upload-in-javascript.html
    const wrapper = document.querySelector('.acf-field-image');
    //   const fileName = document.querySelector('.file-name');
      const defaultBtn = document.querySelector('.acf-field-image input[type="file"]');
    //   const customBtn = document.querySelector('#custom-btn');
    //   const cancelBtn = document.querySelector('#cancel-btn i');
      const img = document.querySelector('.acf-image-uploader img');
      let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
      function defaultBtnActive() {
        defaultBtn.click();
      }
      defaultBtn.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function () {
            const result = reader.result;
            img.src = result;
            wrapper.classList.add('active');
          };
        //   cancelBtn.addEventListener('click', function () {
        //     img.src = '';
        //     wrapper.classList.remove('active");
        //   });
          reader.readAsDataURL(file);
        }
        if (this.value) {
          let valueStore = this.value.match(regExp);
        //   fileName.textContent = valueStore;
        }
      });