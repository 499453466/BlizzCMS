<?php if(isset($_POST['donateNow'])) {
    $this->donate_model->getDonate($_POST['donateNow']);
} ?>
    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-6@l"></div>
            <div class="uk-width-4-6@l">
                <div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@l" uk-grid-parallax="translate:200">
                <?php foreach($this->donate_model->getDonations()->result() as $donateList) { ?>
                    <div class="uk-text-center">
                        <div class="uk-card uk-card-secondary uk-card-body">
                            <form action="" method="post" accept-charset="utf-8">
                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                    <div class="uk-margin">
                                        <div class="uk-form-label"><?= $donateList->name ?></div>
                                        <?= $this->lang->line('store_item_price') ?>: <?= $donateList->price ?> - <?= $this->lang->line('panel_dp') ?>: <?= $donateList->points ?>
                                        <button class="uk-button uk-button-secondary" type="submit" value="<?= $donateList->id ?>" name="donateNow"><?= $this->lang->line('button_donate'); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="uk-width-1-6@l"></div>
        </div>