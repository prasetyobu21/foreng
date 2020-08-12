function submitFunction() {
    var id= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    if(id == "admin@admin.com" && password == "admin"){
        window.location.href= "exhibition.html";
    } else{
        alert ("Wrong Password")
    }
}
// id password dummy
// email: admin@admin.com
// pass: admin