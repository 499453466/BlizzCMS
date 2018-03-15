<div class="uk-width-1-2@l">
    <h3 class="uk-heading-line uk-text-center uk-text-white"><span><?= $this->lang->line('playervsplayer'); ?></span></h3>
    <div class="uk-column-1-2">
        <p>
            <img src=" https://www.wowlatinoamerica.com/assets/images/icons/faction-0-banner.jpg " width="35" class="nk-btn-rounded" alt="" style="margin-right: 10px;">
            <span class="uk-text-white"><span><?= $this->lang->line('column_total_kills'); ?></span> <?= $this->m_characters->getInformationCharacter($this->m_data->getRealmConnectionData($idrealm), $idplayer)->row('totalKills'); ?></span>
        </p>
        <p>
            <img src=" https://www.wowlatinoamerica.com/assets/images/icons/faction-0-banner.jpg " width="35" class="nk-btn-rounded" alt="" style="margin-right: 10px;">
            <span class="uk-text-white"><span><?= $this->lang->line('column_today_kills'); ?></span> <?= $this->m_characters->getInformationCharacter($this->m_data->getRealmConnectionData($idrealm), $idplayer)->row('todayKills'); ?></span>
        </p>
    </div>
    <!--<div class="uk-space-small"></div>
    <h3 class="uk-heading-line uk-text-center uk-text-white"><span>Profesiones</span></h3>
    <img src="https://www.wowlatinoamerica.com/assets/images/skills/sastreria.jpg" class="nk-btn-rounded" alt="" width="35" style="margin-right: 10px;">
    <span class="uk-text-white"><span>Sastrería </span> 426 / 450</span>
    <div class="uk-space-small"></div>
    <h3 class="uk-heading-line uk-text-center uk-text-white"><span>Equipos PvP</span></h3>
    <div class="uk-column-1-1">
        <p>
            <img src=" https://www.wowlatinoamerica.com/assets/images/icons/faction-0-banner.jpg " width="35" class="nk-btn-rounded" alt="">
            <span class="uk-text-white">Sin equipo de arena</span>
        </p>
        <p>
            <img src=" https://www.wowlatinoamerica.com/assets/images/icons/faction-0-banner.jpg " width="35" class="nk-btn-rounded" alt="">
            <span class="uk-text-white">Sin equipo de arena</span>
        </p>
        <p>
            <img src=" https://www.wowlatinoamerica.com/assets/images/icons/faction-0-banner.jpg " width="35" class="nk-btn-rounded" alt="">
            <span class="uk-text-white">Sin equipo de arena</span>
        </p>
    </div>-->
</div>