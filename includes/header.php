<?php

   if (!isset($_SESSION["role"])) {
    
    header("location:api/login.php");

}
  if(isset($_POST['btnlogout']))
{
    session_unset();
    session_destroy();
    header('Location:login.php');
   
}
?>
<!-- Main Canvas -->
  <main class="md:ml-64 min-h-screen">
     <!-- TopNavBar -->
    <header
      class="w-full top-0 sticky z-40 bg-pink-50/80 dark:bg-slate-900/80 backdrop-blur-md border-b-2 border-pink-100 dark:border-pink-900/30 shadow-[0_4px_16px_rgba(224,64,160,0.15)] flex justify-between items-center px-6 py-4">
      <div class="flex items-center gap-8">
        <h1 class="text-2xl font-black text-pink-600 dark:text-pink-400 italic tracking-tight">Candy Finance</h1>
        <div class="hidden lg:flex relative items-center">
          <span class="material-symbols-outlined absolute left-3 text-slate-400" data-icon="search">search</span>
          <input
            class="pl-10 pr-4 py-2 bg-white/50 border-2 border-pink-100 rounded-full focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none w-64 text-sm"
            placeholder="Search users..." type="text" />
        </div>
      </div>
      <div class="flex items-center gap-4">
        <div class="hidden sm:flex gap-2">
          <button
            class="p-2 text-slate-500 hover:text-pink-500 hover:scale-110 transition-all cursor-pointer active:scale-95">
            <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
          </button>
          <button
            class="p-2 text-slate-500 hover:text-pink-500 hover:scale-110 transition-all cursor-pointer active:scale-95">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
          </button>
        </div>
        <button
         class="bg-white text-pink-600 border-2 border-pink-200 px-5 py-2 rounded-full font-bold hover:bg-pink-50 hover:shadow-lg transition-all active:scale-95 text-sm">
          <a href="logout.php" class="btn btn-primary" id="btnlogout" name="btnlogout" >Logout</a>
        </button>
        <div class="relative group">
          <img alt="User profile avatar with role badge"
            class="w-10 h-10 rounded-full border-2 border-pink-400 cursor-pointer shadow-sm hover:scale-105 transition-transform"
            data-alt="Close up portrait of a cheerful professional woman with a warm smile in a modern office environment"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAV4pTF8WFbLuBL6RtNvbsK0JeoUDBtpPL72dLY2NHlbjmQK2bt7T1eUU4dr9xGFEfhil1Rg4UlLKiVQl3jMvcl9h0Mnky4Jg3070f_ALC07XNGcz39B101y7l-QRmSn0S8_mhGrMhUh8mfacP9KYmpkRV0_yrWA5ATJ7p6OsVLK1rNLu8SEhjN0YDhRXLofaHtwhgkycnFWDH-l2qUUvhZbL7DC_fHuW0ZmwlupmOEi3xOUj7LaDHLzVfA743QmYA8tw3SHE1rRH0" />
          <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
        </div>
      </div>
    </header>