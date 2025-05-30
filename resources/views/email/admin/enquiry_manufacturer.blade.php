<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Enquiry</title>
    <style>
        /* Basic Reset */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f4f4f4; font-family: Arial, sans-serif; }

        /* Main Styles */
        .wrapper {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 0;
            border-collapse: collapse !important;
        }
        .content {
            padding: 30px 20px;
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }
        .header {
            background-color: #007bff; /* Attractive Header Color - Change as needed */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .details-table td {
            padding: 8px 0; /* Less vertical padding */
            vertical-align: top;
        }
        .details-table td.label {
            font-weight: bold;
            color: #555555;
            width: 120px; /* Fixed width for labels */
            padding-right: 10px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dddddd;
            font-size: 14px;
            margin-top: 10px;
        }
        .product-table th, .product-table td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }
        .product-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333333;
        }
        .product-table td.quantity {
            text-align: center;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #333333;
            margin-top: 20px;
            margin-bottom: 15px;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888888;
            padding: 20px;
            background-color: #f4f4f4;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        .button {
             display: inline-block;
             padding: 12px 25px;
             font-size: 16px;
             font-weight: bold;
             color: #ffffff !important; /* Important to override link color */
             background-color: #28a745; /* Green button - Change as needed */
             border-radius: 5px;
             text-decoration: none;
             text-align: center;
             margin-top: 15px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .wrapper { width: 100% !important; max-width: 100% !important; }
            .content { padding: 20px 15px !important; }
            .header h1 { font-size: 20px !important; }
            .details-table td.label { width: 90px !important; } /* Adjust label width */
            .product-table, .product-table th, .product-table td { font-size: 13px !important; }
            .button { padding: 10px 20px !important; font-size: 15px !important;}
        }
    </style>
</head>
<body>
    <!-- Outer Background Table -->
    <table style="background-color: #f4f4f4; width: 100%; border: 0;">
        <tr>
            <th style="font-weight: normal; text-align: left;">
                <!-- Main Content Wrapper Table -->
                <table style="max-width: 600px; width: 100%; border: 0;" class="wrapper">

                    <!-- Header -->
                    <tr>
                        <th class="header">
                            {{-- <img src="YOUR_LOGO_URL" alt="Your Company Logo" width="150" style="display: block; margin: 0 auto 10px auto;"> --}}
                            <h1>New Enquiry</h1>
                        </th>
                    </tr>

                    <!-- Main Content Area -->
                    <tr>
                        <td class="content">
                            <p>Hello {{$data['user']->name}},</p>
                            <p>You have received a new enquiry. Please find the details below and follow up accordingly.</p>

                            <!-- Enquiry Details Section -->
                            <div class="section-title">Enquiry Details</div>
                            <table border="0" class="product-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th style="text-align: center;">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- === PRODUCT ROW START === -->
                                    @foreach($data['items'] as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>
                                           Width: {{$item->width ?? 'N/A'}} | 
                                           Pik: {{$item->pick ?? 'N/A'}} | 
                                           Warp: {{$item->warp ?? 'N/A'}} | 
                                           Weft: {{$item->weft ?? 'N/A'}} | 
                                           Count: {{$item->count ?? 'N/A'}} | 
                                           Reed: {{$item->reed ?? 'N/A'}}
                                        </td>
                                        <td class="quantity">{{$item->quantity}}</td>
                                    </tr>
                                    @endforeach
                                    <!-- === PRODUCT ROW END === -->
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            This is an automated notification from <a href="{{url('/')}}">{{env('APP_NAME')}}</a>.<br>
                            © {{date('Y')}} {{env('APP_NAME')}}. All rights reserved.
                        </td>
                    </tr>

                </table>
                <!-- End Main Content Wrapper Table -->
            </th>
        </tr>
    </table>
    <!-- End Outer Background Table -->
</body>
</html>
