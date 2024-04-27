// import axios from "axios";

document.addEventListener("DOMContentLoaded", function (e) {
    // handel click friend
    document.querySelectorAll(".friends").forEach(function (el) {
        el.addEventListener("click", function () {
            let id = el.getAttribute("data-id");
            let name = el.getAttribute("data-name");
            let avatar = el.getAttribute("data-avatar");
            // set chat room properties
            document.querySelector(".friend-name").innerHTML = name;
            document.querySelector(
                ".header-img"
            ).innerHTML = `<img src="${avatar}" />`;

            createRoom(id);
            console.log(id);
        });
    });
});

/*
    handel send message function
 */
function sendMessage(message, roomId) {
    let url = document.getElementById("messsage-url").value;
    let formData = new FormData();
    formData.append("roomId", roomId);
    formData.append("message", message);

    axios.post(url, formData).then(function (res) {
        console.log(res);
        let html =
            ' <div id="your-chat" class="your-chat">\n' +
            '                <p class="your-chat-balloon">' +
            message +
            "</p>\n" +
            "            </div>";

        var chatBody = document.querySelector("#chat-area");
        chatBody.insertAdjacentHTML("beforeend", html);
        chatBody.scrollTo({
            left: 0,
            top: chatBody.scrollHeight,
            behavior: "smooth",
        });
    });
}

/*
    handel to left message from friend
 */
function handelLeftMessage(message, avatar) {
    let html =
        '<div class="friends-chat">\n' +
        '                <div class="profile friends-chat-photo">\n' +
        '                    <img src="' +
        avatar +
        '" alt="">\n' +
        "                </div>\n" +
        '                <div class="friends-chat-content">\n' +
        '                    <p class="friends-chat-name">' +
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

function createRoom(friendId) {
    let url = document.getElementById("room-url").value;
    let formData = new FormData();
    formData.append("friend_id", friendId);

    // Kirim permintaan untuk membuat ruang dengan Axios
    axios
        .post(url, formData)
        .then((res) => {
            // Tanggapan berhasil
            let room = res.data.data;
            let roomId = room.id;
            console.log(room);

            // Bergabung ke saluran siaran chat.{roomId}
            Echo.join(`chat.${roomId}`)
                .here((users) => {
                    // Panggilan kembali saat pengguna bergabung dengan saluran
                    console.log("Pengguna yang ada di dalam ruang:");
                    users.forEach((user) => {
                        console.log(user.nama_pengguna + " telah bergabung");
                    });
                    document
                        .querySelector("#type-area")
                        .addEventListener("keydown", function (e) {
                            if (e.key === "Enter") {
                                let input = this.value;
                                if (input !== "") {
                                    sendMessage(input, roomId);

                                    this.value = "";
                                }
                            }
                        });
                })
                .joining((user) => {
                    // Panggilan kembali saat pengguna baru bergabung dengan saluran
                    console.log(user.nama_pengguna + " telah bergabung");
                })
                .leaving((user) => {
                    // Panggilan kembali saat pengguna meninggalkan saluran
                    console.log(user.nama_pengguna + " telah meninggalkan");
                })
                .error((error) => {
                    console.error(error);
                });

            showHideChatBox(true);
        })
        .catch((error) => {
            // Tanggapan gagal
            console.error("Gagal membuat ruang:", error);
        });
}
