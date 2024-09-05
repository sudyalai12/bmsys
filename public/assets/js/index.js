console.log("Javascript Loaded");

$(function () {
    console.log("JQuery Loaded");

    function search(url, input) {
        const $input = $(input);
        const $autocompleteItems = $input.siblings(".autocomplete-items");
        let timeoutId = null;
        $input.on("focus keyup", function () {
            const value = $input.val();
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        customer: $("#customer").val(),
                        supplier: $("#supplier").val(),
                        column: $input.attr("id"),
                        search: value,
                    },
                    success(data) {
                        if (!data || !data.length) {
                            $autocompleteItems.hide();
                            return;
                        }
                        // console.log(data);
                        const html = data
                            .map(
                                (item) =>
                                    `<div class="autocomplete-item cursor">${item}</div>`
                            )
                            .join("");
                        $autocompleteItems.html(html).show();

                        $autocompleteItems.on(
                            "click",
                            ".autocomplete-item",
                            function () {
                                $input.val($(this).text());
                                $autocompleteItems.hide();
                            }
                        );
                    },
                    error(error) {
                        console.error(error);
                    },
                });
            }, 500);
        });
    }

    $(document).on("click", function (event) {
        if ($(event.target).closest(".autocomplete-items").length === 0) {
            $(".autocomplete-items").hide();
            $(".autocomplete-items").html("");
        }
    });

    search("/search", "#customer");
    search("/search", "#contact");
    search("/search", "#address1");
    search("/search", "#department");
    search("/search", "#country");
    search("/search", "#supplier_country");
    search("/search", "#tax_type");
    search("/search", "#supplier");
    search("/search", "#part_number");

    function fetchDetails(inputId, dataKey) {
        $(`#${inputId}`)
            .siblings(".autocomplete-items")
            .on("click", ".autocomplete-item", function () {
                $.ajax({
                    url: "/fetch-details",
                    data: {
                        [dataKey]: $(this).text(),
                    },
                    type: "GET",
                    success(data) {
                        console.log(data);
                        inputId == "customer"
                            ? null
                            : $("#customer").val(data.customer);
                        $("#nickname").val(data.nickname);
                        $("#email").val(data.email);
                        inputId == "contact"
                            ? null
                            : $("#contact").val(data.contact);
                        $("#department").val(data.department);
                        inputId == "address1"
                            ? null
                            : $("#address1").val(data.address1);
                        $("#address2").val(data.address2);
                        $("#city").val(data.city);
                        $("#pincode").val(data.pincode);
                        $("#state").val(data.state);
                        data.country? $("#country").val(data.country) : "India";
                        $("#phone").val(data.phone);
                        $("#mobile").val(data.mobile);
                        data.tax_type? $("#tax_type").val(data.tax_type) : "IGST";
                        $("#gstn").val(data.gstn);
                        $("#pan").val(data.pan);
                        $("#state_code").val(data.state_code);
                        $("#supplier_country").val(data.supplier_country);
                    },
                });
            });
    }

    fetchDetails("customer", "customer");
    fetchDetails("address1", "address");
    fetchDetails("contact", "contact");
    fetchDetails("supplier", "supplier");

    const fields = {
        "#gstn": 15,
        "#pan": 10,
        "#state_code": 2,
        "#customer": 50,
        "#nickname": 4,
        "#department": 50,
        "#email": 50,
        "#contact": 50,
        "#address1": 100,
        "#address2": 100,
        "#city": 30,
        "#pincode": 6,
        "#state": 30,
        "#country": 30,
        "#phone": 15,
        "#mobile": 15,
        "#tax_type": 30,
        "#product": 50,
        "#supplier": 50,
    };

    Object.keys(fields).forEach((selector) => {
        $(selector)
            .on("input", function () {
                if (this && this.value) {
                    this.value = this.value.slice(0, fields[selector]);
                }
            })
            .data("maxlength", fields[selector]);
    });

    $("#gstn").on("input", function () {
        $("#pan").val(this.value.slice(2, 12));
        $("#state_code").val(this.value.slice(0, 2));
    });

    $("#price_basis, #delivery").on("change", function () {
        $("#update-quote-form").submit();
    });
    $("#update-quote-form").on("submit", function (event) {
        event.preventDefault();
        let url = $(this).attr("action");
        $.ajax({
            url: url,
            data: $(this).serialize(),
            type: "POST",
            success(data) {
                console.log(data);
            },
            error(error) {
                console.error(error);
            },
        });
    });
});
