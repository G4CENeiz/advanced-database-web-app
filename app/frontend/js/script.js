$(function() {
    $('.add-book').on('click', function() {
        $('#formModalLabel').html('Add Book');
    });

    $('.editModal').on('click', function() {
        $('#formModalLabel').html('Edit Book Information');
        // $('modal-footer button[type=submit]');
        $('.modal-body form').attr('action', 'http://localhost/frontend/table/edit');

        const id = $(this).data('id');
        // console.log(id);

        $.ajax({
            url: 'http://localhost/frontend/table/getedit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#title').val(data.Title);
                $('#author').val(data.Author);
                $('#isbn').val(data.ISBN);
                $('#genre').val(data.Genre);
                $('#publicationYear').val(data.PublicationYear);
                $('#quantity').val(data.QuantityTotal);
                $('#id').val(data.BookID);
            }
        });
    });
});