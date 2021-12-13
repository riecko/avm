<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreAvmRequest;
use App\Models\Avm;

/**
 * Class AvmController
 */
class AvmController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * View Search Form.
     *
     */
    public function index()
    {
        return view('avm');
    }

    /**
     * Request a new API call.
     *
     * @param  StoreAvmRequest $request
     * @return \Illuminate\Http\Response
     */
    public function request(StoreAvmRequest $request)
    {
        
        $data = Avm::request($request);
        // dd($data);
        return view('avm')->with('data',json_decode($data));

    }

}