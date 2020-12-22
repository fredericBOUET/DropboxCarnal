<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropboxController extends Controller
{
    //

    public function mainFunction($request){
       
       
        /*TEST
        
        $client = new Spatie\Dropbox\Client([$appKey, $appSecret]);
        return $client; */

        /* $directory = $request->directory */
        if(existDirectory($directory)){
            /* $path = ... +$directory */
            if(/* call  download($path)*/)
            {
                /* create server directory mkdir + serveur file ? fopen*/
                if(/* mkdir & fopen worked */){
                    /* upload sur le serveur */
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
            /*Error msg 'couldnt find the directory you're searching for'*/
        }
    }


    public function existDirectory($directory){
        /* return true or false if directory exists in dropbox or not*/
    }

    public function download($path){
        /* Download content from Dropbox directory */ 
        
    }


}
