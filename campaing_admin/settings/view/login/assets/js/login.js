$(document).ready(function () {

    $('#loginForm').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        addOns: {
            mandatoryIcon: {
                icon: 'glyphicon glyphicon-asterisk'
            }
        },
        fields: {
            user: {
                validators: {
                    notEmpty: {
                        message: 'The user name is required'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'The PIN password is required'
                    },
                    numeric: {
                        message: 'The PIN is not a number'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The PIN password must be  4 characters long'
                    }

                }
            }
        }
    });
});

