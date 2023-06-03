<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <title>PDF Document</title>

    <style>
        #pdf {
            min-height: 10vh;
            margin: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid black;
        }

        th:first-child,
        td:first-child {
            width: 10px;
        }

        th {
            background-color: #f2f2f2;
            border-right: 1px solid black;
        }

        td {
            border-right: 1px solid black;
        }


        #hari tr {
            width: 22px;
        }

        #titikdua {
            width: 2px;
        }
    </style>
</head>

<body>

    <section id="pdf">
        <center>
            <h2>Data Kafe Surabaya</h2>
        </center>

        <table id="data-table">
            <tr>
                <th class="no">No</th>
                <th>Nama Kafe</th>
                <th>Alamat kafe</th>
                <th>Koordinat</th>
                <th>Instagram</th>
                <th>Jam Oprasional</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>
                    <table id="jam">
                        <tr>
                            <td id="hari">Hari-hari</td>
                            <td id="titikdua">:</td>
                            <td>07:00 - 23:00</td>

                        </tr>
                    </table>
                </td>
            </tr>



        </table>

        <?php
        $url = "/api/aprv"; // Ganti dengan URL yang sesuai

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if ($data) {
            echo "<table>";
            echo "<tr><th>Property 1</th><th>Property 2</th><th>Property 3</th></tr>";

            foreach ($data['features'] as $feature) {
                $properties = $feature['properties'];
                echo "<tr>";
                echo "<td>{$properties['property1']}</td>";
                echo "<td>{$properties['property2']}</td>";
                echo "<td>{$properties['property3']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Failed to retrieve data.";
        }
        ?>

    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/api/aprv",
                dataType: "json",
                success: function(data) {
                    // Memasukkan properti GeoJSON ke dalam tabel
                    data.features.forEach(function(feature) {
                        var properties = feature.properties;
                        console.log(properties);
                        var row = $("<tr></tr>");



                        $("#data-table").append(row);
                    });
                }
            });
        });
    </script>

</body>

</html>