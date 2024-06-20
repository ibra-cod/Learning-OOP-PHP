<?php 

class message 
{

    private $username;
    private $message;
    private $date;
    const LIMIT_USERNAME  = 3;
    const LIMIT_MESSAGE  = 10;

    public function __construct(string $username, string $message, ?DateTime $dateTime = null) 
    {
            $this->message = $message;
            $this->username = $username;
            $this->date = $dateTime ?: new DateTime();
    }

    public function isValid() : bool 
    {
        return empty($this->getErrors());
    }

    public function getErrors (): array 
    {
        $errors = [];
        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = 'votre nom d\'utilisateur est trop court.'; 
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $errors['message'] = 'votre Messages est trop court.'; 
        }

        return $errors;
    }

    public function toJSon() : string 
    {
           return json_encode( [
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
           ]);
    }
}
