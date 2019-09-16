<?php

include_once 'InputLeaf.php';
include_once 'FieldComposite.php';
include_once 'FieldsetComposite.php';

/*
    A classe Component base declara uma interface
    para todos os componentes concretos, simples e
    complexos. Em nosso exemplo, focaremos no
    comportamento de renderização dos elementos DOM. 
*/

abstract class FormElement {
    //  Podemos antecipar que todos os elementos DOM exigem esses 3 campos.
    
    protected $name;
    protected $title;
    protected $data;

    public function __construct(string $name, string $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /*
        Cada elemento DOM concreto deve fornecer sua implementação de renderização,
        mas podemos assumir com segurança que todos eles estão retornando strings.
    */
    abstract public function render(): string;
}

?>