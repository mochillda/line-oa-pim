<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_line extends CI_Controller {
    public static $views = array();

    public function __construct(){
        parent::__construct();
        header("Content-type:application/json; charset=UTF-8");
        
        // $this->datetime = load_class("date");

        $this->load->model("api_line_model","mod");
        #Api;
        $this->load->library("api");
    }

    public function index(){
        echo 1;
    }

    public function saveRegister(){
        $this->api->post();
       
    }

    
    public function getMessage(){
   $access_token = 'qXqMgoayE5SSg4EbZZ/oBH47tDP8yUyx6E0jwaXffeS1FsARKNFvChIcdngxsn0g1hlvF/xWc5eza4ayr5jJQcoBDXmMwqqqzjCBS+xWT6Vvvdkjjtdtzm5gJAIQ9uS4J+JJ7NcKlXADiUe3DujDQgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $text = $event['source']['userId'];
            // Get replyToken
            $replyToken = $event['replyToken'];

            // Build message to reply back
            $messages = [
                'type' => 'text',
                'text' => $text
            ];

            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
            $data = [
                'replyToken' => $replyToken,
                'messages' => $messages,
            ];
            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result . "\r\n";
        }
    }
}
echo "OK";       
    }
    
	public function getFormatTextMessage($text)
	{
		$datas = array();
		$datas['type'] = 'text';
		$datas['text'] = 'tessssss'; //$text['text'];
		return $datas;
	}

	public function sentMessage($encodeJson,$datas){
		$datasReturn = array();
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $datas['token']);
        $ch = curl_init($datas['url']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeJson);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_PROXY,PROXY);
		// $curl = curl_init();
		// curl_setopt_array($curl, 
  //           array(CURLOPT_URL            => $datas['url'],
  //                 CURLOPT_PROXY          => PROXY,
  //                 CURLOPT_RETURNTRANSFER => true,
  //                 CURLOPT_ENCODING       => "",
  //                 CURLOPT_MAXREDIRS      => 10,
  //                 CURLOPT_TIMEOUT        => 30,
  //                 CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
  //                 CURLOPT_CUSTOMREQUEST  => "POST",
  //                 CURLOPT_POSTFIELDS     => $encodeJson,
  //                 CURLOPT_HTTPHEADER     => array(
  //                   "authorization: Bearer ".$datas['token'],
  //                   "cache-control: no-cache",
  //                   "content-type: application/json; charset=UTF-8",
  //                 ),
		// ));
         // print_r( $curl); exit;
		$response = curl_exec($ch);

		$err = curl_error($ch);
       
		curl_close($ch);
        echo $err; exit;
        
        if ($err) {
            $datasReturn['result'] = 'E';
            $datasReturn['message'] = $err;
        } else {
            if($response == "{}"){
                $datasReturn['result'] = 'S';
                $datasReturn['message'] = 'Success';
            }else{
                $datasReturn['result'] = 'E';
                $datasReturn['message'] = $response;
            }
        }
        
		return $datasReturn;
	}    
}
?>