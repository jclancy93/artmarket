<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

public function uploadFileToS3(Request $request)
{
  $image = $request->file('image');
  $imageFileName = time() . '.' . $image->getClientOriginalExtension();
}

?>