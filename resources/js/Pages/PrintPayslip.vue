<script>
import printJS from 'print-js';

export default {
  methods: {
    printTable() {
      // Specify the table element by its ID
      const tableToPrint = document.getElementById("printJS-Table");

      // Use Print.js to print the table
      printJS({
        printable: tableToPrint,
        type: 'html',
        header: 'Table Header', // Optional header text
        documentTitle: 'Table Print', // Optional document title
      });
    }
  },
  mounted() {
    this.printTable(); // Corrected to call the method
  }
}
</script>

<template>
    <table class="w-full font-mono whitespace-nowrap" id="printJS-Table">
        <thead class="pb-4">
            <tr>
                <th class="px-2 font-bold text-2xl text-center" colspan="11">ELJIN CORP</th>
            </tr>
            <tr>
                <th class="px-2 pt-3 font-bold text-xs text-center" colspan="11">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
            </tr>
            <tr>
                <th class="px-2 py-1 font-bold text-xs text-start"></th>
                <th class="px-2 py-1 font-bold text-xs text-start">EMPLOYEE NAME:</th>
                <th class="px-2 py-1 font-bold text-xs text-start" colspan="2">LIWANAG JULIUS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">JOB STATUS:</th>
                <th class="px-2 py-1 font-bold text-xs text-start">REGULAR</th>
                <th class="px-2 py-1 font-bold text-xs text-start">PAY RATE:</th>
                <th class="px-2 py-1 font-bold text-xs text-start" colspan="2">450.00</th>
                <th class="px-2 py-1 font-bold text-xs text-start">NO OFF DAYS</th>
            </tr>
            <tr >
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start"></th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start">DEPARTMENT:</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start" colspan="2">Logistics and Warehouse Department</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start">RANK FILE:</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start">STAFF</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start">POSITION:</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start" colspan="2">Delivery Driver</th>
                <th class="px-2 pt-1 pb-3 font-bold text-xs text-start">5</th>
            </tr>
        </thead>
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="px-2 py-1 font-bold text-xs text-start">EARNINGS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">HOUR(S)</th>
                <th class="px-2 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-2 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-2 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-2 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">AMOUNT</th>
                <th class="px-2 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                <th class="px-2 py-1 font-bold text-xs text-start">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-2 py-1 text-xs text-start">BASIC PAY</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">2300</td>
                <td class="px-2 py-1 text-xs text-start">ADVANCE</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">BOND DEPOSIT</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">SSS LOAN</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">PHIL HEALTH</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">OVERTIME</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">CHARGE</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">MISC</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">SSS PREM</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">MUTUAL LOAN</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">OVERTIME</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">CHARGE</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">MISC</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">SSS PREM</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">MUTUAL LOAN</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">OFFSET</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">MEAL</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">MUTUAL CHARGE</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">PAGIBIG LOAN</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">PAGIBIG PREM</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">NIGHT DIFF</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">UNIFORM</td>
                <td class="px-2 py-1 text-xs text-start">.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">OFFDAYS</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">HOLIDAY</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">SLVL</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">LATE</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
            <tr>
                <td class="px-2 py-1 text-xs text-start">UDT/HDY</td>
                <td class="px-2 py-1 text-xs text-start">0</td>
                <td class="px-2 py-1 text-xs text-start">0.00</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
                <td class="px-2 py-1 text-xs text-start">-</td>
            </tr>
        </tbody>
        <thead class="bg-gray-200 border-2 border-black">
            <tr>
                <th class="px-2 py-1 text-xs text-start" colspan="2">GROSS EARNINGS: 2300</th>
                <th class="px-2 py-1 text-xs text-start" colspan="2">RETRO: 0</th>
                <th class="px-2 py-1 text-xs text-start" colspan="2">TOTAL DEDUCTIONS: 0</th>
                <th class="px-2 py-1 text-xs text-start" colspan="3">TOTAL CONTRIBUTIONS: 0</th>
                <th class="px-2 py-1 text-xs text-start" colspan="2">NET PAY: 2300</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="px-2 pt-5 text-xs text-start" colspan="8"></th>
                <th class="px-2 pt-5 text-xs text-start border-b-2 border-black" colspan="3"></th>
            </tr>
            <tr>
                <th class="px-2 py-1 text-xs text-start" colspan="9"></th>
                <th class="px-2 py-1 text-xs text-center">SIGNATURE</th>
                <th class="px-2 py-1 text-xs text-center"></th>
            </tr>
        </tbody>
    </table>
</template>
