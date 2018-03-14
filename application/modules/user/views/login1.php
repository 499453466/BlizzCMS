    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-5@l"></div>
            <div class="uk-width-3-5@l">
                <h2 class="uk-text-primary uk-text-center"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_login'); ?></h2>
                <p class="uk-text-center uk-text-white"><?= $this->lang->line('login_description'); ?></p>

                <?php if(isset($_GET['password'])) {
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_error').'</p></div>';
                } ?>

                <?php if(isset($_GET['account'])) {
                    echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('account_error').'</p></div>';
                } ?>

                    <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <?= form_input($username_form); ?>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <?= form_input($password_form); ?>
                            </div>
                        </div>
                    </div>
                    <?= form_submit($submit_form); ?>
                <hr>
                <a href="<?= base_url('register'); ?>">
                    <button class="uk-button uk-button-secondary uk-width-1-1" name="<?= $this->lang->line('no_account'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_account_create'); ?></button>
                </a>
            </div>
            <div class="uk-width-1-5@l"></div>
        </div>


<script>
    $(document).ready(function(){
        $(document).on('click', '#button_log', function(){
            var username = $('#login_username').val();
            var password = $('#login_password').val();
            if(username == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Username is empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            if(password == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Password is empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            $.ajax({
                url:"<?= base_url('user/verify1'); ?>",
                method:"POST",
                data:{username:username, password:password},
                dataType:"text",
                success:function(){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: plus-circle\'></span> Connecting...!', status: 'success', pos: 'top-right'
                    })
                    window.location.href = '<?= base_url(); ?>';
                }
            });
        });
    });
</script>