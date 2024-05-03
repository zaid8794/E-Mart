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
                            <h2 class="card-title">Products</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary product-modal-button">
                                Add New Product
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <form action="" id="product_form" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label for="category_id">Category</label>
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

                                                    <div class="form-group col-lg-6">
                                                        <label for="brand_id">Brand</label>
                                                        <select name="brand_id" id="brand_id" class="form-control">
                                                            <option value="0" selected disabled>First Select Category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_name">Product Name</label>
                                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_price">Product Price</label>
                                                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Product Price">
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_description">Product Description</label>
                                                    <textarea name="product_description" id="product_description" class="form-control h-75" placeholder="Product Description" rows="10" cols="30"></textarea>

                                                </div>
                                                <div class="form-group">
                                                    <label for="product_image">Product Image</label>
                                                    <input type="file" name="product_image" id="product_image" accept="image/*" class="form-control" onchange="document.getElementById('product_image_preview').classList.remove('d-none');document.getElementById('product_image_preview').src = window.URL.createObjectURL(this.files[0])">
                                                    <input type="hidden" name="old_product_image" id="old_product_image">
                                                    <img alt="product_image" id="product_image_preview" class="img-thumbnail img-fluid my-3 ms-3" width="130px">
                                                </div>
                                                <span class="text-danger" id="msg_error"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="product_id" id="product_id">
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
                            <h2 class="card-title">Product List</h2>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Description</th>
                                            <th>Brand Name</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $row = $crud_obj->getData('product LEFT JOIN category ON (product.category_id=category.category_id)LEFT JOIN brand ON(product.brand_id=brand.brand_id)', '*');
                                        $i = 1;
                                        if ($row) {
                                            foreach ($row as $value) {
                                        ?>
                                                <tr id="product_<?= $value['product_id']; ?>">
                                                    <td><?= $i ?></td>
                                                    <td><img src="uploads/products/<?= $value['product_image']; ?>" height="" width="100" alt=""></td>
                                                    <td><?= $value['product_name'] ?></td>
                                                    <td><?= $value['product_price'] ?></td>
                                                    <td style="width: 40%;"><?= $value['product_description'] ?></td>
                                                    <td><?= $value['brand_name'] ?></td>
                                                    <td><?= $value['category_name'] ?></td>
                                                    <td>
                                                        <button class="btn btn-warning waves-effect btn-circle waves-light mb-2 edit" type="button" data-id="<?= $value['product_id'] ?>" data-catid="<?= $value['category_id'] ?>" data-brandid="<?= $value['brand_id'] ?>" data-brandname="<?= $value['brand_name'] ?>"><i class="fa fa-pencil-square-o"></i></button>
                                                        <button class="btn btn-danger waves-effect btn-circle waves-light mb-2 delete" type="button" data-id="<?= $value['product_id'] ?>"><i class="fa fa-trash"></i></button>
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
</div>
<?php
require_once "includes/footer.php";
?>
<script>
    $(document).ready(function() {
        $('.product-modal-button').click(function() {
            $('#product_modal').modal('show');
            $('.modal-title').text('Add New Product');
            $('#submit').val('Save');
            $('#form_type').val('save');
            $('#product_image_preview').addClass('d-none');
        });

        $("#category_id").change(function() {
            var cat_id = $(this).val();
            $.ajax({
                url: '../src/Class/Product.php',
                type: 'POST',
                data: {
                    cat_id: cat_id,
                    form_type: 'change_brand_by_category'
                },
                dataType: 'json',
                success: function(res) {
                    if (res.status == 1) {
                        $('#brand_id').html(res.data);
                    }
                },
            });
        })

        $('#product_form').on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: "../src/Class/Product.php",
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        $('#product_form')[0].reset();
                        $("#product_modal").modal('hide');
                        location.reload();
                    } else {
                        console.log(res);
                        $("#msg_error").text(res.msg_error);
                    }
                }
            });
        });

        $(".edit").click(function() {
            var product_id = $(this).data("id");
            var cat_id = $(this).data("catid");
            var brand_id = $(this).data("brandid");
            var brand_name = $(this).data("brandname");
            $("#product_modal").modal('show');
            $(".modal-title").text('Update Product');
            $("#submit").removeClass("btn btn-primary save").addClass("btn btn-warning update").val('Update');
            $("#form_type").val("update");
            $.ajax({
                url: "../src/Class/Product.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    category_id: cat_id,
                    brand_id: brand_id,
                    brand_name: brand_name,
                    form_type: "edit",
                },
                dataType: "json",
                success: function(res) {

                    $("#category_id").val(res.data[0].category_id);
                    $("#brand_id").html(res.brand_id);
                    $("#product_id").val(res.data[0].product_id);
                    $("#product_name").val(res.data[0].product_name);
                    $("#product_price").val(res.data[0].product_price);
                    $("#product_description").val(res.data[0].product_description);
                    $("#product_image_preview").attr('src', 'uploads/products/' + res.data[0].product_image);
                    $("#old_product_image").val(res.data[0].product_image);
                }
            });
        });

        $(".delete").click(function() {
            $("#form_type").val('delete');
            var product_id = $(this).data("id");
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
                        url: "../src/Class/Product.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            form_type: "delete",
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.status == 1) {
                                $("#" + res.remove).remove();
                                Swal.fire("Deleted!", "Your Product has been deleted.", "success");
                            }
                        }
                    });
                }
                return false;
            });
        });
    });
</script>