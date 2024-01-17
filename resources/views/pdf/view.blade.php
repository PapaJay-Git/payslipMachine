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
        .px-1 {
            padding-left: 0.25rem;
            padding-right: 0.25rem;
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
    <table class="min-w-full h-auto font-mono whitespace-nowrap" >
        <thead class="pb-4">
            <tr>
                <th class="px-1 font-bold text-2xl text-center" colspan="11">ELJIN CORP</th>
            </tr>
            <tr>
                <th class="px-1 pt-3 pb-3 font-bold text-xs text-center" colspan="11">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
            </tr>
            <tr>
                <th class="px-1 py-1 font-bold text-xs text-start">EMPLOYEE NAME:</th>
                <th class="px-1 py-1 font-bold text-xs text-start" colspan="3">LIWANAG JULIUS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">JOB STATUS:</th>
                <th class="px-1 py-1 font-bold text-xs text-start">REGULAR</th>
                <th class="px-1 py-1 font-bold text-xs text-start">PAY RATE:</th>
                <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">450.00</th>
                <th class="px-1 py-1 font-bold text-xs text-start">NO OFF DAYS</th>
            </tr>
            <tr >
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start">DEPARTMENT:</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start" colspan="3">Logistics and Warehouse Department</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start">RANK FILE:</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start">STAFF</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start">POSITION:</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start" colspan="2">Delivery Driver</th>
                <th class="px-1 pt-1 pb-1 font-bold text-xs text-start">5</th>
            </tr>
        </thead>
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="px-1 py-1 font-bold text-xs text-start">EARNINGS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">HOUR(S)</th>
                <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-1 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-1 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-1 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-1 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-1 py-1 text-xs text-start">BASIC PAY</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">2300</td>
                <td class="px-1 py-1 text-xs text-start">ADVANCE</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">BOND DEPOSIT</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">SSS LOAN</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">PHIL HEALTH</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">OVERTIME</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">CHARGE</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">MISC</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">SSS PREM</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">MUTUAL LOAN</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">OVERTIME</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">CHARGE</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">MISC</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">SSS PREM</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">MUTUAL LOAN</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">OFFSET</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">MEAL</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">MUTUAL CHARGE</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">PAGIBIG LOAN</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">PAGIBIG PREM</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">NIGHT DIFF</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">UNIFORM</td>
                <td class="px-1 py-1 text-xs text-start">.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">OFFDAYS</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">HOLIDAY</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">SLVL</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">LATE</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-1 py-1 text-xs text-start">UDT/HDY</td>
                <td class="px-1 py-1 text-xs text-start">0</td>
                <td class="px-1 py-1 text-xs text-start">0.00</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
                <td class="px-1 py-1 text-xs text-start">-</td>
            </tr>
        </tbody>
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="px-1 py-1 text-xs text-start" colspan="2">GROSS EARNINGS: 2300</th>
                <th class="px-1 py-1 text-xs text-start" colspan="2">RETRO: 0</th>
                <th class="px-1 py-1 text-xs text-start" colspan="2">TOTAL DEDUCTIONS: 0</th>
                <th class="px-1 py-1 text-xs text-start" colspan="3">TOTAL CONTRIBUTIONS: 0</th>
                <th class="px-1 py-1 text-xs text-start" colspan="2">NET PAY: 2300</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="px-1 pt-5 text-xs text-start" colspan="8"></th>
                <th class="px-1 pt-5 text-xs text-start border-b-2 border-black" colspan="3"></th>
            </tr>
            <tr>
                <th class="px-1 py-1 text-xs text-start" colspan="9"></th>
                <th class="px-1 py-1 text-xs text-center">SIGNATURE</th>
                <th class="px-1 py-1 text-xs text-center"></th>
            </tr>
        </tbody>
    </table>
</body>
</html>

