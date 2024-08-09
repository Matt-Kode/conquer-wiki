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
    searchbackdrop.style.display = 'block';
}

function closeSearch() {
    searchbackdrop.style.display = 'none';
}

function outsideClick(e) {
    if (e.target === searchbackdrop) {
        closeSearch();
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
            console.log(results.length);
            for (let i = 0; i<results.length; i++) {
                console.log(results[i]);
                searchresults.insertAdjacentHTML('beforeend', results[i]);
            }
        }
    })
}