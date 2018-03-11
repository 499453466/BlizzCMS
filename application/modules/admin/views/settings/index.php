<?php
    $fileConfig = FCPATH.'application/config/config.php';
?>

<?php if(isset($_POST['submitConfig'])) {
    $data = array(
        'filename' => $fileConfig,
        'configURL' => str_replace(' ', '', $_POST['configURL']),
        'actualURL' => $this->admin_model->getConfigBaseUrl($fileConfig),
        'configLang' => $_POST['configLang'],
        'actualLang' => $this->admin_model->getConfigLanguage($fileConfig),
        'configCharSet' => str_replace(' ', '', $_POST['configCharSet']),
        'actualCharSet' => $this->admin_model->getConfigCharSet($fileConfig),
        'configSess' => str_replace(' ', '', $_POST['configSessExpiration']),
        'actualSess' => $this->admin_model->getConfigSessExpiration($fileConfig),
    );
    $this->admin_model->settingConfig($data);
}?>

<?php
    $fileFixCore = FCPATH.'application/config/fixcore.php';
?>

<?php if(isset($_POST['submitFixCore'])) {
    $datafx = array(
        'filename' => $fileFixCore,
        'fixcoreName' => str_replace(' ', '', $_POST['fixcoreProjectName']),
        'actualName' => $this->admin_model->getFixCoreProjectName($fileFixCore),
        'fixcoreTimeZone' => str_replace(' ', '', $_POST['fixcoreTimeZone']),
        'actualTimeZone' => $this->admin_model->getFixCoreTimeZone($fileFixCore),
        'fixcoreDiscord' => str_replace(' ', '', $_POST['fixcoreDiscordInv']),
        'actualDiscord' => $this->admin_model->getFixCoreDiscordInv($fileFixCore),
        'fixcoreRealmlist' => str_replace(' ', '', $_POST['fixcoreRealmlist']),
        'actualRealmlist' => $this->admin_model->getFixCoreRealmlist($fileFixCore),
        'fixcoreStaffColor' => str_replace(' ', '', $_POST['fixcoreStaffColor']),
        'actualStaffColor' => $this->admin_model->getFixCoreStaffColor($fileFixCore),
        'fixcoreThemeName' => str_replace(' ', '', $_POST['fixcoreTheme']),
        'actualTheme' => $this->admin_model->getFixCoreThemeName($fileFixCore),
        'devnavbarfx' => $_POST['devnavbarfx'],
        'actualnavbr' => $this->admin_model->getFixCoreNavBar($fileFixCore),
    );

    $this->admin_model->settingFixCore($datafx);
}?>

<?php
    $fileDatabase = FCPATH.'application/config/database.php';
?>

<?php if(isset($_POST['submitDatabase'])) {
    $datadb = array(
        'filename' => $fileDatabase,
        'dbCmsHost' => str_replace(' ', '', $_POST['databaseCmsHost']),
        'actualdbCmsHost' => $this->admin_model->getDatabaseCmsHost($fileDatabase),
        'dbCmsUser' => str_replace(' ', '', $_POST['databaseCmsUser']),
        'actualdbCmsUser' => $this->admin_model->getDatabaseCmsUser($fileDatabase),
        'dbCmsPassword' => str_replace(' ', '', $_POST['databaseCmsPassword']),
        'actualdbCmsPassword' => $this->admin_model->getDatabaseCmsPassword($fileDatabase),
        'dbCmsName' => str_replace(' ', '', $_POST['databaseCmsName']),
        'actualdbCmsdbName' => $this->admin_model->getDatabaseCmsName($fileDatabase),
        'dbAuthHost' => str_replace(' ', '', $_POST['databaseAuthHost']),
        'actualdbAuthHost' => $this->admin_model->getDatabaseAuthHost($fileDatabase),
        'dbAuthUser' => str_replace(' ', '', $_POST['databaseAuthUser']),
        'actualdbAuthUser' => $this->admin_model->getDatabaseAuthUser($fileDatabase),
        'dbAuthPassword' => str_replace(' ', '', $_POST['databaseAuthPassword']),
        'actualdbAuthPassword' => $this->admin_model->getDatabaseAuthPassword($fileDatabase),
        'dbAuthName' => str_replace(' ', '', $_POST['databaseAuthName']),
        'actualdbAuthName' => $this->admin_model->getDatabaseAuthName($fileDatabase),
    );
    $this->admin_model->settingDatabase($datadb);
}?>

<?php
    $fileCaptcha = FCPATH.'application/config/recaptcha.php';
?>

<?php if(isset($_POST['submitCaptcha'])) {
    $datacaptcha = array(
        'filename' => $fileCaptcha,
        'recaptchaKey' => str_replace(' ', '', $_POST['recaptchaKey']),
        'actualrecaptchaKey' => $this->admin_model->getRecaptchaKey($fileCaptcha),
        'recaptchaPrivateKey' => str_replace(' ', '', $_POST['recaptchaPrivateKey']),
        'actualrecaptchaPrivateKey' => $this->admin_model->getRecaptchaPrivateKey($fileCaptcha),
        'recaptchaLang' => str_replace(' ', '', $_POST['recaptchaLang']),
        'actualrecaptchaLang' => $this->admin_model->getRecaptchaLang($fileCaptcha),
    );
    $this->admin_model->settingRecaptcha($datacaptcha);
}?>

<?php
    if ($this->m_modules->getStatusLadBugtracker() == '1')
    {
        $fileBugtracker = FCPATH.'application/modules/bugtracker/config/bugtracker.php';
    }

    if ($this->m_modules->getDonation() == '1')
    {
        $fileDonate = FCPATH.'application/modules/donate/config/donate.php';
    }

    if ($this->m_modules->getStatusStore() == '1')
    {
        $fileStore = FCPATH.'application/modules/shop/config/store.php';
    }
?>

<?php if(isset($_POST['submitBugtracker'])) {
    $databugtracker = array(
        'filename' => $fileBugtracker,
        'bugtrackerText' => str_replace(' ', '', $_POST['bugtrackerText']),
        'actualbugtrackerText' => $this->admin_model->getBugtrackerText($fileBugtracker),
    );
    $this->admin_model->settingBugtracker($databugtracker);
}?>

<?php if(isset($_POST['submitDonate'])) {
    $datadonate = array(
        'filename' => $fileDonate,
        'paypalCurrency' => str_replace(' ', '', $_POST['paypalCurrency']),
        'actualpaypalCurrency' => $this->admin_model->getPaypalCurrency($fileDonate),
        'paypalMode' => $_POST['paypalMode'],
        'actualpaypalMode' => $this->admin_model->getPaypalMode($fileDonate),
        'paypalclientId' => str_replace(' ', '', $_POST['paypalclientId']),
        'actualpaypalclientId' => $this->admin_model->getPaypalClientID($fileDonate),
        'paypalPassword' => str_replace(' ', '', $_POST['paypalPassword']),
        'actualpaypalPassword' => $this->admin_model->getPaypalPassword($fileDonate),
    );
    $this->admin_model->settingDonate($datadonate);
}?>

<?php if(isset($_POST['submitStore'])) {
    $datastore = array(
        'filename' => $fileStore,
        'storeType' => $_POST['storeType'],
        'actualstoreType' => $this->admin_model->getStoreType($fileStore),
    );
    $this->admin_model->settingStore($datastore);
}?>

    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | removeformat'});
    </script>
    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: settings"></span> <?= $this->lang->line('admin_settings'); ?></h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: info"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                <li><a href="#"><i class="fas fa-cog"></i> Main Settings</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Website Settings</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Database Settings</a></li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Base Site URL</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="configURL" value="<?= $this->admin_model->getConfigBaseUrl($fileConfig); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Default Language</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" name="configLang">
                                                    <option value="english">English</option>
                                                    <option value="french">French</option>
                                                    <option value="german">German</option>
                                                    <option value="hungarian">Hungarian</option>
                                                    <option value="russian">Russian</option>
                                                    <option value="spanish">Spanish</option>
                                                    <option value="thai">Thai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Default Character Set</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="configCharSet" value="<?= $this->admin_model->getConfigCharSet($fileConfig); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Session Expiration</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="configSessExpiration" value="<?= $this->admin_model->getConfigSessExpiration($fileConfig); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitConfig" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Project Name</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreProjectName" value="<?= $this->admin_model->getFixCoreProjectName($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Timezone</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreTimeZone" value="<?= $this->admin_model->getFixCoreTimeZone($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Discord ID</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreDiscordInv" value="<?= $this->admin_model->getFixCoreDiscordInv($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Realmlist</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreRealmlist" value="<?= $this->admin_model->getFixCoreRealmlist($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Forum STAFF Color</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreStaffColor" value="<?= $this->admin_model->getFixCoreStaffColor($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Theme Name</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="fixcoreTheme" value="<?= $this->admin_model->getFixCoreThemeName($fileFixCore); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Dev Navbar</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" name="devnavbarfx">
                                                    <option value="FALSE">FALSE</option>
                                                    <option value="TRUE">TRUE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitFixCore" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Hostname</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseCmsHost" value="<?= $this->admin_model->getDatabaseCmsHost($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Username</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseCmsUser" value="<?= $this->admin_model->getDatabaseCmsUser($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Password</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseCmsPassword" value="<?= $this->admin_model->getDatabaseCmsPassword($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Name</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseCmsName" value="<?= $this->admin_model->getDatabaseCmsName($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="uk-divider-icon">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Hostname</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseAuthHost" value="<?= $this->admin_model->getDatabaseAuthHost($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Username</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseAuthUser" value="<?= $this->admin_model->getDatabaseAuthUser($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Password</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseAuthPassword" value="<?= $this->admin_model->getDatabaseAuthPassword($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Name</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: database"></span>
                                                    <input class="uk-input" type="text" name="databaseAuthName" value="<?= $this->admin_model->getDatabaseAuthName($fileDatabase); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitDatabase" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: settings"></span> Module Settings</h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: info"></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                <li><a href="#"><i class="fas fa-cog"></i> Recaptcha Settings</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Bugtracker Settings</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Donate Settings</a></li>
                                <li><a href="#"><i class="fas fa-cog"></i> Store Settings</a></li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Recaptcha Site Key</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="recaptchaKey" value="<?= $this->admin_model->getRecaptchaKey($fileCaptcha); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Recaptcha Secret Key</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="recaptchaPrivateKey" value="<?= $this->admin_model->getRecaptchaPrivateKey($fileCaptcha); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Recaptcha Lang</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="recaptchaLang" value="<?= $this->admin_model->getRecaptchaLang($fileCaptcha); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitCaptcha" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Description Text</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-width-1-1">
                                                    <textarea class="tinyeditor" name="bugtrackerText" rows="10" cols="80"><?= $this->admin_model->getBugtrackerText($fileBugtracker); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitBugtracker" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">PayPal Currency</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="paypalCurrency" value="<?= $this->admin_model->getPaypalCurrency($fileDonate); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">PayPal Mode</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" name="paypalMode">
                                                    <option value="sandbox">Sandbox</option>
                                                    <option value="live">Live</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">PayPal Client ID</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="paypalclientId" value="<?= $this->admin_model->getPaypalClientID($fileDonate); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">PayPal Secret Password</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: cog"></span>
                                                    <input class="uk-input" type="text" name="paypalPassword" value="<?= $this->admin_model->getPaypalPassword($fileDonate); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitDonate" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="" method="post" accept-charset="utf-8">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-uppercase">Store Type</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" name="storeType">
                                                    <option value="1">Store with Images</option>
                                                    <option value="2">Store with Icons</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <button class="uk-button uk-button-primary uk-width-1-1" name="submitStore" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
