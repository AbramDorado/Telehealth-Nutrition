<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>#{{$event->code_number }} - {{$event->patient->last_name }}, {{$event->patient->first_name }}</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.i td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.i.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									Hospital Name
								</td>

								<td>
									<h2>Code Event <b>#{{$event->code_number }} </b> </h2>
								</td>
							</tr>
						</table>
					</td>
				</tr>
                
                <b>CARDIOPULMONARY RESUSCITATION RECORD</b>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    Patient: {{$event->patient->last_name }}, {{$event->patient->first_name }} {{$event->patient->middle_name}}<br />
								    Age: {{$event->patient->age }} Y/O&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sex: {{$event->patient->sex }}<br />
									Height: {{$event->patient->height }} cm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Weight: {{$event->patient->weight }} kg<br />
								</td>

								<td>
									Time started: {{$event->code_start_dt }} <br />
                                    Time ended: {{$outcome->code_end_dt }}<br />
                                    Location: {{$event->patient->location}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td></td>

					<td></td>
				</tr>

				<tr class="details">
					<td></td>
					<td></td>
				</tr>

				<tr class="heading">
					<td></td>
					<td></td>
				</tr>

				<tr class="i">
					<td></td>

					<td></td>
				</tr>

				<tr class="i">
					<td></td>

					<td></td>
				</tr>

				<tr class="i last">
					<td></td>

					<td></td>
				</tr>

				<tr class="total">
					<td></td>

					<td></td>
				</tr>
			</table>
		</div>
	</body>
</html>