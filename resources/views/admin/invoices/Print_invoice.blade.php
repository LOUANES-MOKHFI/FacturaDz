@extends('admin.layouts.admin')
@section('title')
{{__('admin/invoices.printInvoice')}}
@endsection
@section('style')
 	<style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>

@endsection
@section('content')

<div class="row small-spacing">
	<div class="col-xs-12">
		<div class="invoice-box" id="print">
			<table>
				<tr class="top">
					<td colspan="5">
						<table>
							<tr>
								<td class="title">
									<a href="#" class="logo">Fatura<span>Dz</span></a>
								</td>
								
								<td>
									Invoice #: {{$invoice->invoice_number}}<br>
									Created: {{$invoice->invoice_date}}<br>
									Due: {{$invoice->due_date}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr class="information">
					<td colspan="5">
						<table>
							<tr>
								<td>
									Next Step Webs, Inc.<br>
									12345 Sunny Road<br>
									Sunnyville, TX 12345
								</td>
								
								<td>
									Acme Corp.<br>
									John Doe<br>
									john@example.com
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr class="heading">
					<td>#</td>
					<td>{{__('admin/invoices.name')}}</td>
					<td>{{__('admin/invoices.Amount_collection')}}</td>
					<td>{{__('admin/invoices.Amount_Commission')}}</td>
					<td>{{__('admin/invoices.total')}}</td>
				</tr>
					
				<tr class="item">
					<td>1</td>
					<td>{{ $invoice->product }}</td>
					<td class="">{{ number_format($invoice->Amount_collection, 2) }}</td>
                    <td class="">{{ number_format($invoice->Amount_Commission, 2) }}</td>
                    @php
                   		 $total = $invoice->Amount_collection + $invoice->Amount_Commission ;
                    @endphp
                    <td class="tx-right">
                        {{ number_format($total, 2) }}
                    </td>
				</tr>
				
				<tr class="total">
					<td></td>

					
					<td>
					   {{__('admin/invoices.total')}}: {{ number_format($total, 2) }}
					</td>
				</tr>
				<tr class="total">
					<td></td>

					
					<td>
					   {{__('admin/invoices.discount')}}: ({{$invoice->Rate_vat}})
					</td>
				</tr>
				<tr class="total">
					<td></td>
					
					<td>
					   {{__('admin/invoices.Rate_vat')}}: {{number_format($invoice->discount, 2)}}
					</td>
				</tr>
				<tr class="total">
					<td></td>
					
					<td>
					   {{__('admin/invoices.total')}}: {{number_format($invoice->total,2)}}
					</td>
				</tr>
			</table>
			<div class="text-right margin-top-20">
				<ul class="list-inline">
					<li><button type="button" onclick="printDiv()" class="btn btn-default waves-effect waves-light"><i class='fa fa-print'></i> Print</button></li>
				</ul>
			</div>
		</div>
		<!-- /.invoice-box -->
	</div>
	<!-- /.col-xs-12 -->
</div>
@endsection

@section('script')
<script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
