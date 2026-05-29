<?php
session_start();

require "api/connect.php";
require "includes/sidebar.php";
require "includes/header.php";
?>

<main class="pt-10 pb-10 md:ml-6 px-6">
    <section class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-4xl font-black text-on-surface tracking-tight mb-2">Dashboard</h2>
            <p class="text-stone-500 text-lg">Detailed overview of your business transactions and performance.</p>
        </div>
        <?php if ($_SESSION['role'] === 'Admin') { ?>
            <button class="bg-primary text-white px-8 py-3 rounded-full font-bold flex items-center gap-2 shadow-[0_4px_16px_rgba(157,65,68,0.3)] hover:scale-105 transition-transform bouncy-tap">
                <span class="material-symbols-outlined"></span>
                New Transaction
            </button>
        <?php } ?>
    </section>

    <!-- Summary Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-[20px] shadow-[0_8px_24px_rgba(187,89,90,0.12)] border border-rose-50/50 flex flex-col gap-4 bouncy-spring">
            <div class="flex justify-between items-center">
                <div class="w-12 h-12 bg-tertiary-container/30 rounded-2xl flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined text-3xl">trending_up</span>
                </div>
                <span class="text-xs font-bold px-3 py-1 bg-green-100 text-green-600 rounded-full">+12.4%</span>
            </div>
            <div>
                <p class="text-sm font-medium text-stone-500">Total Income</p>
                <h3 class="text-3xl font-black text-on-background"></h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[20px] shadow-[0_8px_24px_rgba(187,89,90,0.12)] border border-rose-50/50 flex flex-col gap-4 bouncy-spring">
            <div class="flex justify-between items-center">
                <div class="w-12 h-12 bg-primary-container/30 rounded-2xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">trending_down</span>
                </div>
                <span class="text-xs font-bold px-3 py-1 bg-red-100 text-red-600 rounded-full">-4.2%</span>
            </div>
            <div>
                <p class="text-sm font-medium text-stone-500">Total Expenses</p>
                <h3 class="text-3xl font-black text-on-background"></h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[20px] shadow-[0_8px_24px_rgba(187,89,90,0.12)] border border-rose-50/50 flex flex-col gap-4 bouncy-spring">
            <div class="flex justify-between items-center">
                <div class="w-12 h-12 bg-secondary-container/30 rounded-2xl flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
                </div>
                <span class="text-xs font-bold px-3 py-1 bg-green-100 text-green-600 rounded-full">+8.1%</span>
            </div>
            <div>
                <p class="text-sm font-medium text-stone-500">Net Profit</p>
                <h3 class="text-3xl font-black text-on-background"></h3>
            </div>
        </div>
    </div>

    <!-- Transactions Table Section -->
    <div class="bg-white rounded-[24px] shadow-[0_8px_32px_rgba(187,89,90,0.06)] border border-rose-50 overflow-hidden">
        <div class="px-8 py-6 border-b border-rose-50 flex justify-between items-center">
            <h3 class="text-xl font-black">Recent Transactions</h3>
            <button class="text-primary font-bold hover:underline text-sm bouncy-spring">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low/50">
                    <tr>
                        <th class="px-8 py-4 font-bold text-stone-500 text-sm">Transaction</th>
                        <th class="px-8 py-4 font-bold text-stone-500 text-sm">Category</th>
                        <th class="px-8 py-4 font-bold text-stone-500 text-sm">Date</th>
                        <th class="px-8 py-4 font-bold text-stone-500 text-sm text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-rose-50">

                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Floating Action Button for Mobile -->
<button class="fixed bottom-6 right-6 w-16 h-16 bg-primary text-white rounded-full shadow-[0_8px_24px_rgba(157,65,68,0.4)] flex items-center justify-center md:hidden bouncy-spring z-50">
    <span class="material-symbols-outlined text-3xl">add</span>
</button>

<script>
    async function loadDashboard() {
        const res = await fetch('api/dashboard.php');
        const data = await res.json();

        // Update cards
        document.querySelectorAll("h3")[0].innerText = "$" + data.income;
        document.querySelectorAll("h3")[1].innerText = "$" + data.expense;
        document.querySelectorAll("h3")[2].innerText = "$" + data.profit;

        // Transactions Table
        let tbody = document.querySelector("tbody");
        tbody.innerHTML = "";

        data.transactions.forEach(tx => {
            let row = `
            <tr class="hover:bg-rose-50/30">
                <td class="px-8 py-4 font-bold">${tx.title}</td>
                <td class="px-8 py-4">${tx.category}</td>
                <td class="px-8 py-4">${tx.created_at}</td>
                <td class="px-8 py-4 text-right ${tx.type == 'income' ? 'text-green-600' : 'text-error'}">
                    ${tx.type == 'income' ? '+' : '-'}₹${tx.amount}
                </td>
            </tr>`;
            tbody.innerHTML += row;
        });
    }

    // Load on page start
    loadDashboard();
</script>
</body></html>