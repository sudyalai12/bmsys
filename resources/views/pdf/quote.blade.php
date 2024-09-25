@php
    $files = [
        'logo' => 'neuvin-logo.png',
        'msme' => 'msme.png',
        'stamp' => 'stamp.png',
    ];

    $images = [];

    foreach ($files as $key => $file) {
        $path = public_path() . "/assets/img/$file";
        $type = mime_content_type($path);
        $data = file_get_contents($path);
        $images[$key] = 'data:' . $type . ';base64,' . base64_encode($data);
    }

    $logo = $images['logo'];
    $msme = $images['msme'];
    $stamp = $images['stamp'];

    $index = 1;
    $company = 'Neuvin Electronics Private Limited';
    $phone1 = '+91 1146767788';
    $phone2 = '+91 9910584666';
    $phone3 = '+91 1125081947';
    $email = 'info@neuvin.com';
    $website = 'www.neuvin.com';
    $bank = 'Bank of Maharashtra';
    $account = '60098352768';
    $IFSCode = 'MAHB0001308';
    $MICRCode = '110014034';
    $gstn = '07AADCN9370Q1ZO';
    $pan = 'AADCN9370Q';
    $tin = '7070443384';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @font-face {
        font-family: 'Gowun Batang';
        src: url({{ storage_path('fonts\GowunBatang-Regular.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Gowun Batang Bold';
        src: url({{ storage_path('fonts\GowunBatang-Bold.ttf') }}) format("truetype");
        font-weight: 700;
        font-style: normal;
    }

    body {
        font-family: "Gowun Batang";
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        line-height: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .page {
        position: relative;
        page-break-after: always;
        font-size: 12px;
        width: 772px;
        height: 1012px;
        background-color: white;
        padding: 22px;
    }
    .last-page{
        page-break-after: avoid;
    }

    .bold {
        font-weight: 700 !important;
    }

    .color {
        color: #4472c4 !important;
    }

    .bg {
        background-color: #4472c4 !important;
        color: rgb(255, 255, 255) !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-right {
        text-align: right !important;
    }

    .text-left {
        text-align: left !important;
    }

    header {
        /* border: 1px solid black; */
        margin-bottom: 22px;
    }

    .logo-img {
        height: 75px;
    }

    .logo-box,
    .address-box,
    .msme-box {
        /* border: 1px solid black; */
        font-size: 10px;
    }

    .address-box td,
    .msme-box td,
    .header-footer td,
    footer td {
        line-height: 8px;
    }

    .msme-img {
        height: 47px;
    }

    .address-box {
        width: 100%;
    }

    .msme-box tr td {
        border: 1px solid rgb(255, 255, 255);
    }

    .customer-detail {
        /* border: 1px solid rgb(0, 0, 0); */
    }

    .customer-detail td,
    .customer-detail th,
    .customer-detail a {}

    .mt {
        margin-top: 22px;
    }

    .underline {
        text-decoration: underline;
    }

    .border,
    .border td,
    .border th {
        border: 1px solid black;
    }

    .p {
        padding: 2px;
    }

    footer {
        font-size: 10px;
        position: absolute;
        left: 22px;
        right: 22px;
        bottom: 22px;
    }

    .footer-table {
        border-top: 1px solid #4472c4;
        margin-top: 2px;
    }

    .termsnotices {
        margin-bottom: 4px;
    }

    .termsnotices td {
        line-height: 11px !important;
        padding-top: 4px !important;
    }

    .termsnotices td {
        vertical-align: top;
    }
</style>

<body>

    <div class="page">
        <header>
            <table>
                <tr>
                    <td class="logo-box"><img class="logo-img" src="{{ $logo }}"></td>

                    <td class="address-box" style="padding-left: 2px">
                        <table>
                            <tr>
                                <td class="bold color">NEUVIN ELECTRONICS PRIVATE LIMITED</td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi - 110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: +91 11-25081947, +91 9910584 666</td>
                            </tr>
                            <tr>
                                <td>E-mail: info@neuvin.com, URL: www.neuvin.com</td>
                            </tr>
                            <tr>
                                <td>GSTIN: 07AADCN9370Q1ZO/PAN: AADCN9370Q</td>
                            </tr>
                        </table>
                    </td>

                    <td class="msme-box">
                        <table>
                            <tr>
                                <td><img class="msme-img" src="{{ $msme }}"></td>
                            </tr>
                            <tr>
                                <td class="bg bold text-center">QUOTATION NO:</td>
                            </tr>
                            <tr>
                                <td class="bg bold text-center">202407-832</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="header-footer" style="margin-top: 1px">
                <tr>
                    <td style="padding: 2px 10px" class="bg text-right bold">QUOTATION</td>
                </tr>
            </table>

            <table style="margin-top: 4px">
                <tr>
                    <td class="bold">REF: NEPL/EFOCUS/Q-0729/2024-25</td>
                    <td class="text-right bold">DATE: 29/07/2024</td>
                </tr>
            </table>
        </header>

        <table class="customer-detail">
            <tr>
                <td class="bold">E FOCUS INSTRUMENTS INDIA PRIVATE LIMITED</td>
                <td class="bold">Enquiry REF: EMAIL DATED: 29/07/2024</td>
            </tr>
            <tr>
                <td>No. 66, 2nd Cross Street</td>
                <td class="bold">Enquiry Date: 29/07/2024</td>
            </tr>
            <tr>
                <td>Pallavan Nagar Extn., Maduravoya</td>
                <td class="bold">DUE DATE: 30/07/2024</td>
            </tr>
            <tr>
                <td>Chennai - 600095 Tamil Nadu India</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone: +91 44-47407422, Fax: +91 44-49580005</td>
                <td></td>
            </tr>
            <tr>
                <td>Mobile: +91 7397242650</td>
                <td></td>
            </tr>
            <tr>
                <td><a href="">E-mail: sankarapandi@efocusinstruments.com</a></td>
                <td></td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td style="text-decoration: underline;" class="bold">KIND ATTN: MR. SANKARAPANDI.M, MANAGER -
                    TECHNICAL SALES</td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="bold">Dear Sir/Madam</td>
            </tr>
            <tr>
                <td>Thanks for your enquiry with Reference No: Email Dated: 29/07/2024</td>
            </tr>
            <tr>
                <td>We are pleased to submit our best Offer on behalf our Principal GPS SOURCE INC., USA with Terms and
                    Conditions as follows</td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="bold underline">ANNEXURE - I: COMMERCIAL OFFER:</td>
            </tr>
        </table>

        <table style="margin-top: 2px" class="border">
            <tr>
                <td class="bg bold p text-center">SNO</td>
                <td class="bg bold p text-center">Part Number/Make</td>
                <td class="bg bold p text-center">Line Item Description</td>
                <td class="bg bold p text-center">Qty</td>
                <td class="bg bold p text-center">Unit Price<br>(INR)</td>
                <td class="bg bold p text-center">Taxable Amount<br>(INR)</td>
                <td class="bg bold p text-center">Tax Amount<br>(INR)</td>
                <td class="bg bold p text-center">Total Amount<br>(INR)</td>
            </tr>
            @foreach ($quote->quoteItems as $item)
                <tr>
                    <td class="bold p text-center">{{ $index++ }}</td>
                    <td class="bold p">{{ $item->product->part_number }}<br>
                        {{ $item->product->supplier->name }},{{ $item->product->supplier->country->iso3 }}</td>
                    <td class="bold p">{{ $item->product->description }}</td>
                    <td class="bold p">{{ $item->quantity < 10 ? '0' . $item->quantity : $item->quantity }}</td>
                    <td class="bold p">{{ number_format($item->product->sale_price, 2) }}</td>
                    <td class="bold p">{{ number_format($item->total(), 2) }}</td>
                    <td class="bold p">{{ number_format($item->tax(), 2) }}</td>
                    <td class="bold p">{{ number_format($item->total() + $item->tax(), 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="bold p"></td>
                <td class="bold p">Totals:</td>
                <td class="bold p">Sum of Quoted Items:</td>
                <td class="bold p">
                    {{ $quote->quoteItems->sum('quantity') < 10 ? '0' . $quote->quoteItems->sum('quantity') : $quote->quoteItems->sum('quantity') }}
                </td>
                <td class="bold p"></td>
                <td class="bold p">{{ number_format($quote->total(), 2) }}</td>
                <td class="bold p">{{ number_format($quote->tax(), 2) }}</td>
                <td class="bold p">{{ number_format($quote->total() + $quote->tax(), 2) }}</td>
            </tr>
        </table>

        <footer>
            <table>
                <tr>
                    <td class="bold color">Should have any enquiries concerning this Quote, please contact Mr. Vinod
                        Sharma: +91 9910584666</td>
                    <td class="bg text-center">Thanks for giving us opportunity to quote.</td>
                </tr>
            </table>
            <table class="footer-table">
                <tr>
                    <td>CIN:U74900HR2012PTC045440</td>
                    <td>PAN NUMBER: AADCN9370Q</td>
                    <td>Registered Office: A-45A First Floor Sai Kunj</td>
                    <td>Page 1 of 2</td>
                    <td>EFOCUS-2024/0729</td>
                </tr>
                <tr>
                    <td>GSTIN: 07AADCN9370Q1ZO</td>
                    <td>VAT/CST/TIN: 07070443384</td>
                    <td>New Palam Vihar Phase-3 Gurgaon - 122017 (HR)</td>
                    <td>Printed on:</td>
                    <td>29/07/2024 19:46:41</td>
                </tr>
            </table>
        </footer>
    </div>

    <div class="page last-page">
        <header>
            <table>
                <tr>
                    <td class="logo-box"><img class="logo-img" src="{{ $logo }}"></td>

                    <td class="address-box" style="padding-left: 2px">
                        <table>
                            <tr>
                                <td class="bold color">NEUVIN ELECTRONICS PRIVATE LIMITED</td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi - 110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: +91 11-25081947, +91 9910584 666</td>
                            </tr>
                            <tr>
                                <td>E-mail: info@neuvin.com, URL: www.neuvin.com</td>
                            </tr>
                            <tr>
                                <td>GSTIN: 07AADCN9370Q1ZO/PAN: AADCN9370Q</td>
                            </tr>
                        </table>
                    </td>

                    <td class="msme-box">
                        <table>
                            <tr>
                                <td><img class="msme-img" src="{{ $msme }}"></td>
                            </tr>
                            <tr>
                                <td class="bg bold text-center">QUOTATION NO:</td>
                            </tr>
                            <tr>
                                <td class="bg bold text-center">202407-832</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="header-footer" style="margin-top: 1px">
                <tr>
                    <td style="padding: 2px 10px" class="bg text-right bold">QUOTATION</td>
                </tr>
            </table>

            <table style="margin-top: 4px">
                <tr>
                    <td class="bold">REF: NEPL/EFOCUS/Q-0729/2024-25</td>
                    <td class="text-right bold">DATE: 29/07/2024</td>
                </tr>
            </table>
        </header>

        <table>
            <tr>
                <td class="bold underline">ANNEXURE - II: COMMERCIAL TERMS AND CONDITIONS OF SALES:</td>
            </tr>
        </table>


        <table class="termsnotices">
            <tr>
                <td class="bold">Price Basis</td>
                <td class="bold">{{ $quote->priceBasicTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Payment Terms</td>
                <td>{{ $quote->paymentTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Handling Charges</td>
                <td>{{ $quote->handlingChargesTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">PO to Place</td>
                <td>
                    The Purchase Order and Payment should be in favour:<br>
                    {{ strtoupper($company) }}<br>
                    WZ-1258, Third Floor, Nand Gyan Bhawan<br>
                    Ashram Lane, Palam Village, New Delhi - 110045<br>
                    Phone/Fax: {{ $phone1 }}, {{ $phone2 }}<br>
                    E-mail: {{ $email }}, URL: {{ $website }}<br>
                </td>
            </tr>

            <tr>
                <td class="bold">Banker's Details</td>
                <td>
                    {{ strtoupper($bank) }}<br>
                    Account No: {{ $account }},<br>
                    IFSCode: {{ $IFSCode }},<br>
                    MICR Code: {{ $MICRCode }}<br>
                </td>
            </tr>

            <tr>
                <td class="bold">Bank Address</td>
                <td>
                    SCO 11, Sector-23 A, Palam Vihar, Gurgaon - 122017.
                </td>
            </tr>

            <tr>
                <td class="bold">GSTIN/PAN/TIN</td>
                <td>{{ $gstn }}/{{ $pan }}/{{ $tin }}</td>
            </tr>

            <tr>
                <td class="bold">MSME ID</td>
                <td>DL10D0008905</td>
            </tr>

            <tr>
                <td class="bold">GST/IGST</td>
                <td>{{ $quote->gstTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Delivery</td>
                <td>{{ $quote->deliveryTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">P&F Charges</td>
                <td>{{ $quote->pnfChargesTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Freight Charges</td>
                <td>{{ $quote->freightChargesTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Warranty</td>
                <td>{{ $quote->warrantyTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">Validity of Quote</td>
                <td>{{ $quote->validityQuoteTerm->description }}</td>
            </tr>

            <tr>
                <td class="bold">PO Conditions</td>
                <td>NC/NR (Non-Cancellable / Non-Returnable)</td>
            </tr>

            <tr>
                <td class="bold">Special Conditions</td>
                <td>NA</td>
            </tr>
        </table>

        <table class="">
            <tr>
                <td>We Hope our offer is inline with your requirement to favor us your valuable Purchase Order.</td>
            </tr>
            <tr>
                <td>We assured you best of our servicers all the time.</td>
            </tr>
        </table>

        <br>
        <br>
        <table>
            <tr>
                <td class="bold">BEST REGARDS,</td>
            </tr>
            <tr>
                <td class="bold">For NEUVIN ELECTRONICS PRIVATE LIMITED</td>
            </tr>
            <tr>
                <td><img style="height: 50px;" src="{{ $stamp }}" alt=""></td>
            </tr>
            <tr>
                <td class="bold">Vinod Sharma</td>
            </tr>
            <tr>
                <td class="bold">Regional Manager - INDIA</td>
            </tr>
            <tr>
                <td class="bold">Cell: +91 9910584666</td>
            </tr>
            <tr>
                <td class="bold">E-mail:vinod@neuvin.com</td>
            </tr>
        </table>

        <footer>
            <table>
                <tr>
                    <td class="bold color">Should have any enquiries concerning this Quote, please contact Mr. Vinod
                        Sharma: +91 9910584666</td>
                    <td class="bg text-center">Thanks for giving us opportunity to quote.</td>
                </tr>
            </table>
            <table class="footer-table">
                <tr>
                    <td>CIN:U74900HR2012PTC045440</td>
                    <td>PAN NUMBER: AADCN9370Q</td>
                    <td>Registered Office: A-45A First Floor Sai Kunj</td>
                    <td>Page 2 of 2</td>
                    <td>EFOCUS-2024/0729</td>
                </tr>
                <tr>
                    <td>GSTIN: 07AADCN9370Q1ZO</td>
                    <td>VAT/CST/TIN: 07070443384</td>
                    <td>New Palam Vihar Phase-3 Gurgaon - 122017 (HR)</td>
                    <td>Printed on:</td>
                    <td>29/07/2024 19:46:41</td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>
