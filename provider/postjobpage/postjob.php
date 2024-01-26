<?php
include 'header.php';
?>


    <section class="post-ajob">
      <div class="container" margin-top: 20px;>
        <div class="postcolor">
          <h2>Post a job</h2>
        </div>
        <div id="forms">
          <p id="error"></p>
        <form action="index.php" id="myform"  method="POST">
          <input type="text" name="jobtitle" placeholder="Job title" id="jobtitle" required/><br />
          <input
            type="text"
            name="hirecompany"
            id="hirecompany"
            placeholder="Hirer company/individual name" required
          /><br />
          <input
            type="text"
            name="qualification-certificate"
            placeholder="Qualification/Certificate"
            id="certificate" required
          /><br />
          
          <input
          id="appliciantexperiance"
            type="text"
            name="appliciantexperiance"
            placeholder="Applicant's experience" required
          /><br />
          <label for="jobcategory">Job Catagory</label>
          <select id="jobcategory"
          type="text"
          name="jobcategory"
          placeholder="Job category"
          list="jobcategories"
          required>
          <option value="" disabled selected>Select job catagory</option>
          <option value="Creative art and design">Creative art and design</option>
          <option value="Finance and Accounting">Finance and Accounting</option>
          <option value="Sales and Marketing">Sales and Marketing</option>
          <option value="Information technology">Information technology</option>
          <option value="Engineering">Engineering</option>
          <option value="Healthcare">Healthcare</option>
          <option value="Teaching and Training">Teaching and Training</option>
          <option value="other">other</option>
        </select>
        <br />
        <label for="quantityneeded">Quantity Needed</label>
        <input
        id="quantityNeeded"
            type="number"
            name="quantityneeded"
            placeholder="Quantity Needed" required
          /><br />
          <label for="postdate">Postdate</label>
          <input type="date" name="postdate" placeholder="Post date" id="postdate" required/>
          <label for="deadline">Deadline</label>
          <input type="date" name="deadline" placeholder="Deadline" id="deadline" required /><br />
          <div class="address">
          <label for="address">Address</label><br>
          <select id="region" name="region" class="js-example-basic-single"  required>
              <option value="" disabled selected>Select your region</option>
              <option value="Oromia">Oromia</option>
              <option value="Amhara">Amhara</option>
              <option value="Tigray">Tigray</option>
              <option value="Somali">Somali</option>
              <option value="Gambela">Gambela</option>
              <option value="Addis Ababa">Addis Ababa</option>
              <option value="Harari">Harari</option>
              <option value="Affar">Affar</option>
              <option value="Sidama">Sidama</option>
              <option value="Benishangul-Gumuz">SNNPR</option>

          </select>
          <input type="city" name="city" placeholder="city" id="city" required><br>
        </div>
      
          <input type="submit" id="submit" value="submit" name="submit">
        </form>
      </div>
      </div>
    </section>

    <script>
      function formvalidation(){
    var jobtitle = document.getElementById("jobtitle").value;
    var hirecompany = document.getElementById("hirecompany").value;
    var certificate = document.getElementById("certificate").value;
    var quantityneeded = document.getElementById("quantityneeded").value;
    var appliciantexperiance = document.getElementById("appliciantexperiance").value;
    var jobcatagory = document.getElementById("job-catagory").value;
var postdate = document.getElementById("postdate").value;
var deadline = document.getElementById("deadline").value;
var region= document.getElementById("region").value;
var city= document.getElementById("city").value;
}
function updateError(inputId, isValid,  Message){
    var errorElement=document.getElementById("error");
    if(errorElement.textContent=isValid){
        document.getElementById(inputId).style.borderColor="green";
        errorElement.textContent="✅";
    }else{
        document.getElementById(inputId).style.borderColor="red";
        errorElement.textContent=Message;
    }
}
function addInputListener(inputId, regex, Message){
    document.getElementById(inputId).addEventListener("input", function(){
        var value = this.value;
        var isValid = regex.test(value);
        updateError(inputId, isValid, Message);
    });
}
addInputListener("jobtitle",/^[a-zA-Z  ]{3,20}$/, "🚫only letters, atleast 3 character");
addInputListener("hirecompany",/^.{3,}$/, "🚫atleast 3 character");
addInputListener("certificate",/^.{3,}$/, "🚫 atleast 3 character");
addInputListener("quantityNeeded",/^(|[1-9]\d*)$/, "🚫atleast 1");
addInputListener("city",/^[a-zA-Z  ]{3,20}$/, "🚫only letters, atleast 3 character");
addInputListener("appliciantexperiance",/^.{3,}$/, "🚫 atleast 3 character");


document.addEventListener("DOMContentLoaded", function () {
    // Get the current date
    var today = new Date();

    // Format the date as YYYY-MM-DD (required format for the date input)
    var formattedDate = today.toISOString().split('T')[0];

    // Set the value and max attribute of the date input field
    var todayDateInput = document.getElementById("postdate");
    todayDateInput.value = formattedDate;
    todayDateInput.setAttribute("max", formattedDate);
    todayDateInput.setAttribute("min", formattedDate);
});

document.addEventListener("DOMContentLoaded", function () {

    var today = new Date();


    var formattedDate = today.toISOString().split('T')[0];

    
    var futureDateInput = document.getElementById("deadline");
    futureDateInput.value = formattedDate;
    futureDateInput.setAttribute("min", formattedDate);
});

function checkFormValidity() {
    var isFormValid =
    isInputValid("jobtitle") &&
    isInputValid("hirecompany") &&
    isInputValid("certificate") &&
    isInputValid("quantityneeded") &&
    isInputValid("appliciantexperiance") &&
    isInputValid("city") 

    document.getElementById("submit").disabled = !isFormValid;
}

function isInputValid(inputId) {
    return document.getElementById(inputId).style.borderColor === "green";
}

document.getElementById("myform").addEventListener("submit", function (event) {
    if (!isFormValid()) {
        event.preventDefault();
        document.getElementById("error").textContent = "🚫Please fill the form correctly🚫";
        document.getElementById("error").style.color = "red";
    

    }

});


function isFormValid() {
    
    return (
        isInputValid("jobtitle") &&
        isInputValid("hirecompany") &&
        isInputValid("certificate") &&
        isInputValid("quantityNeeded") &&
        isInputValid("appliciantexperiance") &&
        isInputValid("city") 

    );
}
    </script>
  </body>
</html>
