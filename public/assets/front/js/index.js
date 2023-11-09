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
                    window.location.href = "/user/logout";
                }
            });
        });
}

function deleteComment(e) {
    document
        .getElementById("delete-button")
        .addEventListener("click", function (e) {
            e.preventDefault();
            let id = e.target.getAttribute("data-id")
            Swal.fire({
                title: "Komment silmək istədiyinizdən əminsinizmi?",
                text: "Bu addımın geri dönüşü yoxdur",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Bəli, sil!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/blog/comment_delete/" + id;
                }
            });
        });
}



// ClassicEditor.create(document.querySelector("#editor"), {
//     readOnly: true,
// }).catch((error) => {
//     console.error(error);
// });

async function likeBlog(url) {
    const res = await fetch(url);
    return await res.text();
}

const like = document.querySelector(".like");
const comments = document.querySelector(".comments");
const blog_id = comments.getAttribute("data-id");
if (like) {
    const likes_count = document.querySelector(".likes_count");

    like.addEventListener("click", (e) => {
        let id = e.target.getAttribute("data-id");
        if (e.target.classList.contains("fa-regular")) {
            e.target.classList.remove("fa-regular");
            e.target.classList.add("fa");
            likes_count.innerHTML = +likes_count.innerHTML + 1;
            likeBlog("http://127.0.0.1:8000/blog/like/" + id);
        } else {
            e.target.classList.remove("fa");
            e.target.classList.add("fa-regular");
            likes_count.innerHTML = +likes_count.innerHTML - 1;
            likeBlog("http://127.0.0.1:8000/blog/dislike/" + id);
        }
    });
}






