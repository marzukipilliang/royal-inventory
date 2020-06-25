<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function image_resize( $imgSrc, $dstDir, $dstName, $width, $height ) {
    // Get the CodeIgniter super object
    $CI =& get_instance();
    
    $image_dst =  $dstDir . $dstName;

    if ( !file_exists( $image_dst ) ) {
        // LOAD LIBRARY
        $CI->load->library( 'image_lib' );

        // CONFIGURE IMAGE LIBRARY
        $config['image_library']    = 'gd2';
        $config['source_image']     = $imgSrc;
        $config['new_image']        = $image_dst;
        $config['maintain_ratio']   = FALSE;
        $config['width']            = $width;
        $config['height']           = $height;
        $CI->image_lib->initialize( $config );
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }

    return $image_dst;
}
