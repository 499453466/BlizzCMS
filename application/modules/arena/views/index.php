<?= $fx_adds ?>
<div class="uk-space-xlarge"></div>
<div class="uk-grid uk-grid-large" data-uk-grid>
    <div class="uk-width-1-6@l"></div>
    <div class="uk-width-4-6@l">
        <?php $this->load->fx_call('two'); ?>
        <?php $this->load->fx_call('three'); ?>
        <?php $this->load->fx_call('five'); ?>
    </div>
    <div class="uk-width-1-6@l"></div>
</div>