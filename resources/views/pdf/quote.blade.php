@php
    function formatString($string)
    {
        return preg_replace('/;\s*/', "\r\n", $string);
    }
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
    /* Tinos Font  */
    @font-face {
        font-family: 'Tinos';
        src: url({{ storage_path('fonts\Tinos-Regular.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Tinos';
        src: url({{ storage_path('fonts\Tinos-Italic.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: italic;
    }

    @font-face {
        font-family: 'Tinos';
        src: url({{ storage_path('fonts\Tinos-Bold.ttf') }}) format("truetype");
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'Tinos';
        src: url({{ storage_path('fonts\Tinos-BoldItalic.ttf') }}) format("truetype");
        font-weight: 700;
        font-style: italic;
    }

    body {
        font-family: 'Tinos';
        color: rgb(0, 0, 0);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 12px;
        line-height: 11px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .page {
        background-color: white;
        position: relative;
        page-break-after: always;
        width: 766px;
        height: 1006px;
        padding: 25px;
    }

    .last-page {
        page-break-after: avoid;
    }

    .bold {
        font-weight: bold !important;
    }

    .italic {
        font-style: italic !important;
    }

    .spacing {
        letter-spacing: -0.7px !important;
    }

    .color {
        color: #4472c4 !important;
    }

    .dark-color {
        color: #2d5291 !important;
    }

    .bg {
        background-color: #4472c4 !important;
        color: rgb(255, 255, 255) !important;
    }

    .mt {
        margin-top: 20px;
    }

    .underline {
        text-decoration: underline;
        padding-bottom: 2px;
        /* text-underline-offset: -0.5rem !important; */
    }

    .lg {
        font-size: 11px !important;
    }

    .p {
        padding: 2px;
    }

    .oneline {
        white-space: nowrap;
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

    .inline-block {
        display: inline-block !important;
    }

    header {
        /* border: 1px solid black; */
        margin-bottom: 18px;
    }

    .logo-img {
        height: 75px;
    }

    .logo-box,
    .address-box,
    .msme-box {
        /* border: 1px solid black; */
    }

    .address-box td,
    .header-footer td,
    footer td {
        /* line-height: 11px; */
    }

    .address-box td {
        font-size: 11px;
        line-height: 10px;
    }

    .msme-box td {
        line-height: 11px;
        font-weight: bold !important;
    }

    .header-bottom td {
        line-height: 11px;
        padding: 0px 10px;
    }

    .header-footer td {}

    .msme-img {
        height: 46px;
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



    .border,
    .border td,
    .border th {
        border: 1px solid rgb(172, 166, 166);
    }

    footer {
        font-size: 10px;
        position: absolute;
        left: 22px;
        right: 22px;
        bottom: 22px;
    }

    footer td {
        line-height: 11px;
        font-size: 10px !important;
    }

    .footer-table {
        border-top: 1px solid #2d5291;
    }

    .termsnotices {
        margin-bottom: 22px;
    }

    .termsnotices td {
        line-height: 11px !important;
        padding-top: 6px !important;
    }

    .termsnotices td {
        vertical-align: top;
    }

    .cart {
        margin-top: 2px;
    }

    .cart td {
        font-size: 13px;
        padding: 4px;
    }

    .qty {
        padding: 0 4px;
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
                                <td class="bold dark-color font-bitter">NEUVIN ELECTRONICS PRIVATE LIMITED</td>
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
                                <td class="bg text-center">QUOTATION NO:</td>
                            </tr>
                            <tr>
                                <td class="bg text-center">
                                    {{ date('Ym') . '-' . ($quote->id < 10 ? '00' . $quote->id : ($quote->id < 100 ? '0' . $quote->id : $quote->id)) }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="header-bottom">
                <tr>
                    <td class="bg text-right bold italic">QUOTATION</td>
                </tr>
            </table>

            <table class="header-footer">
                <tr>
                    <td class="bold">REF: {{ $quote->reference }}</td>
                    <td class="text-right bold">DATE: {{ date('d/m/Y', strtotime($quote->date)) }}</td>
                </tr>
            </table>
        </header>

        <table class="customer-detail">
            <tr>
                <td style="width: 55%" class="bold">{{ Str::upper($quote->customer_name) }}</td>
                <td class="bold">Enquiry REF: {{ $quote->enquiry->reference }}</td>
            </tr>
            <tr>
                <td>{{ $quote->address1 }}</td>
                <td class="bold">Enquiry Date: {{ date('d/m/Y', strtotime($quote->enquiry->date)) }}</td>
            </tr>
            <tr>
                <td>{{ $quote->address2 }}</td>
                <td class="bold">DUE DATE: {{ date('d/m/Y', strtotime($quote->enquiry->due_date)) }}</td>
            </tr>
            <tr>
                <td>{{ $quote->city }}-{{ $quote->pincode }},
                    {{ $quote->state->name }}, {{ $quote->country->name }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone: {{ $quote->phone }}, Mobile: {{ $quote->mobile }}</td>
                <td></td>
            </tr>
            <tr>
                <td><a href="">E-mail: {{ $quote->email }}</a></td>
                <td></td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="bold underline italic spacing">KIND ATTN: {{ Str::upper($quote->contact_name) }},
                    {{ Str::upper($quote->department) }}</td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="bold">Dear Sir/Madam</td>
            </tr>
            <tr>
                <td>Thanks for your enquiry with Reference No: <span
                        class="bold italic">{{ $quote->enquiry->reference }}</span></td>
            </tr>
            <tr>
                <td>We are pleased to submit our best Offer on behalf our Principal
                    <span class="bold italic">{{ strtoupper($quote->quoteItems->first()?->name) }},
                        {{ strtoupper($quote->quoteItems->first()?->country->iso3) }}</span> with
                    Terms and Conditions as follows
                </td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="bold underline italic spacing">ANNEXURE - I: COMMERCIAL OFFER:</td>
            </tr>
        </table>

        <table class="border cart">
            <tr>
                <td class="bg bold p text-center">SNO</td>
                <td style="min-width: 110px;" class="bg bold p text-center">Part Number/Make<br>HSN Code/Article#</td>
                <td class="bg bold p text-center">Line Item Description</td>
                <td class="bg bold p text-center qty">QTY<br>NOS.</td>
                <td class="bg bold p text-center oneline">Unit Price<br>INR</td>
                <td class="bg bold p text-center oneline">Taxable Amount<br>INR</td>
                <td class="bg bold p text-center oneline">{{ $quote->tax->type }}/INR<br>Rate/Value
                </td>
                <td class="bg bold p text-center oneline">Total Amount<br>INR</td>
            </tr>
            @foreach ($quote->quoteItems as $item)
                <tr>
                    <td class="bold p text-center">{{ $index++ }}</td>
                    <td class="bold p">{{ $item->part_number }}<br>
                        {{ $item->name }}, {{ $item->country->iso3 }}</td>
                    <td class="bold p" style="white-space: pre-wrap;">@php echo formatString($item->description) @endphp</td>
                    <td class="bold p text-center">{{ $item->quantity < 10 ? '0' . $item->quantity : $item->quantity }}
                    </td>
                    <td class="bold p text-center">{{ number_format($item->sale_price, 2) }}</td>
                    <td class="bold p text-center">{{ number_format($item->totalFixed(), 2) }}</td>
                    <td class="bold p text-center">18.00%/<br>{{ number_format($item->taxAmountFixed(), 2) }}</td>
                    <td class="bold p text-center">
                        {{ number_format($item->totalFixed() + $item->taxAmountFixed(), 2) }}</td>
                </tr>
            @endforeach
            <tr style="background-color: #e2dcdc">
                <td class="bold p"></td>
                <td class="bold p">Totals:</td>
                <td class="bold p">Sum of Quoted Items:</td>
                <td class="bold p text-center">
                    {{ $quote->quoteItems->sum('quantity') < 10 ? '0' . $quote->quoteItems->sum('quantity') : $quote->quoteItems->sum('quantity') }}
                </td>
                <td class="bold p"></td>
                <td class="bold p text-center">{{ number_format($quote->totalFixed(), 2) }}</td>
                <td class="bold p text-center">{{ number_format($quote->taxAmountFixed(), 2) }}</td>
                <td class="bold p text-center">{{ number_format($quote->totalFixed() + $quote->taxAmountFixed(), 2) }}
                </td>
            </tr>
        </table>

        <footer>
            <table>
                <tr>
                    <td class="bold dark-color lg">Should have any enquiries concerning this Quote, please contact Mr.
                        Vinod
                        Sharma: +91 9910584666</td>
                    <div class="text-right">
                        <td class="bg bold text-right inline-block p">Thanks for giving us opportunity to quote.</td>
                    </div>
                </tr>
            </table>
            <table class="footer-table">
                <tr>
                    <td class="bold">CIN:U74900HR2012PTC045440</td>
                    <td class="bold">PAN NUMBER: AADCN9370Q</td>
                    <td class="bold">Registered Office: A-45A First Floor Sai Kunj</td>
                    <td class="bold">Page 1 of 2</td>
                    <td class="bold text-right">{{ $quote->nickname }}-{{ date('Y/md') }}</td>
                </tr>
                <tr>
                    <td class="bold">GSTIN: 07AADCN9370Q1ZO</td>
                    <td class="bold">VAT/CST/TIN: 07070443384</td>
                    <td class="bold">New Palam Vihar Phase-3 Gurgaon - 122017 (HR)</td>
                    <td class="bold">Printed on:</td>
                    <td class="bold text-right">{{ date('Y/m/d H:i:s') }}</td>
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
                                <td class="bold dark-color font-bitter">NEUVIN ELECTRONICS PRIVATE LIMITED</td>
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
                                <td class="bg text-center">QUOTATION NO:</td>
                            </tr>
                            <tr>
                                <td class="bg text-center">
                                    {{ date('Ym') . '-' . ($quote->id < 10 ? '00' . $quote->id : ($quote->id < 100 ? '0' . $quote->id : $quote->id)) }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="header-bottom">
                <tr>
                    <td class="bg text-right bold italic">QUOTATION</td>
                </tr>
            </table>

            <table class="header-footer">
                <tr>
                    <td class="bold">REF: {{ $quote->reference }}</td>
                    <td class="text-right bold">DATE: {{ date('d/m/Y') }}</td>
                </tr>
            </table>
        </header>

        <table>
            <tr>
                <td class="bold underline italic spacing">ANNEXURE - II: COMMERCIAL TERMS AND CONDITIONS OF SALES:</td>
            </tr>
        </table>


        <table class="termsnotices">
            <tr>
                <td class="bold">Price Basis</td>
                <td class="bold">{{ $quote->price_basic_term }}</td>
            </tr>

            <tr>
                <td class="bold">Payment Terms</td>
                <td>{{ $quote->payment_term }}</td>
            </tr>

            <tr>
                <td class="bold">Handling Charges</td>
                <td>{{ $quote->handling_charges_term }}</td>
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
                <td>{{ $quote->gst_term }}</td>
            </tr>

            <tr>
                <td class="bold">Delivery</td>
                <td>{{ $quote->delivery_term }}</td>
            </tr>

            <tr>
                <td class="bold">P&F Charges</td>
                <td>{{ $quote->pnf_charges_term }}</td>
            </tr>

            <tr>
                <td class="bold">Freight Charges</td>
                <td>{{ $quote->freight_charges_term }}</td>
            </tr>

            <tr>
                <td class="bold">Warranty</td>
                <td>{{ $quote->warranty_term }}</td>
            </tr>

            <tr>
                <td class="bold">Validity of Quote</td>
                <td>{{ $quote->validity_quote_term }}</td>
            </tr>

            <tr>
                <td class="bold">PO Conditions</td>
                <td>{{ $quote->po_conditions_term }}</td>
            </tr>

            <tr>
                <td class="bold">Special Conditions</td>
                <td>{{ $quote->special_conditions_term }}</td>
            </tr>
        </table>

        <table class="">
            <tr>
                <td>We Hope our offer is inline with your requirements to favour us your valuable Purchase Order.</td>
            </tr>
            <tr>
                <td>We assured you best of our services all the time.</td>
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
                    <td class="bold dark-color lg">Should have any enquiries concerning this Quote, please contact Mr.
                        Vinod
                        Sharma: +91 9910584666</td>
                    <div class="text-right p">
                        <td class="bg bold text-right inline-block p">Thanks for giving us opportunity to quote.</td>
                    </div>
                </tr>
            </table>
            <table class="footer-table">
                <tr>
                    <td class="bold">CIN:U74900HR2012PTC045440</td>
                    <td class="bold">PAN NUMBER: AADCN9370Q</td>
                    <td class="bold">Registered Office: A-45A First Floor Sai Kunj</td>
                    <td class="bold">Page 2 of 2</td>
                    <td class="bold text-right">{{ $quote->nickname }}-{{ date('Y/md') }}</td>
                </tr>
                <tr>
                    <td class="bold">GSTIN: 07AADCN9370Q1ZO</td>
                    <td class="bold">VAT/CST/TIN: 07070443384</td>
                    <td class="bold">New Palam Vihar Phase-3 Gurgaon - 122017 (HR)</td>
                    <td class="bold">Printed on:</td>
                    <td class="bold text-right">{{ date('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>
