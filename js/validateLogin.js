

function isValidUserID(id){
    if(/^[0-1]{1}[0-9]{1}(-)[0-9]{5}(-)[1-3]{1}$/.test(id)){
        return true;
    }
    else {
        return false;
    }
}

function checkUserID(id) {

    if(id.value.length===0)
    {
        id.style.borderColor = "red";
        document.getElementById("idSpan").innerText = "Field can not be empty!";
        validId =false;
    }else {
        if (!isValidUserID(id.value.toString())) {
            id.style.borderColor = "red";
            document.getElementById("idSpan").innerText = "Invalid User ID";
            validId = false;
        } else {

            id.style.borderColor = "green";
            document.getElementById("idSpan").innerText = "";
            validId = true;

        }


    }
}

function checkLogin() {

    var id = document.getElementById("id");
    var password = document.getElementById("password");
    var validID = true;
    var validPass = true;

    if(id.value.length===0)
    {
        document.getElementById("idSpan").innerText = "Field can not be empty!";
        validID = false;
    }

    if(password.value.length===0)
    {
        document.getElementById("passwordSpan").innerText = "Field can not be empty!";
        validPass = false;

    }

    if(!validID || !validPass)
    {
        return false;
    }else return true;

}
