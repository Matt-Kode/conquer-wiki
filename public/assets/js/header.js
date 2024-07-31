const accountbox = document.querySelector(".account");


window.onclick = function (e) {

    if (!e.target.classList.contains("account-button")) {
        accountbox.classList.remove("active")
    }
}

accountbox.addEventListener("click", () => {
    accountbox.classList.toggle("active");
})