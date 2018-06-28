<?php

namespace SCCatalog\Support;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * @package    App\Http\Controllers
 * @subpackage App\Support\Controller
 */
class AppController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
