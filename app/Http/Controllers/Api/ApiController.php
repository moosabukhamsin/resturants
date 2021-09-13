<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function user()
    {
        return Auth::guard('api')->user();
    }

    public function guest()
    {
        return Auth::guard('api')->guest();
    }

    public function tokenId()
    {
        return request()->attributes->get('oauth_access_token_id');
    }
}
