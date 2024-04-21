<?php
require_once "includes/header.php";
require_once "vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
?>
<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Modal area Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Category</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary category-modal-button">
                                Add New Category
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" id="category_form" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="category_name">Category Name</label>
                                                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name">
                                                </div>
                                                <span class="text-danger" id="msg_error"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="category_id" id="category_id">
                                                <input type="hidden" name="form_type" id="form_type">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" id="submit" class="btn btn-primary save">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- table show -->
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Category List</h2>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $crud_obj->getData('category', '*');
                                    $i = 1;
                                    if ($row) {
                                        foreach ($row as $value) {
                                    ?>
                                            <tr id="category_<?= $value['category_id']; ?>">
                                                <td><?= $i ?></td>
                                                <td><?= $value['category_name'] ?></td>
                                                <td>
                                                    <button class="btn btn-warning waves-effect btn-circle waves-light mb-2 edit" type="button" data-id="<?= $value['category_id'] ?>"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button class="btn btn-danger waves-effect btn-circle waves-light mb-2 delete" type="button" data-id="<?= $value['category_id'] ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "includes/footer.php";
?>
<script>
    $(document).ready(function() {
        $('.category-modal-button').click(function() {
            $('#category_modal').modal('show');
            $('.modal-title').text('Add New Category');
            $('#submit').val('Save');
            $('#form_type').val('save');
        });

        $('#category_form').on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: "src/Class/Category.php",
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        $('#category_form')[0].reset();
                        $("#category_modal").modal('hide');
                        location.reload();
                    } else {
                        console.log(res);
                        $("#msg_error").text(res.msg_error);
                    }
                }
            });
        });

        $(".edit").click(function() {
            var cat_id = $(this).data("id");
            $("#category_modal").modal('show');
            $(".modal-title").text('Update Brand');
            $("#submit").removeClass("btn btn-primary save").addClass("btn btn-warning update").val('Update');
            $("#form_type").val("update");
            $.ajax({
                url: "src/Class/Category.php",
                method: "POST",
                data: {
                    cat_id: cat_id,
                    form_type: "edit",
                },
                dataType: "json",
                success: function(res) {
                    var category_name = res[0].category_name;
                    var category_id = res[0].category_id;
                    $("#category_id").val(category_id);
                    $("#category_name").val(category_name);

                }
            });
        });

        $(".delete").click(function() {
            $("#form_type").val('delete');
            var cat_id = $(this).data("id");
            var confirm = window.confirm("Are you sure you want to delete this category?");
            if (confirm) {
                $.ajax({
                    url: "src/Class/Category.php",
                    method: "POST",
                    data: {
                        cat_id: cat_id,
                        form_type: "delete",
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 1) {
                            $("#" + res.remove).remove();
                        }
                    }
                });
            }
        });
    });
</script>