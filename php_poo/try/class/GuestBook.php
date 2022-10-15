<?php

require_once 'Message.php';

class GuestBook {

    private $file;

    public function __construct(string $file)
    {
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        if (!file_exists($file)) {
            touch($file);
        }
        $this->file = $file;
    }

    public function addMessage(Message $message) :void 
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    public function getMessage() :array
    {
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $messages = [];
        foreach ($lines as $line) {
            $messages[] = json_decode($line, true);
        }
        var_dump($messages);
    }
}