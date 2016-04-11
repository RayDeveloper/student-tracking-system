console.log("Connected to app");

function validateForm(){
  var value = document.getElementById("ID").value;
  if(value.length!=9){
    alert("The ID number you entered is too short.");
    //location.reload;
    return false;
  }
  return true;
}
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
