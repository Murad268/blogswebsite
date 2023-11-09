window.addEventListener("DOMContentLoaded", () => {
    chandeMode();
    exitAccount();
    toggleNavbar();
});

function chandeMode() {
    const mode = document.querySelector(".navbar__last__mode__switch");
    const circle = document.querySelector(
        ".navbar__last__mode__switch__circle"
    );
    mode.addEventListener("click", () => {
        mode.classList.toggle("active");
        circle.classList.toggle("active");
    });
}
function toggleNavbar() {
    const hamburger = document.querySelector(".navbar__hamburger");
    const navbar__center = document.querySelector(".navbar__center");
    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navbar__center.classList.toggle("active");
    });
}

function exitAccount() {
    document
        .getElementById("exit-button")
        .addEventListener("click", function (e) {
            e.preventDefault();
            Swal.fire({
                title: "Çıxmaq istədiyinizə əminsiniz?",
                text: "Əgər çıxırsınızsa, yaddaşınızdakı məlumatlar itəcək!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Bəli, çıx!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "user/logout";
                }
            });
        });
}




ClassicEditor.create(document.querySelector("#editor"), {
    readOnly: true,
}).catch((error) => {
    console.error(error);
});
