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
    $phone1 = '+91 1125081947';
    $phone2 = '+91 9910584666';
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
    <title></title>
    <link rel="stylesheet" href="{{ public_path('assets/css/quote.css') }}">
</head>

<body>
    {{-- *****
    *****
    *****
    *****
    PAGE 1
    *****
    *****
    *****
    ***** --}}
    <div class="page">
        <header>
            <br>
            <br>
            <table class="table">
                <tr>
                    <td class="logo-box">
                        <table>
                            <tr>
                                <td>
                                    <img src="{{ $logo }}" alt="Logo">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td class="color"><strong>{{ strtoupper($company) }}</strong></td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi-110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: {{ $phone1 }}, {{ $phone2 }}</td>
                            </tr>
                            <tr>
                                <td>E-mail: {{ $email }}, URL: {{ $website }}</td>
                            </tr>
                            <tr>
                                <td>GSTIN: {{ $gstn }}/PAN: {{ $pan }}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="msme-box">
                        <table>
                            <tr>
                                <td><img src="{{ $msme }}" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="bg text-center">QUOTATION NO:</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2px">
                                    <strong class="bg text-center">{{ date('Ym') . '-' . $quote->id }}</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td class="bg text-right table"><strong>QUOTATION</strong></td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td><strong class="f-lg">REF: {{ $quote->reference }}</strong></td>
                    <td class="text-right"><strong class="f-lg">DATE: {{ date('d/m/Y') }}</strong></td>
                </tr>
            </table>
        </header>

        <table class="table tbl">
            <tr>
                <td style="width: 60%"><strong
                        class="f-lg">{{ Str::upper($quote->contact->customer->name) }}</strong></td>
                <td><strong class="f-lg">Enquiry REF: EMAIL DATED: {{ date('d/m/Y', strtotime($quote->enquiry_date)); }}</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address1 }}</td>
                <td><strong class="f-lg">Enquiry Date: {{ date('d/m/Y', strtotime($quote->enquiry_date)); }}</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address2 }}</td>
                <td><strong class="f-lg">DUE DATE: {{ date('d/m/Y', strtotime($quote->due_date)); }}</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->city }}-{{ $quote->contact->address->pincode }},
                    {{ $quote->contact->address->state }}, {{ $quote->contact->address->country }}</td>
            </tr>
            <tr>
                <td>Phone: {{ $quote->contact->phone }}, Mobile: {{ $quote->contact->mobile }}
                <td>
            </tr>
            <tr>
                <td>Email: <a href="mailto:{{ $quote->contact->email }}">{{ $quote->contact->email }}</a></td>
            </tr>
        </table>

        <br>

        <table class="table tbl">
            <tr>
                <td><strong><i style="text-decoration: underline; text-decoration-color: black">KIND ATTN:
                            {{ Str::upper($quote->contact->name) }},
                            {{ Str::upper($quote->contact->department) }}</i></strong></td>
            </tr>
        </table>

        <br>

        <table class="table tbl">
            <tr>
                <td><strong class="f-lg">Dear Sir/Madam</strong></td>
            </tr>
            <tr>
                <td>
                    Thanks for your enquiry with Reference No: {{ $quote->reference }}
                    <br>
                    We are pleased to submit our best Offer on behalf our Principal  <strong class="f-lg">{{ strtoupper($quote->quoteItems->first()?->product->supplier->name) }}, {{strtoupper($quote->quoteItems->first()?->product->supplier->country)}}</strong>  with Terms and
                    Conditions as follows:
                </td>
            </tr>
        </table>

        <br>

        <table class="table tbl">
            <tr>
                <td><strong>ANNEXURE - I: COMMERCIAL OFFER:</strong></td>
            </tr>
        </table>

        <table class="table cart-tbl">
            <tr class="bg">
                <td><strong class="f-lg">Sno</strong></td>
                <td><strong class="f-lg">Part Number</strong></td>
                <td><strong class="f-lg">Line Item Description</strong></td>
                <td><strong class="f-lg">Qty</strong></td>
                <td><strong class="f-lg">Unit Price</strong></td>
                <td><strong class="f-lg">Taxble Amount</strong></td>
                <td><strong class="f-lg">Tax Amount</strong></td>
                <td><strong class="f-lg">Total Amount</strong></td>
            </tr>

            @foreach ($quote->quoteItems as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item->product->part_number }}</td>
                    <td class="text-left">{{ $item->product->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->sale_price, 2) }}</td>
                    <td>{{ number_format($item->total(), 2) }}</td>
                    <td>{{ number_format($item->tax(), 2) }}</td>
                    <td>{{ number_format($item->total() + $item->tax(), 2) }}</td>
                </tr>
            @endforeach
            <tr style="background-color: #f5f5f5">
                <td></td>
                <td><strong class="f-xlg">TOTALS:</strong></td>
                <td class="text-right"><strong class="f-xlg">SUM OF QUOTED ITEMS : </strong></td>
                <td><strong class="f-xlg">{{ $quote->quoteItems->sum('quantity') }}</strong></td>
                <td></td>
                <td><strong class="f-xlg">{{ number_format($quote->total(), 2) }}</strong></td>
                <td><strong class="f-xlg">{{ number_format($quote->tax(), 2) }}</strong></td>
                <td><strong class="f-xlg">{{ number_format($quote->total() + $quote->tax(), 2) }}</strong></td>
            </tr>
        </table>

        <footer>
            <table class="table">
                <tr>
                    <td>Should have any enquiries concerning this Quote, please contact Mr. Vinod Sharma:
                        {{ $phone2 }}</td>
                    <td class="text-center bg">Thanks for giving us opportunity to quote.</td>
                </tr>
            </table>

            <table class="table footer">
                <tr>
                    <td>
                        <strong>{{ $company }}</strong>
                        <br>
                        WZ-1258, Third Floor, Nand Gyan Bhawan
                        <br>
                        Ashram Lane, Palam Village, New Delhi - 110045
                        <br>
                        <a href="{{ $website }}">{{ $website }}</a>
                    </td>
                    <td>
                        Accounts
                        <br>
                        Tel <a href="tel:{{ $phone2 }}">{{ $phone2 }}</a>
                        <br>
                        Fax <a href="tel:{{ $phone1 }}">{{ $phone1 }}</a>
                    </td>
                    <td>
                        GSTIN : {{ $gstn }}
                        <br>
                        PAN: {{ $pan }}
                    </td>
                </tr>
            </table>
        </footer>
    </div>

    <div class="page-break">
    </div>

    {{-- ******
    ******
    ******
    ******
    PAGE 2
    ******
    ******
    ******
    ****** --}}
    <div class="page">
        <header>
            <br>
            <br>
            <table class="table">
                <tr>
                    <td class="logo-box">
                        <table>
                            <tr>
                                <td>
                                    <img src="{{ $logo }}" alt="Logo">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td class="color"><strong>{{ strtoupper($company) }}</strong></td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi-110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: {{ $phone1 }}, {{ $phone2 }}</td>
                            </tr>
                            <tr>
                                <td>E-mail: {{ $email }}, URL: {{ $website }}</td>
                            </tr>
                            <tr>
                                <td>GSTIN: {{ $gstn }}/PAN: {{ $pan }}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="msme-box">
                        <table>
                            <tr>
                                <td><img src="{{ $msme }}" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="bg text-center">QUOTATION NO:</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2px">
                                    <strong class="bg text-center">{{ date('Ym') . '-' . $quote->id }}</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td class="bg text-right table"><strong>QUOTATION</strong></td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td><strong class="f-lg">REF: {{ $quote->reference }}</strong></td>
                    <td class="text-right"><strong class="f-lg">DATE: {{ date('d/m/Y') }}</strong></td>
                </tr>
            </table>
        </header>

        <table class="table tbl">
            <tr>
                <td><strong>ANNEXURE - II: COMMERCIAL TERMS AND CONDITIONS OF SALES:</strong></td>
            </tr>
        </table>
        <table class="table terms">
            <tr>
                <td><strong>Price Basis</strong></td>
                <td><strong>{{ $quote->priceBasicTerm->description }}</strong></td>
            </tr>
            <tr>
                <td><strong>Payment Terms</strong></td>
                <td>{{ $quote->paymentTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>Handling Charges</strong></td>
                <td>{{ $quote->handlingChargesTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>PO to Place</strong></td>
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
                <td><strong>Banker's Details</strong></td>
                <td>
                    {{ strtoupper($bank) }}<br>
                    Account No: {{ $account }},<br>
                    IFSCode: {{ $IFSCode }},<br>
                    MICR Code: {{ $MICRCode }}<br>
                </td>
            </tr>
            <tr>
                <td><strong>Bank Address</strong></td>
                <td>
                    SCO 11, Sector-23 A, Palam Vihar, Gurgaon - 122017.
                </td>
            </tr>
            <tr>
                <td><strong>GSTIN/PAN/TIN</strong></td>
                <td>{{ $gstn }}/{{ $pan }}/{{ $tin }}</td>
            </tr>
            <tr>
                <td><strong>MSME ID</strong></td>
                <td>DL10D0008905</td>
            </tr>
            <tr>
                <td><strong>GST/IGST</strong></td>
                <td>{{ $quote->gstTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>Delivery</strong></td>
                <td>{{ $quote->deliveryTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>PNF Charges</strong></td>
                <td>{{ $quote->pnfChargesTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>Freight Charges</strong></td>
                <td>{{ $quote->freightChargesTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>Warranty</strong></td>
                <td>{{ $quote->warrantyTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>Validity of Quote</strong></td>
                <td>{{ $quote->validityQuoteTerm->description }}</td>
            </tr>
            <tr>
                <td><strong>PO Conditions</strong></td>
                <td>NC/NR (Non-Cancellable / Non-Returnable)</td>
            </tr>
            <tr>
                <td><strong>Special Conditions</strong></td>
                <td>End Use Statement Required with Order.</td>
            </tr>
        </table>

        <table class="table end">
            <tbody>
                <tr>
                    <td>
                        We Hope our offer is inline with your requirement to favor us your valuable Purchase Order.
                    </td>
                </tr>
                <tr>
                    <td>
                        We assured you best of our servicers all the time.
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td>
                        <strong>BEST REGARDS,
                            <br>
                            For {{ strtoupper($company) }}
                            <br>
                            <img style="height: 50px;" src="{{ $stamp }}" alt="">
                            <br>
                            Vinod Sharma
                            <br>
                            Regional Manager - INDIA
                            <br>
                            Cell: <a href="tel:{{ $phone2 }}">{{ $phone2 }}</a>
                            <br>
                            E-Mail: <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <footer>
            <table class="table">
                <tr>
                    <td>Should have any enquiries concerning this Quote, please contact Mr. Vinod Sharma:
                        {{ $phone2 }}</td>
                    <td class="text-center bg">Thanks for giving us opportunity to quote.</td>
                </tr>
            </table>

            <table class="table footer">
                <tr>
                    <td>
                        <strong>{{ $company }}</strong>
                        <br>
                        WZ-1258, Third Floor, Nand Gyan Bhawan
                        <br>
                        Ashram Lane, Palam Village, New Delhi - 110045
                        <br>
                        <a href="{{ $website }}">{{ $website }}</a>
                    </td>
                    <td>
                        Accounts
                        <br>
                        Tel <a href="tel:{{ $phone2 }}">{{ $phone2 }}</a>
                        <br>
                        Fax <a href="tel:{{ $phone1 }}">{{ $phone1 }}</a>
                    </td>
                    <td>
                        GSTIN : {{ $gstn }}
                        <br>
                        PAN: {{ $pan }}
                    </td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>
