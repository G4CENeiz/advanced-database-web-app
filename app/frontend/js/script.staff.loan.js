$(function() {
    $('.approve-modal').on('click', function() {
        const id = $(this).data('id');
        $('#loanid').val(id);
    });
});