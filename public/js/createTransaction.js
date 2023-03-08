$(document).ready(function () {
    $("#transTypeVal").change(() => {
        //show other input only after transtype input
        $(".showAfterType").attr("hidden", false);

        // to show respective category of transaction
        $("#categoryVal").empty();
        $("#categoryVal").append(
            "<option disabled selected>Please select</option>"
        );
        for (let i = 0; i < categoryData.length; i++) {
            if ($("#transTypeVal").val() == categoryData[i]["type"]) {
                $("#categoryVal").append(
                    '<option value="' +
                        categoryData[i]["id"] +
                        '"> ' +
                        categoryData[i]["name"] +
                        "</option>"
                );
            }
        }
    });

    //Set dateVal default date as today
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + month + "-" + day;
    $("#dateVal").val(today);
});
