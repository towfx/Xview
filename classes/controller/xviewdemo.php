<?php defined('SYSPATH') or die('No direct script access.');
   class Controller_Item extends Controller {
        public function view_item($id)
        {
            $item = ORM::factory('item', $id);

            switch($_GET['format'])
            {
                case 'json':   $output=JSON::encode($item); break;
                case 'iframe': $output=TABLE::factory($item, 'tpl'); break;
                case 'email':  $output=MAIL::factory($to, $item); return;
                case 'pdf':    $output=PDF::factory($item); break;
                default:       $output= new XHTML; //will initialize header, footer, navigation, CSS styles and JavaScript
                    $output->content = new Container;
                    $output->content->span = 24; //grid span
                    $block1 = new Block;
                    $block1->span = 9;
                    $block1->content = '<div>TEXT</div>';
                    $block2 = new Block;
                    $block2->span = 15;
                    $block2->content = TABLE::factory($item, 'tpl');
                    $block2->last = true;
                    $output->content->childs[]= $block1;
                    $output->content->childs[]= $block2;

            }
            $this->request->response = $output; // see: __toString() magic

        }
    }