    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: list"></span> <?= $this->lang->line('admin_manage_donations'); ?></h4></div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="uk-card-body">
                        <!-- ajax -->
                            <div id="categoryList"></div>
                        <!-- ajax -->
                        </div>
                        <!-- content -->
                    </div>
                </div>
            </div>
        </div>

<script>
    $(document).ready(function(){
        function fetch_data(){
            $.ajax({
                url:"<?= base_url('admin/getDonateList'); ?>",
                method:"POST",
                success:function(data){
                    $('#categoryList').html(data);
                }
            });
        }
        fetch_data();

        function edit_data(id, text, colum_name){
            $.ajax({
                url:"<?= base_url('admin/updateDonation'); ?>",
                method:"POST",
                data:{id:id, text:text, colum_name:colum_name},
                dataType:"text",
                success:function(data){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: info\'></span> Donation updated', status: 'primary', pos: 'top-right'
                    })
                }
            });
        }
        $(document).on('blur', '#donateName', function(){
            var id = $(this).data("id1");
            var text = $('#donateName').val();
            if(text == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Name is Empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            edit_data(id, text, "name");
        });
        $(document).on('blur', '#donatePrice', function(){
            var id = $(this).data("id4");
            var price = $('#donatePrice').val();
            if(price == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Price is Empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            edit_data(id, price, "price");
        });
        $(document).on('blur', '#donateTax', function(){
            var id = $(this).data("id5");
            var tax = $('#donateTax').val();
            if(tax == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Tax is Empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            edit_data(id, tax, "tax");
        });
        $(document).on('blur', '#donatePoints', function(){
            var id = $(this).data("id6");
            var points = $('#donatePoints').val();
            if(points == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Points is Empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            edit_data(id, points, "points");
        });
        $(document).on('click', '#button_adddonation', function(){
            var donationname = $('#newdonatename').val();
            var donationprice = $('#newdonateprice').val();
            var donationtax = $('#newonateTax').val();
            var donationpoints = $('#newdonatepoints').val();
            if(donationname == ''){
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Name is empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            $.ajax({
                url:"<?= base_url('admin/insertDonation'); ?>",
                method:"POST",
                data:{donationname:donationname, donationprice:donationprice, donationtax:donationtax, donationpoints:donationpoints},
                dataType:"text",
                success:function(){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: plus-circle\'></span> Donation added', status: 'success', pos: 'top-right'
                    })
                    fetch_data();
                }
            });
        });
        $(document).on('click', '#button_deleteDonate', function(){
            var id = $(this).data("id3");
            $.ajax({
                url:"<?= base_url('admin/deleteDonation'); ?>",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: minus-circle\'></span> Donation deleted', status: 'danger', pos: 'top-right'
                    })
                    fetch_data();
                }
            });
        });
    });
</script>
