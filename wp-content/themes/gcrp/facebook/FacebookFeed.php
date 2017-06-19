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
        $fields        = 'id,message,picture,link,name,caption,description,created_time,updated_time';
        $response      = $client->request('GET', '/' . $page_id . '/feed/?fields=' . $fields . '&limit=' . $limit . '&access_token=' . $access_token);
        $feed          = json_decode($response->getBody());

        return $feed;
    }
}


