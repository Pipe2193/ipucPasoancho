<?php
if (checkAccess() != TRUE) {
    setError("examl=ole error");
    header("Location: settings.php?p=login");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['updatePMIInfo'])) {

        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $phone3 = $_POST['phone3'];

        $updatepmi = updateCorporatePMIinfo($address1, $address2, $phone1, $phone2, $phone3);
        if ($updatepmi == TRUE) {
            setSuccess("Corporate Contact Information <b>updated</b>!");
            header("Location: settings.php?p=app_settings");
        } else {
            setError("An Error has occurred, please reload and  try submitting again.");
            header("Location: settings.php?p=app_settings");
        }
    }
}

include_once 'settings/view/app_settings/modals.php';
?>
<section id="app_settings" class="admin_content">

    <h3 class="pmititles">
        <i class="fa fa-cogs" aria-hidden="true"></i>  
        Aplication Settings
    </h3>

    <div class="col-md-3">

        <h3 class="pmisubtitles">
            <i class="fa fa-building" aria-hidden="true"></i> 
            Corporate Contact Information
        </h3>


        <form method="POST" action="" >

            <?php $pmi_info = getPMIInfo(APP_KEY); ?>

            <b>PMI Address 1</b>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <input type="text" id="address1" name="address1" placeholder="Please enter Address 1" class="form-control" tabindex="3" maxlength="220" 
                       value="<?php echo $pmi_info->address1_pmi_info ?> " >
            </div>

            <b>PMI Address 2</b>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <input type="text" id="address2" name="address2" placeholder="Please enter  Address 2" class="form-control" tabindex="3" maxlength="220" 
                       value="<?php echo $pmi_info->address2_pmi_info ?>" >
            </div>

            <b> PMI Phone 1</b>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <input type="text" id="phone1" name="phone1" placeholder="Please enter phone 1" class="form-control" tabindex="3" maxlength="220" 
                       value="<?php echo $pmi_info->phone1_pmi_info ?>" >
            </div>

            <b>PMI Phone 2</b>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <input type="text" id="phone2" name="phone2" placeholder="Please enter phone 2" class="form-control" tabindex="3" maxlength="220" 
                       value="<?php echo $pmi_info->phone2_pmi_info ?>" >
            </div>

            <b> PMI Phone 3</b>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <input type="text" id="phone3" name="phone3" placeholder="Please enter phone 3" class="form-control" tabindex="3" maxlength="220" 
                       value="<?php echo $pmi_info->phone3_pmi_info ?>" >
            </div>

            <button type="submit" id="updatePMIInfo" name="updatePMIInfo" class="btn btn-block btnpmi" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Update Corporate Contact Information </button>
        </form>
    </div>

    <div class="col-md-7">

        <h3 class="pmisubtitles">
            <i class="fa fa-cogs" aria-hidden="true"></i> 
            ONAF Applications & Modules <span class="edit">(select to edit)</span>
        </h3>

        <div class="mensaje"></div>
        <table  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="key" >App key</th>
                    <th class="title" >App Tittle</th>
                    <th class="subtitle" >App Subtittle</th>
                    <th class="url" >App URL</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $pmiInfo = getPMIApps();
                $pmiApp = $pmiInfo;
                for ($i = 0; $i < count($pmiInfo); $i++) {
                    ?>
                    <tr>
                        <td class="key"><input type="hiiden" id="app_key<?php echo $i; ?>" name="app_key<?php echo $i; ?>" class="form-control" tabindex="3" maxlength="220" 
                                               value="<?php echo $pmiApp[$i]->idpmi_info; ?>" ></td>
                        <td class="title" ><input type="text" id="app_tittle<?php echo $i; ?>" name="app_tittle<?php echo $i; ?>" placeholder="Please enter phone 3" class="form-control" tabindex="3" maxlength="220" 
                                                  value="<?php echo $pmiApp[$i]->app_tittle_pmi_info; ?>" ></td>
                        <td class="subtitle"><input type="text" id="app_subtittle<?php echo $i; ?>" name="app_subtittle<?php echo $i; ?>" placeholder="Please enter phone 3" class="form-control" tabindex="3" maxlength="220" 
                                                    value="<?php echo $pmiApp[$i]->app_subtittle_pmi_info; ?>" ></td>
                        <td class="url"><?php echo $pmiApp[$i]->app_url_pmi_info; ?></td>
                        <td><button type="submit"  id="update<?php echo $i; ?>" name="update<?php echo $i; ?>" class="btn btnpmi" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <div class="col-md-2">
        <h3 class="pmisubtitles">
            <i class="fa fa-database" aria-hidden="true"></i> 
            ONAF Database
        </h3>

        <button type="button" class="btn btn-block btnpmi" data-toggle="modal" data-target="#backupmodal"> <i class="fa fa-database" aria-hidden="true"></i> Create Database Backup NOW </button>
        <div class="modal fade" id="backupmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header pmi_modal_header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> Are you sure?</h4>
                    </div>
                    <div class="modal-body">
                        <script>
                            $(document).ready(function () {
                                var creatdb = $("#creatdb");

                                creatdb.click(function (e) {
                                    $.ajax({
                                        async: true,
                                        type: "POST",
                                        dataType: "html",
                                        contentType: "application/x-www-form-urlencoded",
                                        url: urlajax,
                                        data: ('create_backup=1'),
                                        success: function (data) {
                                            $("#modal_validate").html(data);
                                        }

                                    });
                                });
                            });
                        </script>
                        <button type="button" class="btn btn-success" id="creatdb" ><i class="fa fa-database" aria-hidden="true"></i> YES </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        </br></br>
                        <div id="modal_validate"></div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <div class="clearfix"></div>

</section>