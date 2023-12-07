<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\UploadImage;
use App\Models\Product;
use Illuminate\Http\Request;

class UploadDataController extends Controller
{ 
    //function to change password

    public function change(Request $request)
    {
        $data = new Login;
        if($request->isMethod('post'))
        {
            $oldpw = $request->get('oldpass');
            $newpw = $request->get('newpass');
            $cnewp = $request->get('cnewpass');

            if($newpw == $cnewp){
                $data = Login::where('password',$oldpw)->first();
                if(isset($data)){
                    $data->password = $newpw;
                    $data->save();
                    return redirect()->back()->with("success", "Password Updated Successfully");;
                }
                else{
                    return redirect()->back()->with("error", " old password does not match ");
                }
            }
            else{
                return redirect()->back()->with("error", "new pass daoesnt match with confirm new password");
            }    
                
        }
    }
        //function to upload data into database table
    public function uploadData(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Check if the uploaded file is valid
            if ($file->isValid()) {
                $filePath = $file->getRealPath();

                // Process the file content
                $data = array_map('str_getcsv', file($filePath));
                $headers = array_shift($data);
                
                UploadImage::truncate();
                foreach ($data as $row) {
                    $rowData = array_combine($headers, $row);

                    // Create and save the model
                    UploadImage::create($rowData);
                }

                return redirect()->back()->with('success', 'Data imported successfully.');
            } else {
                return redirect()->back()->with('error', 'Invalid file uploaded.');
            }
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }
    // public function upload()
    // {
    //     return view('upload');
    // }
}
