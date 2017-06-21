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

        $page_id      = FACEBOOK_PAGE_ID;
        $access_token = FACEBOOK_ACCESS_TOKEN;
        $fields       = 'id,message,link,name,caption,description,created_time,updated_time,picture,object_id,type';
        $response     = $client->request('GET', '/' . $page_id . '/posts/?fields=' . $fields . '&limit=' . $limit . '&access_token=' . $access_token);
        $feed         = json_decode($response->getBody());
//        foreach($feed->data as $fbpost){
//            if($fbpost->type == 'link'){
//                echo '<p>YEP</p>';
//                $response = $client->request('GET', '/?id='. $fbpost->link .'&access_token='. $access_token);
//                $returned = json_decode($response->getBody());
//                $og_id = $returned->og_object->id;
//                $response = $client->request('GET', '/'. $og_id .'/?fields=image&access_token='. $access_token);
//                $returned = json_decode($response->getBody());
//                $fbpost->picture = $returned->image[0]->url;
//
//
//            }else{
//                echo '<p>NOPE</p>';
//            }
//        }

        return $feed;
    }

    public function photo($id)
    {
        $client = new Client([
            'base_uri' => 'https://graph.facebook.com/v2.9'
        ]);

        $access_token = FACEBOOK_ACCESS_TOKEN;
        $response     = $client->request('GET', '/' . $id . '/?fields=type,link&access_token=' . $access_token);
        $fbpost       = json_decode($response->getBody());
        if ($fbpost->type == 'link') {
            $response  = $client->request('GET', '/?id=' . $fbpost->link . '&access_token=' . $access_token);
            $returned  = json_decode($response->getBody());
            $og_id     = $returned->og_object->id;
            $response  = $client->request('GET', '/' . $og_id . '/?fields=image&access_token=' . $access_token);
            $returned  = json_decode($response->getBody());
            $photo_url = $returned->image[0]->url;
        } else {
            $response  = $client->request('GET', '/' . $id . '/?fields=object_id&access_token=' . $access_token);
            $returned  = json_decode($response->getBody());
            $object_id = $returned->object_id;
            $photo_url = 'https://graph.facebook.com/v2.9/' . $object_id . '/picture?access_token=' . $access_token;

        }

        return $photo_url;

    }
}


