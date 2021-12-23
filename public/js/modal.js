function modalHandler() {
    function error(title, content) {
        $('#errorAlertDialog-title').html(title);
        $('#errorAlertDialog-body').html(content);
        $('#errorAlertDialog').modal({ show: true });
    }

    function success(title, content) {
        $('#successAlertDialog-title').html(title);
        $('#successAlertDialog-body').html(content);
        $('#successAlertDialog').modal({ show: true });

    }

    return { error, success }
}