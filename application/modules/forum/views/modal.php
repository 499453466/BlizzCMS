    <div id="newTopic" class="uk-modal-container" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_new_topic'); ?></h2>
            </div>
            <form action="<?= base_url('forum/newTopic/'.$idlink); ?>" method="post" accept-charset="utf-8" autocomplete="off">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="topic_title" required type="text" placeholder="<?= $this->lang->line('form_title'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_description'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea class="tinyeditor" name="topic_description" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id'))) { ?>
                        <div class="uk-margin">
                            <div class="uk-form-controls">
                                <div class="uk-width-1-1 uk-text-center">
                                    <label><input id="hightl" class="uk-checkbox" type="checkbox" name="check_highl" value="1"> <?= $this->lang->line('form_highl'); ?></label>
                                    <span style="display:inline-block; width: 14px;"></span>
                                    <label><input id="llock" class="uk-checkbox" type="checkbox" name="check_lock" value="1"> <?= $this->lang->line('form_lock'); ?></label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_createTopic"><?= $this->lang->line('button_create'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <div id="editTopic" class="uk-modal-container" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_edit_topic'); ?></h2>
            </div>
            <form action="" method="post" accept-charset="utf-8">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="edittopic_title" required value="<?= $this->forum_model->getTopicTitle($idlink); ?>" type="text" placeholder="<?= $this->forum_model->getTopicTitle($idlink); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_description'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea class="tinyeditor" name="edittopic_description" rows="10" cols="80"><?= $this->forum_model->getTopicDescription($idlink); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id'))) { ?>
                        <div class="uk-margin">
                            <div class="uk-form-controls">
                                <div class="uk-width-1-1 uk-text-center">
                                    <label><input id="hightl" class="uk-checkbox" type="checkbox" name="check_highl" value="1"> <?= $this->lang->line('form_highl'); ?></label>
                                    <span style="display:inline-block; width: 14px;"></span>
                                    <label><input id="llock" class="uk-checkbox" type="checkbox" name="check_lock" value="1"> <?= $this->lang->line('form_lock'); ?></label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_editTopic"><?= $this->lang->line('button_save'); ?></button>
                </div>
            </form>
        </div>
    </div>
