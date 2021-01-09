$('.modal').on('hidden.bs.modal', function () {
    $(this).remove();
});

$('.modal.show-by-default').modal();