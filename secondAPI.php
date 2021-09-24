<!doctype html>
<html>
<head>
	<title>Insta API</title>
	<meta charset="utf-8"/>

	<style>
		body{
			visibility: hidden;
		}
		.show {
			visibility: visible;
		}
	</style>

  <?php

  // get cURL resource
  $ch = curl_init();

  // set url
  curl_setopt($ch, CURLOPT_URL, 'https://app.scrapingbee.com/api/v1/?api_key=VPD1FHFD6Z6JJHS76ZPNFH17BZO6SAJGDDIH8H5V6W0ROI72HP6PZEBR9XGYDG557XM16X7WA1PLV6HI&url=http%3A%2F%2Fcmacke01.great-site.net%2FinstaAPICode.php%3Fi%3D2');

  // set method
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

  // return the transfer as a string
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



  // send the request and save response to $response
  $response = curl_exec($ch);

  // stop if fails
  if (!$response) {
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
  }

  echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
  echo 'Response Body: ' . $response . PHP_EOL;

  // close curl resource to free up system resources
  curl_close($ch);

	?>


</head>


<body >




	<!-- <div id="followers"> &nbsp; </div> -->

</body>
</html>
