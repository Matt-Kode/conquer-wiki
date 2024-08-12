const confirmationbackdrop = document.querySelector(".confirmation-backdrop");

function removeUser(userid) {
    csrftoken = document.querySelector('meta[name="csrf_token"]').content;
    console.log(csrftoken);
    $.ajax({
        url: `/edit/delete_user/${userid}`,
        method: 'POST',
        dataType: 'text',
        data: {
            csrf_token: csrftoken
        },
        success: () => location.reload()
    })
}

function removePage(pageid) {
    csrftoken = document.querySelector('meta[name="csrf_token"]').content;
    console.log(csrftoken);
    $.ajax({
        url: `/edit/delete_page/${pageid}`,
        method: 'POST',
        dataType: 'text',
        data: {
            csrf_token: csrftoken
        },
        success: () => location.reload()
    })
}

function openConfirmation(type, id) {
    confirmationbackdrop.style.display = 'flex';
    let proceedbtn = document.querySelector(".confirmation-backdrop > .confirmation > .decision > .proceed");

    if (type === 'page') {
        proceedbtn.setAttribute('onclick', `removePage(${id})`);
    }

    if (type === 'user') {
        proceedbtn.setAttribute('onclick', `removeUser(${id})`);
    }
}

function closeConfirmation() {
    confirmationbackdrop.style.display = 'none';
}