document.addEventListener("DOMContentLoaded", function (event) {
    var categorySelect = document.querySelector("#category");
    var transTypeSelect = document.querySelector("#transactionType");
    var dateSelect = document.querySelector("#transactionDate");

    //Set dateVal default date as today
    if (dateSelect.value == null || dateSelect.value == "") {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + month + "-" + day;
        dateSelect.value = today;
    }
    console.log(transTypeSelect.value);
    if (transTypeSelect.value != "") {
        showAfterTypeEleArr = document.querySelectorAll(".showAfterType");
        for (let i = 0; i < showAfterTypeEleArr.length; i++) {
            showAfterTypeEleArr[i].style.display = "block";
        }
    }

    transTypeSelect.addEventListener("change", () => {
        //show other input only after transtype input
        showAfterTypeEleArr = document.querySelectorAll(".showAfterType");
        for (let i = 0; i < showAfterTypeEleArr.length; i++) {
            showAfterTypeEleArr[i].style.display = "block";
        }

        // to show respective category of transaction
        // while (categorySelect.lastChild) {
        //     categorySelect.removeChild(categorySelect.lastChild);
        // }
        categorySelect.innerHTML = "";

        toAppend = "<option disabled selected>Please select</option>";
        for (let i = 0; i < categoryData.length; i++) {
            if (transTypeSelect.value == categoryData[i]["type"]) {
                toAppend =
                    toAppend +
                    '<option value="' +
                    categoryData[i]["id"] +
                    '"> ' +
                    categoryData[i]["name"] +
                    "</option>";
            }
        }
        categorySelect.innerHTML = toAppend;
    });
});
