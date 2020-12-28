<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropboxController extends Controller
{

    public function dropboxForm()
    {
        $id = $_ENV['DROPBOX_APP_OAUTH2_ACCESS_TOKEN'];
        $client = new \Spatie\Dropbox\Client($id);
        $path = '/website/CMS content upload';
        $allFolders=$client->listFolder($path);
        // dd($allFolders);
        $arrayFolders=[];

        foreach($allFolders['entries'] as $folder){
           $arrayFolders[] = $folder['name'];
        }
        asort($arrayFolders);


        return view('formDropbox', compact('arrayFolders'));
    }

    public function testPost(Request $request)
    {

        if($this->UserAuthentification())
        {
            $id = $_ENV['DROPBOX_APP_OAUTH2_ACCESS_TOKEN'];
            $client = new \Spatie\Dropbox\Client($id);
           /* $path='/website/CMS content upload/'.$request->directory;*/
           $path = '/website/CMS content upload/adi0062/photos/adi0062_001.jpg';
            $client->download($path);
        }

      //  return $client->listFolder($path);
    }

    public function UserAuthentification()
    {
        /*    curl -X POST "https://api.dropboxapi.com/2/users/get_current_account" \
        --header "Authorization: Bearer <OAUTH2_ACCESS_TOKEN>"*/

        $id = $_ENV['DROPBOX_APP_OAUTH2_ACCESS_TOKEN'];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.dropboxapi.com/2/users/get_current_account');
        // curl_setopt($ch, CURLOPT_URL, 'https://api.dropboxapi.com/2/team/get_info');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        $headers = array();
        $headers[] = 'Authorization: Bearer '.$id;
        $headers[]="'Content-Type': 'application/json; charset=utf-8'";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public function mainFunction($request)
    {


        /*TEST

        $client = new Spatie\Dropbox\Client([$appKey, $appSecret]);
        return $client; */

        /* $directory = $request->directory */
        if(existDirectory($directory)){
            /* $path = ... +$directory */
            if(download($path))
            {
                /* create server directory mkdir + serveur file ? fopen*/
                if(createDirectory($name)){
                    /*
                   -- check if their is content already here in the server --
                    if (exist(content)))
                        if file data (modified date) and file size is the same
                            skip file
                        else
                            upload on server
                    else
                        upload on server */
                }
                else
                {
                    /*Error msg 'couldnt upload files on server'*/
                }
            }
            else
            {
                /* Error msg 'couldnt download files from dropbox' */
            }
        }
        else
        {
            /*Error msg 'couldnt find the directory you're searching for'
            php artisan serve --host=dropboxtestCarnal.com --port=8000 */
        }
    }


    public function existDirectory($directory){
        /* return true or false if directory exists in dropbox or not*/
    }

    public function download($path){
        /* Download content from Dropbox directory */

    }

    public function createDirectory($name){
        /*
        Check if directory exist in server
        if(!exists){
            Create directory and subdirectory mkdir => $name
            then sub (always the same sub?)
            photos -> photo gallery
            preview -> 9 thumbnails
            source -> master video file
            trailer -> trailer video
            trailersource -> trailer video
            tubesource -> tube promo video
        }
        else
        {
            ? return true ?
        }

        */
    }


}
