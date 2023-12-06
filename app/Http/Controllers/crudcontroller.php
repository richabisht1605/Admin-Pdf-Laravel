<?php

namespace App\Http\Controllers;
use App\Models\addpage;
use App\Models\category;
use App\Models\login;
use App\Models\UploadImage;
use App\Models\product;
use Illuminate\Http\Request;

class crudcontroller extends Controller
{ 
    public function change(Request $request){
            $data = new login;
        if($request->isMethod('post'))
        {
            $oldpw = $request->get('oldpass');
            $newpw = $request->get('newpass');
            $cnewp = $request->get('cnewpass');
            if($newpw == $cnewp){
                $data = login::where('password',$oldpw)->first();
                if(isset($data))
                {
                    $data->password = $newpw;
                    $data->save();
                    return redirect('/change-password')->withSuccess("Password Updated Successfully");
                }
                else
                {
                    return redirect('/change-password')->withSuccess("Old Password not match");
                }
                
            }
            else
            {
                return redirect('/change-password')->withSuccess( "New password and Confirm new password does not match");
            }    
                
        }

    }
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

}