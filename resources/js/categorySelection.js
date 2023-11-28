export default function CategorySelection() {
    $(document).ready(function () {
        $("#category").change(function () {
            var category_id = $(this).val();

            if (category_id) {
                $.ajax({
                    type: "GET",
                    url: "/get-subcategories/" + category_id,
                    success: function (data) {
                        $("#subcategory").empty();
                        $("#subsubcategory").empty();

                        if (data.length > 0) {
                            $("#subcategory-container").show();
                            $("#subcategory").append(
                                '<option value="">Pasirinkite sub-kategoriją</option>'
                            );
                            $.each(data, function (key, value) {
                                $("#subcategory").append(
                                    '<option value="' +
                                        value.id +
                                        '">' +
                                        value.name +
                                        "</option>"
                                );
                            });
                        } else {
                            $("#subcategory-container").hide();
                        }
                    },
                });
            }
        });

        $("#subcategory").change(function () {
            var subcategory_id = $(this).val();

            if (subcategory_id) {
                $.ajax({
                    type: "GET",
                    url: "/get-subsubcategories/" + subcategory_id,
                    success: function (data) {
                        $("#subsubcategory").empty();

                        if (data.length > 0) {
                            $("#subsubcategory-container").show();
                            $("#subsubcategory").append(
                                '<option value="">Pasirinkite sub-sub-kategoriją</option>'
                            );
                            $.each(data, function (key, value) {
                                $("#subsubcategory").append(
                                    '<option value="' +
                                        value.id +
                                        '">' +
                                        value.name +
                                        "</option>"
                                );
                            });
                        } else {
                            $("#subsubcategory-container").hide();
                        }
                    },
                });
            }
        });
    });
}
