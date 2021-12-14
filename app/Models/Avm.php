<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Avm extends Model
{
    /**
     * @var ContentType
    */
    const ContentType = 'application/json';
    
    /**
     * @var ApiKey
    */
    const ApiKey =   'F8CDKLIzlzJf01c6oGs04JTWhqxPyVw4uRCy29F2';     //'ZhWMbfpsvA79Q00k9cG9OaFqsHHnM1eA3xZL0hzQ';

    /**
     * @var Url
    */
    const Url = 'https://api.altum.ai/avm';

    /**
     * Request data from Altum AVM API.
     *
     * @param $request
     * @param $response
     * 
     * @return string
    */
    public function request($request) : string 
    {
    
        $response = Http::withHeaders([
                'Content-Type'  => Avm::ContentType,
                'x-api-key'     => Avm::ApiKey
            ])->post(Avm::Url, [
                'postcode'      => $request->postcode,
                'housenumber'   => $request->housenumber,
                'houseaddition' => '',
                'image'        => '1',
                'buildyear'     => '',
                'innersurfacearea' => '',
                'outersurfacearea'=> '',
                'volume'        => '',
                'energylabel'   => ''
            ]
        );

        return($response);
    }


}
