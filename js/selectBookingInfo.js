function showTime(type) {

    if(type.value==="lab"){
        document.getElementById("lb").style.display = "block";
        document.getElementById("th1").style.display = "none";
        document.getElementById("th2").style.display = "none";
    }else if(type.value==="theory1"){

        document.getElementById("th1").style.display = "block";
        document.getElementById("lb").style.display = "none";
        document.getElementById("th2").style.display = "none";
    }else if(type.value==="theory2"){

        document.getElementById("th2").style.display = "block";
        document.getElementById("th1").style.display = "none";
        document.getElementById("lb").style.display = "none";
    }

}

function validateBooking() {

    var validClass = true;
    var validCourse = true;
    var validTime = true;
    var validDate =true;
    var valid = true;

    var isClass = document.getElementById("classType");
    var isCourse = document.getElementById("course");
    var selectDate = document.getElementById("selectDate");

    var th11 = document.getElementById("th11");
    var th12 = document.getElementById("th12");
    var th13 = document.getElementById("th13");
    var th14 = document.getElementById("th14");
    var th15 = document.getElementById("th15");
    var th16 = document.getElementById("th16");

    var th21 = document.getElementById("th21");
    var th22 = document.getElementById("th22");
    var th23 = document.getElementById("th23");
    var th24 = document.getElementById("th24");
    var th25 = document.getElementById("th25");

    var lb1 = document.getElementById("lb1");
    var lb2 = document.getElementById("lb2");
    var lb3 = document.getElementById("lb3");

    if(isClass.value == "classType"){

        document.getElementById("classSpan").innerText = "Please Select a Class Type!";
        validClass = false;

    }else{

        document.getElementById("classSpan").innerText = "";
        validClass = true;
    }

    if(selectDate.value.length===0){

        document.getElementById("dateSpan").innerText = "Please Select a Date!";
        validDate = false;
    }else{

        document.getElementById("dateSpan").innerText = "";
        validDate = true;
    }

    if(isCourse.value == "course"){

        document.getElementById("courseSpan").innerText = "Please Select a Course Name!";
        validCourse = false;
    }else{

        document.getElementById("courseSpan").innerText = "";
        validCourse = true;
    }

    if(isClass.value =="theory1" && (!th11.checked && !th12.checked && !th13.checked && !th14.checked && !th15.checked && !th16.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;
    }

    if(isClass.value =="theory2" && (!th21.checked && !th22.checked && !th23.checked && !th24.checked && !th25.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;
    }

    if(isClass.value =="lab" && (!lb1.checked && !lb2.checked && !lb3.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTime = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTime = true;

    }

    if(!validTime || !validClass || !validCourse || !validDate){

        valid = false;
    }else{

        valid = true;
    }

    return valid;

}

var confirm = true;
function checkRoom() {

    var classRoom = document.getElementById("class");

    if(!classRoom.checked){

        document.getElementById("roomNumSpan").innerText = "Please Select a Room!!";
        confirm = false;
    }else{

        document.getElementById("roomNumSpan").innerText = "";
        confirm = true;
    }

    return confirm;
}

var validClassAdmin = true;
var validCourseAdmin = true;
var validTimeAdmin = true;
var validDateAdmin =true;
var validFaculAdmin =true;
var validAdmin = true;

function isValidUserID(id){
    if(/^[0-1]{1}[0-9]{1}(-)[0-9]{5}(-)[1-3]{1}$/.test(id)){
        return true;
    }
    else {
        return false;
    }
}

function checkUserID(id){
    var xhttp;
    if(id.length === 0){
        document.getElementById("faculSpan").innerHTML = "";
        validFaculAdmin = false;
        return;
    }
    if(!isValidUserID(id)){
        document.getElementById("faculSpan").innerHTML = "Please Insert a Valid ID !";
        validFaculAdmin = false;
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("faculSpan").style.color = "green";
            document.getElementById("faculSpan").innerHTML = this.responseText;
        }
    };
    validFaculAdmin = true;
    xhttp.open("GET", "controller/facultyExist.php?id="+id, true);
    xhttp.send();
}

function validateBookingAdmin() {

    var isClass = document.getElementById("classType");
    var isCourse = document.getElementById("course");
    var selectDate = document.getElementById("selectDate");
    var isFaculty = document.getElementById("facul");

    var th11 = document.getElementById("th11");
    var th12 = document.getElementById("th12");
    var th13 = document.getElementById("th13");
    var th14 = document.getElementById("th14");
    var th15 = document.getElementById("th15");
    var th16 = document.getElementById("th16");

    var th21 = document.getElementById("th21");
    var th22 = document.getElementById("th22");
    var th23 = document.getElementById("th23");
    var th24 = document.getElementById("th24");
    var th25 = document.getElementById("th25");

    var lb1 = document.getElementById("lb1");
    var lb2 = document.getElementById("lb2");
    var lb3 = document.getElementById("lb3");

    if(isClass.value == "classType"){

        document.getElementById("classSpan").innerText = "Please Select a Class Type!";
        validClassAdmin = false;

    }else{

        document.getElementById("classSpan").innerText = "";
        validClassAdmin = true;
    }

    if(isFaculty.value.length === 0){

        document.getElementById("faculSpan").innerText = "Please Insert a Faculty ID!";
        validFaculAdmin = false;

    }else{

        if(!isValidUserID(isFaculty.value.toString()))
        {
            document.getElementById("faculSpan").innerText = "Please Insert a Valid Faculty ID!";
            validFaculAdmin = false;
        }else{
            document.getElementById("faculSpan").innerText = "";
            validFaculAdmin = true;
        }

    }

    if(selectDate.value.length===0){

        document.getElementById("dateSpan").innerText = "Please Select a Date!";
        validDateAdmin = false;
    }else{

        document.getElementById("dateSpan").innerText = "";
        validDateAdmin = true;
    }

    if(isCourse.value == "course"){

        document.getElementById("courseSpan").innerText = "Please Select a Course Name!";
        validCourseAdmin = false;
    }else{

        document.getElementById("courseSpan").innerText = "";
        validCourseAdmin = true;
    }

    if(isClass.value =="theory1" && (!th11.checked && !th12.checked && !th13.checked && !th14.checked && !th15.checked && !th16.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTimeAdmin = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTimeAdmin = true;
    }

    if(isClass.value =="theory2" && (!th21.checked && !th22.checked && !th23.checked && !th24.checked && !th25.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTimeAdmin = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTimeAdmin = true;
    }

    if(isClass.value =="lab" && (!lb1.checked && !lb2.checked && !lb3.checked)){

        document.getElementById("timeSpan").innerText = "Please Select a Time!";
        validTimeAdmin = false;
    }else{

        document.getElementById("timeSpan").innerText = "";
        validTimeAdmin = true;

    }

    if(!validTimeAdmin || !validClassAdmin || !validCourseAdmin || !validDateAdmin || !validFaculAdmin){

        validAdmin = false;
    }else{

        validAdmin = true;
    }

    return validAdmin;

}