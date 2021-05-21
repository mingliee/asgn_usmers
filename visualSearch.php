<?php

if($_FILES){

    $url = "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyD3KtWYPvpjrF8nIasgw5eunM6CtQf1YKk";
    $image_validation = array('image/jpeg','image/png','image/jpg');
    
    if(in_array($_FILES['image']['type'],$image_validation)){
        
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image_base64  = base64_encode($image);
    
    
        $json_request ='{
            "requests": [
                {
                "image": {
                    "content":"' . $image_base64 . '"
                    },
                    "features": [
                    {
                        "type": "LABEL_DETECTION",
                        "maxResults": 50
                    },
                    {
                        "type": "OBJECT_LOCALIZATION",
                        "maxResults": 50
                    },
                    {
                        "type": "TEXT_DETECTION",
                        "maxResults": 50
                    }
                    
                    ]
                }
            ]
        }';
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_request);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        // verify if we got a correct response
        if ( $status != 200 ) {
            header("Location:404.php");
            die("Something when wrong. Status code: $status" );
        }

        // create an image identifier for the uploaded file
        switch($_FILES['image']['type']){
            case 'image/jpeg':
                $im = imagecreatefromjpeg($_FILES['image']['tmp_name']);
                break;
            case 'image/png':
                $im = imagecreatefrompng($_FILES['image']['tmp_name']);
                break;
            case 'image/gif':
                $im = imagecreatefromgif($_FILES['image']['tmp_name']);
                break;
        }
        
        // transform the json response to an associative array
        $response = json_decode($json_response, true);	
        
        /*echo'<pre>';
        print_r($json_response);
        echo'</pre>';
*/
        $o_length = '0';
        $o_length = count($response['responses'][0]['localizedObjectAnnotations']);
        //echo 'localizedObjectAnnotations lenght: '.$o_length;
        //echo '<br/>================<br/>';

        $book=false;
        $obj=null;
        $text=null;
        $x=0;
        for($i=0;$i<$o_length;$i++){
            $x++;
            // echo $i.': '. $response['responses'][0]['localizedObjectAnnotations'][$i]['name'].'<br/>';
            if($x==$o_length){
                $obj.=$response['responses'][0]['localizedObjectAnnotations'][$i]['name'];
            }else{
                $obj.=$response['responses'][0]['localizedObjectAnnotations'][$i]['name'];
                $obj.=',';
            }  
        
            if($response['responses'][0]['localizedObjectAnnotations'][$i]['name'] == 'Book'){
                $book = true;
            } 
            if ($response['responses'][0]['localizedObjectAnnotations'][$i]['name'] == 'Packaged goods'){
                $package_goods = true;
            } 

        }

        $length = count($response['responses'][0]['labelAnnotations']);
        echo 'labelAnnotations lenght: '.$length;

        //use label as object - when no object detected
        //when object detected is PACKAGE GOODS, check for label contain book
        if($o_length=='0' || $o_length == NULL || $package_goods){
            //limit IMAGE_LABEL to only 5 label
            if($package_goods){
                $y=1;
                $z=4;
                $obj.=',';
            }else{
                $y=0;
                $z=5;
            }

            for($i=0;$i<$length;$i++){
                $y++;
                if($response['responses'][0]['labelAnnotations'][$i]['description'] == 'Book'){
                    //let $book=true when one of the label is book
                    //to undergo OCR
                    $book = true;
                }
                
                //use maximun 5 labels as object
                //if package_good true, z=4
                //else z=5
                if($i<$z){
                    if($y==$length||$y==5){
                        $obj.=$response['responses'][0]['labelAnnotations'][$i]['description'];
                    }else{
                        $obj.=$response['responses'][0]['labelAnnotations'][$i]['description'];
                        $obj.= ',';
                    }
                }
            }
        }
          
        //echo '<br/>================<br/>';
    
        $length = count($response['responses'][0]['textAnnotations']);
        //echo 'textAnnotations lenght: '.$length;
        //echo '<br/>================<br/>';

        //if object detected is PACKAGE GOODS or label detected is BOOK
        if($book||$package_goods){
            /* for($i=0;$i<$length;$i++){
                echo $i.': '. $response['responses'][0]['textAnnotations'][$i]['description'].'<br/>';

            }*/
            $text=$response['responses'][0]['textAnnotations'][0]['description'];
            $text = trim(preg_replace('/\s\s+/', ' ', $text));

            //if is book, add BOOK keyword to IMAGE_LABEL
            if($book){
                $obj.=',Book';
            }
        
        }else{
            // echo 'NOT BOOK';
        }
    }

    require 'config.php';
    
    $obj = mysqli_real_escape_string($conn,$obj);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = mysqli_real_escape_string($conn,$text);

    echo 'ads.php?label='.$obj.'&text='.$text;

    header("Location: ads.php?label=$obj&text=$text");

}

?>