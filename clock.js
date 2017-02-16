tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
    var d=new Date();
    var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
    if(nyear<1000) {
        nyear+=1900;
    }
    var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;
    
    if(nhour == 0){
        ap = " AM";nhour=12;
    }
    else if(nhour<12){
        ap = " AM";
    }
    else if(nhour==12){
        ap = " PM";
    }
    else if(nhour>12){
        ap = " PM";nhour-=12;
    }

    if(nmin<=9) {
        nmin = "0"+nmin;
    }
    if(nsec<=9) {
        nsec = "0"+nsec;
    }

    document.getElementById("clock").innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

window.onload=function(){
    GetClock();
    setInterval(GetClock,1000);
}

function findChecker() {
    var breed = document.forms["search"]["Breed"].value;
    var age = document.forms["search"]["age"].value;
    var gender = document.forms["search"]["gender"];
    if (breed == "null") {
        alert("Please select a breed");
        return false;
    }
    else if(age == "null") {
        alert("Please select an age");
        return false;
    }
    else {
        var count =0;
        for (var i=0; i<gender.length; i++) {
            if(gender[i].checked == false) {
                count++
            }
        }
        if(count==3) {
                alert("Please select a gender");
                return false;
            }
    }
}


function giveChecker() {
    var type = document.forms["search"]["animal"];
    var breed = document.forms["search"]["Breed"].value;
    var age = document.forms["search"]["age"].value;
    var email = document.forms["search"]["email"].value;
    var gender = document.forms["search"]["gender"];
    var firstName = document.forms["search"]["firstName"].value;
    var lastName = document.forms["search"]["lastName"].value;
    var count = 0;
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    for(var j=0; j<type.length; j++) {
        if(type[j].checked == false) {
            count++;
        }
    }
    if(count==2) {
        alert("Please select a type");
        return false;
    }
    else if (breed == "null") {
        alert("Please select a breed");
        return false;
    }
    else if(age == "null") {
        alert("Please select an age");
        return false;
    }
    else if(firstName == "") {
        alert("Please enter your first name!");
        return false;
    }
    else if(lastName == "") {
        alert("Please enter your last name!")
        return false;
    }
    else if(email == "") {
        alert("Please enter an email");
        return false;
    }
    else if(reg.test(email) == false) {
        alert("Please enter a valid email");
        return false;
    }
    else {
        count =0;
        for (var i=0; i<gender.length; i++) {
            if(gender[i].checked == false) {
                count++
            }
        }
        if(count==2) {
                alert("Please select a gender");
                return false;
            }
    }
}