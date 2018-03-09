    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <!-- Generated ID -->
                    <?php if(isset($_GET['generated'])) {
                        $generated = $_GET['generated'];
                    } else { 
                        $generated = 'Nothing';
                    }?>
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-inline uk-width-1-3@s">
                            <div class="uk-form-controls">
                                <button class="uk-button uk-button-primary uk-width-1-1">Your ID is: <span class="uk-text-bold"><?= $generated ?></span></button>
                            </div>
                        </div>
                        <div class="uk-inline uk-width-2-3@s">
                            <input class="uk-input" type="text" name="example-input1-group2" placeholder="<?= base_url(); ?>api/getchar?guid=100000&id=<?= $generated ?>" disabled>
                        </div>
                    </div>
                    <!-- Generated ID -->
                </div>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: code"></span> API</h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog" uk-toggle="target: #newApi"></a>
                                    <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: info"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
                                <li><a href="#"><i class="fa fa-gamepad" aria-hidden="true"></i> Principal</a></li>
                                <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Internal</a></li>
                                <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Skins</a></li>
                                <li><a href="#"><i class="fa fa-crosshairs" aria-hidden="true"></i> Kills</a></li>
                                <li><a href="#"><i class="fa fa-male" aria-hidden="true"></i> Personal</a></li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_principal</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharAccount</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharName</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharClass</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharRace</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharGender</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharLevel</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharOnline</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharMoney</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p>Send specific parameters in the URL to obtain different values, 
                                        <a href="#" uk-toggle="target: #tg-parameters; animation: uk-animation-fade">PARAMETERS.</a>
                                        <div id="tg-parameters" class="uk-card uk-card-secondary uk-card-body uk-margin-small">
                                            <strong>api_username</strong>, Returns the name of the account<br>
                                            <strong>api_class</strong>, Returns the name of the class<br>
                                            <strong>api_race</strong>, Returns the name of the race<br>
                                            <strong>api_gender</strong>, Returns the name of the gender
                                        </div>
                                        Find examples for this 
                                        <a href="#" uk-toggle="target: #tg-example; animation: uk-animation-fade">Examples</a>
                                        <div id="tg-example" class="uk-card uk-card-secondary uk-card-body uk-margin-small">
                                            <strong>api_username</strong> api.com/api/getchar/guid=1&id=1
                                            <strong>&api_username</strong>
                                            <strong>Multiple</strong> <strong>&api_username&api_class&api_gender</strong>
                                        </div>
                                        The first two parameters should always be guid = <strong>ID</strong> & id = <strong>IDTOKEN</strong>
                                    </p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_internal</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharXP</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharBankSlot</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharFlags</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharInstance</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTitle</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharKnowTitle</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharLatency</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_skins</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharSkin</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharFace</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharHairStyle</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharHairColor</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharFacilStyle</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_kills</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTotalKills</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTodayKills</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharYesterdayKills</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_personal</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharHealth</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower1</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower2</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower3</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower4</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower5</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower6</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPower7</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: code"></span> More API Parameters</h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: info"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
                                <li><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i> Position</a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> Times</a></li>
                                <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Logins</a></li>
                                <li><a href="#"><i class="fa fa-area-chart" aria-hidden="true"></i> Points</a></li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_position</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionX</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionY</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionZ</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionO</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionMap</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharPositionZone</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTaxiMask</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharExploreZones</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_times</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTotalTime</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharLevelTime</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharLogoutTime</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharDeathExpTime</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_logins</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharLoginAt</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                                <li>
                                    <ul uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_points</a>
                                            <div class="uk-accordion-content">
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTotalArena</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTotalHonor</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharTodayHonor</p>
                                                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> CharYesterdayHonor</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="uk-text-bold">It has no parameters</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
