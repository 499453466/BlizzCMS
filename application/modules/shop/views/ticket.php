<?php if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id'))) { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | removeformat'});
    </script>
<?php } else { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'emoticons | undo redo | fontselect fontsizeselect | bold italic | forecolor | bullist numlist outdent indent | link unlink | removeformat'});
    </script>
<?php } ?>

    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-6@l"></div>
            <div class="uk-width-4-6@l">
                <div class="uk-principal-title uk-text-uppercase uk-text-center uk-text-white"><i class="fas fa-question-circle"></i> <?= $this->lang->line('store_support'); ?></div>
                <p class="uk-text-uppercase uk-text-bold uk-text-center uk-text-white"><?= $this->lang->line('store_support_description'); ?></p>
                <table class="uk-table uk-table-divider">
                    <thead>
                        <tr>
                            <th class="uk-text-white"><i class="fas fa-book"></i> <?= $this->lang->line('column_id'); ?></th>
                            <th class="uk-text-center uk-text-white"><i class="fas fa-bookmark"></i> <?= $this->lang->line('form_title'); ?></th>
                            <th class="uk-text-center uk-text-white"><i class="far fa-clock"></i> <?= $this->lang->line('column_date'); ?></th>
                            <th class="uk-text-center uk-text-white"><i class="fas fa-info-circle"></i> <?= $this->lang->line('column_status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href=""><span class="uk-light">1</span></a>
                            </td>
                            <td class="uk-text-center">
                                <a href=""><span class="uk-light">test</span></a>
                            </td>
                            <td class="uk-text-center">
                                <a href=""><span class="uk-light">01-02-2018</span></a>
                            </td>
                            <td class="uk-text-center">
                                <a href=""><span class="uk-label">Open</span></a>
                            </td>
                        <tr>
                    </tbody>
                </table>
                <div class="uk-space-small"></div>
                <?php if ($this->m_data->isLogged()) { ?>
                    <div class="space-adaptive-small"></div>
                    <div class="uk-margin uk-text-center">
                        <a class="uk-button uk-button-primary" uk-toggle="target: #newTicket"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_create_ticket'); ?></a>
                    </div>
                <?php } ?>
            </div>
            <div class="uk-width-1-6@l"></div>
        </div>
