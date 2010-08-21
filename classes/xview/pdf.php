<?php defined('SYSPATH') or die('No direct script access.');

class Xview_PDF extends Xview{
    protected $mime_type = 'application/pdf';
    public function factory(){
        return View::factory($file, $data);
    }
}