console.log("Connected to app");

// document.addEventListener("DOMContentLoaded", function() {
//
//   var myForm = document.getElementById("form1");
//   var checkForm = function(e) {
//     if(!this.form1.checked) {
//       alert("Please indicate that you accept the Terms and Conditions");
//       this.terms.focus();
//       e.preventDefault(); // equivalent to return false
//       return;
//     }
//   };
//
//   // attach the form submit handler
//   myForm.addEventListener("submit", checkForm, true);
//
//   var myCheckbox = document.getElementById("c1[]");
//   var myCheckboxMsg = "Please indicate that you accept the Terms and Conditions";
//
//   // set the starting error message
//   myCheckbox.setCustomValidity(myCheckboxMsg);
//
//   // attach checkbox handler to toggle error message
//   myCheckbox.addEventListener("change", function() {
//     this.setCustomValidity(this.validity.valueMissing ? myCheckboxMsg : "");
//   }, false);
//
// }, false);
