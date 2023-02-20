<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Smart Card Reader Form</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js%22%3E"></script>
        <script>
            function readSmartCard() {
                $.ajax({
                    url: "",
                    method: "GET",
                    dataType: "json",
                    success: function (data) {
                        // process the data from the smart card reader
                        alert("Smart card data: " + data.data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + textStatus + " - " + errorThrown);
                    },
                });
            }
        </script>
        <script src="test.js"></script>
    </head>
    <body>
        <form>
            <input
                type="button"
                value="Read Smart Card"
                onclick="readSmartCard()"
            />
        </form>
    </body>
</html>
