window.addEventListener("DOMContentLoaded", () => {
    exitAccount();
    toggleNavbar();
});

function toggleNavbar() {
    const hamburger = document.querySelector(".navbar__hamburger");
    const navbar__center = document.querySelector(".navbar__center");
    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navbar__center.classList.toggle("active");
    });
}

function exitAccount() {
    let locale = document.documentElement.getAttribute("data-locale");
    if (document.getElementById("exit-button")) {
        document
            .getElementById("exit-button")
            .addEventListener("click", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: translate()[locale].title,
                    text: translate()[locale].exitMessage,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: translate()[locale].confirmButtonText,
                    cancelButtonText: translate()[locale].exit,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/user/logout";
                    }
                });
            });
    }
}

function translate() {
    const translations = {
        en: {
            title: "Are you sure you want to log out?",
            exitMessage:
                "If you log out, the data in your memory will be lost!",
            confirmButtonText: "Yes, get out!",
            exit: "no!",
        },
        ru: {
            title: "Вы уверены, что хотите выйти?",
            exitMessage:
                "Если вы выйдете, данные в вашей памяти будут потеряны!",
            confirmButtonText: "Да, выход!",
            exit: "нет!",
        },
        az: {
            title: "Çıxmaq istədiyinizə əminsiniz?",
            exitMessage: "Çıxsanız, yaddaşınızdakı məlumatlar itiriləcək!",
            confirmButtonText: "Bəli, çıx get!",
            exit: "xeyr!",
        },
    };

    return translations;
}

function translateDelete() {
    const deleteTranslations = {
        en: {
            title: "Are you sure you want to delete this comment?",
            message: "This action is irreversible.",
            confirmButtonText: "Yes, delete!",
        },
        ru: {
            title: "Вы уверены, что хотите удалить этот комментарий?",
            message: "Это действие нельзя отменить.",
            confirmButtonText: "Да, удалить!",
        },
        az: {
            title: "Bu şərhi silmək istədiyinizə əminsiniz?",
            message: "Bu əməliyyat geri qaytarıla bilməz.",
            confirmButtonText: "Bəli, sil!",
        },
    };

    return deleteTranslations;
}

function deleteComment(e) {
    if (document.getElementById("delete-button")) {
        document
            .getElementById("delete-button")
            .addEventListener("click", function (e) {
                e.preventDefault();
                let id = e.target.getAttribute("data-id");

                const locale =
                    document.documentElement.getAttribute("data-locale");
                const translations = translateDelete();

                Swal.fire({
                    title: translations[locale].title,
                    text: translations[locale].message,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: translations[locale].confirmButtonText,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/blog/comment_delete/" + id;
                    }
                });
            });
    }
}

if (document.querySelector("#editor")) {
    ClassicEditor.create(document.querySelector("#editor"), {
        readOnly: true,
    }).catch((error) => {
        console.error(error);
    });
}

async function likeBlog(url) {
    const res = await fetch(url);
    return await res.text();
}

const like = document.querySelector(".like");
const comments = document.querySelector(".comments");
const follow = document.querySelector(".follow");
if (like && comments) {
    const blog_id = comments.getAttribute("data-id");
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
if (follow) {
    follow.addEventListener("click", (e) => {
        let id = e.target.getAttribute("data-id");
        if (e.target.classList.contains("btn-dark")) {
            e.target.classList.remove("btn-dark");
            e.target.classList.add("btn-success");
            e.target.textContent = "unfollow";
            likeBlog("http://127.0.0.1:8000/users/users/user/follow/" + id);
        } else {
            e.target.classList.remove("btn-success");
            e.target.classList.add("btn-dark");
            likeBlog("http://127.0.0.1:8000/users/users/user/unfollow/" + id);
            e.target.textContent = "follow";
        }
    });
}
