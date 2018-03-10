<?php if(isset($_POST['button_deleteCategory'])) {
    $this->admin_model->deleteCategory($_POST['button_deleteCategory']);
} ?>

    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: list"></span> <?= $this->lang->line('admin_manage_categories'); ?></h4></div>
                                <div class="uk-width-expand uk-text-right">
                                    <a href="" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: pencil" uk-toggle="target: #newCategory"></a>
                                </div>
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
                url:"<?= base_url('admin/getCategoryList'); ?>",
                method:"POST",
                success:function(data){
                    $('#categoryList').html(data);
                }
            });
        }
        fetch_data();

        function edit_data(id, text, colum_name){
            $.ajax({
                url:"<?= base_url('admin/updateCategory'); ?>",
                method:"POST",
                data:{id:id, text:text, colum_name:colum_name},
                dataType:"text",
                success:function(data){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: check\'></span> Updated!', pos: 'top-right'
                    })
                }
            });
        }
        $(document).on('blur', '#categoryName', function(){
            var id = $(this).data("id1");
            var text = $('#categoryName').val();
            edit_data(id, text, "categoryName");
        });
        $(document).on('click', '#button_addCategory', function(){
            var categoryname = $('#newcategoryname').val();
            if(categoryname == ''){
                alert('Name is empty');
                return false;
            }
            $.ajax({
                url:"<?= base_url('admin/insertCategory'); ?>",
                method:"POST",
                data:{categoryname:categoryname},
                dataType:"text",
                success:function(){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: check\'></span> Added', pos: 'top-right'
                    })
                    fetch_data();
                }
            });
        });
        $(document).on('click', '#button_deleteCategory', function(){
            var id = $(this).data("id3");
            $.ajax({
                url:"<?= base_url('admin/deleteCategory'); ?>",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: check\'></span> Deleted', pos: 'top-right'
                    })
                    fetch_data();
                }
            });
        });
    });
</script>