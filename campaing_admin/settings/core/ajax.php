<?php
session_name('ONAF_ADMIN');
session_start();
/**
 * Makes AJAX requests for the system.
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage ajax
 * @version 1.0.0
 */
include 'functions.php';
include 'connect.php';
include 'queries.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_customer_process'])) {
        $robot = getStageRobot($_POST['id_customer_process']);
        $status = getCustomerInfo($_POST['id_customer_process']);

        echo '<span class="robot_stage">' . $robot->stage . '</span>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_dealer'])) {
        $update_email = update_email_dealer($_POST['dealer_email'], $_POST['id_dealer']);
        if ($update_email == true) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> 
                <p>Dealer email updated.</p>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> 
                <p> Can not  update Dealer Email correctly!, please try again.</p>
            </div>
            <?php
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_dealer_link'])) {
        $id_dealer = $_POST['id_dealer_link'];
        $dealer_name = getDealerName($id_dealer);
        $dealer_hash = getDealerHash($id_dealer);
        $dealer_link = 'https://customers.pmilimited.com/new_account/dealercode.php?dealer_code=' . $dealer_hash;
        $onaf_link = 'https://onaf.pmilimited.com/index.php?dealer=' . $id_dealer;
        ?>
        <script>
            $(document).ready(function () {
                $('#myModal').modal('show');
            });
        </script>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header pmi_modal_header">
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        <h4 class="modal-title"><?php echo $dealer_name ?> (<?php echo $id_dealer ?>)</h4>
                    </div>

                    <div class="modal-body">
                        <b>Dealer Public Key:</b>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="btn_hash" placeholder="Public Key" value="<?php echo $dealer_hash; ?>">
                                <div class="input-group-addon btnpmi" id="btn_copy" onClick="copyfieldvalue(event, 'btn_hash'); return false" > COPY </div>
                            </div>
                        </div>



                        <b>Hashed Link:</b>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="dealer_link" placeholder="Hashed" value="<?php echo $dealer_link; ?>">
                                <div class="input-group-addon btnpmi" id="btn_copy" onClick="copyfieldvalue(event, 'dealer_link'); return false"> COPY </div>
                            </div>
                        </div>


                        <b>ONAF Link:</b>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="onaf_link" placeholder="Hashed" value="<?php echo $onaf_link; ?>">
                                <div class="input-group-addon btnpmi" id="btn_copy" onClick="copyfieldvalue(event, 'onaf_link'); return false"> COPY </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="https://customers.pmilimited.com/documents/dealerAPP.php?id=<?php echo $id_dealer ?>" target="_blank" type="button" class="btn btn-warning"> Create PDF App </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <?php
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_backup'])) {

        $backup = backup_tables($hostServer, $userServer, $passServer, $dbname);
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Database backup created on <b><?php echo date("Y-m-d h:i:s"); ?></b> </b>
        </div>
        </div>
        <?php
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['livereport_swich'])) {
        if (getFollowupStatus($_POST['idCustomer']) == 1) {
            updateFollowupStatus(0, $_POST['idCustomer']);
            echo 'off';
        } elseif (getFollowupStatus($_POST['idCustomer']) == 0) {
            echo 'on';
            updateFollowupStatus(1, $_POST['idCustomer']);
        } 
    }
}
