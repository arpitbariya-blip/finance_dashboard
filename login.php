<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login | Candy Finance</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-variant": "#ffdad4",
              "surface-bright": "#fff8f6",
              "on-surface-variant": "#885046",
              "error-dim": "#821a01",
              "primary": "#9d4144",
              "surface-dim": "#ffcfc6",
              "on-secondary-fixed": "#194550",
              "secondary": "#3c6571",
              "surface-container-low": "#fff0ee",
              "secondary-container": "#bfe9f8",
              "on-primary": "#fff7f6",
              "surface-tint": "#9d4144",
              "on-secondary-container": "#2e5763",
              "on-primary-container": "#701f24",
              "on-tertiary": "#eefbff",
              "on-tertiary-fixed-variant": "#005b69",
              "primary-fixed": "#ffabaa",
              "on-error-container": "#671200",
              "surface-container": "#ffe9e5",
              "secondary-dim": "#2f5965",
              "on-primary-fixed-variant": "#7c282c",
              "inverse-surface": "#1e0705",
              "on-surface": "#53251d",
              "error": "#aa371c",
              "surface-container-lowest": "#ffffff",
              "on-secondary": "#f0fbff",
              "on-tertiary-fixed": "#003c46",
              "tertiary-dim": "#005c69",
              "surface-container-high": "#ffe2dc",
              "secondary-fixed": "#bfe9f8",
              "on-error": "#fff7f6",
              "secondary-fixed-dim": "#b1dbe9",
              "primary-fixed-dim": "#ff9696",
              "inverse-on-surface": "#be938b",
              "primary-dim": "#8e3639",
              "inverse-primary": "#fe8d8e",
              "outline-variant": "#e7a094",
              "background": "#fff8f6",
              "tertiary-container": "#63e5ff",
              "outline": "#a86b5f",
              "on-background": "#53251d",
              "tertiary": "#006978",
              "error-container": "#fa7150",
              "surface": "#fff8f6",
              "surface-container-highest": "#ffdad4",
              "primary-container": "#ffabaa",
              "on-tertiary-container": "#00515d",
              "tertiary-fixed-dim": "#52d7f0",
              "on-secondary-fixed-variant": "#38616d",
              "tertiary-fixed": "#63e5ff",
              "on-primary-fixed": "#530912"
            },
            fontFamily: {
              "headline": ["DM Sans"],
              "body": ["DM Sans"],
              "label": ["DM Sans"]
            },
            borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
        body { font-family: 'DM Sans', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .bouncy { transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .bouncy:hover { transform: scale(1.03); }
        .bouncy:active { transform: scale(0.95); }
        .candy-shadow { box-shadow: 0 10px 25px -5px rgba(157, 65, 68, 0.2); }
        .floating { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
    </style>
</head>
<body class="bg-background min-h-screen flex flex-col items-center justify-center overflow-hidden relative">
<!-- Playful Background Elements -->
<div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
<div class="absolute -top-24 -left-24 w-96 h-96 bg-primary-container opacity-20 rounded-full blur-3xl"></div>
<div class="absolute top-1/2 -right-24 w-80 h-80 bg-tertiary-container opacity-20 rounded-full blur-3xl"></div>
<div class="absolute bottom-[-10%] left-1/3 w-64 h-64 bg-secondary-container opacity-30 rounded-full blur-2xl"></div>
<!-- Floating Shapes -->
<div class="floating absolute top-20 right-[15%] w-16 h-16 bg-primary-fixed-dim rounded-2xl rotate-12 opacity-40"></div>
<div class="floating absolute bottom-40 left-[10%] w-12 h-12 bg-tertiary-fixed-dim rounded-full opacity-40" style="animation-delay: -2s;"></div>
<div class="floating absolute top-1/3 left-[5%] w-20 h-8 bg-secondary-fixed rounded-full -rotate-45 opacity-40" style="animation-delay: -4s;"></div>
</div>
<!-- Login Container -->
<div class="relative z-10 w-full max-w-md px-6">
<!-- Brand Header -->
<div class="text-center mb-8">
<div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-[22px] mb-4 candy-shadow bouncy">
<span class="material-symbols-outlined text-on-primary text-4xl" data-icon="payments" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<h1 class="text-4xl font-black text-on-background tracking-tight mb-2">Candy Finance</h1>
<p class="text-on-surface-variant font-medium">Sweetening your financial future</p>
</div>
<!-- Central Login Card -->
<div class="bg-surface-container-lowest border-2 border-surface-container-high p-8 rounded-[32px] candy-shadow">
<form class="space-y-6" id="loginForm">
<!-- Email Field -->
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface ml-2" for="email">Email Address</label>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
<span class="material-symbols-outlined text-xl" data-icon="alternate_email">alternate_email</span>
</div>
<input name="email" id="email" class="block w-full pl-11 pr-4 py-4 bg-surface border-2 border-transparent rounded-full text-on-surface placeholder-outline focus:outline-none focus:border-primary-fixed focus:ring-4 focus:ring-primary/10 transition-all font-medium" id="email" name="email" placeholder="hello@example.com" type="email"/>
</div>
</div>
<!-- role Field -->
<div class="space-y-2">
<div class="flex justify-between items-center ml-2">
<label class="block text-sm font-bold text-on-surface" for="role">Select Role:</label>
</div>
<div class="relative group">
 <select id="role" class="w-full px-4 py-3 rounded-xl border-2 border-pink-50 focus:border-pink-500 focus:ring-0 transition-all bg-pink-50/30 text-on-background">
                <option selected value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Analyst">Analyst</option>
                <option value="Viewer">Viewer</option>
              </select>
</div>
</div>

<!-- Submit Button -->
<button class="w-full py-4 bg-primary text-on-primary font-black text-lg rounded-full candy-shadow bouncy flex items-center justify-center gap-2 hover:bg-primary-dim" type="submit">
<span>Sign In</span>
<span class="material-symbols-outlined font-bold" data-icon="arrow_forward">arrow_forward</span>
</button>
<!-- Success Message (Hidden by default, used for visual simulation) -->
<div class="hidden flex items-center gap-3 p-4 bg-secondary-container rounded-2xl border-2 border-secondary/20">
<span class="material-symbols-outlined text-on-secondary-container" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<p class="text-sm font-bold text-on-secondary-container">Welcome back! Preparing your dashboard...</p>
</div>
</form>
<div class="mt-8 pt-6 border-t-2 border-surface-container flex flex-col items-center gap-4">
<p class="text-on-surface-variant font-medium text-sm">Don't have an account yet?</p>
<a class="w-full py-3 border-2 border-primary-fixed text-primary font-bold rounded-full text-center hover:bg-primary-container/20 transition-colors bouncy" href="register.html">
                    Create Account
                </a>
</div>
</div>
<!-- App Illustration/Visual Anchor -->
<div class="mt-12 flex justify-center opacity-60">
<div class="flex gap-4">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<div class="w-2 h-2 rounded-full bg-secondary"></div>
<div class="w-2 h-2 rounded-full bg-tertiary"></div>
</div>
</div>
</div>
<!-- Image Credits (Hidden Visual Context) -->
<div class="hidden">
<img data-alt="vibrant pink and purple abstract gradient background with soft mesh texture and playful lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1yC4iaHXyRwuIU0yZ_AU6l7w3Zp85AgLp-Qj6UDA-PXS60JKknmVnt-gGWlbcVQIaLp3J__y8hkv6QppGhnDk68AYT96oqtU9MuT0FzlBqktXCk_30J9cx5F3qQ_Nf_fHyLkowrycX1aU63n3KLhS2G29QBc_eJVyAefAm4ml79_BrOxRrlA-6c0BeZ6A9hhxlab0hTA4bhOijIXCUCdyAMHeZ9XsK75QoQ0fHUfrMytcPWrWKiymzu6GRlh1W_Eh7UlgLDLe4Z0"/>
</div>
<script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let email = document.getElementById("email").value;
    let password = document.getElementById("role").value;

    fetch("api/log_api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${email}&role=${role}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            window.location.href = "dashboard.php";
        } else {
            alert(data.message);
        }
    });
});
</script>
</body></html>