<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .h-auto {
            height: auto;
        }
        /* .min-w-full {
                min-width: 100%;
        } */

        table {
            width: 100%;
            max-width: 8.5in; /* Set the maximum width to 8.5 inches for letter size paper */
            border-collapse: collapse;
        }
        .font-mono {
            font-family: monospace;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .min-w-0 {
            min-width: 0px;
        }

        .min-w-1 {
            min-width: 0.25rem; /* 4px */
        }

        .min-w-2 {
            min-width: 0.5rem; /* 8px */
        }

        .min-w-3 {
            min-width: 0.75rem; /* 12px */
        }

        .min-w-4 {
            min-width: 1rem; /* 16px */
        }

        .min-w-5 {
            min-width: 1.25rem; /* 20px */
        }

        .min-w-6 {
            min-width: 1.5rem; /* 24px */
        }

        .min-w-7 {
            min-width: 1.75rem; /* 28px */
        }

        .min-w-8 {
            min-width: 2rem; /* 32px */
        }

        .min-w-9 {
            min-width: 2.25rem; /* 36px */
        }

        .min-w-10 {
            min-width: 2.5rem; /* 40px */
        }

        .min-w-11 {
            min-width: 2.75rem; /* 44px */
        }

        .min-w-12 {
            min-width: 3rem; /* 48px */
        }

        .min-w-14 {
            min-width: 3.5rem; /* 56px */
        }

        .min-w-16 {
            min-width: 4rem; /* 64px */
        }

        .min-w-20 {
            min-width: 5rem; /* 80px */
        }

        .min-w-24 {
            min-width: 6rem; /* 96px */
        }

        .min-w-28 {
            min-width: 7rem; /* 112px */
        }

        .min-w-32 {
            min-width: 8rem; /* 128px */
        }

        .min-w-36 {
            min-width: 9rem; /* 144px */
        }

        .min-w-40 {
            min-width: 10rem; /* 160px */
        }

        .min-w-44 {
            min-width: 11rem; /* 176px */
        }

        .min-w-48 {
            min-width: 12rem; /* 192px */
        }

        .min-w-52 {
            min-width: 13rem; /* 208px */
        }

        .min-w-56 {
            min-width: 14rem; /* 224px */
        }

        .min-w-60 {
            min-width: 15rem; /* 240px */
        }

        .min-w-64 {
            min-width: 16rem; /* 256px */
        }

        .min-w-72 {
            min-width: 18rem; /* 288px */
        }

        .min-w-80 {
            min-width: 20rem; /* 320px */
        }

        .min-w-96 {
            min-width: 24rem; /* 384px */
        }

        .px-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .px-1 {
            padding-left: 0.25rem; /* 4px */
            padding-right: 0.25rem; /* 4px */
        }

        .px-2 {
            padding-left: 0.5rem; /* 8px */
            padding-right: 0.5rem; /* 8px */
        }

        .px-3 {
            padding-left: 0.75rem; /* 12px */
            padding-right: 0.75rem; /* 12px */
        }

        .px-4 {
            padding-left: 1rem; /* 16px */
            padding-right: 1rem; /* 16px */
        }
        .px-5 {
            padding-left: 1.25rem; /* 16px */
            padding-right: 1.25rem; /* 16px */
        }
        .px-6 {
            padding-left: 1.50rem; /* 16px */
            padding-right: 1.50rem; /* 16px */
        }

        .pe-0 {
            padding-right: 0;
        }

        .pe-1 {
            padding-right: 0.25rem; /* 4px */
        }

        .pe-2 {
            padding-right: 0.5rem; /* 8px */
        }

        .pe-3 {
            padding-right: 0.75rem; /* 12px */
        }

        .pe-4 {
            padding-right: 1rem; /* 16px */
        }
        .pe-5{
            padding-right: 1.25rem; /* 16px */
        }
        .pe-6 {
            padding-right: 1.50rem; /* 16px */
        }
        .pe-0 {
            padding-right: 0;
        }

        .ps-1 {
            padding-left: 0.25rem; /* 4px */
        }

        .ps-2 {
            padding-left: 0.5rem; /* 8px */
        }

        .ps-3 {
            padding-left: 0.75rem; /* 12px */
        }

        .ps-4 {
            padding-left: 1rem; /* 16px */
        }
        .ps-5 {
            padding-left: 1.25rem; /* 16px */
        }
        .ps-6 {
            padding-left: 1.50rem; /* 16px */
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .pt-1 {
            padding-top: 0.25rem;
        }

        .pb-1 {
            padding-bottom: 0.25rem;
        }
        .pb-3 {
            padding-bottom: 0.50rem;
        }
        .pt-5 {
            padding-top: 0.75rem;
        }

        .inline-block {
            display: inline-block;
        }

        /* Font Size */
        .text-xs {
            font-size: 0.55rem;
        }

        /* Font Weight */
        .font-bold {
            font-weight: bold;
        }

        /* Text Alignment */
        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
            left: 0;
        }

        /* Column Span */
        .col-span-2 {
            column-span: 2;
        }

        /* Border */
        .border-2 {
            border-width: 2px;
            border-style: solid;
        }

        .border-black {
            border-color: #000; /* black color */
        }

        /* Background Color */
        .bg-gray-200 {
            background-color: #e2e8f0;
        }

        /* Border Bottom */
        .border-b-2 {
            border-width: 0;
            border-bottom-width: 2px;
            border-style: solid;
        }

        /* White Space */
        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        @page {
            size: 8.5in 11in;
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 30px;

        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <table class="min-w-full font-mono whitespace-nowrap" >
        <thead class="pb-4">
            <tr>
                <th class="px-1 font-bold text-2xl text-center" colspan="11">ELJIN CORP</th>
            </tr>
            <tr>
                <th class="px-1 pt-3 font-bold text-xs text-center" colspan="11">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
            </tr>
            <tr>
                <th class="px-1 py-1 font-bold text-xs text-start" colspan="4">
                    <span class="min-w-20 inline-block pe-1">
                        EMPLOYEE NAME:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['employee_name'] }}
                    </span>
                </th>
                <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">
                    <span class="min-w-16 inline-block pe-1">
                        JOB STATUS:
                    </span>
                    <span class="inline-block pe-1">
                        {{  $data['job_status'] }}
                    </span>
                </th>
                <th class="px-1 py-1 font-bold text-xs text-start" colspan="3">
                    <span class="min-w-12 inline-block pe-1">
                        PAY RATE:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['pay_rate'] }}
                    </span>
                </th>
                <th class=" px-1 py-1 font-bold text-xs text-start" colspan="2">
                    <span class="min-w-10 inline-block pe-1">
                        PERIOD:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['period']." - ".$data['month']." ".$data['year'] }}
                    </span>
                </th>
            </tr>
            <tr >
                <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="4">
                    <span class="min-w-20 inline-block pe-1">
                        DEPARTMENT:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['department'] }}
                    </span>
                </th>
                <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="2">
                    <span class="min-w-16 inline-block pe-1">
                        RANK FILE:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['rank_file'] }}
                    </span>
                </th>
                <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="3">
                    <span class="min-w-12 inline-block pe-1">
                        POSITION:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['job_title'] }}
                    </span>
                </th>
                <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="2">
                    <span class="min-w-10 inline-block pe-1">
                        DAYS:
                    </span>
                    <span class="inline-block pe-1">
                        {{ $data['offdays'] }}
                    </span>
                </th>
            </tr>
        </thead>
    </table>
    <table class="min-w-full font-mono whitespace-nowrap" >
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="1">EARNINGS</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="1">HOUR(S)</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="2">AMOUNT</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="1">DEDUCTIONS</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="2">AMOUNT</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="1">CONTRIBUTIONS</th>
                <th class="pe-5 ps-1 py-1 font-bold text-xs text-start" colspan="3">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">BASIC PAY</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['totalhrsearned'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['basic_pay'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">ADVANCE</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['advance'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">SSS LOAN</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['sss_loan'] }}</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">OVERTIME</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['ot_hrs'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['ot_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">CHARGE</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['charge'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">SSS PREM</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['sss_prem'] }}</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">HOLIDAYS</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['holiday_hrs'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['holiday_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">MEAL</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['canteen'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">PAGIBIG LOAN</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['pag_ibig_loan'] }}</td>
            </tr>

            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">NIGHT DIFF</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['nightdif'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['nightdif_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">UNIFORM</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['uniform'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">PHIL HEALTH</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['philhealth'] }}</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">OFFDAYS</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['offdays'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">0</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">BOND DEPOSIT</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['bond_deposit'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">MUTUAL LOAN</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['mutual_loan'] }}</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">LATE</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['minutes_late'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['late_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">MUTUAL CHARGE</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['mutual_charge'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">PAGIBIG PREM</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">{{ $data['pag_ibig_prem'] }}</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">SLVL</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['slvl_hrs'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['slvl_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">MISC</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['misc'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">-</td>
            </tr>

            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">PER TRIP</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['per_trip'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">0</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">-</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">UDT/HDY</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['udt_hrs'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">{{ $data['udt_amount'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">-</td>
            </tr>
            <tr>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">CT LATE</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">{{ $data['ctlate'] }}</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">0</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="1">-</td>
                <td class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">-</td>
            </tr>
        </tbody>
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">GROSS EARNINGS: {{ $calculateGrossEarnings }}</th>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">RETRO: {{ $data['retro'] }}</th>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">TOTAL DEDUCTIONS: {{ $calculateTotalDeductions }}</th>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="3">TOTAL CONTRIBUTIONS: {{ $calculateTotalContributions }}</th>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="2">NET PAY: {{ $calculateGrossEarnings - ($calculateTotalDeductions + $calculateTotalContributions) }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="pe-5 ps-1 pt-5 text-xs text-start" colspan="8"></th>
                <th class="pe-5 ps-1 pt-5 text-xs text-start border-b-2 border-black" colspan="3"></th>
            </tr>
            <tr>
                <th class="pe-5 ps-1 py-1 text-xs text-start" colspan="8"></th>
                <th class="pe-5 ps-1 py-1 text-xs text-center" colspan="3">SIGNATURE</th>
            </tr>
        </tbody>
    </table>

</body>
</html>

