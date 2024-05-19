$(document).ready(function () {
    $("#closeBtn").on("click", function () {
        $("#model").addClass("hidden");
        $("#model").removeClass("show");
        $(".cover").addClass("hidden");
        $(".cover").removeClass("show");
    });
    setInterval(function () {
        $("#model").addClass("show");
        $("#model").removeClass("hidden");
        $(".cover").addClass("show");
        $(".cover").removeClass("hidden");
    }, 300000);

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

    $(".slide-images").on("click", function () {
        $.ajax({
            type: "GET",
            url: window.location.origin + "/slide-images/" + $(this).data("id"),
            success: function () {
                console.log("success");
            },
        });
    });
});
