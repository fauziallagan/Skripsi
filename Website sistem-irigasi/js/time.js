var date1 = document.getElementById('date1');
var date2 = document.getElementById('date2');
var date3 = document.getElementById('date3');
var date4 = document.getElementById('date4');
var date5 = document.getElementById('date5');

function dateTime(){
    var date = new Date();
    var text = date.toDateString();
    date1.innerHTML=text;
    date2.innerHTML=text;
    date3.innerHTML=text;
    date4.innerHTML=text;
    date5.innerHTML=text;
}
