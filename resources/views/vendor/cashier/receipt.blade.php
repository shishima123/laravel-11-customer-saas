<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Invoice</title>
    <style>
        body {
            font-family: 'futura' !important;
        }

        body {
            background: #fff none;
            font-size: 12px;
        }

        h2 {
            font-size: 28px;
            color: #ccc;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-head td {
            padding: 0 8px;
        }

        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tr.row td {
            border-bottom: 1px solid #ddd;
        }

        .table td {
            padding: 8px;
            line-height: 14px;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>

<div class="container">
    <table style="margin-left: auto; margin-right: auto;" width="550">
        <tr>
            <td width="160">
                &nbsp;
            </td>

            <!-- Account Name / Header Image -->
            <td align="right">
                <strong>{{ $header ?? $vendor ?? $invoice->account_name }}</strong>
            </td>
        </tr>
        <tr valign="top">
            <td style="font-size:9px;">
                <span style="font-size: 28px; color: #ccc;">
                    {{ __('message.invoice.pdf.receipt')}}
                </span><br><br>

                <!-- Account Details -->
                {{ $vendor ?? $invoice->account_name }}<br>

                @isset($street)
                    {{ $street }}<br>
                @endisset

                @isset($location)
                    {{ $location }}<br>
                @endisset

                @isset($phone)
                    {{ $phone }}<br>
                @endisset

                @isset($email)
                    {{ $email }}<br>
                @endisset

                @isset($url)
                    <a href="{{ $url }}">{{ $url }}</a><br>
                @endisset

                @isset($vendorVat)
                    {{ $vendorVat }}<br>
                @else
                    @foreach ($invoice->accountTaxIds() as $taxId)
                        {{ $taxId->value }}<br>
                    @endforeach
                @endisset

                <br><br>

                <!-- Customer Details -->
                <strong>{{ __('message.invoice.pdf.bill_to')}}: </strong><br>

                {{ $invoice->customer_name ?? $invoice->customer_email }}<br>

                @if ($address = $invoice->customer_address)
                    @if ($address->line1)
                        {{ $address->line1 }}<br>
                    @endif

                    @if ($address->line2)
                        {{ $address->line2 }}<br>
                    @endif

                    @if ($address->city)
                        {{ $address->city }}<br>
                    @endif

                    @if ($address->state || $address->postal_code)
                        {{ implode(' ', [$address->state, $address->postal_code]) }}<br>
                    @endif

                    @if ($address->country)
                        {{ $address->country }}<br>
                    @endif
                @endif

                @if ($invoice->customer_phone)
                    {{ $invoice->customer_phone }}<br>
                @endif

                @if ($invoice->customer_name)
                    {{ $invoice->customer_email }}<br>
                @endif

                @foreach ($invoice->customerTaxIds() as $taxId)
                    {{ $taxId->value }}<br>
                @endforeach
            </td>
            <td>
                <!-- Invoice Info -->
                <p>
                    @isset ($product)
                        <strong>{{ __('message.invoice.pdf.product')}}: </strong> {{ $product }}<br>
                    @endisset

                    <strong>{{ __('message.invoice.pdf.date')}}
                        :</strong> {{ $invoice->date()->toFormattedDateString() }}<br>

                    @if ($dueDate = $invoice->dueDate())
                        <strong>{{ __('message.invoice.pdf.due_date')}}
                            :</strong> {{ $dueDate->toFormattedDateString() }}<br>
                    @endif

                    <strong>{{ __('message.invoice.pdf.invoice_number')}}:</strong> {{ $id ?? $invoice->number }}<br>
                </p>

                <!-- Memo / Description -->
                @if ($invoice->description)
                    <p>
                        {{ $invoice->description }}
                    </p>
                @endif

                <!-- Extra / VAT Information -->
                @if (isset($vat))
                    <p>
                        {{ $vat }}
                    </p>
                @endif

                <br><br>

                <!-- Invoice Table -->
                <table width="100%" class="table" border="0">
                    <tr>
                        <th align="left">{{ __('message.invoice.pdf.description')}}</th>
                        <th align="right">{{ __('message.invoice.pdf.date')}}</th>

                        @if ($invoice->hasTax())
                            <th align="right">{{ __('message.invoice.pdf.tax')}}</th>
                        @endif

                        <th align="right">{{ __('message.invoice.pdf.amount')}}</th>
                    </tr>

                    <!-- Display The Invoice Items -->
                    @foreach ($invoice->invoiceItems() as $item)
                        <tr class="row">
                            <td colspan="2">{{ $item->description }}</td>

                            @if ($invoice->hasTax())
                                <td>
                                    @if ($inclusiveTaxPercentage = $item->inclusiveTaxPercentage())
                                        {{ $inclusiveTaxPercentage }}% incl.
                                    @endif

                                    @if ($item->hasBothInclusiveAndExclusiveTax())
                                        +
                                    @endif

                                    @if ($exclusiveTaxPercentage = $item->exclusiveTaxPercentage())
                                        {{ $exclusiveTaxPercentage }}%
                                    @endif
                                </td>
                            @endif

                            <td>{{ $item->total() }}</td>
                        </tr>
                    @endforeach

                    <!-- Display The Subscriptions -->
                    @foreach ($invoice->subscriptions() as $subscription)
                        <tr class="row">
                            <td>{{ $subscription->description }}</td>
                            <td>
                                {{ $subscription->startDateAsCarbon()->formatLocalized('%B %e, %Y') }} -
                                {{ $subscription->endDateAsCarbon()->formatLocalized('%B %e, %Y') }}
                            </td>

                            @if ($invoice->hasTax())
                                <td>
                                    @if ($inclusiveTaxPercentage = $subscription->inclusiveTaxPercentage())
                                        {{ $inclusiveTaxPercentage }}% incl.
                                    @endif

                                    @if ($subscription->hasBothInclusiveAndExclusiveTax())
                                        +
                                    @endif

                                    @if ($exclusiveTaxPercentage = $subscription->exclusiveTaxPercentage())
                                        {{ $exclusiveTaxPercentage }}%
                                    @endif
                                </td>
                            @endif

                            <td>{{ $subscription->total() }}</td>
                        </tr>
                    @endforeach

                    <!-- Display The Subtotal -->
                    @if ($invoice->hasDiscount() || $invoice->hasTax() || $invoice->hasStartingBalance())
                        <tr>
                            <td colspan="{{ $invoice->hasTax() ? 3 : 2 }}"
                                style="text-align: right;">{{ __('message.invoice.pdf.subtotal')}}</td>
                            <td>{{ $invoice->subtotal() }}</td>
                        </tr>
                    @endif

                    <!-- Display The Discount -->
                    @if ($invoice->hasDiscount())
                        @foreach ($invoice->discounts() as $discount)
                            @php($coupon = $discount->coupon())

                            <tr>
                                <td colspan="{{ $invoice->hasTax() ? 3 : 2 }}" style="text-align: right;">
                                    @if ($coupon->isPercentage())
                                        {{ $coupon->name() }} ({{ $coupon->percentOff() }}% Off)
                                    @else
                                        {{ $coupon->name() }} ({{ $coupon->amountOff() }} Off)
                                    @endif
                                </td>

                                <td>-{{ $invoice->discountFor($discount) }}</td>
                            </tr>
                        @endforeach
                    @endif

                    <!-- Display The Taxes -->
                    @unless ($invoice->isNotTaxExempt())
                        <tr>
                            <td colspan="{{ $invoice->hasTax() ? 3 : 2 }}" style="text-align: right;">
                                @if ($invoice->isTaxExempt())
                                    {{ __('message.invoice.pdf.exempted_tax')}}
                                @else
                                    Tax to be paid on reverse charge basis
                                @endif
                            </td>
                            <td></td>
                        </tr>
                    @else
                        @foreach ($invoice->taxes() as $tax)
                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    {{ $tax->display_name }} {{ $tax->jurisdiction ? ' - '.$tax->jurisdiction : '' }}
                                    ({{ $tax->percentage }}%{{ $tax->isInclusive() ? ' incl.' : '' }})
                                </td>
                                <td>{{ $tax->amount() }}</td>
                            </tr>
                        @endforeach
                    @endunless

                    <!-- Starting Balance -->
                    @if ($invoice->hasStartingBalance())
                        <tr>
                            <td colspan="{{ $invoice->hasTax() ? 3 : 2 }}" style="text-align: right;">
                                {{ __('message.invoice.pdf.customer_balance')}}
                            </td>
                            <td>{{ $invoice->startingBalance() }}</td>
                        </tr>
                    @endif

                    <!-- Display The Final Total -->
                    <tr>
                        <td colspan="{{ $invoice->hasTax() ? 3 : 2 }}" style="text-align: right;">
                            <strong>{{ __('message.invoice.pdf.total')}}</strong>
                        </td>
                        <td>
                            <strong>{{ $invoice->total() }}</strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
