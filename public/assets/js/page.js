const pagecontents = document.querySelector(".contents-list");
const h1s = document.getElementsByTagName("h1");

if (h1s.length == 0) {
    document.querySelector('.page-contents > p').style.display = 'none';
    }

for (let i = 0; i < h1s.length; i++) {
    let h1 = h1s[i];
    if (!h1.id) {
        h1.id = h1.innerText.toLowerCase().replaceAll(" ", "_");
    }
    pagecontents.insertAdjacentHTML('beforeend', `<a href="#${h1.id}">${h1.innerText}</a>`);
}



document.querySelectorAll('.contents-list > a').forEach((link) => {
    link.addEventListener('click', () => {
        removeCurrentlyActive();
        link.classList.add("active");
    })
})

checkCurrentHeading();
window.addEventListener('scroll', checkCurrentHeading);

function isInView(value) {
    const item = value.getBoundingClientRect();
    return (
        item.top >= 0 &&
        item.left >= 0 &&
        item.bottom <= (
            window.innerHeight ||
            document.documentElement.clientHeight) &&
        item.right <= (
            window.innerWidth ||
            document.documentElement.clientWidth)
    );
}

function removeCurrentlyActive() {
   document.querySelectorAll(".contents-list > a").forEach((link) =>{
        link.classList.remove('active');
    })
}

function checkCurrentHeading() {
    for (let i = 0; i < h1s.length; i++) {
        let h1 = h1s[i];
        if (isInView(h1)) {
            removeCurrentlyActive();
            document.querySelector(`.contents-list > a[href="#${h1.id}"]`).classList.add("active");
            return;
        }
    }
}