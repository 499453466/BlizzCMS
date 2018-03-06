<?php if(isset($_POST['donateNow'])) {
    $this->donate_model->getDonate($_POST['donateNow']);
} ?>

    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-6@l"></div>
            <div class="uk-width-4-6@l">
                <div class="uk-principal-title uk-text-center uk-text-white"><i class="fa fa-cc-paypal" aria-hidden="true"></i> Donations</div>
                <div class="uk-space-medium"></div>
                <div class="uk-grid-small uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@l" uk-grid>
                    <?php foreach($this->donate_model->getDonations()->result() as $donateList) { ?>
                        <div>
                            <div class="uk-card uk-card-body uk-card-donate uk-text-center uk-transition-toggle" tabindex="0">
                                <form action="" method="post" accept-charset="utf-8">
                                    <div class="uk-card-donate-title uk-transition-scale-up uk-transition-opaque">
                                        <i class="fa fa-paypal" aria-hidden="true"></i>
                                        <h2 class="uk-text-white uk-text-bold"><?= $donateList->name ?></h2>
                                    </div>
                                    <div class="uk-card-donate-price uk-transition-scale-up uk-transition-opaque">
                                        <h2 class="uk-text-white"><sup>$</sup><?= $donateList->price ?></h2>
                                    </div>
                                    <div class="uk-card-donate-option uk-transition-scale-up uk-transition-opaque">
                                        <ul>
                                            <li><i class="fa fa-plus" aria-hidden="true"></i> Get <span class="uk-text-bold"><?= $donateList->points ?></span> <?= $this->lang->line('panel_dp') ?></li>
                                        </ul>
                                    </div>
                                    <div class="uk-margin uk-transition-scale-up uk-transition-opaque">
                                        <button class="uk-button" type="submit" value="<?= $donateList->id ?>" name="donateNow"><?= $this->lang->line('button_donate'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="uk-width-1-6@l"></div>
        </div>
