<?php

namespace App\Libraries;

use App\EmailQueue;
use App\Templates;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CommonFunction
{
    
    public static function getProjectRootDirectory()
    {
        return base_path();
    }
   

   
    
    public static function getImageFromURL($db_path, $local_path=null, $id=null, $width='100px', $height ='100px')
    {
        $file_path = (string)($local_path.$db_path);
        if (is_file($file_path)) {
            return '<img class="img-thumbnail" src="'. asset($file_path) .'" alt="Something" style="width: '.$width.'; height: '.$height.';" id="'.$id.'" />';
         } else {
            return "<img class='img-thumbnail' src='" . asset('assets/admin/img/no_image_found.png') . "' alt='Image not found' style='width: $width; height: $height;' id='$id'>";
        }
    }
    

    public static function imageDelete($file_path)
    {
        if(file_exists($file_path)){
            @unlink($file_path);
        }
    }
    public static function getStatus($status) {
        if (!empty($status) && $status == 1) {
            $class = 'badge badge-success';
            $status = 'Active';
        } else {
            $class = 'badge badge-danger';
            $status = 'Inactive';
        }
        return '<span class="' . $class . '">' . $status . '</span>';
    }
    

}
