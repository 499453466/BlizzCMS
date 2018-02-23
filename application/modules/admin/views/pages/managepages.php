<?php if (isset($_POST['button_delPage'])) {
    $this->admin_model->delPage($_POST['button_delPage']);
} ?>

<?php if(isset($_POST['button_createPage'])) {
    $desc = $_POST['page_description'];
    $title  = $_POST['page_title'];

    $this->admin_model->insertPage($title, $desc);
} ?>

    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <?php if (isset($_GET['newpage'])) { ?>
                    <div class="uk-width-1-1@l uk-width-1-1@xl">
                        <div class="uk-alert-primary" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p><?= $this->lang->line('panel_admin_new_page_url'); ?>: <b><a href="<?= base_url('pages/').$_GET['newpage']; ?>"><?= base_url('pages/').$_GET['newpage']; ?></a></b></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: list"></span> <?= $this->lang->line('panel_admin_pages_list'); ?></h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: pencil" uk-toggle="target: #newPage"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <table class="uk-table uk-table-justify uk-table-divider">
                                <thead>
                                    <tr>
                                        <th><?= $this->lang->line('form_title'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('column_date'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('column_action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->admin_model->getPages() as $pages) { ?>
                                        <tr>
                                            <td><?= $pages->title ?></td>
                                            <td class="uk-text-center"><?= $pages->date ?></td>
                                            <td class="uk-text-center" uk-margin>
                                                <a href="<?= base_url(); ?>admin/editpages/<?= $pages->id ?>" class="uk-button uk-button-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <span class="" style="display:inline-block; width: 5px;"></span>
                                                <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                                                    <button class="uk-button uk-button-danger" name="button_delPage" value="<?= $pages->id ?>" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="uk-section uk-section-small uk-text-center">
            <hr>
            <span class="uk-text-muted uk-text-small"><span data-uk-icon="icon: github-alt"></span> Proudly powered by BlizzCMS</span>
        </footer>
    </div>

    <div id="newPage" class="uk-modal-container" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fa fa-list-alt" aria-hidden="true"></i> <?= $this->lang->line('form_create_pages'); ?></h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="page_title" required type="text" placeholder="<?= $this->lang->line('form_title'); ?>">
                            </div>
                        </div>
                    </div>

                    <script src="<?= base_url(); ?>core/ckeditor_admin/ckeditor.js"></script>

                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_description'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea required="" name="page_description" id="ckeditor" rows="10" cols="80"></textarea>
                                <script>
                                    CKEDITOR.replace('ckeditor');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_createPage"><?= $this->lang->line('button_create'); ?></button>
                </div>
            </form>
        </div>
    </div>
