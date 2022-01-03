function modalHandler() {
    function error(title, content) {
        $('#errorAlertDialog-title').html(title);
        $('#errorAlertDialog-body').html(content);
        $('#errorAlertDialog').modal('show');
    }

    function success(title, content) {
        $('#successAlertDialog-title').html(title);
        $('#successAlertDialog-body').html(content);
        $('#successAlertDialog').modal('show');

    }

    function close() {
        $('#errorAlertDialog').modal('hide');
        $('#successAlertDialog').modal('hide');
    }

    return { error, success, close }
}