$(document).ready(function () {
    $(".selected").on("click", function () {
        $("#options-container").toggleClass("active")
    })
    var optionList = $(".option");
    optionList.each(function () {
        $(this).on("click", function () {
            $(".selected")[0].innerText = $(this)[0].innerText;
            $(".selected")[0].id = "venue-" + $(this)[0].id;
            $("#options-container").removeClass("active");
        })
    })

    $("#search-box").on("keyup", function (e) {
        filterList(e.target.value);
    })

    const filterList = searchTeam => {
        searchTeam = searchTeam.toLowerCase();
        optionList.each(function () {
            let label = $(this)[0].firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTeam) != -1) {
                $(this)[0].style.display = "block";
            } else {
                $(this)[0].style.display = "none";
            }
        })
    }

    $(".selected-route").on("click", function () {
        $("#options-container-route").toggleClass("active")
    })
    var optionListRoute = $(".option-route");
    optionListRoute.each(function () {
        $(this).on("click", function () {
            $(".selected-route")[0].innerText = $(this)[0].innerText;
            $(".selected-route")[0].id = "route-" + $(this)[0].id;
            $("#options-container-route").removeClass("active");
        })
    })

    $("#search-box-route").on("keyup", function (e) {
        filterListRoute(e.target.value);
    })

    const filterListRoute = searchTeamRoute => {
        searchTeamRoute = searchTeamRoute.toLowerCase();
        optionListRoute.each(function () {
            let label = $(this)[0].firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTeamRoute) != -1) {
                $(this)[0].style.display = "block";
            } else {
                $(this)[0].style.display = "none";
            }
        })
    }
});