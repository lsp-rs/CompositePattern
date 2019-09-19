<?php

/*
    Este é um componente Folha. Como todas as folhas, não pode ter filhos.
*/
class Input extends FormElement {
    private $type;

    public function __construct(string $name, string $title, string $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    /*
        Como os componentes Leaf não têm filhos que possam lidar com a maior
        parte do trabalho para eles, geralmente são as folhas que fazem a maior
        parte do trabalho pesado dentro do padrão Composite.
    */
    public function render(): string
    {
        return "<label for=\"{$this->name}\">{$this->title}</label>\n" .
            "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n";
    }
}

?>