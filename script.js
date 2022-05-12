function clearErrors() {
  errors = document.getElementsByClassName("formerror");
  for (let item of errors) {
    item.innerHTML = "";
  }
}
function seterror(id, error) {
  //sets error inside tag of id
  element = document.getElementById(id);
  element.getElementsByClassName("formerror")[0].innerHTML = error;
}

function validation1() {
  var username = document.f1.ename.value;
  var cityname = document.f1.city.value;
  var contact = document.f1.contactno.value;

  clearErrors();

  //   var username = document.getElementById("ename").value;
  //   var cityname = document.getElementById("city").value;
  //   var contact = document.getElementById("contactno").value;
  //var user=document.getElementById('ename').value;
  //   if (username.length <= 2 || username.length > 20) {
  //     document.getElementById("username").innerHTML =
  //       "usernamr length must be between 2 and 20";
  //     return false;
  //   }
  if (!isNaN(username)) {
    //document.getElementById("username").innerHTML = "Digits are not allowed";
    seterror("name", "*Length of name is too short");
    returnval = false;
    return false;
  }
  if (!isNaN(cityname)) {
    alert(cityname);
    //document.getElementById("cityname").innerHTML = "digits are not allowed";
    seterror("name", "*Length of name is too short");
    returnval = false;
    return false;
  }
  if (isNaN(contact)) {
    // document.getElementById("contact").innerHTML =
    //   "characters are   not allowed";
    seterror("name", "*Length of name is too short");
    returnval = false;
    return false;
  }
  if (contact.length != 10) {
    document.getElementById("contact").innerHTML =
      "contactno length must be 10";
    return false;
  }
  // function ageCalculator() {
  var userinput = document.getElementById("dob").value;
  var dob = new Date(userinput);
  if (userinput == null || userinput == "") {
    document.getElementById("message").innerHTML = "**Choose a date please!";
    return false;
  } else {
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();

    //convert the calculated difference in date format
    var age_dt = new Date(month_diff);

    //extract year from date
    var year = age_dt.getUTCFullYear();

    //now calculate the age of the user
    var age = Math.abs(year - 1970);

    //display the calculated age
    return (document.getElementById("result").innerHTML =
      "Age is: " + age + " years. ");
  }
}
