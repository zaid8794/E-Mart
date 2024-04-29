<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location:../../../register.php");
}
require_once "includes/header.php";
?>
<!-- Body Content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="text-uppercase font-14">
                                        Budget
                                    </h6>

                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        $2500
                                    </span>
                                </div>

                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/icon-8.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Total Hours
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        663.5
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/icon-9.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Progress
                                    </h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <!-- Heading -->
                                            <span class="font-24 text-dark mr-2">
                                                84.5%
                                            </span>
                                        </div>
                                        <div class="col">
                                            <!-- Progress -->
                                            <div class="progress h-5">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/icon-10.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Cost/Unit
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark">
                                        $7.50
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/icon-11.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / .row -->

            <div class="row">
                <!-- Order Summary Area -->
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Order Summary</h6>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Order</th>
                                            <th>Amount</th>
                                            <th>Client</th>
                                            <th>Modified</th>
                                            <th>Taxes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                    <span class="btn-inner--text">Invoice</span>
                                                </button>
                                            </th>
                                            <td class="order">
                                                <span class="font-14 mb-0">10/09/2018</span>
                                                <span class="d-block font-13">ABC 00023</span>
                                            </td>
                                            <td>2569854</td>
                                            <td>
                                                <span class="client">Apple Inc</span>
                                            </td>
                                            <td>18/11/19</td>
                                            <td>
                                                <span class="taxes text-sm mb-0">$1.115,45</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-rounded btn-outline-success">
                                                        <span class="btn-inner--text">Paid</span>
                                                    </button>
                                                    <!-- Actions -->
                                                    <div class="actions ml-3">
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Archive">
                                                            <i class="fa fa-archive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                    <span class="btn-inner--text">Invoice</span>
                                                </button>
                                            </th>
                                            <td class="order">
                                                <span class="font-14 mb-0">10/09/2018</span>
                                                <span class="d-block font-13">ABC 00023</span>
                                            </td>
                                            <td>2569854</td>
                                            <td>
                                                <span class="client">Apple Inc</span>
                                            </td>
                                            <td>12/11/19</td>
                                            <td>
                                                <span class="taxes text-sm mb-0">$1.115,45</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-rounded btn-outline-warning">
                                                        <span class="btn-inner--text">Pay now</span>
                                                    </button>
                                                    <!-- Actions -->
                                                    <div class="actions ml-3">
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Archive">
                                                            <i class="fa fa-archive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                    <span class="btn-inner--text">Invoice</span>
                                                </button>
                                            </th>
                                            <td class="order">
                                                <span class="font-14 mb-0">10/09/2018</span>
                                                <span class="d-block font-13">ABC 00023</span>
                                            </td>
                                            <td>2569854</td>
                                            <td>
                                                <span class="client">Apple Inc</span>
                                            </td>
                                            <td>20/11/19</td>
                                            <td>
                                                <span class="taxes text-sm mb-0">$1.115,45</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-rounded btn-outline-danger">
                                                        <span class="btn-inner--text">Delayed</span>
                                                    </button>
                                                    <!-- Actions -->
                                                    <div class="actions ml-3">
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Archive">
                                                            <i class="fa fa-archive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                    <span class="btn-inner--text">Invoice</span>
                                                </button>
                                            </th>
                                            <td class="order">
                                                <span class="font-14 mb-0">10/09/2018</span>
                                                <span class="d-block font-13">ABC 00023</span>
                                            </td>
                                            <td>2569854</td>
                                            <td>
                                                <span class="client">Apple Inc</span>
                                            </td>
                                            <td>28/11/19</td>
                                            <td>
                                                <span class="taxes text-sm mb-0">$1.115,45</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-rounded btn-outline-success">
                                                        <span class="btn-inner--text">Paid</span>
                                                    </button>
                                                    <!-- Actions -->
                                                    <div class="actions ml-3">
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Archive">
                                                            <i class="fa fa-archive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                    <span class="btn-inner--text">Invoice</span>
                                                </button>
                                            </th>
                                            <td class="order">
                                                <span class="font-14 mb-0">10/09/2018</span>
                                                <span class="d-block font-13">ABC 00023</span>
                                            </td>
                                            <td>2569854</td>
                                            <td>
                                                <span class="client">Apple Inc</span>
                                            </td>
                                            <td>29/11/19</td>
                                            <td>
                                                <span class="taxes text-sm mb-0">$1.115,45</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-rounded btn-outline-success">
                                                        <span class="btn-inner--text">Paid</span>
                                                    </button>
                                                    <!-- Actions -->
                                                    <div class="actions ml-3">
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="" data-original-title="Archive">
                                                            <i class="fa fa-archive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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