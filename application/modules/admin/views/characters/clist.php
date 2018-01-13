<?php if (isset($_POST['button_changeLevel'])) {
    $level = $_POST['newLevel'];
    $this->admin_model->insertChangeLevelChar($idlink, $level);
} ?>

<?php if(isset($_POST['button_renamechar'])) {
    $newname = $_POST['newName'];
    $this->admin_model->insertCharRename($idlink, $newname);
} ?>

<?php if(isset($_POST['button_unban'])) {
    $this->admin_model->insertUnbanChar($idlink);
}?>

<?php if(isset($_POST['button_banchar'])) {
    $reason = $_POST['banchar_reason'];
    $this->admin_model->insertBanChar($idlink, $reason);
}?>

<?php if(isset($_POST['button_customize'])) {
    $this->admin_model->insertCustomizeChar($idlink);
} ?>

<?php if(isset($_POST['button_changerace'])) {
    $this->admin_model->insertChangeRaceChar($idlink);
} ?>

<?php if(isset($_POST['button_changefaction'])) {
    $this->admin_model->insertChangeFactionChar($idlink);
} ?>

    <script src="<?= base_url(); ?>core/ckeditor_admin/ckeditor.js"></script>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title"></div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title"><i class="fa fa-user fa-fw"></i><?= $this->lang->line('char_manage'); ?> - <?= $this->m_general->getNameCharacterSpecifyGuid($idlink); ?></h3>
                    </div>
                </div>
            </div>
            <?php if(isset($_GET['char'])) { ?>
                <div class="alert alert-danger"><?= $this->lang->line('char_isonline'); ?></div>
            <?php } ?>

            <?php if(isset($_GET['name'])) { ?>
                <div class="alert alert-danger"><?= $this->lang->line('char_namexist'); ?></div>
            <?php } ?>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <?= $this->lang->line('char_change_level'); ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body has-success">
                                <form action="" method="post" accept-charset="utf-8">
                                    <div class="form-group">
                                        <input required name="newLevel" type="number" min="1" max="<?= $this->m_general->getMaxLevel(); ?>" class="form-control" placeholder="<?= $this->lang->line('expr_level'); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button name="button_changeLevel" class="btn btn-block btn-outline btn-success"><i class="fa fa-refresh fa-fw"></i><?= $this->lang->line('char_change_level'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <?= $this->lang->line('expr_rename'); ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="" method="post" accept-charset="utf-8">
                                    <div class="form-group has-warning">
                                        <input required name="newName" type="text" class="form-control" placeholder="<?= $this->lang->line('expr_rename'); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button name="button_renamechar" class="btn btn-block btn-outline btn-warning"><i class="fa fa-pencil-square-o fa-fw"></i><?= $this->lang->line('expr_rename'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <?php if($this->m_general->getCharBanSpecifyGuid($idlink)->num_rows() > 0) { ?>
                    <div class="col-lg-4 col-sm-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <?= $this->lang->line('unban_char'); ?>
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="" method="post" accept-charset="utf-8">
                                        <button name="button_unban" class="btn btn-block btn-outline btn-success"><i class="fa fa-check-circle fa-fw"></i><?= $this->lang->line('unban_char'); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                <?php } else { ?>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4 col-sm-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <?= $this->lang->line('ban_char'); ?>
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form method="post" action="">
                                        <div class="form-group has-error">
                                            <input type="text" id="state-danger" required="" name="banchar_reason" class="form-control" placeholder="<?= $this->lang->line('reason'); ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" name="button_banchar" class="btn btn-block btn-outline btn-danger"><i class="fa fa-ban fa-fw"></i><?= $this->lang->line('ban_char'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                <?php } ?>
            </div>
            <div class="row">
                <!-- /.col-lg-4 -->
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?= $this->lang->line('char_customize'); ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="" method="post" accept-charset="utf-8">
                                    <button name="button_customize" class="btn btn-block btn-outline btn-info"><i class="fa fa-cog fa-fw"></i><?= $this->lang->line('char_customize'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <!-- /.col-lg-4 -->
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?= $this->lang->line('char_changerace'); ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="" method="post" accept-charset="utf-8">
                                    <button name="button_changerace" class="btn btn-block btn-outline btn-info"><i class="fa fa-cog fa-fw"></i><?= $this->lang->line('char_changerace'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <!-- /.col-lg-4 -->
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?= $this->lang->line('char_changefaction'); ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="" method="post" accept-charset="utf-8">
                                    <button name="button_changefaction" class="btn btn-block btn-outline btn-info"><i class="fa fa-cog fa-fw"></i><?= $this->lang->line('char_changefaction'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="well">
                        <h4><?= $this->lang->line('annotations'); ?></h4>
                        <?php foreach($this->admin_model->getAnnotationsSpecifyChar($idlink)->result() as $charlistannotation) { ?>
                            <li><?= $charlistannotation->annotation ?></li>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!-- End Right sidebar -->
        </div>
        <!-- /.container-fluid -->
