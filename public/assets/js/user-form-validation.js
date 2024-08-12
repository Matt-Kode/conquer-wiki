const usernameinput = document.getElementById('usernamein');
const passwordinput = document.getElementById('passwordin');
const usernamediv = document.getElementById("username");
const passworddiv = document.getElementById("password");

window.addEventListener('submit', (e) => {

    if (usernameinput.value === '') {
        e.preventDefault();
        usernamediv.classList.remove('too-long');
        usernamediv.classList.add('null');
    }

    if (usernameinput.value.length > 16) {
        e.preventDefault();
        usernamediv.classList.remove('null');
        usernamediv.classList.add('too-long');
    }

    if (passwordinput.value.length > 16) {
        e.preventDefault();
        passworddiv.classList.remove('null');
        passworddiv.classList.add('too-long');
    }
})