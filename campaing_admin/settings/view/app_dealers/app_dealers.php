<?php
if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_dealer'])) {
        $dealer_code = $_POST['dealer_code'];
        $dealer_name = $_POST['dealer_name'];
        $dealer_accron = $_POST['dealer_accron'];
        $dealer_email = $_POST['dealer_email'];
        $dealer_hash = md5(md5($dealer_code));
        if (verifyDealer($dealer_code) != FALSE) {
            setError("Dealer Code already in use.");
            header("Location: settings.php?p=app_dealers");
        } else {
            createDealer($dealer_code, $dealer_name, $dealer_accron, $dealer_email);
            createHashDealer($dealer_code, $dealer_hash);
            setSuccess("Dealer data registered sucessfully.");
            header("Location: settings.php?p=app_dealers");
        }
    }
}
include_once 'settings/view/app_dealers/modals.php';
?>
<section id="app_dealers_section" class="admin_content">

    <h3 class="pmititles">
        <i class="fa fa-building-o" aria-hidden="true"></i>  
        Dealer Management
    </h3>

    <div class="mensaje"></div>
    <table id="app_dealers" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="code" width="10%">Dealer Code</th>
                <th class="accr" width="10%">Accr</th>
                <th class="name" width="35%">Name</th>
                <th class="mail" width="35%">Email <span class="edit">(select to edit)</span></th>
                <th class="btns" width="10%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $dealers = getDealers();
            foreach ($dealers as $dealer) {
                ?>
                <tr>
                    <td class="code id"><?php echo $dealer->id_dealer; ?></td>
                    <td class="accr" ><?php echo $dealer->dealer_accron ?></td> 
                    <td class="name" ><?php echo $dealer->dealer_name ?></td>     
                    <td class="mail editable" data-field="<?php echo $dealer->dealer_email; ?>"><span><?php echo $dealer->dealer_email; ?></span></td>
                    <td class="btns supp">
                        <button  type="button" data-dealer="<?php echo $dealer->id_dealer; ?>"  class="btn btnpmi more btncreate_link" >
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr> 
            <?php } ?>
        </tbody>

        <tfoot>
            <tr>
                <th class="code">Dealer Code</th>
                <th class="accr">Accr</th>
                <th class="name">Name</th>
                <th class="mail">Email</th>
                <th class="btns">Action</th>
            </tr>
        </tfoot>
    </table>

    <div class="register_dealer">
        <h3 class="pmisubtitles">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Register a New Dealer
        </h3>
        <form action="" method="POST" id="DealerForm" class="DealerForm" role="form">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="dealer_code">Dealer Code </label>
                    <input type="text" class="form-control" placeholder="Code" name="dealer_code" id="dealer_code" maxlength="4" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="dealer_name">Dealer Name </label>
                    <input type="text" class="form-control" placeholder="Name" name="dealer_name" id="dealer_name" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="dealer_accron">Dealer Accron </label>
                    <input type="text" class="form-control" placeholder="Accr" name="dealer_accron" id="dealer_accron" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="dealer_email"> Dealer Email Address </label>
                    <input type="text" class="form-control" placeholder="Email Address" name="dealer_email" id="dealer_email" required>
                </div>
            </div>
            <div class="col-md-2">
                <label for="#">&nbsp;</label>
                <button type="submit" name="register_dealer" class="btn btnpmi btn-block" >
                    Register Dealer
                </button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>

    <div id="dealer_link_table"></div>
</section>
