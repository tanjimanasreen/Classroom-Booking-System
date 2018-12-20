var valid = true;
var validId = true;
var validName = true;
var validEmail = true;
var validPhone = true;
var validPass = true;
var validRpass = true;
var validDept = true;

function isValidName(fname){
    if(/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(fname)){
        return true;
    }
    else{
        return false;
    }
}

function isValidUserID(id){
        if(/^[0-1]{1}[0-9]{1}(-)[0-9]{5}(-)[1-3]{1}$/.test(id)){
        return true;
    }
    else {
        return false;
    }
}

function isValidMobile(phone){
    if(/^(0088|\+88)?(01)[156789]{1}[0-9]{8}$/.test(phone)){
        return true;
    }
    else {
        return false;
    }
}

function isValidEmail(email) {
    if (/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/.test(email)) {
        return true;
    }
    else {
        return false;
    }

}

function isValidPass(pass){
    if(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(pass))
    {
        return true;
    }else{
        return false;
    }
}


function test(dom){

    var pass = document.getElementById("password");
    var passCheck = document.getElementById("repassSpan");
    var rePass = document.getElementById("repassword");

    if(pass.value === dom.value)
    {
        passCheck.style.color = "green";
        passCheck.innerText = " ✔ ";
        rePass.style.borderColor = "green";
    }else
    {

        passCheck.style.color = "red";
        rePass.style.borderColor = "red";
        passCheck.innerText = " ✖ ";
    }

}

function checkEmail(email){
    var xhttp;
    if(email.length === 0){
        document.getElementById("emailSpan").innerHTML = "";
        validEmail = false;
        return;
    }
    if(!isValidEmail(email)){
        document.getElementById("emailSpan").innerHTML = "Invalid Email !";
        validEmail = false;
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("emailSpan").innerHTML = this.responseText;
        }
    };
    validEmail = true;
    xhttp.open("GET", "controller/registration.php?email="+email, true);
    xhttp.send();
}

function checkUserID(id){
    var xhttp;
    if(id.length === 0){
        document.getElementById("idSpan").innerHTML = "";
        validId = false;
        return;
    }
    if(!isValidUserID(id)){
        document.getElementById("idSpan").innerHTML = "Invalid Username !";
        validId = false;
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("idSpan").innerHTML = this.responseText;
        }
    };
    validId = true;
    xhttp.open("GET", "controller/registration.php?id="+id, true);
    xhttp.send();
}

function checkUserName(name){

    //var name = document.getElementById("name");
   // var errorName = document.getElementById("nameSpan");

    if(name.value.length===0)
    {
        name.style.borderColor = "red";
        document.getElementById("nameSpan").innerText = "Field can not be empty!";
        //validName = false;
    }else
    {
        if(!isValidName(name.value.toString()))
        {
            name.style.borderColor = "red";
            document.getElementById("nameSpan").innerText = "Must contain only alphabets";
            //validName = false;
        }else{

            name.style.borderColor ="green";
            document.getElementById("nameSpan").innerText = "";
            //validName = true;
        }

    }

}

function validateForm() {

    var id = document.getElementById("id");
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var password = document.getElementById("password");
    var rePassword = document.getElementById("repassword");
    var dept = document.getElementById("dept");

    //Full Name
    if(name.value.length===0)
    {
        name.style.borderColor = "red";
        document.getElementById("nameSpan").innerText = "Field can not be empty!";
        validName = false;
    }else
    {
        if(!isValidName(name.value.toString()))
        {
            name.style.borderColor = "red";
            document.getElementById("nameSpan").innerText = "Must contain only alphabets";
            validName = false;
        }else{

            name.style.borderColor ="green";
            document.getElementById("nameSpan").innerText = "";
            validName = true;
        }

    }

    //User ID
    if(id.value.length===0)
    {
        id.style.borderColor = "red";
        document.getElementById("idSpan").innerText = "Field can not be empty!";
        validId =false;
    }else
    {
        if(!isValidUserID(id.value.toString()))
        {
            id.style.borderColor = "red";
            document.getElementById("idSpan").innerText = "Invalid User ID";
            validId = false;
        }else{

            id.style.borderColor = "green";
            document.getElementById("idSpan").innerText = "";
            validId = true;

        }

    }

    //Email
    if(email.value.length===0)
    {
        email.style.borderColor = "red";
        document.getElementById("emailSpan").innerText = "Field can not be empty!";
        validEmail =false;
    }else
    {
        if(!isValidEmail(email.value.toString()))
        {
            email.style.borderColor = "red";
            document.getElementById("emailSpan").innerText = "Invalid Email Address";
            validEmail = false;
        }else
        {
            email.style.borderColor = "green";
            document.getElementById("emailSpan").innerText = "";
            validEmail = true;
        }

    }

    //Phone
    if(phone.value.length===0)
    {
        phone.style.borderColor = "red";
        document.getElementById("phoneSpan").innerText = "Field can not be empty!";
        validPhone =false;
    }else
    {
        if(!isValidMobile(phone.value.toString()))
        {
            phone.style.borderColor = "red";
            document.getElementById("phoneSpan").innerText = "Invalid mobile number";
            validPhone = false;
        }else{

            phone.style.borderColor = "green";
            document.getElementById("phoneSpan").innerText = "";
            validPhone = true;
        }

    }

    //Department
    if(dept.value==="select")
    {
        document.getElementById("deptSpan").innerText = "Department must be selected!";
        validDept = false;
    }else{

        document.getElementById("deptSpan").innerText = "";
        validDept = true;
    }

    //Password
    if(password.value.length===0)
    {
        password.style.borderColor = "red";
        document.getElementById("passSpan").innerText = "Field can not be empty!";
        validPass =false;
    }else
    {
        if(!isValidPass(password.value.toString()))
        {
            password.style.borderColor = "red";
            document.getElementById("passSpan").innerText = "number,capital,small and special charecter needed(length 8)";
            validPass = false;
        }else{

            password.style.borderColor = "green";
            document.getElementById("passSpan").innerText = "";
            validPass = true;
        }
    }

    //Confirm Password
    if(rePassword.value!==password.value)
    {
        console.log(rePassword.value);
        rePassword.style.borderColor = "red";
        document.getElementById("repassSpan").innerText = " ✖ ";
        validRpass =false;
    }

    //Checks all validation
    if(!validName || !validId || !validEmail || !validPhone || !validPass || !validRpass || !validDept)
    {
        valid = false;
    }else
    {
        valid = true;
    }

    return valid;
}

