$(document).ready(function () {
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    $('#myCarousel').carousel(parseInt(getParameterByName('slide')));
    var name = document.getElementById("name");
    var date = document.getElementById("date");
    var table = document.getElementById("endorsementTable");
    var submit = document.getElementById("submit");
    var sortName = document.getElementById("sortName");
    var sortDate = document.getElementById("sortDate");
    var endorse = document.getElementById("endorse");
    var register = document.getElementById("register");
    var myJSON;
    name.value = localStorage.getItem("name");
    date.value = localStorage.getItem("date");
    function load_data() {
        if (localStorage.name) {
            name.value = localStorage.getItem('name');
        } else {
        }
        if (localStorage.date) {
            date.value = localStorage.getItem('date');
        } else {
        }
        if (localStorage.endorse){
            endorse.value = localStorage.getItem('endorse');
        } else {
        }
    }
    load_data();
    if (localStorage.getItem("myJSON")) {
        myJSON = JSON.parse(localStorage.getItem("myJSON"));
    } else {
        myJSON = [];
    }
    function createTable(){
        var innerHTML = "";
        for (var i = 0; i < myJSON.length; i++){
            innerHTML += "<tr><td>" + myJSON[i].name + "</td><td>" + myJSON[i].date + "</td><td>" + myJSON[i].endorse + "</td><tr>";
        }
        table.innerHTML = innerHTML;
    }
    createTable();
    function clear(){
        localStorage.removeItem('name');
        localStorage.removeItem('date');
        localStorage.removeItem('endorse');
    }
    name.onkeyup = function () {
        localStorage.setItem('name', name.value);
    }
    date.onkeyup = function () {
        localStorage.setItem('date', date.value);
    }
    endorse.onkeyup = function(){
        localStorage.setItem('endorse', endorse.value);
    }
    submit.onclick = function () {
        if(localStorage.getItem("myJSON") === null){
            myJSON = [];
        } else {
            myJSON = JSON.parse(localStorage.getItem('myJSON'));
        }
        myJSON.push({"name": localStorage.getItem("name"), "date": localStorage.getItem("date"), "endorse": localStorage.getItem("endorse")});
        localStorage.setItem("myJSON", JSON.stringify(myJSON));
        createTable();
    }
    sortName.onclick = function(){
        var sorted = myJSON.sort(function move(a, b){
            return b.name < a.name ? 1 : b.name > a.name ? -1 : 0;
        });
        myJSON = sorted;
        createTable();
    }
    sortDate.onclick = function(){
        var sorted = myJSON.sort(function move(a, b){
            return b.date < a.date ? 1 : b.date > a.date ? -1 : 0;
        });
        myJSON = sorted;
        createTable();
    }
    function updateList(){
        setInterval(function(){
            $.getJSON('JSON.JSON', function(data){
                document.getElementById("endorsementTable").innerHTML = "";
                var innerHTML = "";
                for (i = 0; i < data.length; i++){
                    innerHTML += "<tr><td>" + data[i].name + "</td><td>" + data[i].date + "</td><td>" + data[i].endorse + "</td></tr>";
                }
                document.getElementById("endorsementTable").innerHTML = innerHTML;
                var JSONString = JSON.stringify(data);
                localStorage.removeItem('myJSON');
                localStorage.setItem('myJSON', JSONString);
            })
        }, 5000);
    }
    updateList();
});