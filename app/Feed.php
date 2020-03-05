<?php

namespace App;

use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'source'
    ];
    
    /**********************************************************************//**
     * Retrieve Data
     * 
     * Retrieves the rss data feed from the respective source.
     */
    public function retrieve()
    {
        try
        {
            // Create curl resource
            $ch = curl_init();

            // Set url
            curl_setopt($ch, CURLOPT_URL, $this->source);

            // Return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Set headers
            // $headers = [
            //     'x-app-id: ' . $this->app_id,
            //     'x-app-secret: ' . $this->app_secret,
            //     isset($model->access_token) ? 'Authorization: ' . $model->access_token : null
            // ];
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Make curl request
            $response = curl_exec($ch);

            // If HTTP code >= 400 throw exception
            if ((int) curl_getinfo($ch, CURLINFO_HTTP_CODE) >= 400)
            {
                throw new \Exception ($response);
            }

            // Set response variables before closing curl resource
            $last_response = $response;
            $last_response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Close curl resource to free up system resources
            curl_close($ch);

            // Return decoded json response
            $this->feed = simplexml_load_string($last_response ,'SimpleXMLElement', LIBXML_NOCDATA);
            
            // Meh?
            $this->last_request = $last_response_code;

            return $this;
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
        
    }

    public function getItems()
    {
        $items = [];

        if ($this->feed)
        {
            foreach ($this->feed->item as $item)
            {
                $items[] = [
                    'title' => $item->title,
                    'description' => $item->description,
                    'link' => isset($item->link) ? $item->link : null,
                    'meta' => [
                        'published' => isset($item->children('dc', true)->date) ? Carbon::parse($item->children('dc', true)->date) : null,
                        'creator'   => $item->children('dc', true)->creator,
                        'subject'   => $item->children('dc', true)->subject
                    ]
                ];
            }
        }

        return $items;
    }
}
