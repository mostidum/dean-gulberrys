const {createPool} = require('mysql')

const pool = createPool({
    host: "cs532.mysql.database.azure.com",
    user: "dean",
    password: "Gulberry!"
})

function tests() {
    console.log(pool.query(`select * from cs532.student`))
}

function checkValues(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var accountType = document.getElementById("accountType").value;

    if(username.length <= 5) {
        document.getElementById("errorMessage").innerText = "Username must be greater than 5 characters";
    }
    else if(password.length <= 5) {
        document.getElementById("errorMessage").innerText = "Password must be greater than 5 characters";
    }
    else if(password != document.getElementById("confirmPass").value){
        document.getElementById("errorMessage").innerText = "Passwords do not match";
    }
    else {
        document.getElementById("errorMessage").innerText = "";
        createNewUser(username, password, accountType)
    }
}

function createNewUser(username, password, accountType){

}