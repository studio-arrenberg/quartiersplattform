console.log('Hello World');

// elements
const um_profile_apply_button = document.querySelector("div.um-modal-footer div.um-modal-right a.um-finish-upload.um-modal-btn");
const um_profile_img = document.querySelector("div.um-field-area div.um-single-image-preview img");
const um_profile_div = document.querySelector("div.um-field-area div.um-single-image-preview");
const qp_profile_img = document.querySelector("div.profil-header div.profil-header-avatar img");
const qp_menu_profile_img = document.querySelector("div.site-header-content a.profil-button img");
var img_src;

// further read https://blog.sessionstack.com/how-javascript-works-tracking-changes-in-the-dom-using-mutationobserver-86adc7446401

var mutationObserver = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    // console.log(mutation);
    if (um_profile_img.getAttribute('src').indexOf('/ultimatemember/') !== -1 ) {
      // stop observer
      // mutationObserver.disconnect();
      // timeout
      setTimeout(function() {

        if (um_profile_img.getAttribute('src').indexOf('/ultimatemember/') !== -1 ) {
          //  get url
          img_src = um_profile_img.src;
          // set url
          qp_profile_img.src = img_src;
          qp_menu_profile_img.src = img_src;
          // remove element
          // um_profile_img.remove();
          um_profile_img.src = '';
          um_profile_div.style.display = "none";
        }
        
      }, 200);
    }
  });
});

// Starts listening for changes in the root HTML element of the page.
mutationObserver.observe(document.documentElement, {
  attributes: true,
  characterData: true,
  childList: true,
  subtree: true,
  attributeOldValue: true,
  characterDataOldValue: true
});