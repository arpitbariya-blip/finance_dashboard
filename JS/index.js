setInterval(function () {
  fetch("user.php");
}, 30000);

// insert request resp//arpit

document
  .getElementById("addUserForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const res = await fetch("api/create.php", {
      method: "POST",
      body: formData,
    });

    const data = await res.json();

    if (data.status === "success") {
      alert("✅ User Added");

      document.getElementById("add-user-modal").classList.add("hidden");
      this.reset();
      loadTable();
    } else {
      alert("❌ " + data.message);
    }
  });
