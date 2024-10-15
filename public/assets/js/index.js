console.log("Hello from index.js");

$(function () {
    console.log("Hello from jquery");
    $("aside").hover(
        () => $(".main").css("margin-left", "220px"),
        () => $(".main").css("margin-left", "60px")
    );

    // Disable the submit button after the form is submitted
    $("form").on("submit", function (event) {
        const $form = $(this);
        if ($form.hasClass("submitted")) return false;
        $form.addClass("submitted");
        $form
            .find(":submit")
            .prop("disabled", true)
            .css("padding", "0")
            .html(
                `<img width="20px" height="20px" src="${window.location.origin}/images/loading.gif" />`
            );
    });

    // Hide the Autocomplete Items when the input is not focused
    $(document).on("click", function (event) {
        if ($(event.target).closest(".autocomplete-items").length === 0) {
            $(".autocomplete-items").hide();
            $(".autocomplete-items").html("");
        }
    });

    // Search Query Autocomplete
    function search(url, input) {
        const $input = $(input);
        const $autocompleteItems = $input.siblings(".autocomplete-items");
        $input.on("focus keyup", function () {
            const value = $(this).val();
            // console.log(value);
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    customer: $(`#customer`).val(),
                    country: $(`#country`).val(),
                    supplier: $(`#supplier`).val(),
                    column: $input.attr("id"),
                    search: value,
                },
                success(data) {
                    // console.log(data);
                    if (!data || !data.length) {
                        $autocompleteItems.hide();
                        return;
                    }
                    const html = data
                        .map(
                            (item) =>
                                `<div data-id="${item.id}" class="autocomplete-item cursor">${item}</div>`
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
        });
    }

    search("/search", "#customer");
    search("/search", "#supplier");
    search("/search", "#supplier_country");
    search("/search", "#country");
    search("/search", "#tax_type");
    search("/search", "#contact");
    search("/search", "#state");
    search("/search", "#part_number");

    // Fetch Details
    $("#customer")
        .siblings(".autocomplete-items")
        .on("click", ".autocomplete-item", function () {
            // console.log($(this).text());

            $.ajax({
                url: "/fetch-details",
                data: {
                    customer: $(this).text(),
                },
                type: "GET",
                success(data) {
                    console.log(data);
                    $("#customer").val(data.customer.name);
                    $("#nickname").val(data.customer.nickname);
                    $("#contact").val(data.contact.name);
                    $("#email").val(data.contact.email);
                    $("#department").val(data.contact.department);
                    $("#address1").val(data.customer.address.address1);
                    $("#address2").val(data.customer.address.address2);
                    $("#city").val(data.customer.address.city);
                    $("#pincode").val(data.customer.address.pincode);
                    $("#state").val(data.customer.address.state.name);
                    $("#country").val(data.customer.address.country.name);
                    $("#phone").val(data.contact.phone);
                    $("#mobile").val(data.contact.mobile);
                    $("#tax_type").val(data.customer.tax.type);
                    $("#gstn").val(data.customer.gstn);
                    $("#pan").val(data.customer.pan);
                    $("#state_code").val(data.customer.state_code);
                },
            });
        });

    $("#contact")
        .siblings(".autocomplete-items")
        .on("click", ".autocomplete-item", function () {
            // console.log($(this).text());

            $.ajax({
                url: "/fetch-details",
                data: {
                    contact: $(this).text(),
                },
                type: "GET",
                success(data) {
                    console.log(data);
                    $("#customer").val(data.customer.name);
                    $("#nickname").val(data.customer.nickname);
                    $("#contact").val(data.contact.name);
                    $("#email").val(data.contact.email);
                    $("#department").val(data.contact.department);
                    $("#address1").val(data.customer.address.address1);
                    $("#address2").val(data.customer.address.address2);
                    $("#city").val(data.customer.address.city);
                    $("#pincode").val(data.customer.address.pincode);
                    $("#state").val(data.customer.address.state.name);
                    $("#country").val(data.customer.address.country.name);
                    $("#phone").val(data.contact.phone);
                    $("#mobile").val(data.contact.mobile);
                    $("#tax_type").val(data.customer.tax.type);
                    $("#gstn").val(data.customer.gstn);
                    $("#pan").val(data.customer.pan);
                    $("#state_code").val(data.customer.state_code);
                },
            });
        });

    $("#part_number")
        .siblings(".autocomplete-items")
        .on("click", ".autocomplete-item", function () {
            // console.log($(this).text());

            $.ajax({
                url: "/fetch-details",
                data: {
                    part_number: $(this).text(),
                },
                type: "GET",
                success(data) {
                    console.log(data);
                    $("#part_number").val(data.product.part_number);
                    $("#description").val(data.product.description);
                    $("#supplier").val(data.product.supplier.name);
                    $("#supplier_country").val(
                        data.product.supplier.country.name
                    );
                    $("#supplier_fullname").val(data.product.supplier.fullname);
                    $("#hsn_code").val(data.product.hsn_code);
                    $("#unit_price").val(data.product.unit_price);
                    $("#purchase_price").val(data.product.purchase_price);
                    $("#sale_price").val(data.product.sale_price);
                },
            });
        });

    $("#supplier")
        .siblings(".autocomplete-items")
        .on("click", ".autocomplete-item", function () {
            // console.log($(this).text());

            $.ajax({
                url: "/fetch-details",
                data: {
                    supplier: $(this).text(),
                },
                type: "GET",
                success(data) {
                    console.log(data);
                    $("#supplier").val(data.supplier.name);
                    $("#supplier_country").val(data.supplier.country.name);
                    $("#supplier_fullname").val(data.supplier.fullname);
                },
            });
        });

    // Event Listeners
    $("#gstn").on("input", function () {
        $("#pan").val(this.value.slice(2, 12));
        $("#state_code").val(this.value.slice(0, 2));
    });

    $("#state").on("input", function () {
        const value = this.value.toLowerCase();
        const isDelhi = value === "delhi";

        $("#tax_type").val(isDelhi ? "GST" : "IGST");
    });

    $("#state")
        .siblings(".autocomplete-items")
        .on("click", ".autocomplete-item", function () {
            const value = $(this).text().toLowerCase();
            const isDelhi = value === "delhi";

            $("#tax_type").val(isDelhi ? "GST" : "IGST");
        });

    $("#unit_price").on("input", function () {
        $("#sale_price").val(this.value);
        $("#purchase_price").val(this.value);
    });

    $(
        "#price_basic_term, #payment_term, #handling_charges_term, #gst_term, #delivery_term, #pnf_charges_term, #freight_charges_term, #warranty_term, #validity_quote_term, #po_conditions_term, #special_conditions_term"
    ).on("change", function () {
        console.log(this.value);
        $("#update-quote-form").submit();
    });

    $("#hide_price").on("change", function () {
        console.log(this.checked);
        $.ajax({
            url: $("#update-quote-form").attr("action"),
            data: {
                hide_price: this.checked,
                _token: $("#update-quote-form")
                    .find("input[name=_token]")
                    .val(),
            },
            type: "PATCH",
            success(data) {
                console.log(data);
            },
            error(error) {
                console.error(error);
            },
        });
    });

    // FORM SUBMISSION
    $("#update-quote-form").on("submit", function (event) {
        event.preventDefault();
        let url = $(this).attr("action");
        $.ajax({
            url: url,
            data: $(this).serialize(),
            type: "PATCH",
            success(data) {
                console.log(data);
            },
            error(error) {
                console.error(error);
            },
        });
    });

    // EVENT LISTENERS
    $("#due_date, #quote_date, #enquiry_date, #enquiry_ref").on(
        "change input",
        function () {
            console.log(this.value);
            $.ajax({
                url: $("#update-quote-form").attr("action"),
                data: {
                    due_date: $("#due_date").val(),
                    quote_date: $("#quote_date").val(),
                    enquiry_date: $("#enquiry_date").val(),
                    enquiry_ref: $("#enquiry_ref").val(),
                    _token: $("#update-quote-form")
                        .find("input[name=_token]")
                        .val(),
                },
                type: "PATCH",
                success(data) {
                    console.log(data);
                },
                error(error) {
                    console.error(error);
                },
            });
        }
    );
});

$("#preview-pdf").on("click", function (event) {
    event.preventDefault();
    console.log("hello");
    console.log(window.location.href);

    $.ajax({
        url: `${window.location.href}/pdf`,
        type: "GET",
        success(data) {
            if (data) {
                console.log(data);
                $(".pdf-preview-box embed").attr(
                    "src",
                    `${window.location.href}/pdf`
                );
                $(".pdf-preview-box").show();
            }
        },
        error(error) {
            console.error(error);
        },
    });
});

$("#close-pdf-preview").on("click", function () {
    $(".pdf-preview-box").hide();
});

$(".item-quantity").on("input", function () {
    console.log(this.value);
    // $("#update-quote-form").submit();
});
