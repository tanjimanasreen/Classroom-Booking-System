var validRoom =true;
var valid = true;
var validLocation = true;
var validType = true;

function validateFormRoom() {

    var room = document.getElementById("room");
    var roomSpan = document.getElementById("roomSpan");
    var type = document.getElementById("roomtype");
    var typeSpan = document.getElementById("typeSpan");
    var location = document.getElementById("roomlocation");
    var locationSpan = document.getElementById("locationSpan");

    if(location.value=="select"){

        locationSpan.innerText = "Please Select a Room Location";
        validLocation = false;
    }else{

        validLocation = true;
        locationSpan.innerText = " ";
    }

    if(type.value=="select"){

        typeSpan.innerText = "Please Select a Room Type";
        validType = false;
    }else{

        validType = true;
        typeSpan.innerText = " ";
    }

    if(room.value.length===0){

        validRoom = false;
        roomSpan.innerText = "Please Enter a Room Number";
    }else{

        if(!isValidRoomName(room.value.toString())){

            validRoom = false;
            roomSpan.innerText = "Please Enter a Valid Room Format";
        }else{

            validRoom = true;
            roomSpan.innerText = " ";
        }
    }

    if(!validRoom || !validType || !validLocation){

        valid = false;
    }else {
        valid = true;
    }

    return valid;
}

function checkRoomName(room) {
    var xhttp;
    if(room.length === 0){
        document.getElementById("roomSpan").innerHTML = "";
        validRoom = false;
        return;
    }
    if(!isValidRoomName(room)){
        document.getElementById("roomSpan").innerHTML = "Invalid Room Format !";
        validRoom = false;
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("roomSpan").innerHTML = this.responseText;
        }
    };
    validEmail = true;
    xhttp.open("GET", "controller/roomExist.php?room="+room, true);
    xhttp.send();

}

function  isValidRoomName(room) {

    if(/^[1-7]{1}[0-9]{3}$/.test(room)){
        return true;
    }else{
        return false;
    }
}


