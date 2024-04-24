<?php
require_once "includes/header.php";
require_once "../vendor/autoload.php";

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
                            <h2 class="card-title">Brand</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary brand-modal-button">
                                Add New Brand
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="brand_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" id="brand_form" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="brand_name">Category</label>

                                                    <select name="category_id" id="category_id" class="form-control">

                                                        <option value="" selected disabled>Select Category</option>
                                                        <?php
                                                        $query = $crud_obj->getData('category', '*');
                                                        foreach ($query as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_name">Brand Name</label>
                                                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="Brand Name">
                                                </div>
                                                <span class="text-danger" id="msg_error"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="brand_id" id="brand_id">
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
                            <h2 class="card-title">Brand List</h2>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Brand Name</th>
                                        <th>Category Id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $crud_obj->getData('brand LEFT JOIN category ON (brand.category_id=category.category_id)', '*');
                                    $i = 1;
                                    if ($row) {
                                        foreach ($row as $value) {
                                    ?>
                                            <tr id="brand_<?= $value['brand_id']; ?>">
                                                <td><?= $i ?></td>
                                                <td><?= $value['brand_name'] ?></td>
                                                <td><?= $value['category_name'] ?></td>
                                                <td>
                                                    <button class="btn btn-warning waves-effect btn-circle waves-light mb-2 edit" type="button" data-id="<?= $value['brand_id'] ?>"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button class="btn btn-danger waves-effect btn-circle waves-light mb-2 delete" type="button" data-id="<?= $value['brand_id'] ?>"><i class="fa fa-trash"></i></button>
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
        $('.brand-modal-button').click(function() {
            $('#brand_modal').modal('show');
            $('.modal-title').text('Add New Brand');
            $('#submit').val('Save');
            $('#form_type').val('save');
        });

        $('#brand_form').on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: "../src/Class/Brand.php",
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        $('#brand_form')[0].reset();
                        $("#brand_modal").modal('hide');
                        location.reload();
                    } else {
                        console.log(res);
                        $("#msg_error").text(res.msg_error);
                    }
                }
            });
        });

        $(".edit").click(function() {
            var brand_id = $(this).data("id");
            $("#brand_modal").modal('show');
            $(".modal-title").text('Update Brand');
            $("#submit").removeClass("btn btn-primary save").addClass("btn btn-warning update").val('Update');
            $("#form_type").val("update");
            $.ajax({
                url: "../src/Class/Brand.php",
                method: "POST",
                data: {
                    brand_id: brand_id,
                    form_type: "edit",
                },
                dataType: "json",
                success: function(res) {
                    var category_id = res[0].category_id;
                    var brand_id = res[0].brand_id;
                    var brand_name = res[0].brand_name;
                    $("#category_id").val(category_id);
                    $("#brand_id").val(brand_id);
                    $("#brand_name").val(brand_name);

                }
            });
        });

        $(".delete").click(function() {
            $("#form_type").val('delete');
            var brand_id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then(function(isConfirm) {
                if (isConfirm.value === true) {
                    $.ajax({
                        url: "../src/Class/Brand.php",
                        method: "POST",
                        data: {
                            brand_id: brand_id,
                            form_type: "delete",
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.status == 1) {
                                $("#" + res.remove).remove();
                                Swal.fire("Deleted!", "Your Category has been deleted.", "success");
                            }
                        }
                    });
                }
                return false;
            });
        });
    });
</script>