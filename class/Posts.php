<?php 
namespace App;
use \DateTime;
use Parsedown;

class Posts 
{
    public $ID;
    public $name;
    public $content;
    public $created_at;


    public function __construct()
    {
        if(is_int($this->created_at)) {
            $this->created_at = new DateTime('@' . $this->created_at);
        }
    }
    

    public function getExtrait() : string 
    {
        return substr($this->content, 0, 150);
    }

    public function getBody() {
        $parsedown = new Parsedown();
        $parsedown->setsafeMode(true);
        return $parsedown->text($this->content);
    }
}
