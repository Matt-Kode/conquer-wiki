const accountbox = document.querySelector(".account");
const searchbackdrop = document.querySelector(".search-backdrop");
const searchresults = document.querySelector(".search-results");

window.onclick = function (e) {

    if (!e.target.classList.contains("account-button")) {
        accountbox.classList.remove("active")
    }
}

accountbox.addEventListener("click", () => {
    accountbox.classList.toggle("active");
})

window.addEventListener('click', outsideClick);
function openSearch() {
    searchbackdrop.style.display = 'flex';
}

function outsideClick(e) {
    if (e.target === searchbackdrop) {
        searchbackdrop.style.display = 'none';
    }
}

function fetchResults(input) {
    $.ajax({
        url: '/search',
        method: 'POST',
        dataType: 'json',
        data: {
            searchquery: input
        },
        success: function (results) {
            searchresults.innerHTML = '';
            for (let i = 0; i<results.length; i++) {
                searchresults.insertAdjacentHTML('beforeend', results[i]);
            }
        }
    })
}