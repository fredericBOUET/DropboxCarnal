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
            if(download($path))
            {
                /* create server directory mkdir + serveur file ? fopen*/
                if(createDirectory($name)){
                    /* 
                    check if their is content already here in the server 
                    if it is => over write or not ?
                    if it is not => upload on server */
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
