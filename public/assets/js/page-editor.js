const nameinput = document.getElementById('namein');
const namediv = document.getElementById("name");
const hidden = document.getElementById("hidden");

window.addEventListener('submit', (e) => {

    if (nameinput.value === '') {
        e.preventDefault();
        namediv.classList.add('null');
        return;
    }
    addHeadingIds();

});

tinymce.init({
    selector: "#text-editor",
    height: 500,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview'
        , 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat',
    images_upload_url: "/public/edit/upload_image",
    skin: 'oxide-dark',
    width: '60vw',
    content_style: 'body {color: #fff; background-color: #333333}',
    init_instance_callback: setEditableContent
});

function setEditableContent() {
    if (document.getElementById('content') != null) {
        tinymce.activeEditor.setContent(document.getElementById('content').value);
        document.getElementById("content").value = '';
    }
}
