<?php if(isset($_POST['createPM'])) {
    $this->load->model('messages/messages_model');
    $reply = $_POST['replyText'];
    $this->messages_model->insertReply($this->session->userdata('fx_sess_id'), $idlink, $reply);
} ?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <title><?= $this->config->item('ProjectName'); ?></title>
    <script src="<?= base_url(); ?>assets/js/9013706011.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/blizzcms-general.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/blizzcms-app.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/css/blizzcms-template.css') ?>"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('theme/'); ?><?= $this->config->item('theme_name'); ?>/css/<?= $this->config->item('theme_name'); ?>.css"/>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/images/favicon.ico">
    <!-- UiKit Start -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>core/uikit/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="<?= base_url(); ?>core/uikit/js/uikit.min.js"></script>
    <script src="<?= base_url(); ?>core/uikit/js/uikit-icons.min.js"></script>
    <!-- UiKit end -->
    <!-- font-awesome Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font-awesome End -->

    <!-- custom footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- custom footer -->
</head>

<body class="en-us <?= $this->config->item('theme_name'); ?> glass-header preload" lang="en" data-locale="en-gb" data-device="desktop" data-name="index">
    <!-- header -->
    <?php $this->load->view('general/icons'); ?>
    <!-- submenu -->
    </div>
    </div>
    </div>
    <!-- submenu -->
    <br><br>
    <div class="Page-container">
        <div class="Page-content en-US">
            <div style="" class="HeroPane HeroPane--large HeroPane--adaptive">
                <div class="HeroPane-content">
                    <div class="align-center">
                        <div class="space-large hide show-sm"></div>
                        <a href="">
                            <?php if($this->m_general->getUserInfoGeneral($idlink)->num_rows()) { ?>
                                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($idlink)); ?>" width="120" height="120" alt="" />
                            <?php } else { ?>
                                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="120" height="120" alt="" />
                            <?php } ?>
                        </a>
                        <div class="Heading Heading--siteTitle" id="locations-title" style="color: #fff;"><?= $this->m_data->getUsernameID($idlink); ?></div>
                        <div class="space-small"></div>
                    </div>
                    <section class="Scm-content">
                        <div class="section uk-scrollspy-inview uk-animation-slide-bottom" uk-scrollspy-class="">
                        <?php if ($this->m_modules->getMessages() == '1') { ?>
                            <?php if($this->m_data->isLogged() && $idlink != $this->session->userdata('fx_sess_id')) { ?>
                                <div class="uk-column-1-1">
                                    <div>
                                        <div class="uk-margin">
                                            <a href="#" uk-toggle="target: #privateMsg">
                                                <button class="uk-button uk-button-secondary uk-width-1-1 uk-margin-small-bottom"><i class="fa fa-envelope" aria-hidden="true"></i> <?= $this->lang->line('button_private_message'); ?></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                            <hr class="uk-divider-icon">
                            <ul uk-accordion>
                                <li class="uk-open">
                                    <h3 class="uk-accordion-title" style="color: #fff;"><i class="fa fa-server" aria-hidden="true"></i> <?= $this->m_general->getRealmName(); ?> - <?= $this->lang->line('panel_chars_list'); ?></h3>
                                    <div class="uk-accordion-content">
                                        <div class="uk-grid uk-grid-small uk-child-width-1-6 uk-flex-center" uk-grid>
                                            <?php foreach($this->m_general->getGeneralCharactersSpecifyAcc($idlink)->result() as $chars) { ?>
                                                <div class="uk-text-center">
                                                    <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($chars->class)); ?>" title="<?= $chars->name ?> (Lvl <?= $chars->level ?>)" width="50" height="50" uk-tooltip>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="space-huge"></div>
        </div>
    </div>

<?php if ($this->m_modules->getMessages() == '1') { ?>
    <div id="privateMsg" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title"><i class="fa fa-pencil" aria-hidden="true"></i> <?= $this->lang->line('form_new_message'); ?></h2>
            </div>
            <form action="" method="post" accept-charset="utf-8">
                <div class="uk-modal-body">

                    <script src="<?= base_url(); ?>core/ckeditor_basic/ckeditor.js"></script>

                    <div class="uk-margin">
                        <label class="uk-form-label uk-text-large" for="form-stacked-text"><?= $this->lang->line('form_message'); ?></label>
                        <div class="uk-form-controls">
                            <div class="uk-width-1-1">
                                <textarea required name="replyText" id="ckeditor" rows="10" cols="80"></textarea>
                                <script>
                                    CKEDITOR.replace('ckeditor');
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="uk-modal-footer uk-text-right actions">
                        <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                        <button class="uk-button uk-button-primary" type="submit" name="createPM"><?= $this->lang->line('button_send'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>