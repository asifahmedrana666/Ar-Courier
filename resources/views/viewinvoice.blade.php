
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">AgniCourier.Com</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{ $viewinvoice->id }}</span> <br>
                    <span>Date: {{ $viewinvoice->created_at->format('d-m-Y') }}</span> <br>
                    <span>Zip code : 560077</span> <br>
                    <span>Office Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">Customar Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tracking ID:</td>
                <td>{{ $viewinvoice->id }}</td>

                <td>Full Name:</td>
                <td>{{ $viewinvoice->Recipient_Name }}</td>
            </tr>
            <tr>
                <td>Marcent Name:</td>
                <td>{{ $viewinvoice->marcent_name }}</td>

                <td>Phone:</td>
                <td>{{ $viewinvoice->Recipient_Phone }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $viewinvoice->created_at->format('d-m-Y') }}</td>

                <td>Address:</td>
                <td>{{ $viewinvoice->Recipient_Address }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>Cash on Delivery</td>

                <td>Ammount To Collect:</td>
                <td>{{ $viewinvoice->Ammount_Collect }} Taka</td>
            </tr>
            <tr>
                <td> </td>
                <td> </td>

                <td> </td>
                <td> </td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
         
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">৳{{ $viewinvoice->Ammount_Collect }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for Chose AgniCourier.Com
    </p>

</body>
</html>
