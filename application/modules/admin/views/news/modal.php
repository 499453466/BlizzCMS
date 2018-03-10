    <div id="newNews" class="uk-modal-container" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?= $this->lang->line('form_create_news'); ?></h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_news_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="new_title" required type="text" placeholder="<?= $this->lang->line('form_news_title'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_description'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea class="tinyeditor" name="new_description" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_highl'); ?></label>
                        <div class="uk-form-controls">
                            <select class="uk-select" name="new_destac">
                                <option value="1"><?= $this->lang->line('option_no'); ?></option>
                                <option value="2"><?= $this->lang->line('option_yes'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_upload_file'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <div uk-form-custom="target: true">
                                    <input type="file" required name="new_imageup">
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_createNew"><?= $this->lang->line('button_create'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <div id="editNews" class="uk-modal-container" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Edit News</h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_news_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="new_title" required type="text" placeholder="<?= $this->lang->line('form_news_title'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_description'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea class="tinyeditor" name="new_description" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_highl'); ?></label>
                        <div class="uk-form-controls">
                            <select class="uk-select" name="new_destac">
                                <option value="1"><?= $this->lang->line('option_no'); ?></option>
                                <option value="2"><?= $this->lang->line('option_yes'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_upload_file'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <div uk-form-custom="target: true">
                                    <input type="file" required name="new_imageup">
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_createNew"><?= $this->lang->line('button_create'); ?></button>
                </div>
            </form>
        </div>
    </div>
