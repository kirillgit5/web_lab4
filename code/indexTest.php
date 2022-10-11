<?php
require_once "vendor/autoload.php";

$client = new Google_Client();
$client->setApplicationName('Google Sheets');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('credentions.json');

$service = new Google_Service_Sheets($client);
$id = "114VhkkmSdUTfpIDGm-yl1KCsBEuWsz_I0GYdpVFOhks";
$value = $service->spreadsheets_values->get($id, "A1:D")->getValues();
?>

<table>
    <tr>
        <td>Category</td>
        <td>email</td>
        <td>title</td>
        <td>description</td>
    </tr>
    <?php
    foreach ($value  as $arr) {
        echo "<tr>";
        foreach ($arr as $item) {
            echo "<td>" . $item . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
