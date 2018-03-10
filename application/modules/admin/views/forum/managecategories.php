    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><span data-uk-icon="icon: list"></span> <?= $this->lang->line('admin_manage_categories'); ?></h4></div>
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
                        message: '<span uk-icon=\'icon: info\'></span> Category updated', status: 'primary', pos: 'top-right'
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
                UIkit.notification({
                    message: '<span uk-icon=\'icon: warning\'></span> Title is empty', status: 'warning', pos: 'top-right'
                })
                return false;
            }
            $.ajax({
                url:"<?= base_url('admin/insertCategory'); ?>",
                method:"POST",
                data:{categoryname:categoryname},
                dataType:"text",
                success:function(){
                    UIkit.notification({
                        message: '<span uk-icon=\'icon: plus-circle\'></span> Category added', status: 'success', pos: 'top-right'
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
                        message: '<span uk-icon=\'icon: minus-circle\'></span> Category deleted', status: 'danger', pos: 'top-right'
                    })
                    fetch_data();
                }
            });
        });
    });
</script>
