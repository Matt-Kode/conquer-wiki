const usernameinput = document.getElementById('usernamein');
const passwordinput = document.getElementById('passwordin');
const usernamediv = document.getElementById("username");
const passworddiv = document.getElementById("password");

window.addEventListener('submit', (e) => {

    if (usernameinput.value === '') {
        e.preventDefault();
        usernamediv.classList.add('null');
    }

    if (passwordinput.value === '') {
        e.preventDefault();
        passworddiv.classList.add('null');
    }

})