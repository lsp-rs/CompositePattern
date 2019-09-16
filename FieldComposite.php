<?php

/*
    A classe Composite base implementa a infraestrutura para gerenciar objetos
    filhos, reutilizados por todos os Concrete Composites.
*/
abstract class FieldComposite extends FormElement {
    protected $fields = [];

    /*
        Os métodos para adicionar/remover subobjetos.
    */
    public function add(FormElement $field): void
    {
        $name = $field->getName();
        $this->fields[$name] = $field;
    }

    public function remove(FormElement $component): void
    {
        $this->fields = array_filter($this->fields, function ($child) use ($component) {
            return $child != $component;
        });
    }

    /*
        Enquanto o método de Leaf apenas faz o trabalho, o método
        do Composite quase sempre precisa levar em consideração seus
        subobjetos. Nesse caso, o composto pode aceitar dados estruturados.
    */
    public function setData($data): void
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }
    }

    /*
        A mesma lógica se aplica ao getter. Ele retorna os dados estruturados
        do próprio composto (se houver) e todos os dados filhos.
    */
    public function getData(): array
    {
        $data = [];
        
        foreach ($this->fields as $name => $field) {
            $data[$name] = $field->getData();
        }
        
        return $data;
    }

    /*
        A implementação básica da renderização do Composite simplesmente combina
        resultados de todos os filhos. A Concrete Composites poderá reutilizar
        essa implementação em suas implementações reais de renderização.
    */
    public function render(): string
    {
        $output = "";
        
        foreach ($this->fields as $name => $field) {
            $output .= $field->render();
        }
        
        return $output;
    }
}

?>