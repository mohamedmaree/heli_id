<?php

namespace App\Builders;
class Input {
    // private string $input;
    // private string $type;
    // private string | array $text;
    // private int $col_md = 6;
    // private array | null $attributes;
    // private array | bool | null $validation;
    // private array | null $options;
    // private array | null $files;
    // private bool $ckeditor = false;

    // public function __construct(InputBuilder $builder) {
    //     $this->input      = $builder->getInput();
    //     $this->type       = $builder->getType();
    //     $this->text       = $builder->getText();
    //     $this->col_md     = $builder->getColMd();
    //     $this->attributes = $builder->getAttributes();
    //     $this->validation = $builder->getValidation();
    //     $this->options    = $builder->getOptions();
    //     $this->files      = $builder->getFiles();
    //     $this->ckeditor   = $builder->getCkEditior();

    //     // $this->createInput();
    // }

    /******************** start create inputs of the default html ************************/

    // create input type = the selected type default is text
    static function createInput(string $type = 'text', string $title) {
        $input = new InputBuilder('input', $title);
        return $input->type($type);
    }

    // create input type = text
    static function textInput(string $title) {
        $input = new InputBuilder('input', $title);
        return $input->type('text');
    }

    // create input type = email
    static function emailInput(string | null $title = null) {
        $emailTitle = $title;
        if ($title == null) {
            $emailTitle = __('admin.email');
        }
        $input = new InputBuilder('input', $emailTitle);
        return $input->type('email');
    }

    // create input type = number
    static function numberInput(string $title) {
        $input = new InputBuilder('input', $title);
        return $input->type('number');
    }

    
    // create input textarea
    static function textareaInput(string $title) {
        $input = new InputBuilder('textarea', $title);
        return $input;
    }

    // create two inputs textarea [ar] ,[en]
    static function createArEnTextarea(string $title_ar, string $title_en) {
        $input = new InputBuilder('textarea_ar_en', ['ar' => $title_ar, 'en' => $title_en]);
        return $input;
    }
    /******************** end create inputs of the default html ************************/

    // create input type = any but the default is text create two inputs [ar] ,[en]
    static function createArEnInput(string $title_ar, string $title_en) {
        $input = new InputBuilder('input_ar_en', ['ar' => $title_ar, 'en' => $title_en]);
        return $input->type('text');
    }

    // create input for preview and upload image
    static function imageInput(string | null $title = '') {
        $input = new InputBuilder('image', $title);
        return $input->colMd(12);
    }

    // create custom input 
    // to use this custom add @section('input name')@endsection after "css" section
    static function customInput(){
        $input = new InputBuilder('custom' ,'');
        return $input;
    }

    // create single select input
    static function selectInput(string  $title , $array, string $value_column = 'id', string $option_text = 'name') {
        $input = new InputBuilder('single_select', $title);
        return $input->options($array ,$value_column ,$option_text)->colMd(12);
    }

    // create multiple select input
    static function multipleSelectInput(string  $title , $array, string $value_column = 'id', string $option_text = 'name') {
        $input = new InputBuilder('multiple_select', $title);
        return $input->options($array ,$value_column ,$option_text)->colMd(12);
    }
    
    // create files input
    static function filesInput(string  $title , $array, string $value_column = 'image') {
        $input = new InputBuilder('files', $title);
        return $input->files($array ,$value_column)->colMd(12);
    }

    // create seo inputs
    static function seoInputs() {
        $input = new InputBuilder('seo', '');
        return $input;
    }

    // create map inputs
    static function mapInputs(string $title = ''){
        $input = new InputBuilder('map', $title);
        return $input->colMd(12);
    }
}