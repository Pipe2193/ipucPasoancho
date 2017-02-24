<?php

session_name('ONAF_ADMIN');
session_start();
/**
 * Makes AJAX requests for the system.
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage notify ajax
 * @version 1.0.0
 */
include 'functions.php';
include 'connect.php';
include 'queries.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['countCust'])) {
        $RCN = $_POST['countCust'];
        $RC = countAllCustomers();

        if ($RCN != $RC) {
            ?>
            <script>
                $(document).ready(function () {
                    //$('#notification').modal('show');
                    Push.Permission.get();
                    Push.create('PMI Notification', {
                        body: '  Info! Customer Account in the works online! ',
                        icon:  'https://onaf.pmilimited.com/onaf_form/view/includes/assets/img/logo_notify.jpg',
                        timeout: 5000,
                        onClick:  function(){
                            window.location = urlsettings + "?p=app_forms";
                        }
                    });
                });
            </script>
            <!-- Modal -->
<!--            <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop='static'>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header pmi_modal_header">
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> PMI Notification</h4>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Info!</strong> Customer Account in the works online! <b>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <a href="?p=app_forms" class="btn btnpmi"> Follow it </a>
                        </div>
                    </div>
                </div>
            </div>-->
            <?php

        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['countAcknow'])) {
        $RCN = $_POST['countAcknow'];
        $RC = countAllAcknowlegements();

        if ($RCN != $RC) {
            ?>
            <script>
                $(document).ready(function () {
                    //$('#notification').modal('show');
                    Push.Permission.get();
                    Push.create('PMI Notification', {
                        body: '  Info! Customer Acknowlegement in the works online! ',
                        icon:  'https://onaf.pmilimited.com/onaf_form/view/includes/assets/img/logo_notify.jpg',
                        timeout: 5000,
                        onClick:  function(){
                            window.location = urlsettings + "?p=app_acknow_forms";
                        }
                    });
                });
            </script>
            <?php

        }
    }
}