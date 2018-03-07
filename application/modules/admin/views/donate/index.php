<?php if (isset($_POST['button_delDonation'])) {
    $this->admin_model->delSpecifyDonation($_POST['button_delDonation']);
} ?>

<?php if(isset($_POST['button_createDonation'])) {
    $name = $_POST['donate_name'];
    $price = $_POST['donate_price'];
    $tax  = $_POST['donate_tax'];
    $point  = $_POST['donate_point'];

    $this->admin_model->insertDonation($name, $price, $tax, $point);
} ?>

    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: credit-card"></span> <?= $this->lang->line('admin_manage_donations'); ?></h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: pencil" uk-toggle="target: #donationModal"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <table class="uk-table uk-table-justify uk-table-divider">
                                <thead>
                                    <tr>
                                        <th><?= $this->lang->line('form_title'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('store_item_price'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('column_tax'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('column_points'); ?></th>
                                        <th class="uk-text-center"><?= $this->lang->line('column_action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->admin_model->getDonationList()->result() as $donations) { ?>
                                        <tr>
                                            <td><?= $donations->name ?></td>
                                            <td class="uk-text-center"><?= $donations->price ?></td>
                                            <td class="uk-text-center"><?= $donations->tax ?></td>
                                            <td class="uk-text-center"><?= $donations->points ?></td>
                                            <td class="uk-text-center" uk-margin>
                                                <a href="#" class="uk-button uk-button-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <span class="" style="display:inline-block; width: 5px;"></span>
                                                <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                                                    <button class="uk-button uk-button-danger" name="button_delDonation" value="<?= $donations->id ?>" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            <span><i class="fa fa-gitlab fa-2x" aria-hidden="true"></i></span><br>
            <span class="uk-text-muted uk-text-small">Proudly powered by BlizzCMS with <i class="fa fa-heart" aria-hidden="true"></i></span>
        </footer>
    </div>

    <div id="donationModal" uk-modal="bg-close: false">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-uppercase"><i class="fa fa-credit-card" aria-hidden="true"></i> <?= $this->lang->line('form_create_donation'); ?></h2>
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
                                        <span class="uk-form-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                        <input class="uk-input" name="donate_price" type="number" placeholder="0.00" min="0" value="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-inline uk-width-1-2@s">
                                <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('column_tax'); ?></label>
                                <div class="uk-form-controls">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
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
