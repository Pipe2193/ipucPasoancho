$(document).ready(function () {

    var enviroment = 'testing';

    if (enviroment == 'local') {
        url = 'http://localhost/onaf3/index.php';
        urlajax = 'http://localhost/onaf3/settings/core/ajax.php';
        urlajaxlive = 'http://localhost/onaf3/settings/core/live_report.php';
        urlajaxnotification = 'http://localhost/onaf3/settings/core/notify.php';
        urlsettings = 'http://localhost/onaf3/settings.php';
    } else if (enviroment == 'testing') {
        url = 'https://customers.pmilimited.com/ONAF3/index.php';
        urlajax = 'https://customers.pmilimited.com/ONAF3/settings/core/ajax.php';
        urlajaxlive = 'https://customers.pmilimited.com/ONAF3/settings/core/live_report.php';
        urlajaxnotification = 'https://customers.pmilimited.com/ONAF3/settings/core/notify.php';
        urlsettings = 'https://customers.pmilimited.com/ONAF3/settings.php';
    } else if (enviroment == 'production') {
        url = 'https://onaf.pmilimited.com/index.php';
        urlajax = 'https://onaf.pmilimited.com/settings/core/ajax.php';
        urlajaxlive = 'https://onaf.pmilimited.com/settings/core/live_report.php';
        urlajaxnotification = 'https://onaf.pmilimited.com/settings/core/notify.php';
        urlsettings = 'https://onaf.pmilimited.com/settings.php';
    }
});
