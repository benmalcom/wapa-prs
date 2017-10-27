<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hashids\Hashids;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const ITEMS_PER_PAGE =  12;
    const TRENDING_ITEMS_PER_PAGE =  8;
    const IMAGE_HEIGHT =  600;
    const IMAGE_WIDTH =  500;
    public function setFlashMessage($message, $type)
    {
        $class1 = 'alert-info';
        $class2 = 'clip-alert';
        if ($type == 1) {
            $class1 = 'alert-success';
            $class2 = 'fa fa-thumbs-o-up';
        } elseif ($type == 2) {
            $class1 = 'alert-danger';
            $class2 = 'fa fa-times';
        }
        $output = '<div class="col-md-4 m-5 edge-r fade in text-center app-info shadow simplebox blade alert ' . $class1 . '" id="flash_message"><small>'.
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><small>x</small></button>'.
            '<i class="' . $class2 . '"></i> ' .
            '<strong>' . $message . '</strong>' .
            '</small></div>' .
            '<div class="clearfix"></div>';
        Session::flash('flash_message', $output);
    }
    public function getHashIds()
    {
        return new Hashids(env('APP_KEY'), 10, env('APP_CHAR'));
    }
}
