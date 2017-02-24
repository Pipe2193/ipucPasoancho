<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header pmi_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p class="text-center" >Are you sure to download this Customer Information in a CSV Format?</p>
            </div>
            <div class="modal-footer text-center">
                 <a href="settings.php?export_id_customer=<?php echo $_GET['id_customer'] ?>" class="btn btn-success"><?php ?><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Now</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteApp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header pmi_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell" aria-hidden="true"></i> Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p class="text-center" >Are you sure do you want to Delete this app?</p>
            </div>
            <div class="modal-footer">
                 <a href="settings.php?delete_id_customer=<?php echo $_GET['id_customer'] ?>" class="btn btn-danger"><?php ?><i class="fa fa-trash" aria-hidden="true"></i>Yes, Remove</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Go Back </button>
            </div>
        </div>
    </div>
</div>