<?php
/**
 * handle message file for hte system
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage handlerMessage
 * @version 1.0.0
 */

/////////////////////////////// Handle message functions ////////////////////////
if (hasError()):
    ?>
    <?php foreach (getError() as $key => $error): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <center><i class="glyphicon glyphicon-remove-sign"></i>  <?php echo $error ?></center>
        </div>
    <?php endforeach ?>
    <?php deleteErrorStack() ?>
<?php endif; ?>

<?php if (hasInformation()): ?>
    <?php foreach (getInformation() as $key => $info): ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <center><i class="glyphicon glyphicon-info-sign"></i> <strong>Info! </strong> <?php echo $info ?></center>
        </div>
    <?php endforeach ?>
    <?php deleteInformationStack() ?>
<?php endif; ?>

<?php if (hasWarning()): ?>
    <?php foreach (getWarning() as $key => $warning): ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <center><i class="glyphicon glyphicon-warning-sign"></i> <strong>Warning! </strong> <?php echo $warning ?></center>
        </div>
    <?php endforeach ?>
    <?php deleteWarningStack() ?>
<?php endif; ?>

<?php if (hasSuccess()): ?>
    <?php foreach (getSuccess() as $key => $success): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <center><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo $success ?> </center>
        </div>
    <?php endforeach ?>
    <?php deleteSuccessStack() ?>
<?php endif; 
/////////////////////////////Handle message functions ////////////////////////////
?>

