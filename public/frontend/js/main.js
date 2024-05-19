let models = document.querySelector(".models");
let closeModel = document.querySelectorAll(".models .close-model");
let companyBnt = document.getElementById("company-btn");
let companyModel = document.querySelector(".models .company");

setInterval(function () {
    model.classList.add("show");
    models.classList.add("show");
}, 300000);

closeModel.forEach((e) => {
    e.addEventListener("click", () => {
        models.classList.remove("show");
        loginModel.classList.remove("show");
        registerModel.classList.remove("show");
        companyModel.classList.remove("show");
        model.classList.remove("show");
    });
});

let loginBnt = document.getElementById("login-btn");
let registerBnt = document.getElementById("register-btn");
let registerModel = document.querySelector(".models .register");
let loginModel = document.querySelector(".models .login");
let model = document.getElementById("model");

loginBnt.addEventListener("click", () => {
    loginModel.classList.add("show");
    models.classList.add("show");
});

registerBnt.addEventListener("click", () => {
    registerModel.classList.add("show");
    models.classList.add("show");
});
companyBnt.addEventListener("click", () => {
    companyModel.classList.add("show");
    models.classList.add("show");
});

closeModel.forEach((e) => {
    e.addEventListener("click", () => {
        loginModel.classList.remove("show");
        registerModel.classList.remove("show");
        companyModel.classList.remove("show");
        models.classList.remove("show");
        model.classList.remove("show");
    });
});

$(document).ready(function () {
    $("#number").on("click", function () {
        $(this).removeClass("text-truncate");
        $(this).css("width", "fit-content");
        $.ajax({
            type: "GET",
            url: window.location.origin + "/show-phone/" + $(this).data("id"),
            success: function () {
                console.log("success");
            },
        });
    });

    // $(".slide-images").on("click", function () {
    //     $.ajax({
    //         type: "GET",
    //         url: window.location.origin + "/slide-images/" + $(this).data("id"),
    //         success: function () {
    //             console.log("success");
    //         },
    //     });
    // });
});
