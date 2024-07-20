<?php

function convert_vi_to_en($str) {
    $str = preg_replace('/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'a', $str);
    $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'e', $str);
    $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
    $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'o', $str);
    $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'u', $str);
    $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
    $str = preg_replace('/(Đ)/', 'D', $str);
    $str = preg_replace('/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/', '', $str);
    $str = str_replace(' ', '-', str_replace('&*#39;','',$str));
    $str = preg_replace('/\-\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-/', '-', $str);
    $str = strtolower($str);
    return $str;
}
function convert_text($str) {
    $str = preg_replace('/</', "&lt;", $str);
    $str = preg_replace('/>/', "&gt;", $str);
    $str = preg_replace('/"/', "&quot;", $str);
    $str = strtolower($str);
    return $str;
}
function convert_vi_to_en_ko_space($str) {
    $str = preg_replace('/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'a', $str);
    $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'e', $str);
    $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
    $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'o', $str);
    $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'u', $str);
    $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
    $str = preg_replace('/(Đ)/', 'D', $str);
    $str = preg_replace('/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/', '', $str);
    $str = strtolower($str);
    return $str;
}

function convert_vi_to_en_urlen($str) {
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
    $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
    $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
    $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
    $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
    $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
    $str = preg_replace('/(Đ)/', 'D', $str);
    $str = str_replace(' ', '-', str_replace('&*#39;','',$str));
    $str = preg_replace('/\-\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-/', '-', $str);
    $str = preg_replace('/(Phuong)/', 'Ward', $str);
    $str = preg_replace('/(Quan)/', 'District', $str);
    $str = preg_replace('/(Thanh-pho)/', 'City', $str);
    $str = preg_replace('/(Xa)/', 'Commune', $str);
    return $str;
}

function convert_nospace($str) {
    $str = preg_replace('/(Phường)/', 'Ward', $str);
    $str = preg_replace('/(Quận)/', 'District', $str);
    $str = preg_replace('/(Thành phố)/', 'City', $str);
    $str = preg_replace('/(Xã)/', 'Commune', $str);
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
    $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
    $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
    $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
    $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
    $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
    $str = preg_replace('/(Đ)/', 'D', $str);
    $str = preg_replace('/\-\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-\-/', '-', $str);
    $str = preg_replace('/\-\-/', '-', $str);
    return $str;
}
function addtext($anhnguon,$noidung,$m,$name){
        $im = ImageCreateFromJpeg($anhnguon); // Path Images  
        $string = $noidung; // String 
        $string1 = $m; // String 
        $pxX = Imagesy($im)-Imagesy($im) + 50; // X  
        $pxY = Imagesy($im)-Imagesy($im) + 170; // Y 
        $px1X = Imagesy($im)-Imagesy($im) + 50; // X  
        $px1Y = Imagesy($im)-Imagesy($im) + 100; // Y  
        $fontsize1 = "30";
        $fontsize = "32";
        $color = ImageColorAllocate($im, 47, 93, 60); // Text Color  
        $font = "utm/utm-avobold.ttf";
        ImagettfText($im, $fontsize, 0, $px1X, $px1Y, $color, realpath($font), $string);
        ImagettfText($im, $fontsize1, 0, $pxX, $pxY, $color, realpath($font), $string1);
        imagePng($im,$name);  
        ImageDestroy($im);  
    }
    function addtextcategory($anhnguon,$noidung,$name){
        $im = ImageCreateFromJpeg($anhnguon); // Path Images  
        $string = $noidung; // String 
        $pxX = Imagesy($im)-Imagesy($im) + 80; // X  
        $pxY = Imagesy($im)-Imagesy($im) + 260; // Y 
        $fontsize = "36";
        $color = ImageColorAllocate($im, 255, 255, 255); // Text Color  
        $font = "utm/utm-avobold.ttf";
        ImagettfText($im, $fontsize, 0, $pxX, $pxY, $color, realpath($font), $string);
        imagePng($im,$name);  
        ImageDestroy($im);  
    } 

    function get_img($url_img)
    {
        if(@getimagesize($url_img)) {
            echo $url_img;
        }else{
            echo "images/no-avatar.jpg";
        }
    }

    function get_banner($url_img)
    {
        if(@getimagesize($url_img)) {
            echo $url_img;
        }else{
            echo 'public/frontent/assets/img/services/breadcrumb_bg.jpg';
        }
    }
    function page_title($url) {
        $fp = file_get_contents($url);
        if (!$fp) 
            return null;
        $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
        if (!$res) 
            return null;
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }
    function get_youtube($input) {
        $input = preg_match('~https?://(?:[0-9A-Z-]+\.)?(?:youtu\.be/|youtube(?:-nocookie)?\.com\S*[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|</a>))[?=&+%\w.-]*~ix',$input,$match);
        return $match[1];
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function get_url_tiny($url = 'https://themebun.com/')
    {
        //Khởi tạo link rút gọn
        $getTinyURL = "http://tinyurl.com/api-create.php?url=" . $url;

        //Lấy nội dung
        $resultTinyURL = file_get_contents($getTinyURL);

        //Xuất ra màn hình kết quả
        if($resultTinyURL == FALSE){
            echo "Cannot create TinyURL link";
        }
        else {
            echo $resultTinyURL;
        }
    }

    function auto_string($int)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, $int);
    }
    
    function svl_ismobile() {
        $is_mobile = '0';
        if(preg_match('/(android|iphone|ipad|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
            $is_mobile=1;
        if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))
            $is_mobile=1;
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
        if(in_array($mobile_ua,$mobile_agents))
            $is_mobile=1;
        if (isset($_SERVER['ALL_HTTP'])) {
            if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0)
                $is_mobile=1;
        }
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0)
            $is_mobile=0;
        return $is_mobile;
    }
    ?>
