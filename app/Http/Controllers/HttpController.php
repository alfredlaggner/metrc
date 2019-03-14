<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HttpController extends Controller
{

    public function metrc_gets()
    {

        $client = new Client([
            'base_uri' => "https://sandbox-api-ca.metrc.com",
            'timeout' => 2.0,
        ]);
        $headers = [
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'auth' => ['KH-qsC1oJPzQnyWMrXjw0EQh812jHOX52ALfUIm-dyE3Wy0h', 'FusVbe4Yv6W1DGNuxKNhByXU6RO6jSUPcbRCoRDD98VNXc4D'],
        ];

	//	$response = $client->request('GET', '/strains/v1/active?licenseNumber=CML17-0000001', $headers);  //A12-0000015-LIC CML17-0000001
	//	$response = $client->request('GET', '/strains/v1/active?licenseNumber=CML17-0000001', $headers);  //A12-0000015-LIC CML17-0000001
	//	$response = $client->request('GET', '/rooms/v1/active?licenseNumber=CML17-0000001', $headers);  //A12-0000015-LIC CML17-0000001
	//	$response = $client->request('GET', '/plantbatches/v1/types?licenseNumber=CML17-0000001', $headers);  //A12-0000015-LIC CML17-0000001
		$response = $client->request('GET', '/facilities/v1', $headers);  //A12-0000015-LIC CML17-0000001

        $body = json_decode($response->getBody()->getContents());
        echo "GET 'facilities:'";
        dd($body);

    }

    public function metrc_posts()
    {
        $strain = ['body' => '[{"Id": 22301,  "Name": "My Hill Kushiii",     "TestingStatus": "None",     "ThcLevel": 0.12345, "CbdLevel": 0.12345,     "IndicaPercentage": 25.0,     "SativaPercentage": 75.0   }]'];
        $plantbatch_create = ['body' => '[   
        {   "Name": "AK-47 Clone 8/31/2018",   "Type": "Seed", "StartingTag": 1A4FF0000000022000000239, "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-09-28"   },
        {   "Name": "AK-47 Clone 8/31/2018",   "Type": "Seed",  "StartingTag": 1A4FF0000000022000000239,  "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-09-28"   },
        {   "Name": "AK-47 Clone 8/31/2018",   "Type": "Seed",  "StartingTag": 1A4FF0000000022000000240,  "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-08-28"   },
  ]'];
        $plantbatch_changegrowthphase = ['body' => '[   
        {   "Name": "AK-47 Clone 8/31/2018",  "GrowthPhase": "Flowering",   "Type": "Seed", "PlantBatchTag": 1A4FF0000000022000000999, "PatientLicenseNumber": "X00001",    "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-09-28"   },
        {   "Name": "AK-47 Clone 8/31/2018",   "GrowthPhase": "Flowering",  "Type": "Seed",  "PlantBatchTag": 1A4FF0000000022000000239, "PatientLicenseNumber": "X00002",    "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-09-28"   },
        {   "Name": "AK-47 Clone 8/31/2018",    "Type": "Seed",  "PlantBatchTag": 1A4FF0000000022000000240, "PatientLicenseNumber": "X00003",    "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-08-28"   },
  ]'];
        $plantbatch_destroy = ['body' => '[   
        {   "Name": "AK-47 Clone 8/31/2018",    "Type": "Seed",  "PlantBatchTag": 1A4FF0000000022000000240, "PatientLicenseNumber": "X00003",    "Count": 50,  "Strain": "All Hill Kushiii",     "Room": "Plants Room 2",   "ActualDate": "2018-08-28"   },
  ]'];

        $room = ['body' => '[{"Id": 20002, "Name": "Oz Harvest Room 2"   }]'];

        // items
        $items_create = ['body' => '[ {  
      "Name": "Oz Strawberry Kush "
    ,"ItemCategory": "Flower"
    ,"UnitOfMeasure": "Ounces"
    ,"Strain": "All Hill Kushiii"
  }
  ]'];
        $items_create_2 = ['body' => '[ {  
      "Name": "Oz Blueberry Kush"
    ,"ItemCategory": "Flower"
    ,"UnitOfMeasure": "Ounces"
    ,"Strain": "All Hill Kushiii"
  }
  ]'];
      $items_change_UOM = ['body' => '[ {  
        "Id": "22603",
      "Name": "Oz Strawberry Kush"
    ,"ItemCategory": "Flower"
    ,"UnitOfMeasure": "Grams"
    ,"Strain": "All Hill Kushiii"
  }
  ]'];

// packages
        $ipackages_create = ['body' => '[ { 
         "Tag": 1A4FF0300000026000000195
        ,"Item": "Oz Blueberry Kush"
        ,"Quantity": 10.0
        ,"UnitOfMeasure": "Grams"
        ,"Strain": "All Hill Kushiii"
        ,"Ingredients": 
        [{
    "Package": 1A4FF0100000026000000210
        ,"Quantity": 10.0
        ,"UnitOfMeasure": "Grams"
      }]
  }
  ]'];

        $this->metrc_post('packages', 'create/testing', $ipackages_create);

        //  $this->metrc_delete('strains','22402');
    }

    public function metrc_post($item, $action, $body = [])
    {
        //   dd($body);
        //  $body = ['body' => '[{ "Name": "All Hill Kushiii",     "TestingStatus": "None",     "ThcLevel": 2.1865, "CbdLevel": 2.1075,     "IndicaPercentage": 25.0,     "SativaPercentage": 75.0   }]'];

        $client = new Client([
            'timeout' => 5.0,
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'auth' => ['KH-qsC1oJPzQnyWMrXjw0EQh812jHOX52ALfUIm-dyE3Wy0h', 'FusVbe4Yv6W1DGNuxKNhByXU6RO6jSUPcbRCoRDD98VNXc4D'],
        ]);
        $response = $client->post('https://sandbox-api-ca.metrc.com/' . $item . '/v1/' . $action . '?licenseNumber=CDPH-0000003', $body);

        $rsp_body = json_decode($response->getBody()->getContents());
        echo $action . "-" . $item;
        dd($rsp_body);

    }
}

/*[{
    "Package": 1A4FF0100000022000000210
        ,"Quantity": 10.0
        ,"UnitOfMeasure": "Grams"
      }]*/
