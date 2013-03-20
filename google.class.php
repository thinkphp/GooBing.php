<?php
/**
 * @class
 * @description - A simple class wrapper for Google's Search API REST.
 * @author      - Adrian Statescu <mergesortv@gmail.com>
 * @license     - MIT
 * @public methods     - constructor, search, getJSON, getHTML
 * @private methods    - request and prepareHTML
 */

class Google {

      //define a var for appid
      public $appid;

      //define a const for endpoint
      const ENDPOINT = 'http://ajax.googleapis.com/ajax/services/search/web?gl=en';

      //constructor for class
      public function __construct($appid) {

            //set up appid
            $this->appid = $appid;
      }

      //request REST GET
      //@private
      public function _request($url) {

           $ch = curl_init();

           curl_setopt($ch,CURLOPT_URL,$url);

           curl_setopt($ch, CURLOPT_SSLVERSION,3);

           curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

           curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);

           $data = curl_exec($ch);

           curl_close($ch); 

           if(empty($data)) {return 'server timeout';}

                 else {return $data;}

      }
      //@name Search
      //@public method 
      //@param String - $q - the term you want to search
      //@return Object $this object
      public function search( $q ) {

           $q = urlencode( $q );

           $endpoint = sprintf(self::ENDPOINT . '?userip=&hl=en&v=1.0&start=0&rsz=8&q=%s', $q);

           $this->res = $this->_request($endpoint);

         return $this; 
      }

      public function getHTML() {
             
            $res = json_decode($this->res, true);

          return $this->_prepareHTML( $res['responseData']['results'] ); 
      }

      public function getJSON() {

          return $this->res;          
      }

      public function getArray() {

          return json_decode($this->res, true);          
      }

      public function getObject() {

          return json_decode($this->res);          
      }
  
      //@private method
      //@param Array $myArr - the result as Array received from Microsoft's Bing API.
      //@return String $out - returns a String formated with formated html.
      public function _prepareHTML( $myArr ) {


        $out = '<h2>Google</h2><ul>';  

        foreach($myArr as $value) {

            $out .= '<li><h3><a href="'. $value['url'] .'">'. $value['title'] .'</a></h3><p>'. $value['content'] .'</p></li>';
        }

         $out .= '</ul>';

         return $out; 
      }

};

?>
