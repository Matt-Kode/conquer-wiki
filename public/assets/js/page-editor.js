const nameinput = document.getElementById('namein');
const namediv = document.getElementById("name");
const hidden = document.getElementById("hidden");

window.addEventListener('submit', (e) => {

    if (nameinput.value === '') {
        e.preventDefault();
        namediv.classList.remove('too-long');
        namediv.classList.add('null');
        return;
    }

    if (nameinput.value.length > 16) {
        e.preventDefault();
        namediv.classList.remove('null');
        namediv.classList.add('too-long');
        return;
    }

    tinymce.activeEditor.save();

});

tinymce.init({
    selector: "#text-editor",
    height: 500,
    menubar: 'edit insert view format table',
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview'
        , 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat',
    images_upload_url: "/edit/upload_image",
    skin: 'oxide-dark',
    width: '100%',
    content_style: 'body{color: #fff; background-color: #333333; max-width:840px} img{max-width:840px;}',
    init_instance_callback: checkForEditableContent
});

function checkForEditableContent() {
    if (typeof saveEditableContent === 'function') {
        saveEditableContent();
    }
}
