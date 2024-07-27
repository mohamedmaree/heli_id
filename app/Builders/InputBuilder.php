<?php

namespace App\Builders;
class InputBuilder {
    private string $input;
    private string $type = 'text';
    private string | array $text;
    private int $col_md                        = 6;
    private bool | null $ckeditor              = null;
    private array | null $attributes           = null;
    private array | bool | null $validation    = null;
    private array | null $options              = null;
    private array | null $files                = null;
    private array | null $map_address          = null;
    private string | array | null $placeholder = null;
    private array | null $optionData           = null;

    public function __construct(string $input, string | array $title) {
        $this->input = $input;
        $this->text  = $title;
    }

    public function getInput() {
        return $this->input;
    }

    public function getText() {
        return $this->text;
    }

    public function type(string $type) {
        $this->type = $type;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function colMd(int $columns = 6) {
        $this->col_md = $columns;
        return $this;
    }

    public function getColMd() {
        return $this->col_md;
    }

    public function attribute(string $attribute, string $value) {
        $this->attributes[$attribute] = $value;
        return $this;
    }

    public function getAttributes() {
        return $this->attributes;
    }

    public function validation(string $type, string $message, string | int | null $value = null) {
        $validation            = [];
        $validation['type']    = $type;
        $validation['message'] = $message;
        if ($value !== null) {
            $validation['value'] = $value;
        }
        $this->validation[] = $validation;
        return $this;
    }

    public function noValidation(){
        $this->validation = false;
        return $this;
    }

    public function getValidation() {
        return $this->validation;
    }

    public function options($array, string $value_column = 'id', string $option_text = 'name') {
        $this->options['array'] = $array;
        $this->options['value'] = $value_column;
        $this->options['text']  = $option_text;
        return $this;
    }

    public function getOptions() {
        return $this->options;
    }

    public function files($array = [], string $value_column) {
        $this->files['array'] = $array;
        $this->files['value'] = $value_column;
        return $this;
    }
    public function deleteRoute(string $delete_route) {
        $this->files['url'] = $delete_route;
        return $this;
    }
    public function fileName(string $file_name_column = 'file_name') {
        $this->files['text'] = $file_name_column;
        return $this;
    }

    public function getFiles() {
        return $this->files;
    }

    public function ckEditor() {
        $this->validation = false;
        $this->col_md     = 12;
        $this->ckeditor   = true;
        return $this;
    }

    public function getCkEditior() {
        return $this->ckeditor;
    }

    public function placeholder(string $text) {
        $this->placeholder = $text;
        return $this;
    }

    public function placeholderArEn(string $text_ar, string $text_en) {
        $this->placeholder = [
            'ar' => $text_ar,
            'en' => $text_en,
        ];
        return $this;
    }

    public function getPlaceholder() {
        return $this->placeholder;
    }

    public function mapAddress(string $title = null, string $name = 'address') {
        $this->map_address = [
            'title' => $title,
            'name'  => $name,
        ];
        return $this;
    }

    public function getMapAddress() {
        return $this->map_address;
    }

    public function optionData($name, $value_cloumn) {
        $this->optionData['name']  = $name;
        $this->optionData['value'] = $value_cloumn;
        return $this;
    }

    public function getOptionData() {
        return $this->optionData;
    }

    public function build() {
        // return new Input($this);
        return [
            'input'       => $this->input,
            'type'        => $this->type,
            'text'        => $this->text,
            'col_md'      => $this->col_md,
            'attributes'  => $this->attributes,
            'validation'  => $this->validation,
            'options'     => $this->options,
            'files'       => $this->files,
            'ckeditor'    => $this->ckeditor,
            'placeholder' => $this->placeholder,
            'map_address' => $this->map_address,
            'optionData'  => $this->optionData,
        ];
    }
}