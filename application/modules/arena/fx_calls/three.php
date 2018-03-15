<ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title uk-text-uppercase uk-text-bold uk-text-white"><i class="ra ra-arena"></i> <?=$this->lang->line('nav_arena_statistics');?></a>
        <span class="uk-label uk-text-bold uk-label-warning"><?=$this->lang->line('arena_top_3v3');?></span>
        <div class="uk-accordion-content">
            <ul uk-tab="connect: #3v3statistics; animation: uk-animation-fade">
                <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm) { ?>
                    <li><a class="uk-text-bold uk-text-white"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
                <?php } ?>
            </ul>
            <ul id="3v3statistics" class="uk-switcher">
                <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm) { 
                    $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
                ?>
                    <li>
                        <table class="uk-table uk-table-responsive uk-table-divider">
                            <thead>
                                <tr>
                                    <th class="uk-width-small uk-text-white"><i class="fas fa-sitemap"></i> <?=$this->lang->line('column_team_name');?></th>
                                    <th class="uk-width-small uk-text-center uk-text-white"><i class="fas fa-users"></i> <?=$this->lang->line('column_members');?></th>
                                    <th class="uk-width-small uk-text-center uk-text-white"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                                    <th class="uk-width-small uk-text-center uk-text-white"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->arena_model->getTopArena3v3($multiRealm)->result() as $tops3v3) { ?>
                                    <tr>
                                        <td class="uk-text-white"><?=$tops3v3->name?></td>
                                        <td class="uk-text-center uk-text-white">
                                            <?php foreach ($this->arena_model->getMemberTeam($tops3v3->arenaTeamId, $multiRealm)->result() as $mmberteam) { ?>
                                                <img class="uk-border-circle" src="<?= base_url('assets/images/class/').$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm)) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid, $multiRealm) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                                            <?php } ?>
                                        </td>
                                        <td class="uk-text-center uk-text-white"><?=$tops3v3->rating?></td>
                                        <td class="uk-text-center uk-text-white"><?=$tops3v3->seasonWins?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </li>
</ul>