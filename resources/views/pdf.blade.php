<!DOCTYPE html>
<html>
	<!-- <head>
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
	</body> -->
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Helvetica;
	panose-1:0 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
@page WordSection1
	{size:612.0pt 792.0pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=EN-PH style='word-wrap:break-word'>

<div class=WordSection1>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
style='font-family:Helvetica'>&nbsp;</span></p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=8 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section I. </span></b><span
   lang=EN-US style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Main
   Information</span></p>
   </td>
  </tr>
 </thead>
 <tr style='height:18.9pt'>
  <td width=478 colspan=6 style='width:358.65pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-family:Helvetica'>Patient Information</span></b></p>
  </td>
  <td width=160 colspan=2 style='width:120.1pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>PIN #: {{$event->patient->patient_pin ?? '---'}}
</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:119.75pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:11.0pt;font-family:Helvetica'>Visit/Encounter
  #</span></p>
  </td>
  <td width=159 colspan=3 style='width:119.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->visit_number ?? '---'}}</span></p>
  </td>
  <td width=159 colspan=2 style='width:119.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Sex</span></p>
  </td>
  <td width=160 colspan=2 style='width:120.1pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->sex ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:1.0cm'>
  <td width=319 colspan=4 style='width:239.1pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Name</span></p>
  <p class=MsoNormal style='line-height:115%'><i><span lang=EN-US
  style='font-size:9.0pt;line-height:115%;font-family:Helvetica'>Last Name
  (Suffix), First Name Middle Name</span></i></p>
  </td>
  <td width=320 colspan=4 style='width:239.65pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->last_name ?? '---'}} {{$event->patient->suffix ?? ''}}, {{$event->patient->first_name ?? '---'}} {{$event->patient->middle_name ?? ''}}</span></p>
  </td>
 </tr>
 <tr style='height:16.95pt'>
  <td width=189 colspan=2 style='width:141.5pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.95pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:11.0pt;font-family:Helvetica'>Date
  of Birth  </span><i><span lang=EN-US style='font-size:9.0pt;font-family:Helvetica'>YYYY-MM-DD</span></i></p>
  </td>
  <td width=246 colspan=3 style='width:184.3pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:16.95pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:11.0pt;font-family:Helvetica'>{{$event->patient->birthday ?? '---'}}</span></p>
  </td>
  <td width=44 style='width:32.85pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:16.95pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:11.0pt;font-family:Helvetica'>Age</span></p>
  </td>
  <td width=160 colspan=2 style='width:120.1pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:16.95pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->age ?? '---'}} years old</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:119.75pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:11.0pt;font-family:Helvetica'>Height</span></p>
  </td>
  <td width=159 colspan=3 style='width:119.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->height ?? '---'}} cm</span></p>
  </td>
  <td width=159 colspan=2 style='width:119.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Weight</span></p>
  </td>
  <td width=160 colspan=2 style='width:120.1pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->weight ?? '---'}} kg</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:119.75pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Allergies</span></p>
  </td>
  <td width=479 colspan=7 style='width:359.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->allergies ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=160 style='width:119.75pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Location</span></p>
  </td>
  <td width=479 colspan=7 style='width:359.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->patient->location ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=480 colspan=7 style='width:360.0pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-family:Helvetica'>Code Blue Activation</span></b></p>
  </td>
  <td width=158 style='width:118.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Code #: {{$event->code_number ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time of
  Activation of Code</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->code_start_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time of
  Arrest</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->arrest_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Reason for
  Code Blue Activation</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->reason_for_activation ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Initially
  reported by</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->initial_reporter ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time of
  Code Team arrival</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->code_team_arrival_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time of
  e-Cart arrival</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->e_cart_arrival_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=274 colspan=3 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Witnessed</span></p>
  </td>
  <td width=365 colspan=5 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$event->witnessed ?? '---'}}</span></p>
  </td>
 </tr>

</table>

</div>

<p class=MsoNormal>&nbsp;</p>


<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=7 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section II. </span></b><span
   lang=EN-US style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Resuscitation
   Proper</span></p>
   <p class=MsoNormal style='line-height:115%'><span lang=EN-US
   style='font-size:14.0pt;line-height:115%;font-family:Helvetica'>Initial
   Resuscitation</span></p>
   </td>
  </tr>
 </thead>
 <tr style='height:18.9pt'>
  <td width=638 colspan=7 style='width:478.75pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-family:Helvetica'>Airway / Ventilation</span></b></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=245 colspan=4 style='width:184.05pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Breathing
  upon code activation</span></p>
  </td>
  <td width=393 colspan=3 style='width:294.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->breathing_upon_ca ?? '---' }}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=245 colspan=4 style='width:184.05pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>First
  assisted ventilation date/time</span></p>
  </td>
  <td width=393 colspan=3 style='width:294.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->first_ventilation_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=245 colspan=4 style='width:184.05pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Ventilation
  via</span></p>
  </td>
  <td width=393 colspan=3 style='width:294.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->ventilation ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=245 colspan=4 style='width:184.05pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Intubated
  Date/Time</span></p>
  </td>
  <td width=393 colspan=3 style='width:294.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->intubation_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:5.6pt'>
  <td width=156 colspan=2 style='width:116.9pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>ET Tube size</span></p>
  </td>
  <td width=90 colspan=2 style='width:67.15pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->et_tube_size ?? '---'}}</span></p>
  </td>
  <td width=217 colspan=2 style='width:163.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Number of
  intubation attempts</span></p>
  </td>
  <td width=176 style='width:131.7pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->intubation_attempts ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:5.6pt'>
  <td width=245 colspan=4 style='width:184.05pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Confirmation
  of ET tube placement</span></p>
  </td>
  <td width=393 colspan=3 style='width:294.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:5.6pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->et_tube_information ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:10.05pt'>
  <td width=638 colspan=7 style='width:478.75pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:10.05pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-family:Helvetica'>Circulation</span></b></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=267 colspan=5 style='width:200.1pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>First
  documented rhythm</span></p>
  </td>
  <td width=372 colspan=2 style='width:278.65pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->first_documented_rhythm_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=267 colspan=5 style='width:200.1pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>First
  pulseless rhythm date/time</span></p>
  </td>
  <td width=372 colspan=2 style='width:278.65pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->first_pulseless_rhythm_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=267 colspan=5 style='width:200.1pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Compressions
  started date/time</span></p>
  </td>
  <td width=372 colspan=2 style='width:278.65pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->compressions_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=113 style='width:84.8pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>AED applied</span></p>
  </td>
  <td width=71 colspan=2 style='width:53.6pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->aed_applied ?? '---'}}</span></p>
  </td>
  <td width=454 colspan=4 style='width:340.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/time: {{$initialResuscitation->aed_applied_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=113 style='width:84.8pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Pacemaker on</span></p>
  </td>
  <td width=71 colspan=2 style='width:53.6pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$initialResuscitation->pacemaker_on ?? '---'}}</span></p>
  </td>
  <td width=454 colspan=4 style='width:340.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/time: {{$initialResuscitation->pacemaker_on_dt ?? '---'}}</span></p>
  </td>
 </tr>

</div>

<p class=MsoNormal>&nbsp;</p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=10 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section II. </span></b><span
   lang=EN-US style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Resuscitation
   Proper</span></p>
   <p class=MsoNormal style='line-height:115%'><span lang=EN-US
   style='font-size:14.0pt;line-height:115%;font-family:Helvetica'>Resuscitation
   Flowsheet</span></p>
   </td>
  </tr>
 </thead>
 @foreach($flowsheet as $flst)
 <tr style='height:15.25pt'>
  <td width=110 style='width:82.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Flowsheet #</span></b><</p>
  </td>
  <td width=55 colspan=2 style='width:41.6pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->flowsheet_id ?? '---'}}</span></p>
  </td>
  <td width=85 colspan=2 style='width:63.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Log time</span></p>
  </td>
  <td width=388 colspan=5 style='width:291.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->log_time ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=165 colspan=3 style='width:123.85pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Breathing</span></p>
  </td>
  <td width=158 colspan=4 style='width:118.2pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->breathing ?? '---'}}</span></p>
  </td>
  <td width=158 colspan=2 style='width:118.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Pulse</span></p>
  </td>
  <td width=157 style='width:118.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->pulse ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=165 colspan=3 style='width:123.85pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Blood
  pressure, systolic</span></p>
  </td>
  <td width=158 colspan=4 style='width:118.2pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->bp_systolic ?? '---'}} mmHg</span></p>
  </td>
  <td width=158 colspan=2 style='width:118.7pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Blood
  pressure, diastolic</span></p>
  </td>
  <td width=157 style='width:118.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->bp_diastolic ?? '---'}} mmHg</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=165 colspan=3 style='width:123.85pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Rhythm on
  check</span></p>
  </td>
  <td width=473 colspan=7 style='width:354.9pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->rhythm_on_check ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=165 colspan=3 style='width:123.85pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Rhythm, with
  pulse</span></p>
  </td>
  <td width=473 colspan=7 style='width:354.9pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->rhythm_with_pulse ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=165 colspan=3 style='width:123.85pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Rhythm intervention</span></p>
  </td>
  <td width=473 colspan=7 style='width:354.9pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->rhythm_intervention ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:10.05pt'>
  <td width=638 colspan=10 style='width:478.75pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:10.05pt'>
  <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
  style='font-family:Helvetica'>Medications</span></b></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=194 colspan=4 style='width:145.6pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>Epinephrine dose given</span></p>
  </td>
  <td width=103 colspan=2 style='width:76.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->epinephrine_dose ?? '---'}} mg</span></p>
  </td>
  <td width=141 colspan=2 style='width:105.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>Epinephrine route</span></p>
  </td>
  <td width=201 colspan=2 style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->epinephrine_route ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=194 colspan=4 style='width:145.6pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>Amiodarone dose given</span></p>
  </td>
  <td width=103 colspan=2 style='width:76.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->amiodarone_dose ?? '---'}} mg</span></p>
  </td>
  <td width=141 colspan=2 style='width:105.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>Amiodarone route</span></p>
  </td>
  <td width=201 colspan=2 style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->amiodarone_route ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=194 colspan=4 style='width:145.6pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>{{$flst->free1_label ?? 'Other medication'}} dose given</span></p>
  </td>
  <td width=103 colspan=2 style='width:76.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->free1_dose ?? '---'}}</span></p>
  </td>
  <td width=141 colspan=2 style='width:105.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>{{$flst->free1_label ?? 'Other medication'}} route</span></p>
  </td>
  <td width=201 colspan=2 style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'{{$flst->free1_route ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=194 colspan=4 style='width:145.6pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>{{$flst->free2_label ?? 'Other medication'}} dose given</span></p>
  </td>
  <td width=103 colspan=2 style='width:76.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'{{$flst->free2_dose ?? '---'}}</span></p>
  </td>
  <td width=141 colspan=2 style='width:105.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:Helvetica;color:black'>{{$flst->free2_label ?? 'Other medication'}} route</span></p>
  </td>
  <td width=201 colspan=2 style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->free2_route ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=147 colspan=2 style='width:110.5pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Comments/remarks</span></p>
  </td>
  <td width=491 colspan=8 style='width:368.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$flst->comments ?? '---'}}</span></p>
  </td>
 </tr>
 @endforeach

 </div>
 
<p class=MsoNormal>&nbsp;</p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=7 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section III.
   </span></b><span lang=EN-US style='font-size:16.0pt;line-height:115%;
   font-family:Helvetica'>Outcome</span></p>
   </td>
  </tr>
 </thead>
 <tr style='height:15.25pt'>
  <td width=274 colspan=4 style='width:205.3pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time
  Resuscitation Event Ended</span></p>
  </td>
  <td width=365 colspan=3 style='width:273.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->code_end_dt ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=104 style='width:77.75pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Outcome</span></p>
  </td>
  <td width=535 colspan=6 style='width:401.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->outcome ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=104 rowspan=3 style='width:77.75pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Assessment, </span><i><span
  lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:Helvetica'>if
  survived</span></i></p>
  </td>
  <td width=123 colspan=2 style='width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Blood pressure,
  systolic</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->bp_systolic ?? '---'}} mmHg</span></p>
  </td>
  <td width=123 style='width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Blood
  pressure, diastolic</span></p>
  </td>
  <td width=147 style='width:110.45pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->bp_diastolic ?? '---'}} mmHg</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=123 colspan=2 style='width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Heart rate</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.35pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->heart_rate ?? '---'}} beats per
  min</span></p>
  </td>
  <td width=123 style='width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Respiratory
  rate</span></p>
  </td>
  <td width=147 style='width:110.45pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->respiratory_rate ?? '---'}} breaths per
  min</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=85 style='width:63.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Rhythm</span></p>
  </td>
  <td width=450 colspan=5 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->rhythm ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=189 colspan=2 style='width:141.5pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Date/Time of
  death, </span><i><span lang=EN-US style='font-size:10.0pt;line-height:115%;
  font-family:Helvetica'>if died</span></i></p>
  </td>
  <td width=450 colspan=5 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$outcome->death_dt ?? '---'}}</span></p>
  </td>
 </tr>
 </div>
 <p class=MsoNormal>&nbsp;</p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=3 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section IV. </span></b><span
   lang=EN-US style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Debriefing
   and evaluation</span></p>
   </td>
  </tr>
 </thead>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:"Arial",sans-serif;color:black'>Was the code
  conducted in accordance with the current algorithm?</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question1 ?? '---'}} </span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:"Arial",sans-serif;color:black'>Was there any
  problem in the response time of the team?</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question2 ?? '---'}}<br \>{{$evaluation->question2_1 ?? ''}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span style='font-size:11.0pt;
  line-height:115%;font-family:"Arial",sans-serif;color:black'>Were there any
  problems with equipment, supplies or tests?</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><u><span
  lang=EN-US style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Equipment/supplies/tests</span></u></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><u><span
  lang=EN-US style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Status</span></u></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>IV Supplies</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_1 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Central Line
  Kit</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_2 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Suction</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_3 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Medications</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_4 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>ECG monitor</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_5 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Defibrillator</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_6 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>External
  pacemaker</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_7 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Pacing or
  defibrillator pad</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_8 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Intubation supplies</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_9 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Bag-valve
  mask</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_10 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Oxygen supplies</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_11 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 rowspan=2 style='width:141.5pt;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Laboratory
  results</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_12 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Chest x-ray</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_13 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>&nbsp;</span></p>
  </td>
  <td width=267 style='width:200.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Others</span></p>
  </td>
  <td width=182 style='width:136.75pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question3_14 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Were policies
  and procedures followed?</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question4 ?? '---'}}<br \>{{$evaluation->question4_1 ?? ''}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Were there
  any problems during the code?</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question5 ?? '---'}}<br \>{{$evaluation->question5_1 ?? ''}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Was family notified and updated on patient’s condition?
  </span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question6 ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:7.9pt'>
  <td width=189 style='width:141.5pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Other remarks</span></p>
  </td>
  <td width=450 colspan=2 style='width:337.25pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.9pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$evaluation->question7 ?? '---'}}</span></p>
  </td>
 </tr>
</table>
<p class=MsoNormal>&nbsp;</p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=638
 style='width:478.75pt;border-collapse:collapse;border:none'>
 <thead>
  <tr style='height:21.8pt'>
   <td width=638 colspan=2 style='width:478.75pt;border:solid black 1.0pt;
   padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
   <p class=MsoNormal style='line-height:115%'><b><span lang=EN-US
   style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Section V. </span></b><span
   lang=EN-US style='font-size:16.0pt;line-height:115%;font-family:Helvetica'>Code
   team</span></p>
   </td>
  </tr>
 </thead>
 <tr style='height:15.25pt'>
  <td width=160 style='width:120.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Code team
  leader</span></p>
  </td>
  <td width=478 style='width:358.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$codeTeam->code_team_leader ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:120.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Code team co-leader</span></p>
  </td>
  <td width=478 style='width:358.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$codeTeam->code_team_co_leader ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:120.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Recorder</span></p>
  </td>
  <td width=478 style='width:358.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$codeTeam->recorder ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:120.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Code team
  members</span></p>
  </td>
  <td width=478 style='width:358.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$codeTeam->code_team_member ?? '---'}}</span></p>
  </td>
 </tr>
 <tr style='height:15.25pt'>
  <td width=160 style='width:120.25pt;border:solid black 1.0pt;border-top:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>Intubated by</span></p>
  </td>
  <td width=478 style='width:358.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.25pt'>
  <p class=MsoNormal style='line-height:115%'><span lang=EN-US
  style='font-size:11.0pt;line-height:115%;font-family:Helvetica'>{{$codeTeam->intubated_by ?? '---'}}</span></p>
  </td>
 </tr>
</table>

</div>

</div>
</body>
</html>