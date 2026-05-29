<?php
   session_start();
   include "api/connect.php";
   require "includes/sidebar.php";
   require "includes/header.php";
 
?>
    <!-- Page Content -->
    <div class="p-6 max-w-7xl mx-auto space-y-8">
      <!-- Stats / Overview Bento Grid -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div
          class="md:col-span-2 bg-white p-6 rounded-xl shadow-[0_8px_20px_rgba(224,64,160,0.1)] border-b-4 border-pink-400 flex flex-col justify-between group hover:-translate-y-1 transition-transform">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-slate-500 font-bold text-sm tracking-wide">TOTAL USERS</p>
              <h3 class="text-4xl font-black text-pink-600 mt-1">1,284</h3>
            </div>
            <div class="bg-pink-100 p-3 rounded-full text-pink-600">
              <span class="material-symbols-outlined text-3xl" data-icon="groups">groups</span>
            </div>
          </div>
          <div class="mt-4 flex items-center gap-2 text-green-500 text-sm font-bold">
            <span class="material-symbols-outlined text-base" data-icon="trending_up">trending_up</span>
            <span>12% Increase this month</span>
          </div>
        </div>
        <div
          class="bg-white p-6 rounded-xl shadow-[0_8px_20px_rgba(124,82,170,0.1)] border-b-4 border-purple-400 flex flex-col justify-between group hover:-translate-y-1 transition-transform">
          <p class="text-slate-500 font-bold text-sm tracking-wide uppercase">Active Now</p>
          <div class="flex items-end justify-between">
            <h3 id="h3" class="text-3xl font-black text-purple-600"></h3>
            <div class="flex -space-x-2">
              <img alt="Avatar" class="w-8 h-8 rounded-full border-2 border-white"
                data-alt="Portrait of a smiling young man with dark hair against a soft blue background"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwwgfq_FJkgeeXXI39MWl7_skUtEz_Ph1bfNaEy8CBhb3fpBl0GgtgJO0HsI0PkdHDLLWPmd7VghYEFEGODwiyWHagj0c4kdE45AyCabNgdixtvrvrEEvMC_Df2YbF2-zWuw6Qg9RPXKZuQZpkj82-jlHe54k3-2iX637YZv-pSO2NMQB1hg7giEIEDUPZzVSxgV56p9KzwmMu_sNaC6ik4xMk2_GAL3U6wDqzkWA7yr-xyc9erAiOnIhjptJjEX5qYxlbmO0yhS8" />
              <img alt="Avatar" class="w-8 h-8 rounded-full border-2 border-white"
                data-alt="Portrait of a man with glasses and a friendly expression in natural lighting"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAyrbkgrxHFLFS_iqEXrCM5FezR-LOIFVsFQ5O0Zqg8K1BgdAduv21LQvSG3ThUo1BB9U7GrBfftv4p6YVUoU83y8gQNkHGk4-nDHwWY3KbFcCg3Hag6nggFobRxMqY4r0_nR9B8B2NTOo34f19dJ0CYAfi6zhRMuUGK6Rt8iVflcNLGT3iFpfn-p--tbbGbZBu55bXO6O_ZTZ4EL5cPnd4gsAXHxDBWaVyStuQvxrcNo7x6NVKVHkcVjbZiVOppldRHol9gJ6M78" />
              <div
                class="w-8 h-8 rounded-full border-2 border-white bg-purple-100 flex items-center justify-center text-[10px] font-bold text-purple-600">
                +39</div>
            </div>
          </div>
        </div>
        <div
          class="bg-white p-6 rounded-xl shadow-[0_8px_20px_rgba(0,150,204,0.1)] border-b-4 border-tertiary flex flex-col justify-between group hover:-translate-y-1 transition-transform">
          <p class="text-slate-500 font-bold text-sm tracking-wide uppercase">New Requests</p>
          <div class="flex items-center justify-between">
            <h3 class="text-3xl font-black text-tertiary">0</h3>
            <button
              class="bg-tertiary text-white px-3 py-1 rounded-full text-xs font-bold hover:scale-105 transition-transform">Review</button>
          </div>
        </div>
      </section>
      <!-- Table Section -->
      <section class="bg-white rounded-xl shadow-[0_12px_30px_rgba(0,0,0,0.04)] overflow-hidden border border-pink-50">
        <div class="px-6 py-6 border-b border-pink-50 flex flex-col sm:flex-row justify-between items-center gap-4">
          <h2 class="text-xl font-black text-on-background flex items-center gap-2">
            User Directory
            <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs font-black">All Access</span>
          </h2>
         <div class="flex gap-2 w-full sm:w-auto relative">
<div class="relative">
<!-- <button class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-4 py-2 border-2 border-slate-100 rounded-full text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors" id="filterBtn">
<span class="material-symbols-outlined text-lg" data-icon="filter_list">filter_list</span>
              Filters
            </button> -->
<!-- Filter Dropdown -->
<div class="filter-dropdown-content absolute right-0 mt-2 w-64 bg-white border border-pink-100 rounded-2xl shadow-2xl z-[60] p-4 space-y-4" id="filterDropdown">
<div>
<p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Role</p>
<div class="space-y-2">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="filter-checkbox rounded border-pink-200 text-pink-500 focus:ring-pink-500 w-4 h-4" data-filter-type="role" type="checkbox" value="Admin"/>
<span class="text-sm font-medium text-slate-600 group-hover:text-pink-600 transition-colors">Admin</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="filter-checkbox rounded border-pink-200 text-pink-500 focus:ring-pink-500 w-4 h-4" data-filter-type="role" type="checkbox" value="Analyst"/>
<span class="text-sm font-medium text-slate-600 group-hover:text-pink-600 transition-colors">Analyst</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="filter-checkbox rounded border-pink-200 text-pink-500 focus:ring-pink-500 w-4 h-4" data-filter-type="role" type="checkbox" value="Viewer"/>
<span class="text-sm font-medium text-slate-600 group-hover:text-pink-600 transition-colors">Viewer</span>
</label>
</div>
</div>
<hr class="border-pink-50"/>
<div>
<p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Status</p>
<div class="space-y-2">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="filter-checkbox rounded border-pink-200 text-pink-500 focus:ring-pink-500 w-4 h-4" data-filter-type="status" type="checkbox" value="Active"/>
<span class="text-sm font-medium text-slate-600 group-hover:text-pink-600 transition-colors">Active</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="filter-checkbox rounded border-pink-200 text-pink-500 focus:ring-pink-500 w-4 h-4" data-filter-type="status" type="checkbox" value="Inactive"/>
<span class="text-sm font-medium text-slate-600 group-hover:text-pink-600 transition-colors">Inactive</span>
</label>
</div>
</div>
<div class="pt-2">
<button class="w-full text-xs font-bold text-pink-600 hover:text-pink-700 transition-colors" id="clearFilters">Clear All Filters</button>
</div>
</div>
</div>
            <button
              class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-4 py-2 bg-pink-500 text-white rounded-full text-sm font-bold shadow-lg shadow-pink-200 hover:scale-105 transition-transform active:scale-95"
              onclick="document.getElementById('add-user-modal').classList.remove('hidden')">
              <span class="material-symbols-outlined text-lg" data-icon="person_add">person_add</span>
              Add User
            </button>
          </div>
        </div>
        <div class="overflow-x-auto">
<table class="w-full text-left" id="userTable">
<thead class="bg-pink-50/30 text-slate-500 text-xs font-black uppercase tracking-widest">
<tr>
<th class="px-6 py-4">Email</th>
<th class="px-6 py-4">Name</th>
<th class="px-6 py-4">Edit/Role-Access</th>
<th class="px-6 py-4">Edit/Status</th>
<!-- <th class="px-6 py-4 text-right">Actions</th> -->
</tr>
</thead>
<tbody class="divide-y divide-pink-50">
 

</tbody>
</table>
</div>
        <!-- Pagination -->
        <div class="px-6 py-4 bg-pink-50/10 flex items-center justify-between">
          <p class="text-xs font-bold text-slate-400">Showing 1 to 4 of 1,284 users</p>
          <div class="flex gap-1">
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full border border-pink-100 text-slate-400 hover:bg-pink-100 hover:text-pink-600 transition-all">
              <span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
            </button>
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-500 text-white font-bold text-xs">1</button>
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full text-slate-500 font-bold text-xs hover:bg-pink-50">2</button>
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full text-slate-500 font-bold text-xs hover:bg-pink-50">3</button>
            <button
              class="w-8 h-8 flex items-center justify-center rounded-full border border-pink-100 text-slate-400 hover:bg-pink-100 hover:text-pink-600 transition-all">
              <span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
            </button>
          </div>
        </div>
      </section>
      
    </div>
  </main>
  <!-- FAB (Contextual for User Management) -->
  <button
    class="fixed bottom-8 right-8 w-14 h-14 bg-pink-600 text-white rounded-full flex items-center justify-center shadow-[0_8px_24px_rgba(224,64,160,0.4)] hover:scale-110 active:scale-95 transition-all md:hidden z-50">
    <span class="material-symbols-outlined text-3xl" data-icon="add">add</span>
  </button>
  <div class="hidden fixed inset-0 z-50 flex items-center justify-center" id="add-user-modal">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-pink-900/20 backdrop-blur-md transition-opacity"></div>
    <!-- Modal Content -->
    <div
      class="relative bg-white dark:bg-slate-900 w-full max-w-lg mx-4 rounded-3xl shadow-2xl border-2 border-pink-50 dark:border-pink-900/30 overflow-hidden spring-bouncy-effect">
      <div class="p-8">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-black text-on-background">Add New User</h2>
          <button class="p-2 hover:bg-pink-50 rounded-full text-slate-400 hover:text-pink-600 transition-colors"
            onclick="document.getElementById('add-user-modal').classList.add('hidden')">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <form id="addUserForm" class="space-y-5">
          <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Full Name</label>
            <input
              class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background"
              name="full_name" placeholder="e.g. Arpit BK" type="text" required />
          </div>
          <div>
            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Email Address</label>
            <input
              class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background"
              name="email" placeholder="AP@candyfinance.com" type="email" />
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Role</label>
              <select name="role"
                class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
                <option>Admin</option>
                <option>Analyst</option>
                <option>Viewer</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-black uppercase tracking-widest text-slate-500 mb-2">Status</label>
              <select name="status"
                class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
                <option>Active</option>
                <option>Inactive</option>
              </select>
            </div>
          </div>
          <div class="flex items-center gap-4 pt-4">
            <button
              class="flex-1 px-6 py-3 rounded-full font-bold text-slate-600 border-2 border-slate-100 hover:bg-slate-50 transition-all"
              onclick="document.getElementById('add-user-modal').classList.add('hidden')" type="button">Cancel</button>
            <button
              class="flex-1 px-6 py-3 rounded-full font-bold text-white bg-pink-600 shadow-lg shadow-pink-200 hover:scale-105 active:scale-95 transition-all"
              type="submit" id="id1">Create User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
   <script src="JS/index.js"></script>
  <script>
async function loadTable() {
    try {
        const res = await fetch('api/load_user_data.php');
        const data = await res.json();

        const tbody = document.querySelector("#userTable tbody");
        let rows = "";
        document.querySelectorAll("h3")[0].innerText = "" + data.totaluser;
        document.querySelectorAll("#h3")[0].innerText = "" + data.activeuser;

        if (!data.user || data.user.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-6 text-slate-400">
                        No users found
                    </td>
                </tr>`;
            return;
        }

        data.user.forEach(tx => {
            rows += `
            <tr class="user-row hover:bg-pink-50/20 transition-colors group" 
                data-role="${tx.role}" 
                data-status="${tx.status}">
                
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="px-2 py-1 font-bold text-xs text-slate-400">
                            ${tx.email}
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <div class="font-bold text-on-background">
                        ${tx.full_name}
                    </div>
                </td>

                <td class="px-6 py-4">
                  <select onchange="updaterole(${tx.id}, this.value)" class="role-badge bg-purple-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        <option class="w-2 h-2 rounded-full 'bg-green-500' : 'bg-gray-400'" ${tx.role=='Admin'?'selected':''}>Admin</option>
                        <option class="w-2 h-2 rounded-full 'bg-red-500' : 'bg-gray-400'" ${tx.role=='Analyst'?'selected':''}>Analyst</option>
                        <option class="w-2 h-2 rounded-full 'bg-red-500' : 'bg-gray-400'" ${tx.role=='Viewer'?'selected':''}>Viewer</option>
 </select>
                    
                </td>

                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <select onchange="updateStatus(${tx.id}, this.value)" class="text-sm border rounded px-6 py-2">
                        <option class="w-2 h-2 rounded-full 'bg-green-500' : 'bg-gray-400'" ${tx.status=='Active'?'selected':''}>Active</option>
                        <option class="w-2 h-2 rounded-full 'bg-red-500' : 'bg-gray-400'"${tx.status=='Inactive'?'selected':''}>Inactive</option>
                    </select>
                    </div>
                </td>

              

            </tr>`;
        });

        tbody.innerHTML = rows;

    } catch (error) {
        console.error("Error loading users:", error);
    }
}

// Load on page start
document.addEventListener("DOMContentLoaded", loadTable);
function updateStatus(id, status){
    fetch("api/updateuser.php", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: `id=${id}&status=${status}`
    })
    .then(res => res.json())
    .then(() => {
        loadTable(); // refresh
    });
}
function updaterole(id, role){
    fetch("api/updaterole.php", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: `id=${id}&role=${role}`
    })
    .then(res => res.json())
    .then(() => {
        loadTable(); // refresh
    });
}
</script>
</body>
</html>

<!-- //<span class="role-badge bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        ${tx.role}
                    </span> -->