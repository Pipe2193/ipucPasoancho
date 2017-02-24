<?php
$pmi_info = getPMIInfo(APP_KEY);
?>

<header class="page_header">
    <nav class="navbar">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?p=app_forms"> PMI | ONAF 3 </a>
            </div>

            <?php if (checkAccess() == TRUE) { ?>
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> ACKNOWLEGEMENTS 

                                <?php if (countUnfinishedAcknowlegements() != 0) { ?>
                                    <span class="apps_count_unfinished"> <?php echo countUnfinishedAcknowlegements() ?> </span>
                                <?php } else { ?>
                                    <i class="fa fa-bar-chart"></i> 
                                <?php } ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li class="apps_stats">

                                    <div class="apps_stat">
                                        <a href="?p=app_acknow_forms">
                                            <span class="icon"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                                            <span class="text">Cust Acknow Table</span>
                                            <span class="number">   </span>
                                        </a>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                        <span class="text">Total </span>
                                        <span class="number"> <?php echo countAllAcknowlegements(); ?> </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></span>
                                        <span class="text">Unfinished </span>
                                        <span class="number"> <?php echo countUnfinishedAcknowlegements() ?> </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-life-ring" aria-hidden="true"></i></span>
                                        <span class="text">Supported </span>
                                        <span class="number"> N/A </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                        <span class="text">Deleted </span>
                                        <span class="number"> N/A </span>
                                    </div>

                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> APPS 

                                <?php if (countUnfinishedCustomers() != 0) { ?>
                                    <span class="apps_count_unfinished"> <?php echo countUnfinishedCustomers() ?> </span>
                                <?php } else { ?>
                                    <i class="fa fa-bar-chart"></i> 
                                <?php } ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li class="apps_stats">

                                    <div class="apps_stat">
                                        <a href="?p=app_forms">
                                            <span class="icon"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                                            <span class="text"> APPS Table </span>
                                            <span class="number"> GO </span>
                                        </a>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                        <span class="text">Total </span>
                                        <span class="number"> <?php echo countAllCustomers(); ?> </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></span>
                                        <span class="text">Unfinished </span>
                                        <span class="number"> <?php echo countUnfinishedCustomers() ?> </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-life-ring" aria-hidden="true"></i></span>
                                        <span class="text">Supported </span>
                                        <span class="number"> N/A </span>
                                    </div>

                                    <div class="apps_stat">
                                        <span class="icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                        <span class="text">Deleted </span>
                                        <span class="number"> N/A </span>
                                    </div>

                                </li>
                            </ul>
                        </li>
                        <li><a href="?p=app_dealers"> Dealers <i class="fa fa-building-o"></i></a></li>
                        <?php if ($_SESSION['onafpermission'] == 1) { ?>
                            <li><a href="?p=app_settings"> Settings <i class="fa fa-cogs"></i> </a></li>
                        <?php } ?>
                        <li><a href="?p=sign_out"> Exit <i class="fa fa-sign-out"></i> </a></li>
                    </ul>
                </div>
            <?php } ?>

        </div>
    </nav>
</header>

<div id="h50px"></div>
<?php includeHandlerMessage($core_folder) ?> 

