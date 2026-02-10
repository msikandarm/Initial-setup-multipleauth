<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public static function upload( $file, $unique = true, $folder )
    {
        if ( $unique ) {
            $file_name = uniqid() . '_' . $file->getClientOriginalName();
        } else {
            $file_name = $file->getClientOriginalName();
        }

        $file_name = str_replace( ' ', '_', $file_name );
        $file_name = preg_replace( "/[^a-z0-9\_\-\.]/i", "", $file_name );

        if ( $folder == 'category' ) {
            Storage::disk( 'public' )->put( 'media/categoryImage/' . $file_name, file_get_contents( $file ) );
        } elseif($folder == 'product'){
            Storage::disk( 'public' )->put( 'media/productImage/' . $file_name, file_get_contents( $file ) );

        } else {
            Storage::disk( 'public' )->put( 'media/otherFiles/' . $file_name, file_get_contents( $file ) );
        }

        return $file_name;
    }

    public static function deletefile( $file, $folder )
    {
        if ( !empty( $file ) ) {
            if ( $folder == 'category' ) {
                Storage::disk( 'public' )->delete( "media/categoryImage/{$file}" );
            } elseif($folder == 'product'){
                Storage::disk( 'public' )->delete( "media/productImage/{$file}" );
            } else {
                Storage::disk( 'public' )->delete( "media/otherFiles/{$file}" );
            }
        }
    }
}
