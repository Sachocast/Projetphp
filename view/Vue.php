<?php

class Vue
{
    private $file;
    private $title;

    public function __construct($action)
    {
        $this->file = __DIR__ . "/{$action}.php";
    }

    private function generateVue(string $file, array $data): string
    {
        if (file_exists($file))
        {
            extract($data);
            ob_start();
            require($file);
            return ob_get_clean();
        } else {
            throw new Exception("Unable to find {$file}");
        }
    }

    public function display(array $data)
    {
        $content = $this->generateVue($this->file, $data);

        $template = $this->generateVue(
            __DIR__ . '/template.php',
            ['title' => $this->title, 'content' => $content]
        );

        echo $template;
    }

}

?>