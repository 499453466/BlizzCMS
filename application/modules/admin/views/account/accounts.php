    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><i class="fa fa-users fa-fw"></i><?= $this->lang->line('adm_users'); ?> - <?= $this->lang->line('users_list'); ?></h4>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="table-responsive">
                            <table id="myTable" class="table color-table info-table table-striped">
                                <thead>
                                    <tr>
                                        <th><?= $this->lang->line('username_re'); ?></th>
                                        <th class="text-center">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->admin_model->getAdminAccountsList()->result() as $accs) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/manageaccount/<?= $accs->id ?>" title="<?= $accs->username ?>"><?= $accs->username ?></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url(); ?>admin/manageaccount/<?= $accs->id ?>" title="<?= $accs->email ?>"><?= $accs->email ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
