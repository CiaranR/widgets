<?php

$json=file_get_contents("https://api.import.io/store/data/98c4b0a2-8691-4749-ba0a-966c2920c460/_query?input/webpage/url=http%3A%2F%2Fwww.towerbridge.org.uk%2FTBE%2FEN%2FBridgeLiftTimes%2F&_user=ae87af2c-ccca-4a76-9994-59984169edd6&_apikey=GQyDvOYxzaa2Aofhcxbcx6zuFSGBTZ1iZzhODPUp0hvDmcdaa7Ch9FEMSyzSZoPPDVMF0BFJRCVC1d1akFsgFA%3D%3D");
$data =  json_decode($json);

//var_dump($data);
echo "<table>
           <tr>
                <td><strong>Day</strong></td>
                <td><strong>Date</strong></td>
                <td><strong>Time</strong></td>
                <td><strong>Vessel</strong></td>
                <td><strong>Direction</strong></td>
            </tr>";

$results = $data->results;

foreach($results as $lift):?>

           <tr>
                <td><?php echo $lift->day; ?></td>
                <td><?php echo $lift->date; ?></td>
                <td><?php echo $lift->time; ?></td>
                <td><?php echo $lift->vessel; ?></td>
                <td><?php echo $lift->direction; ?></td>
            </tr>

<?php endforeach;
      echo "</table>";
?>