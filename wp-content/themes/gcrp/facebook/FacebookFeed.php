<?php
use GuzzleHttp\Client;

class FacebookFeed
{
    /**
     * @param int $limit
     * @return array
     */
    public function fetch($limit = 5)
    {
        $client = new Client([
            'base_uri' => 'https://graph.facebook.com/v2.9'
        ]);

        $page_id       = FACEBOOK_PAGE_ID;
        $access_token  = FACEBOOK_ACCESS_TOKEN;
        $fields        = 'id,message,link,name,caption,description,created_time,updated_time,picture,object_id,type';
        $response      = $client->request('GET', '/' . $page_id . '/posts/?fields=' . $fields . '&limit=' . $limit . '&access_token=' . $access_token );
        $feed          = json_decode($response->getBody());
        
        echo '<pre>' , print_r($feed) , '</pre>';
        

        return $feed;
    }

    public function photo($id)
    {
        $access_token  = FACEBOOK_ACCESS_TOKEN;
        $url = 'https://graph.facebook.com/v2.9/'. $id .'/picture?access_token='. $access_token;


        return $url;

    }
}


