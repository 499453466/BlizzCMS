<?php if(isset($_POST['button_createDonation'])) {
    $name = $_POST['donate_name'];
    $price = $_POST['donate_price'];
    $tax  = $_POST['donate_tax'];
    $point  = $_POST['donate_point'];

    $this->admin_model->insertDonation($name, $price, $tax, $point);
} ?>

    <div id="donationModal" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="far fa-credit-card"></i> <?= $this->lang->line('form_create_donation'); ?></h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                <div class="uk-modal-body">
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_donation_title'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                <input class="uk-input" name="donate_name" required type="text" placeholder="<?= $this->lang->line('form_donation_title'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-grid-small" uk-grid>
                            <div class="uk-inline uk-width-1-2@s">
                                <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('store_item_price'); ?></label>
                                <div class="uk-form-controls">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon"><i class="fas fa-dollar-sign"></i></span>
                                        <input class="uk-input" name="donate_price" type="number" placeholder="0.00" min="0" value="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-inline uk-width-1-2@s">
                                <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('column_tax'); ?></label>
                                <div class="uk-form-controls">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon"><i class="fas fa-dollar-sign"></i></span>
                                        <input class="uk-input" name="donate_tax" type="number" placeholder="0.00" min="0" value="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('column_points'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: plus-circle"></span>
                                <input class="uk-input" name="donate_point" type="number" placeholder="0" value="1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_createDonation"><?= $this->lang->line('button_create'); ?></button>
                </div>
            </form>
        </div>
    </div>
