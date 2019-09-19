<?php

//    O elemento fieldset é um composto.
class Fieldset extends FieldComposite {
    public function render(): string {
        /*
            Observe como o resultado da renderização combinada de filhos
            é incorporado à tag fieldset.
        */
        $output = parent::render();
        
        return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
    }
}

//    E assim é o elemento do formulário.
class Form extends FieldComposite
{
    protected $url;

    public function __construct(string $name, string $title, string $url)
    {
        parent::__construct($name, $title);
        $this->url = $url;
    }

    public function render(): string
    {
        $output = parent::render();
        return "<form action=\"{$this->url}\">\n<h3>{$this->title}</h3>\n$output</form>\n";
    }
}

?>