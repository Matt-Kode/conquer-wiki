$( function() {
    $( ".pages-list" ).sortable({
        update: function(event, ui) {
            $(this).children().each(function(index) {
                if ($(this ).attr('data-position') != (index+1)) {
                    $(this).attr('data-position', (index+1)).addClass('updated');
                }
            });
            savePositions();
        }
    });
});

function savePositions() {
    let positions = [];
    $('.updated').each(function () {
        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
        $(this).removeClass('updated');
    });

    $.ajax({
        url: '/edit/update_page_positions',
        method: 'POST',
        dataType: 'text',
        data: {
            positions: positions
        }
    })
}
