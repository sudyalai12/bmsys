console.log("Javascript Loaded");

$(function () {
    console.log("JQuery Loaded");
    $("aside").hover(
        () => $(".main").css("margin-left", "220px"),
        () => $(".main").css("margin-left", "60px")
    );

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
                        country: $("#country").val(),
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
            }, 0);
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
    search("/search", "#country");
    search("/search", "#state");
    search("/search", "#tax_type");
    search("/search", "#supplier");
    search("/search", "#supplier_country");
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

                        if (inputId == "supplier") {
                            $("#supplier").val(data.supplier);
                            $("#supplier_country").val(data.supplier_country);
                            // $("#part_number").val(data.part_number);
                            // $("#hsn_code").val(data.hsn_code);
                            // $("#description").val(data.description);
                            // $("#unit_price").val(data.unit_price);
                            // $("#sale_price").val(data.sale_price);
                            // $("#purchase_price").val(data.purchase_price);
                        } else {
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
                            data.country
                                ? $("#country").val(data.country)
                                : "India";
                            $("#phone").val(data.phone);
                            $("#mobile").val(data.mobile);
                            data.tax_type
                                ? $("#tax_type").val(data.tax_type)
                                : "IGST";
                            $("#gstn").val(data.gstn);
                            $("#pan").val(data.pan);
                            $("#state_code").val(data.state_code);
                        }
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
        "#nickname": 6,
        "#department": 50,
        "#email": 50,
        "#contact": 50,
        "#address1": 100,
        "#address2": 100,
        "#city": 30,
        "#pincode": 6,
        "#state": 30,
        "#country": 30,
        "#supplier_country": 30,
        "#phone": 16,
        "#mobile": 16,
        "#tax_type": 15,
        "#part_number": 30,
        "#hsn_code": 30,
        "#supplier": 50,
        "#description": 255,
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

    $("#state").on("input", function () {
        const value = this.value.toLowerCase();
        const isDelhi = value === "delhi";

        $("#tax_type").val(isDelhi ? "GST" : "IGST");
    });

    $("#unit_price").on("input", function () {
        $("#sale_price").val(this.value);
    });

    $(
        "#price_basic_term, #payment_term, #handling_charges_term, #gst_term, #delivery_term, #pnf_charges_term, #freight_charges_term, #warranty_term, #validity_quote_term, #po_conditions_term, #special_conditions_term"
    ).on("change", function () {
        console.log(this.value);
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

    $("#due_date, #enquiry_date").on("change", function () {
        console.log(this.value);
        $.ajax({
            url: $("#update-quote-form").attr("action"),
            // send {due_date: this.value} with the form serialize data
            data: {
                due_date: $("#due_date").val(),
                enquiry_date: $("#enquiry_date").val(),
                _token: $("#update-quote-form")
                    .find("input[name=_token]")
                    .val(),
            },
            // data: $("#update-quote-form").serialize(),
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

// countries.forEach((country) => {
//     for (const key in country) {
//         if(key == "iso3" || key == "iso2" || key == "capital" || key == "capital" || key == "tld" || key == "native" || key == "region" || key == "region_id" || key == "subregion" || key == "subregion_id" || key == "nationality" || key == "timezones" || key == "translations" || key == "latitude" || key == "longitude" || key == "emoji" || key == "emojiU") {
//             delete country[key];
//         }
//     }
// });

// console.log(countries)
