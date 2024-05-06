<?php

use App\Class\Crud;

require_once '../../vendor/autoload.php';

$order_number = $_GET['order_number'];
$crud_obj = new Crud;
$fetch_order = $crud_obj->getData('order_master LEFT JOIN address ON (order_master.address_id = address.address_id) LEFT JOIN product ON (order_master.product_id = product.product_id)', '*', 'order_number = "' . $order_number . '"');
$html = '';
if ($fetch_order > 0) {
    // HTML template for the invoice
    $html .= '
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table td.items {
            border: 0.1mm solid;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }

        .items td.cost {
            text-align: "." center;
        }
    </style>
</head>

<body>
    <htmlpageheader name="myheader">
        <table width="100%">
            <tr>
                <td width="50%">
                    <span style="font-weight: bold; font-size: 14pt;">E Mart</span><br />
                    Junagadh<br />
                    Gujarat - 362001<br />
                    <span style="font-family:dejavusanscondensed;">
                    &#9742;</span> 9033594669<br />
                    <span style="font-family:dejavusanscondensed;">
                    &#9742;</span> 7383063130
                </td>
                <td width="50%" style="text-align: right;">Invoice No.<br />
                    <span style="font-weight: bold; font-size: 12pt;">#' . $fetch_order[0]['order_number'] . '</span>
                </td>
            </tr>
        </table>
    </htmlpageheader>

    <htmlpagefooter name="myfooter">
        <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
            Page {PAGENO} of {nb}
        </div>
    </htmlpagefooter>

    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />

    <div style="text-align: right">Date: ' . $fetch_order[0]['created_on'] . '</div>
    <table width="100%" style="font-family: serif;" cellpadding="10">
        <tr>
            <td width="45%" style="border: 0.1mm solid #888888; ">
                <span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span>
                <br /><br />' . $fetch_order[0]['address_full_name'] . '<br />
                ' . $fetch_order[0]['full_address'] . '<br />
                ' . $fetch_order[0]['city'] . '<br />
                ' . $fetch_order[0]['state'] . ' - ' . $fetch_order[0]['pincode'] . '<br />
                ' . $fetch_order[0]['country'] . '
            </td>
            <td width="10%">&nbsp;</td>
            <td width="45%" style="border: 0.1mm solid #888888;">
                <span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span>
                <br /><br />' . $fetch_order[0]['address_full_name'] . '<br />
                ' . $fetch_order[0]['full_address'] . '<br />
                ' . $fetch_order[0]['city'] . '<br />
                ' . $fetch_order[0]['state'] . ' - ' . $fetch_order[0]['pincode'] . '<br />
                ' . $fetch_order[0]['country'] . '
            </td>
        </tr>
    </table>
    <br />
    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td width="5%">No.</td>
                <td width="58%">Description</td>
                <td width="15%">Unit Price</td>
                <td width="7%">Quantity</td>
                <td width="15%">Amount</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->';
    $i = 1;
    $subtotal = 0;
    foreach ($fetch_order as $order) {
        $subtotal += ($order['qty'] * $order['product_price']);
        $shipping = $subtotal >= 500 ? 0 : 50;
        $html .= '
                        <tr>
                            <td align="center">' . $i++ . '</td>
                            <td>' . $order['product_name'] . '</td>
                            <td class="cost">₹' . $order['product_price'] . '</td>
                            <td align="center">' . $order['qty'] . '</td>
                            <td class="cost">₹' . $subtotal . '</td>
                        </tr>
                        ';
    }

    $html .= '<!-- END ITEMS HERE -->
            <tr>
                <td class="blanktotal" colspan="3" rowspan="6"></td>
                <td class="totals">Subtotal:</td>
                <td class="totals cost">₹' . $subtotal . '</td>
            </tr>
            <tr>
                <td class="totals">Shipping:</td>
                <td class="totals ">₹' . $shipping . '</td>
            </tr>
            <tr>
                <td class="totals"><b>TOTAL:</b></td>
                <td class="totals"><b>₹' . ($subtotal + $shipping) . '</b></td>
            </tr>            
        </tbody>
    </table>
</body>

</html>
';
}
// Generate PDF using mPDF
// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 20,
    'margin_right' => 15,
    'margin_top' => 48,
    'margin_bottom' => 25,
    'margin_header' => 10,
    'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Invoice");
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('order.pdf', 'I');
