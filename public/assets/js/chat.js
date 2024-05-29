// import axios from "axios";

// import e = require("cors");

// import axios from "axios";

$(document).on("click", "#back", function () {
    showHideChatBox(false);
});

// $(document).on("click", ".friends-right", function () {
//     let id = $(this).attr("data-id");
//     let name = $(this).attr("data-name");
//     let avatar = $(this).attr("data-avatar");
//     // Set chat room properties
//     $(".friend-name").html(name);
//     $(".header-img").html(
//         `<img src="${avatar}" class="w-10 h-10 rounded-full object-cover"/>`
//     );

//     createRoom(id, avatar);
//     console.log(id);
//     console.log(avatar);
// });
$(document).on("click", ".friends", function () {
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let avatar = $(this).attr("data-avatar");
    // Set chat room properties
    $(".friend-name").html(name);
    $(".header-img").html(
        `<img src="${avatar}" class="w-10 h-10 rounded-full object-cover"/>`
    );

    createRoom(id, avatar);
    console.log(id);
    console.log(avatar);
});

function refreshFriendList() {
    var loadUrl = document
        .getElementById("chat-list")
        .getAttribute("data-load-url");
    $.ajax({
        url: loadUrl,
        type: "GET",
        data: {},
        success: function (response) {
            var friendsWithId = response.friendsWithId;

            // Tambahkan log untuk memeriksa respons
            console.log("Response:", response);

            $("#chat-list").empty();
            $.each(friendsWithId, function (index, friend) {
                // Tambahkan log untuk memeriksa setiap friend object setelah modifikasi
                console.log("Friend:", friend);

                var avatar = friend.avatar
                    ? "/profil/" + friend.avatar
                    : "/images/defaultprofile.png";
                var friendHtml = `<div class="friends tes" data-id="${friend.id}" data-name="${friend.dokterhewan.nama}" data-avatar="${avatar}">`;
                friendHtml +=
                    '<div class="profile friends-photo border-2 border-white">';
                friendHtml += `<img src="${avatar}" class="w-10 h-10 rounded-full object-cover" alt="">`;
                friendHtml += "</div>";
                friendHtml += '<div class="friends-credent">';
                friendHtml += `<span class="friends-name">${friend.dokterhewan.nama}</span>`;
                friendHtml += "</div>";
                friendHtml += "</div>";
                // friendHtml += "@php";
                // friendHtml += `dd(${friend.});`;
                // friendHtml += "@endphp";
                $("#chat-list").append(friendHtml);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error saat merefresh daftar teman:", error);
        },
    });
}

// Mengatur event listener untuk item teman yang diklik
$(document).on("click", ".kanan", function () {
    refreshFriendList();
    refreshFriendList();
});

// function createRoom(friendId, avatar) {
//     let url = document.getElementById("room-url").value;
//     let formData = new FormData();
//     formData.append("friend_id", friendId);

//     // Keluar dari ruangan sebelumnya (jika ada)
//     if (previousRoomId) {
//         Echo.leave(`chat.${previousRoomId}`);
//     }

//     axios.post(url, formData).then((res) => {
//         let room = res.data.data;
//         let roomId = room.id;
//         previousRoomId = roomId;
//         loadMessage(roomId, friendId, avatar);

//         Echo.join(`chat.${roomId}`)
//             .here((users) => {
//                 users.forEach((user) => {
//                     console.log(user.nama_pengguna + " telah bergabung");
//                 });
//                 document.querySelector("#type-area").addEventListener("keydown", function (e) {
//                     if (e.key === "Enter") {
//                         let input = this.value;
//                         if (input !== "") {
//                             sendMessage(input, previousRoomId);
//                             this.value = "";
//                         }
//                     }
//                 });
//             })
//             .listen("SendMessage", (e) => {
//                 if (e.userId == friendId) {
//                     handelLeftMessage(e.message, avatar);
//                 }
//             })
//             .joining((user) => {
//                 console.log(user.nama_pengguna + " telah bergabung");
//             })
//             .leaving((user) => {
//                 console.log(user.nama_pengguna + " telah meninggalkan");
//             })
//             .error((error) => {
//                 console.error(error);
//             });

//         showHideChatBox(true);
//     }).catch((error) => {
//         console.error("Gagal membuat ruang:", error);
//     });
// }

/*
    handel to left message from friend
 */
function handelLeftMessage(message, avatar) {
    let html =
        '<div class="friends-chat">\n' +
        '                <div class="profile friends-photo border-2 border-white">\n' +
        '                    <img src="' +
        avatar +
        '" alt="" class="w-10 h-10 rounded-full object-cover">\n' +
        "                </div>\n" +
        '                <div class="friends-chat-content">\n' +
        '                    <p class="friends-chat-name friends-chat-balloon">' +
        message +
        "</p>\n" +
        "                </div>\n" +
        "            </div>";

    var chatBody = document.querySelector("#chat-area");
    chatBody.insertAdjacentHTML("beforeend", html);
    chatBody.scrollTo({
        left: 0,
        top: chatBody.scrollHeight,
        behavior: "smooth",
    });
}

/*
    handel show hide chatbox
 */
function showHideChatBox(show) {
    if (show == true) {
        document.getElementById("main-right").classList.remove("hidden");
        document.getElementById("main-empty").classList.add("hidden");
    } else {
        document.getElementById("main-right").classList.add("hidden");
        document.getElementById("main-empty").classList.remove("hidden");
    }
}
let previousRoomId = null;
function createRoom(friendId, avatar) {
    let url = document.getElementById("room-url").value;
    console.log(url);
    let formData = new FormData();
    formData.append("friend_id", friendId);

    // Keluar dari ruangan sebelumnya (jika ada)
    if (previousRoomId) {
        console.log(previousRoomId);
        Echo.leave(`chat.${previousRoomId}`);
    }

    // Kirim permintaan untuk membuat ruang dengan Axios
    axios
        .post(url, formData)
        .then((res) => {
            // Tanggapan berhasil
            console.log(res);
            let room = res.data.data;
            let roomId = room.id;
            // Simpan ID ruangan saat ini sebagai ruangan sebelumnya
            previousRoomId = roomId;
            console.log(previousRoomId);
            loadMessage(roomId, friendId, avatar);

            // Bergabung ke saluran siaran chat.{roomId}
            Echo.join(`chat.${roomId}`)
                .here((users) => {
                    console.log("Pengguna yang ada di dalam ruang:");
                    users.forEach((user) => {
                        console.log(user.nama_pengguna + " telah bergabung");
                        // console.log("inirumm" + roomId);
                    });
                    document
                        .querySelector("#type-area")
                        .addEventListener("keydown", function (e) {
                            if (e.key === "Enter") {
                                let input = this.value;
                                if (input !== "") {
                                    // console.log("kon" + roomId);
                                    sendMessage(input, previousRoomId);
                                    this.value = "";
                                }
                            }
                        });
                })
                .listen("SendMessage", (e) => {
                    if (e.userId == friendId) {
                        handelLeftMessage(e.message, avatar);
                    }
                })
                .joining((user) => {
                    console.log(user.nama_pengguna + " telah bergabung");
                    document
                        .querySelectorAll(".friends-right")
                        .forEach(function (el) {
                            if (el.getAttribute("data-id") == user.id) {
                                el.querySelector(
                                    ".friends-credent > .friend-status"
                                ).innerHTML =
                                    "<p class='color:green'>Online</p>";
                            }
                        });
                })
                .leaving((user) => {
                    console.log(user.nama_pengguna + " telah meninggalkan");
                })
                .error((error) => {
                    console.error(error);
                });

            showHideChatBox(true);
        })
        .catch((error) => {
            console.error("Gagal membuat ruang:", error);
        });
}

function loadMessage(roomId, friendId, avatar) {
    var chatBody = document.querySelector("#chat-area");
    chatBody.innerHTML = ""; // Membersihkan isi chatBody

    let url = document.getElementById("load-chat-url").value;
    url = url.replace(":roomId", roomId);

    axios
        .get(url)
        .then(function (res) {
            let data = res.data.data;

            if (data.length > 0) {
                data.forEach(function (value) {
                    if (value.id_pengguna == friendId) {
                        // Pesan dari teman
                        handelLeftMessage(value.pesan, avatar);
                    } else {
                        // Pesan dari pengguna
                        let html =
                            '<div id="your-chat" class="your-chat">\n' +
                            '    <p class="your-chat-balloon">' +
                            value.pesan +
                            "</p>\n" +
                            "</div>";

                        chatBody.insertAdjacentHTML("beforeend", html);
                        chatBody.scrollTo({
                            left: 0,
                            top: chatBody.scrollHeight,
                            behavior: "smooth",
                        });
                    }
                });
            } else {
                // // Tidak ada pesan
                chatBody.innerHTML =
                    "<p style='text-align:center;'>Tidak Memiliki Pesan</p>";
            }
        })
        .catch(function (error) {
            console.error("Gagal memuat pesan:", error);
        });
}

function sendMessage(message, roomId) {
    let url = document.getElementById("messsage-url").value;
    let formData = new FormData();
    formData.append("roomId", roomId);
    // console.log(roomId);
    formData.append("message", message);
    axios
        .post(url, formData)
        .then(function (res) {
            // Komentari baris ini untuk menyembunyikan respons dari konsol
            // console.log(res);
            var emptyMessage = document.querySelector(
                "#chat-area p[style='text-align:center;']"
            );
            if (emptyMessage) {
                emptyMessage.remove();
            }
            let html =
                '<div id="your-chat" class="your-chat">\n' +
                '    <p class="your-chat-balloon">' +
                message +
                "</p>\n" +
                "</div>";
            var chatBody = document.querySelector("#chat-area");
            chatBody.insertAdjacentHTML("beforeend", html);
            chatBody.scrollTo({
                left: 0,
                top: chatBody.scrollHeight,
                behavior: "smooth",
            });
        })
        .catch(function (error) {
            // Handle error
            console.error("Error sending message:", error);
        });
}
