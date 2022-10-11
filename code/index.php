<?php
require_once "vendor/autoload.php";

$client = new Google_Client();
$client->setApplicationName('Google Sheets');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('credentions.json');

$service = new Google_Service_Sheets($client);

$id = "114VhkkmSdUTfpIDGm-yl1KCsBEuWsz_I0GYdpVFOhks";
$value = $service->spreadsheets_values->get($id, "A1:D")->getValues();

$valueRange = new Google_Service_Sheets_ValueRange();
$valueRange->setValues([[$_POST["category"], $_POST["email"], $_POST["title"], $_POST["description"]]]);

$currentColumn = count($value);
$nextColumn = $currentColumn + 1;

$service->spreadsheets_values->update($id, "A$nextColumn:D", $valueRange, ["valueInputOption" => "RAW"]);
$value[] = [
        $_POST["category"],
        $_POST["email"],
        $_POST["title"],
        $_POST["description"]
];

?>
<a href="/indexTest.php">Go</a>
<form method="post">
    <textarea name="email" cols="100" rows="1"></textarea>
    <textarea name="title" cols="100" rows="1"></textarea>
    <textarea name="description" cols="100" rows="1"></textarea>
    <label>
        category
        <select name="category">
            <option value="phones">phones</option>
            <option value="computers">computers</option>
            <option value="other">other</option>
        </select>
    </label>
    <br>
    <input type="submit" value="Submit"/>
</form>