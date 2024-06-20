<?php 
require_once 'Message.php';

class GuestBook 
{

    private $file;

    public function __construct(string $file) {
        $directory = dirname($file);
        if (!is_dir($file)) {
            mkdir($directory, 0777, true);
        }
        if (!file_exists($file)) {
            touch($file);
        }
        $this->file = $file;
    }

    public function addMessage(Message $message): void 
    {
       file_put_contents($this->file, $message->toJSon() . "\n", FILE_APPEND);
    }

    public function getMessages() 
    {
            $content = trim(file_get_contents($this->file)); 
            var_dump($content);
    }

    
}
