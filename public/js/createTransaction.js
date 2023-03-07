$(document).ready(function () {
    //show other input only after transtype input
    $("#transTypeVal").change(() => {
        $(".showAfterType").attr("hidden", false);
    });

    //Set dateVal default date as today
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + month + "-" + day;
    $("#dateVal").val(today);
});
