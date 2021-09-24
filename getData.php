<?php
    // Scrape the HTML from a trackanalytics.com page.
    function scrape($site, $page)
    {
        $ch = curl_init();
        
        // Need to replace the key when credits run out.
        $key = "7HHOEPE0I9GOZYRGLUIVZ6PCUNZ5FT3VW1FZIOJ9Y5HP9XJP81KEFO7Y3GA7JNZ94SEETIKF1S9RNIUY";
        
        $conn = "";
        $conn .= "https://app.scrapingbee.com/api/v1/?api_key=".$key;
        $conn .= "&url=https%3A%2F%2Fwww.trackalytics.com%2F".$site;
        $conn .= "%2Fpage%2F".$page;
        $conn .= "%2F";
        
        curl_setopt($ch, CURLOPT_URL, $conn);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        
        if (!$response) {
            die('Error: "'.curl_error($ch).'" - Code: '.curl_errno($ch));
        }
        curl_close($ch);
        return $response;
    }
    
    // Write the response to a hidden HTML element with ID "data" 
    // to be accessed client-side.
    function store($site, $numPages)
    {
        $data = "";
        $data .= "<div id='data' style='display: none'>";
        for ($i = 1; $i <= $numPages; $i++)
        {
            $data .= scrape($site, $i);
        }
        $data .= "</div>";
        echo $data;
    }
?>