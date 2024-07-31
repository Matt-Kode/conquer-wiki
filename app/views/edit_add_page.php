<html>

<head>
    <link href="/public/assets/css/edit.css" rel="stylesheet">
    <link href="/public/assets/css/text-editor.css" rel="stylesheet">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />

    <link
            href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
            rel="stylesheet"
    />

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>

<?php
include("header.php");
?>

<?php
include("edit_sidebar.php");
?>

<body>
<div class="content">
    <h1>Add page</h1>

    <form class="add-page-form" method="post">
        <input type="hidden" id="hidden" name="content">
        <label for="categoryin">Name</label>
        <div id="category">
            <input type="text" id="namein" name="name" placeholder="Name">
            <p>Please enter a name</p>
        </div>

        <div class="text-editor-container">
            <div class="options">
                <!-- Text Format -->
                <button id="bold" class="option-button format" type="button">
                    <i class="fa-solid fa-bold"></i>
                </button>
                <button id="italic" class="option-button format" type="button">
                    <i class="fa-solid fa-italic"></i>
                </button>
                <button id="underline" class="option-button format" type="button">
                    <i class="fa-solid fa-underline"></i>
                </button>
                <button id="strikethrough" class="option-button format" type="button">
                    <i class="fa-solid fa-strikethrough"></i>
                </button>
                <button id="superscript" class="option-button script" type="button">
                    <i class="fa-solid fa-superscript"></i>
                </button>
                <button id="subscript" class="option-button script" type="button">
                    <i class="fa-solid fa-subscript"></i>
                </button>
                <!-- List -->
                <button id="insertOrderedList" class="option-button" type="button">
                    <div class="fa-solid fa-list-ol"></div>
                </button>
                <button id="insertUnorderedList" class="option-button" type="button">
                    <i class="fa-solid fa-list"></i>
                </button>
                <!-- Undo/Redo -->
                <button id="undo" class="option-button" type="button">
                    <i class="fa-solid fa-rotate-left"></i>
                </button>
                <button id="redo" class="option-button" type="button">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
                <!-- Link -->
                <button id="createLink" class="adv-option-button" type="button">
                    <i class="fa fa-link"></i>
                </button>
                <button id="unlink" class="option-button" type="button">
                    <i class="fa fa-unlink"></i>
                </button>
                <button id="insertImage" class="adv-option-button" type="button">
                    <i class="fa-regular fa-image"></i>
                </button>
                <!-- Alignment -->
                <button id="justifyLeft" class="option-button align" type="button">
                    <i class="fa-solid fa-align-left"></i>
                </button>
                <button id="justifyCenter" class="option-button align" type="button">
                    <i class="fa-solid fa-align-center"></i>
                </button>
                <button id="justifyRight" class="option-button align" type="button">
                    <i class="fa-solid fa-align-right"></i>
                </button>
                <button id="justifyFull" class="option-button align" type="button">
                    <i class="fa-solid fa-align-justify"></i>
                </button>
                <button id="indent" class="option-button spacing" type="button">
                    <i class="fa-solid fa-indent"></i>
                </button>
                <button id="outdent" class="option-button spacing" type="button">
                    <i class="fa-solid fa-outdent"></i>
                </button>
                <!-- Headings -->
                <select id="formatBlock" class="adv-option-button">
                    <option value="H1">H1</option>
                    <option value="H2">H2</option>
                    <option value="H3">H3</option>
                    <option value="H4">H4</option>
                    <option value="H5">H5</option>
                    <option value="H6">H6</option>
                </select>
                <!-- Font -->
                <select id="fontSize" class="adv-option-button"></select>
                <!-- Color -->
                <div class="input-wrapper">
                    <input type="color" id="foreColor" class="adv-option-button" />
                    <label for="foreColor">Font Color</label>
                </div>
                <div class="input-wrapper">
                    <input type="color" id="backColor" class="adv-option-button" />
                    <label for="backColor">Highlight Color</label>
                </div>
            </div>
            <div id="text-input" contenteditable="true"></div>
        </div>
    <input type="submit" value="Add">
    </form>
</div>



</body>
<script src="/public/assets/js/text-editor.js"></script>

</html>
