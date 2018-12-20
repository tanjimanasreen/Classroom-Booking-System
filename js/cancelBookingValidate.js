/*function isValidText(text){
    if(/^[a-zA-Z]+(([',. -][a-zA-Z])?[a-zA-Z]*)*$/.test(text)){
        return true;
    }
    else{
        return false;
    }
}*/


var valid =true;
function cancelValidate() {

    var reason = document.getElementById("reason");

    if(reason.value.length===0){
        document.getElementById("reasonSpan").innerText = "Please Fill Up This Section!";
        valid = false;
    }else {

        /*if(!isValidText(reason.value.toString())){

            document.getElementById("reasonSpan").innerText = "Must Be a Valid Text!";
            valid = false;
        }else{

            document.getElementById("reasonSpan").innerText = " ";
            valid = true;
        }*/

        document.getElementById("reasonSpan").innerText = " ";
        valid = true;

    }

    if(!valid){

        return false;
    }else
        return true;

}