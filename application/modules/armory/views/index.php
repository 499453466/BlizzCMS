<?= $fx_adds ?>
<div class="uk-space-xlarge"></div>
<div class="uk-grid uk-grid-medium" data-uk-grid>
    <div class="uk-width-1-1@l">
        <h3 class="uk-heading-divider uk-text-white"><i class="ra ra-anvil"></i> 
        	<?= $this->m_characters->getCharName($idplayer, $this->m_data->getRealmConnectionData($idrealm)); ?></h3>
    </div>
    <?php $this->load->fx_call('character'); ?>
    <?php $this->load->fx_call('information'); ?>
    <?php $this->load->fx_call('mounts'); ?>
</div>