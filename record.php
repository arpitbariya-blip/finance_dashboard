<?php
session_start();
include "api/connect.php";
require "includes/sidebar.php";
require "includes/header.php";

// Get filters safely
$date_filter = $_GET['date_filter'] ?? '';
$category = $_GET['category'] ?? '';

// Base query
$query = "SELECT * FROM records WHERE 1=1";
$params = [];
$types = "";

// Date filter
if ($date_filter == "last30") {
    $query .= " AND date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
} elseif ($date_filter == "quarter") {
    $query .= " AND date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
} elseif ($date_filter == "year") {
    $query .= " AND YEAR(date) = YEAR(CURDATE())";
}

// Category filter
if (!empty($category)) {
    $query .= " AND category = ?";
    $params[] = $category;
    $types .= "s";
}

// Order
$query .= " ORDER BY date DESC";

// Prepare statement
$stmt = $conn->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<style>
        body { font-family: 'DM Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .bouncy-tap:active { transform: scale(0.95); transition: transform 0.1s; }
        .card-shadow { box-shadow: 0 4px 16px rgba(187, 89, 90, 0.1); }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #ffabaa; border-radius: 10px; }
    </style>

<div class="p-8 max-w-7xl mx-auto">
<!-- Header Section -->
<section class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h2 class="text-4xl font-black text-on-surface tracking-tight mb-2">Financial Records</h2>
<p class="text-stone-500 text-lg">Detailed overview of your business transactions and performance.</p>
</div>
<?php
if ($_SESSION['role'] === 'Admin')
    {
        ?>
     <button onclick="document.getElementById('add-trans-modal').classList.remove('hidden')" class="bg-primary text-white px-8 py-3 rounded-full font-bold flex items-center gap-2 shadow-[0_4px_16px_rgba(157,65,68,0.3)] hover:scale-105 transition-transform bouncy-tap">
     <span class="material-symbols-outlined"></span>
                    Add Transaction
        </button>
    <?php }
?>
</section>
<!-- Summary Cards: Bento Style -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
<!-- Total Income -->
<div class="bg-white p-6 rounded-[20px] card-shadow flex flex-col justify-between group hover:translate-y-[-4px] transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 bg-tertiary-container rounded-2xl flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">trending_up</span>
</div>
<span class="text-tertiary text-xs font-bold bg-tertiary-fixed-dim/20 px-3 py-1 rounded-full">+12.5%</span>
</div>
<div>
<p class="text-stone-500 font-medium text-sm">Total Income</p>
<h3 class="text-3xl font-black text-on-surface"></h3>
</div>
<div class="mt-4 h-8 flex items-end gap-1">
<div class="w-full h-4 bg-tertiary-container/30 rounded-full overflow-hidden relative">
<div class="absolute left-0 top-0 h-full bg-tertiary w-[75%] rounded-full"></div>
</div>
</div>
</div>
<!-- Total Expenses -->
<div class="bg-white p-6 rounded-[20px] card-shadow flex flex-col justify-between group hover:translate-y-[-4px] transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 bg-primary-container rounded-2xl flex items-center justify-center text-primary">
<span class="material-symbols-outlined">trending_down</span>
</div>
<span class="text-primary text-xs font-bold bg-primary-fixed-dim/20 px-3 py-1 rounded-full">-4.2%</span>
</div>
<div>
<p class="text-stone-500 font-medium text-sm">Total Expenses</p>
<h3 class="text-3xl font-black text-on-surface"></h3>
</div>
<div class="mt-4 h-8 flex items-end gap-1">
<div class="w-full h-4 bg-primary-container/30 rounded-full overflow-hidden relative">
<div class="absolute left-0 top-0 h-full bg-primary w-[35%] rounded-full"></div>
</div>
</div>
</div>
<!-- Net Profit -->
<div class="bg-white p-6 rounded-[20px] card-shadow flex flex-col justify-between group hover:translate-y-[-4px] transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 bg-secondary-container rounded-2xl flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="text-secondary text-xs font-bold bg-secondary-fixed-dim/20 px-3 py-1 rounded-full">+8.1%</span>
</div>
<div>
<p class="text-stone-500 font-medium text-sm">Net Profit</p>
<h3 class="text-3xl font-black text-on-surface"></h3>
</div>
<div class="mt-4 h-8 flex items-end gap-1">
<div class="w-full h-4 bg-secondary-container/30 rounded-full overflow-hidden relative">
<div class="absolute left-0 top-0 h-full bg-secondary w-[62%] rounded-full"></div>
</div>
</div>
</div>
</section>
<!-- Filter Bar -->

<!-- Transaction Table Container -->
<section class="bg-white rounded-[24px] card-shadow overflow-hidden">
    <form method="GET" class="bg-white p-4 rounded-[20px] card-shadow mb-8 flex flex-wrap items-center gap-4">

     
<div class="flex items-center gap-2 flex-1 min-w-[450px]">
<span class="material-symbols-outlined text-stone-400 text-xl">calendar_month</span>
<select class="w-full border-none focus:ring-0 text-sm font-bold text-on-surface" name="date_filter">
<option value="">All Dates</option>
<option value="last30" <?= ($date_filter=='last30')?'selected':'' ?>>Last 30 Days</option>
<option value="quarter" <?= ($date_filter=='quarter')?'selected':'' ?>>Last Quarter</option>
<option value="year" <?= ($date_filter=='year')?'selected':'' ?>>This Year</option>
</select>
</div>
<div class="h-8 w-px bg-stone-100 hidden md:block"></div>
<div class="flex items-center gap-2 flex-1 min-w-[450px]">
<span class="material-symbols-outlined text-stone-400 text-xl">category</span>
<select class="w-full border-none focus:ring-0 text-sm font-bold text-on-surface" name="category">
<option value="">All Categories</option>
<option value="Supplies" <?= ($category=='Supplies')?'selected':'' ?>>Supplies</option>
<option value="Sales" <?= ($category=='Sales')?'selected':'' ?>>Sales</option>
<option value="Marketing" <?= ($category=='Marketing')?'selected':'' ?>>Marketing</option>
<option value="Payroll" <?= ($category=='Payroll')?'selected':'' ?>>Payroll</option>
</select>
</div>
<button type="submit" id="i1" class="bg-stone-100 hover:bg-rose-50 text-on-surface hover:text-rose-600 px-6 py-2.5 rounded-full font-bold text-sm transition-all bouncy-tap flex items-center gap-2">
<span class="material-symbols-outlined text-lg">filter_alt</span>
                    Apply Filters
                </button>
               
</form>
<div class="overflow-x-auto custom-scrollbar">
<table class="w-full text-left border-collapse ">
<thead>
<tr class="bg-stone-50/50">
<th class="px-8 py-5 text-stone-400 font-bold text-xs uppercase tracking-widest border-b border-stone-100">Date</th>
<th class="px-8 py-5 text-stone-400 font-bold text-xs uppercase tracking-widest border-b border-stone-100">Category</th>
<th class="px-8 py-5 text-stone-400 font-bold text-xs uppercase tracking-widest border-b border-stone-100">Type</th>
<th class="px-8 py-5 text-stone-400 font-bold text-xs uppercase tracking-widest border-b border-stone-100">Notes</th>
<th class="px-8 py-5 text-stone-400 font-bold text-xs uppercase tracking-widest border-b border-stone-100 text-right">Amount</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-50">

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $typeClass = ($row['type'] == 'income') ? 'text-tertiary' : 'text-primary';
        $typeBg = ($row['type'] == 'income') ? 'bg-tertiary-fixed' : 'bg-primary-fixed';
        $sign = ($row['type'] == 'income') ? '+' : '-';

        echo "<tr class='hover:bg-rose-50/30'>";
        echo "<td class='px-8 py-6'>{$row['date']}</td>";
        echo "<td class='px-8 py-6 font-bold'>{$row['category']}</td>";
        echo "<td class='px-8 py-6'>
                <span class='$typeBg px-3 py-1 rounded-full text-xs font-bold'>
                    {$row['type']}
                </span>
              </td>";
        echo "<td class='px-8 py-6 text-stone-500'>{$row['notes']}</td>";
        echo "<td class='px-8 py-6 text-right $typeClass'>
                {$sign}{$row['amount']}
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center py-6'>No data found</td></tr>";
}
?>

</tbody>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-8 py-6 flex items-center justify-between bg-stone-50/30 border-t border-stone-100">
<p class="text-sm text-stone-500 font-medium">Showing 5 of 128 entries</p>
<div class="flex items-center gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-stone-200 text-stone-400 hover:border-primary hover:text-primary transition-all bouncy-tap">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white font-bold shadow-md bouncy-tap">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-full text-stone-600 font-bold hover:bg-stone-100 transition-all bouncy-tap">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-full text-stone-600 font-bold hover:bg-stone-100 transition-all bouncy-tap">3</button>
<span class="text-stone-400 px-2">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-stone-200 text-stone-400 hover:border-primary hover:text-primary transition-all bouncy-tap">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</section>
</div>
  <div class="hidden fixed inset-0 z-50 flex items-center justify-center" id="add-trans-modal">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-pink-900/20 backdrop-blur-md transition-opacity"></div>
      <div class="relative bg-white dark:bg-slate-900 w-full max-w-lg mx-4 rounded-3xl shadow-2xl border-2 border-pink-50 dark:border-pink-900/30 overflow-hidden spring-bouncy-effect">
      <div class="p-8">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-black text-on-background">Add New Transaction</h2>
          <button class="p-2 hover:bg-pink-50 rounded-full text-slate-400 hover:text-pink-600 transition-colors"
            onclick="document.getElementById('add-trans-modal').classList.add('hidden')">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <form id="addtrans" class="space-y-5">
          <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Date</label>
            <input
              class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background"
              name="date" type="date" />
          </div>
          <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Amount</label>
            <input
              class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background"
              name="amount" placeholder="Amount" type="text" required />
          </div>
          <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Category</label>
                <select name="category"
                class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
               <option>Supplies</option>
               <option>Sales</option>
               <option>Marketing</option>
                <option>Payroll</option>
              </select>
          </div>
          <div>
              <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Type</label>
              <select name="type"
                class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
                <option>expenses</option>
                <option>income</option>
              </select>
            </div>
          
            <div>
              <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Note</label>
              <input name="note" type="textarea" placeholder="Write Notes"
                class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
            </div>
          <div class="grid grid-cols-2 gap-4">
        </div>
          <div class="flex items-center gap-4 pt-4">
            <button
              class="flex-1 px-6 py-3 rounded-full font-bold text-slate-600 border-2 border-slate-100 hover:bg-slate-50 transition-all"
              onclick="document.getElementById('add-trans-modal').classList.add('hidden')" type="button">Cancel</button>
            <button
              class="flex-1 px-6 py-3 rounded-full font-bold text-white bg-pink-600 shadow-lg shadow-pink-200 hover:scale-105 active:scale-95 transition-all"
              type="submit" id="id1">Add Transaction</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<!-- FAB (Contextual for Records page: Add Transaction) -->
<button class="fixed bottom-8 right-8 w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center shadow-[0_8px_32px_rgba(157,65,68,0.4)] hover:scale-110 transition-transform active:scale-90 group z-50">
<span class="material-symbols-outlined text-3xl group-hover:rotate-90 transition-transform duration-300">add</span>
</button>

<script>
async function loadDashboard() {
    const res = await fetch('api/get-record.php');
    const data = await res.json();

    // Update cards
    document.querySelectorAll("h3")[0].innerText = "$" + data.income;
    document.querySelectorAll("h3")[1].innerText = "$" + data.expense;
    document.querySelectorAll("h3")[2].innerText = "$" + data.profit;
}
// Load on page start
loadDashboard();

document
  .getElementById("addtrans")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const res = await fetch("api/addtrans.php", {
      method: "POST",
      body: formData,
    });

    const data = await res.json();

    if (data.status === "success") {
      alert("✅ transaction Added");

      document.getElementById("add-trans-modal").classList.add("hidden");
      this.reset();
      loadTable();
    } else {
      alert("❌ " + data.message);
    }
  });

</script>
</body></html>
