<div class="uk-width-1-2@l">
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-5@l">
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHead($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvHead" class="uk-button uk-button-link" data-tippy-arrow="true" data-tippy-animation="shift-away">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHead($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvHeadTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHead($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvHead', { html: '#InvHeadTemplate' })</script>
            
            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvNeck($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvNeck">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvNeck($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvNeckTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvNeck($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvNeck', { html: '#InvNeckTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvShoulders($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvSoulders">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvShoulders($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvShouldersTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvShoulders($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvSoulders', { html: '#InvShouldersTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBack($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvBack">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBack($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvBackTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBack($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvBack', { html: '#InvBackTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvChest($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvChest">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvChest($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvChestTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvChest($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvChest', { html: '#InvChestTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBody($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvBody">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBody($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvBodyTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvBody($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvBody', { html: '#InvBodyTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTabard($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvTabard">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTabard($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvTabardTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTabard($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvTabard', { html: '#InvTabardTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWrists($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvWrists">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWrists($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvWristsTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWrists($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvWrists', { html: '#InvWristsTemplate' })</script>

            <div class="fx-gap"></div>
        </div>
        <div class="uk-width-3-5@l">
            <div class="fx-gap-4"></div>
            <div class="fx-gap-4"></div>
            <div class="fx-gap-4"></div>
            <div class="fx-gap-4"></div>
            <div class="fx-gap-4"></div>
            <div class="fx-gap-4"></div>
            <div class="fx-gap-2"></div>
            <span style="display:inline-block; width: 35px;"></span>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvMainHand($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvMainHand">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvMainHand($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvMainHandTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvMainHand($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvMainHand', { html: '#InvMainHandTemplate' })</script>

            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvOffHand($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvOffHand">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvOffHand($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvOffHandTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvOffHand($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvOffHand', { html: '#InvOffHandTemplate' })</script>

            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvRanged($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvRanged">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvRanged($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvRangedTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvRanged($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvRanged', { html: '#InvRangedTemplate' })</script>

        </div>
        <div class="uk-width-1-5@l">
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHands($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvHands">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHands($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvHandsTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvHands($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvHands', { html: '#InvHandsTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWaist($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvWaist">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWaist($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvWaistTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvWaist($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvWaist', { html: '#InvWaistTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvLegs($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvLegs">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvLegs($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvLegsTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvLegs($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvLegs', { html: '#InvLegsTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFeet($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvFeet">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFeet($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvFeetTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFeet($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvFeet', { html: '#InvFeetTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerOne($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvFingerOne">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerOne($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvFingerOneTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerOne($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvFingerOne', { html: '#InvFingerOneTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvFingerTwo">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvFingerTwoTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvFingerTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvFingerTwo', { html: '#InvFingerTwoTemplate' })</script>

            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketOne($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvTrinketOne">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketOne($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvTrinketOneTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketOne($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvTrinketOne', { html: '#InvTrinketOneTemplate' })</script>
            
            <div class="fx-gap"></div>
            <a href="<?= base_url('armory/item/') ?><?= $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm))); ?>" id="InvTrinketTwo">
                <img width="50" height="50" class="uk-border-rounded" src="<?= base_url('assets/icons/items/'); ?><?= $this->m_head->getImageItem($this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>.jpg" />
            </a>
            <div id="InvTrinketTwoTemplate" style="display: none">
                <?= $this->m_head->getHtmlTooltip($this->config->item('itemsArmoryLang'), $this->m_characters->getItemInstace($this->m_data->getRealmConnectionData($idrealm), $this->armory_model->getCharInvTrinketTwo($idplayer, $this->m_data->getRealmConnectionData($idrealm)))); ?>
            </div>
            <script>tippy('#InvTrinketTwo', { html: '#InvTrinketTwoTemplate' })</script>
            
            <div class="fx-gap"></div>
        </div>
    </div>
</div>