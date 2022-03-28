const flashData = $('.flash-data').data('flashdata');


if (flashData) {
    Swal({
        title: 'Employee',
        text: 'Successfully' + flashData,
        type: 'success'
    });
}