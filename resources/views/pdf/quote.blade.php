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
    $company = 'NEUVIN ELECTRONICS PRIVATE LIMITED';
    $phone1 = '+91 1125081947';
    $phone2 = '+91 9910584666';
    $email = ' info@neuvin.com';
    $website = ' www.neuvin.com';
    $gstn = '07AADCN9370Q1ZO';
    $pan = 'AADCN9370Q';
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
                                <td class="color"><strong>{{ $company }}</strong></td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi-110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: <a href="tel:{{ $phone1 }}">{{ $phone1 }}</a>, <a
                                        href="tel:{{ $phone2 }}">{{ $phone2 }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail: <a href="mailto:{{ $email }}">{{ $email }}</a>, URL: <a
                                        href="{{ $website }}">{{ $website }}</a></td>
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
                                <td class="bg text-center"><strong class="f-lg">QUOTATION NO:</strong></td>
                            </tr>
                            <tr>
                                <td class="bg text-center"><strong class="f-lg">{{ date('Ym').'-'.$quote->id }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td class="bg text-right table"><strong class="f-lg">QUOTATION</strong></td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td><strong class="f-lg">REF: {{ $quote->reference }}</strong></td>
                    <td class="text-right"><strong class="f-lg">DATE: {{ date('m-d-Y h:i:s A') }}</strong></td>
                </tr>
            </table>
        </header>

        <table class="table tbl">
            <tr>
                <td style="width: 60%"><strong>{{ Str::upper($quote->contact->address->customer->name) }}</strong></td>
                <td><strong>Enquiry REF: EMAIL DATED: 29/07/2024</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address1 }}</td>
                <td><strong>Enquiry Date: 29/07/2024</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address2 }}</td>
                <td><strong>DUE DATE: 30/07/2024</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->city }}-{{ $quote->contact->address->pincode }},
                    {{ $quote->contact->address->state }}, {{ $quote->contact->address->country->name }}</td>
            </tr>
            <tr>
                <td>Phone: <a href="tel:{{ $quote->contact->phone }}">{{ $quote->contact->phone }}</a>, Mobile: <a
                        href="tel:{{ $quote->contact->mobile }}">{{ $quote->contact->mobile }}</a>
                <td>
            </tr>
            <tr>
                <td>Email: <a href="mailto:{{ $quote->contact->email }}">{{ $quote->contact->email }}</a></td>
            </tr>
        </table>

        <br>

        <table class="table tbl">
            <tr>
                <td><strong>Dear {{ Str::upper($quote->contact->name) }},</strong></td>
            </tr>
            <tr>
                <td>
                    We thank you for your valued enquiry referred to above and have pleasure in submitting our Pro
                    Forma Invoice, offered strictly under our
                    Terms of Business, as printed in our current catalogue or website.
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
            <tr>
                <td><strong>SNO</strong></td>
                <td><strong>Part Number</strong></td>
                <td><strong>Line Item Description</strong></td>
                <td><strong>Qty</strong></td>
                <td><strong>Unit Price</strong></td>
                <td><strong>Taxble Amount</strong></td>
                <td><strong>Tax Amount</strong></td>
                <td><strong>Total Amount</strong></td>
            </tr>

            @foreach ($quote->items as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item->product->part_number }}</td>
                    <td class="text-left">{{ $item->product->description }}</td>
                    <td>{{ number_format($item->quantity, 2) }}</td>
                    <td>{{ number_format($item->product->sale_price, 2) }}</td>
                    <td>{{ number_format($item->total(), 2) }}</td>
                    <td>{{ number_format($item->tax(), 2) }}</td>
                    <td>{{ number_format($item->total() + $item->tax(), 2) }}</td>
                </tr>
            @endforeach

            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="oneline"><strong>Total (INR) : </strong></td>
                <td class="oneline">{{ number_format($quote->total(), 2) }}</td>
            </tr>
            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="oneline"><strong>GST (18%) : </strong></td>
                <td class="oneline">{{ number_format($quote->totalWithTax(), 2) }}</td>
            </tr>
            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="oneline"><strong>Grand Total (INR) : </strong></td>
                <td class="oneline"><strong>{{ number_format($quote->grandTotal(), 2) }}</strong></td>
            </tr>
        </table>

        <footer>
            <table class="table">
                <tr>
                    <td>Should have any enquiries concerning this Quote, please contact Mr. Vinod Sharma: <a
                            href="tel:{{ $phone2 }}">{{ $phone2 }}</a></td>
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
                        Ashram Lane, Palam Village, New Delhi – 110045
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
                                <td class="color"><strong>{{ $company }}</strong></td>
                            </tr>
                            <tr>
                                <td>WZ-1258, Third Floor, Nand Gyan Bhawan</td>
                            </tr>
                            <tr>
                                <td>Ashram Lane, Palam Village, New Delhi-110045</td>
                            </tr>
                            <tr>
                                <td>Phone/Fax: <a href="tel:{{ $phone1 }}">{{ $phone1 }}</a>, <a
                                        href="tel:{{ $phone2 }}">{{ $phone2 }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail: <a href="mailto:{{ $email }}">{{ $email }}</a>, URL: <a
                                        href="{{ $website }}">{{ $website }}</a></td>
                            </tr>
                            <tr>
                                <td>GSTIN: 07AADCN9370Q1ZO/PAN: AADCN9370Q</td>
                            </tr>
                        </table>
                    </td>
                    <td class="msme-box">
                        <table>
                            <tr>
                                <td><img src="{{ $msme }}" alt=""></td>
                            </tr>
                            <tr>
                                <td class="bg text-center"><strong class="f-lg">QUOTATION NO:</strong></td>
                            </tr>
                            <tr>
                                <td class="bg text-center"><strong class="f-lg">202407-832</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td class="bg text-right table"><strong class="f-lg">QUOTATION</strong></td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <td><strong class="f-lg">REF: {{ $quote->reference }}</strong></td>
                    <td class="text-right"><strong class="f-lg">DATE: {{ date('m-d-Y h:i:s A') }}</strong></td>
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
                <td><strong>Price Basis : </strong></td>
                <td><strong>{{ $quote->priceBasis->description }}</strong></td>
            </tr>
            <tr>
                <td><strong>Payment Terms : </strong></td>
                <td>100% Payment in advance with Purchase Order.</td>
            </tr>
            <tr>
                <td><strong>Handling Charges : </strong></td>
                <td>INR 1500 per shipment.</td>
            </tr>
            <tr>
                <td><strong>PO to Place : </strong></td>
                <td>The Purchase Order and Payment should be in favour:
                    <br>
                    <strong>Neuvin Electronics Private Limited</strong>
                    <br>
                    WZ-1258, Third Floor, Nand Gyan Bhawan
                    <br>
                    Ashram Lane, Palam Village, New Delhi – 110045
                    <br>
                    Phone/Fax: <a href="tel:{{ $phone1 }}">{{ $phone1 }}</a>, <a href="tel: {{ $phone2 }}">{{ $phone2 }}</a>
                    <br>
                    E-Mail: <a href="mailto:{{ $email }}">{{ $email }}</a>, URL: <a
                        href="{{ $website }}">{{ $website }}</a>
                </td>
            </tr>
            <tr>
                <td><strong>Banker's Details : </strong></td>
                <td><strong>Bank of Maharastra</strong>
                    <br>
                    F - Block Palam Vihar, Gurgaon - 122017
                    <br>
                    Account No: 60098352768
                    <br>
                    IFS Code: MAHB0001308
                    <br>
                    MICR Code: 110014034
                </td>
            </tr>
            <tr>
                <td><strong>GSTIN/PAN/TIN : </strong></td>
                <td>07AADCN9370Q1ZO/AADCN9370Q/7070443384</td>
            </tr>
            <tr>
                <td><strong>MSME ID : </strong></td>
                <td>DL10D0008905</td>
            </tr>
            <tr>
                <td><strong>GST/IGST : </strong></td>
                <td>18.00% Extra or as actual at the time of delivery.</td>
            </tr>
            <tr>
                <td><strong>Delivery : </strong></td>
                <td>{{ $quote->delivery->description }}</td>
            </tr>
            <tr>
                <td><strong>P&F Charges : </strong></td>
                <td>Packing & Forwarding @ 2.00% of the total cost of the goods.</td>
            </tr>
            <tr>
                <td><strong>Freight Charges : </strong></td>
                <td>To collect by the customer / @2.00% of the total PO value.</td>
            </tr>
            <tr>
                <td><strong>Warranty : </strong></td>
                <td>As per OEM warranty Policy 12 months without travel/transport cost.</td>
            </tr>
            <tr>
                <td><strong>Validity of Quote : </strong></td>
                <td>The Validity of Quote will be 30 days from PI date.</td>
            </tr>
            <tr>
                <td><strong>PO Conditions : </strong></td>
                <td>NC/NR (Non-Cancellable / Non-Returnable)</td>
            </tr>
        </table>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        We hope our offer meets your requirements and look forward to receive your valued Purchase
                        Order.
                        For any information, feel free to contact us.
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        We assure you of our best services all the time.
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        <strong>Best Regards,
                            <br>
                            Neuvin Electronics Private Limited
                            <br>
                            <img style="height: 50px;" src="{{ $stamp }}" alt="">
                            <br>
                            Vinod Sharma
                            <br>
                            Regional Manager - India
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
                    <td>Should have any enquiries concerning this Quote, please contact Mr. Vinod Sharma: <a
                            href="tel:{{ $phone2 }}">{{ $phone2 }}</a></td>
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
