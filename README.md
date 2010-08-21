Xview
=====
The Kohana 3 eXtended View
----------------------------
Xview serves as output format in extra logical object oriented approach. Designed to be a wrapper to the current Core View, it is a View with driver features. Helps to produce completely clean DRY controller.

Feature
-------
  - Render Xview object with format specified
     - Fullpage HTML (normal) or as block widget (for Ajax calls)
     - Partial region as HTML table, div containers or unordered list
     - as e-mail 
     - PDF (with DOMPDF support)
  - Helper for producing dynamic grid for BlueTrip CSS grid
  - Sevrve correct HTTP header when necessary

Example Usage
-------------

    Controller_Item extends Controller {
        public function view($id){

            $item = ORM::factory('item', $id);
            
            switch($_GET['format'])
            {
                case 'json':   $output=JSON::encode($item); break;
                case 'iframe': $output=TABLE::factory($item, 'tpl'); break;
                case 'email':  $output=MAIL::factory($to, $item);
                case 'pdf':    $output=PDF::factory($item);
                case 'default':$output= new XHTML; //will initialize header, footer, navigation, CSS styles and JavaScript
                               $output->content = new Container;
                               $output->content->span = 24; //grid span
                               $block1 = new Block;
                               $block1->span = 9;
                               $block2 = new Block;
                               $block2->span = 15;
                               $block2->last = true;
                               $output->content->childs[]= $block1;
                               $output->content->childs[]= $block2;

            }
            $this->request->response = $output;
        }
    }

 

Note: Switching between rendering full HTML page or partial region without  *Controller extends Template*

Installation
------------

    cd ../to-your-kohana/folder/
    git submodule add https://towfx@github.com/towfx/Xview.git modules/xview
    git submodule init

    // in bootstrap.php
    Kohana::modules(array(
		// ...
        'xview'      => MODPATH.'xview',
		// ...
	));
	
Dependency
----------
    Kohana 3 Asset Helper: http://github.com/jonathangeiger/kohana-asset
	
API Definition
--------------

![alt text][1]


  [1]: http://github.com/towfx/Xview/raw/master/class_xview__inherit__graph.png	
 