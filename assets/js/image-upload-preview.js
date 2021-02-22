// remember https://www.codingnepalweb.com/2020/07/preview-image-before-upload-in-javascript.html
const wrapper = document.querySelector(".acf-field-image");
const dropArea = document.querySelector(".acf-field.acf-field-image");
//   const fileName = document.querySelector('.file-name');
const defaultBtn = document.querySelector(
  '.acf-field-image input[type="file"]'
);
//   const customBtn = document.querySelector('#custom-btn');
//   const cancelBtn = document.querySelector('#cancel-btn i');
const img = document.querySelector(".acf-field-image img");
const dragText = document.querySelector("p.description");

let file; //this is a global variable and we'll use it inside multiple functions

let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
function defaultBtnActive() {
  defaultBtn.click();
}
defaultBtn.addEventListener("change", function () {
  file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      const result = reader.result;
      img.src = result;
      wrapper.classList.add("active");
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

// # drag to upload

// // input.addEventListener("change", function(){
// //   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
// //   file = this.files[0];
// //   dropArea.classList.add("active");
// //   showFile(); //calling function
// // });

// // If user Drag File Over DropArea
// dropArea.addEventListener("dragover", (event) => {
//   event.preventDefault(); //preventing from default behaviour
//   // dropArea.classList.add("active");
//   dragText.textContent = "Release to Upload File";
// });

// //If user leave dragged File from DropArea
// // dropArea.addEventListener("dragleave", ()=>{
// //   dropArea.classList.remove("active");
// //   dragText.textContent = "Drag & Drop to Upload File";
// // });

// //If user drop File on DropArea
// dropArea.addEventListener("drop", (event) => {
//   event.preventDefault(); //preventing from default behaviour
//   file = event.dataTransfer.files[0];
//   showFile(); //calling function
// });

// function showFile() {
//   console.log(file);
//   let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array
//   if (validExtensions.includes(file.type)) {
//     //if user selected file is an image file
//     const reader = new FileReader();
//     reader.onload = function () {
//       const result = reader.result;
//       img.src = result;
//       document
//         .querySelector(".acf-field-image input[type='hidden']")
//         .setAttribute("value", reader);
//       wrapper.classList.add("active");
//     };
//     reader.readAsDataURL(file);
//   } else {
//     alert("Nur Bild Dateien können hochgeladen werden");
//     dragText.textContent = "Drag & Drop to Upload File";
//   }
// }
