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
                <!-- table show -->
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Contact Us List</h2>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $crud_obj->getData('contactus', '*', '', 'contact_id', 'DESC');
                                    $i = 1;
                                    if ($row) {
                                        foreach ($row as $value) {
                                    ?>

                                            <td><?= $i ?></td>
                                            <td><?= $value['contact_id'] ?></td>
                                            <td><?= $value['contact_name'] ?></td>
                                            <td><?= $value['contact_email'] ?></td>
                                            <td><?= $value['contact_mobile'] ?></td>
                                            <td><?= $value['contact_subject'] ?></td>
                                            <td><?= $value['contact_message'] ?></td>

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