<?php

   if (!isset($_SESSION["role"])) {  
    header("location:login.php");

}
?>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>User Management - Candy Finance</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <script
    id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { colors: { tertiary: "#006978", surface: "#fff8f6", "inverse-primary": "#fe8d8e", "on-primary-fixed-variant": "#7c282c", "surface-variant": "#ffdad4", "surface-dim": "#ffcfc6", outline: "#a86b5f", "secondary-fixed-dim": "#b1dbe9", "on-secondary": "#f0fbff", "on-error": "#fff7f6", "on-secondary-fixed-variant": "#38616d", "on-primary-container": "#701f24", "secondary-fixed": "#bfe9f8", "outline-variant": "#e7a094", "primary-fixed-dim": "#ff9696", "on-surface": "#53251d", secondary: "#3c6571", "inverse-on-surface": "#be938b", "on-background": "#53251d", "surface-container": "#ffe9e5", "on-secondary-container": "#2e5763", "on-error-container": "#671200", "surface-container-low": "#fff0ee", "on-secondary-fixed": "#194550", "error-container": "#fa7150", "surface-tint": "#9d4144", error: "#aa371c", primary: "#9d4144", "on-surface-variant": "#885046", "inverse-surface": "#1e0705", "surface-container-highest": "#ffdad4", background: "#fff8f6", "secondary-container": "#bfe9f8", "on-tertiary-fixed": "#003c46", "on-primary-fixed": "#530912", "on-tertiary-fixed-variant": "#005b69", "primary-container": "#ffabaa", "surface-bright": "#fff8f6", "surface-container-high": "#ffe2dc", "on-tertiary-container": "#00515d", "on-tertiary": "#eefbff", "tertiary-container": "#63e5ff", "tertiary-fixed": "#63e5ff", "primary-fixed": "#ffabaa", "on-primary": "#fff7f6", "tertiary-fixed-dim": "#52d7f0", "surface-container-lowest": "#ffffff", "error-dim": "#821a01", "primary-dim": "#8e3639", "secondary-dim": "#2f5965", "tertiary-dim": "#005c69" }, fontFamily: { headline: ["Dm Sans"], body: ["Dm Sans"], label: ["Dm Sans"], display: "Dm Sans" }, borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" } } } };</script>
  <link rel="stylesheet" href="css/style.css"/>
</head>

<body class="bg-surface font-body text-on-background min-h-screen">
  <!-- SideNavBar -->
  <aside
    class="hidden md:flex h-screen w-64 fixed left-0 border-r-2 border-pink-50 bg-white dark:bg-slate-950 flex-col py-6 gap-2 divide-y divide-pink-50 dark:divide-pink-900/20 shadow-[4px_0_24px_rgba(124,82,170,0.1)] z-50">
    <div class="px-6 pb-6">
      <div class="flex items-center gap-3">
        <img alt="Organization Logo" class="w-10 h-10 rounded-full shadow-md"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4oGC1GJMtjEQmy-5yBM7Ea8qHD-EFzFhK0nC0ffLsZK4bXLv_G6gYl4qQzBsRz6Gce229IwTtEvIEpOB0axoJDE40JayiVq9Ic-qSXnrXlWYZh399GjXMGpaGIeXOJFy4YoDGs4nzl_BIcsBqUBwnJ5xMVbc14fiFksEB-nfpNFOZtp6oelIM-ohS8ssyhFb3hGtnlKbNUhjy3AfWayr9vN_9RzJ4NFRdT00PFqyrQV5X3VRWe-2liUucKieulK5SFVod0uWJoxM" />
        <div>
          <h2 class="text-xl font-bold text-pink-600">Finance Hub</h2>
          <p class="text-xs text-slate-500">Role: <?php echo $_SESSION['role']; ?></p>
        </div>
      </div>
    </div>
    <nav class="flex-1 py-4 flex flex-col gap-1 overflow-y-auto">
      <a class="text-slate-600 dark:text-slate-400 mx-2 px-4 py-3 rounded-full flex items-center gap-3 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:scale-[1.02] transition-transform spring-bouncy-effect"
        href="dashboard.php">
        <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
        <span class="font-medium">Dashboard</span>
      </a>
       <?php
            if ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Analyst')
            {
            ?>
      <a class="text-slate-600 dark:text-slate-400 mx-2 px-4 py-3 rounded-full flex items-center gap-3 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:scale-[1.02] transition-transform spring-bouncy-effect"
        href="record.php">
        <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
        <span class="font-medium">Records</span>
      </a>

           <?php 
            }
            if ($_SESSION['role'] === 'Admin')
            {
            ?>
            <a class="text-slate-600 dark:text-slate-400 mx-2 px-4 py-3 rounded-full flex items-center gap-3 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:scale-[1.02] transition-transform spring-bouncy-effect"
            href="users.php">
            <span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">group</span>
            <span class="font-medium">Users</span>
           </a>
            <?php 
            } 
       ?>
        
    </nav>
    <div class="px-4 py-4 space-y-2">
      <!-- <button
        class="w-full bg-primary text-on-primary py-3 px-4 rounded-full font-bold shadow-[0_4px_16px_rgba(224,64,160,0.3)] hover:scale-105 transition-all duration-300 active:scale-95 flex items-center justify-center gap-2">
        <span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
        New Transaction
      </button> -->
      <a class="text-slate-600 dark:text-slate-400 mx-2 px-4 py-3 rounded-full flex items-center gap-3 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:scale-[1.02] transition-transform"
        href="#">
        <span class="material-symbols-outlined" data-icon="help">help</span>
        <span class="font-medium">Help Center</span>
      </a>
    </div>
  </aside>