@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">

        <div id="invoice">

            <div class="toolbar hidden-print">
                <div class="text-right">
                    {{-- <button id="printInvoice" onclick="printInvoice()"
                        class="btn btn-info"><i class="fa fa-print"></i> Print</button> --}}

                </div>
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a target="_blank" href="https://lobianijs.com">
                                    <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png"
                                        data-holder-rendered="true" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="https://lobianijs.com">
                                        Arboshiki
                                    </a>
                                </h2>
                                <div>455 Foggy Heights, AZ 85004, US</div>
                                <div>(123) 456-789</div>
                                <div>company@example.com</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{ $datas->name }}</h2>
                                <div class="address">{{ $datas->address }}</div>
                                <div class="email"><a href="mailto:john@example.com">{{ $datas->email }}</a></div>
                                <div class="email"><a href="#">{{ $datas->phone }}</a></div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                <div class="date">Date of Invoice: {{ $datas->created_at }}</div>
                                <div class="date">Due Date: 30/10/2018</div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">Product Name</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Shipp.Ch</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($datas->get_order_details as $pro)
                                    {{$pro->get_product->id}}
                                    {{-- <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">{{ $pro->get_product->product_name }}</td>
                                        <td class="unit">{{ $pro->qty }}</td>
                                        <td class="qty">{{ $pro->shipp_charge }}</td>
                                        <td class="total">{{ $pro->get_product->sale_price }}</td>
                                        <td class="total">{{ $pro->total }}</td>
                                    </tr> --}}
                                {{-- @endforeach --}}
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>$00</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td colspan="2">TAX 0%</td>
                                    <td>$00</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>{{ $datas->amount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">Thank you!</div>
                        <div class="notices">
                            <div>NOTICE:</div>
                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.
                            </div>
                        </div>
                    </main>
                    <footer>
                        Invoice was created on a computer and is valid without the signature and seal.
                    </footer>
                </div>
                <div></div>
            </div>
        </div>
    </div>
@endsection
<script>
    function printInvoice() {
        window.print();
    }

</script>
<style>
    #invoice {
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }

</style>
