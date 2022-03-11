<?php
namespace Simplecode\InputType\Types;
/**
 * Phone type
 * @inheritDoc
 */
class Phone extends AbstractTypage{
    /**
     * Inputs
     *
     * @var string
     */
    protected $input;

    protected $type = __CLASS__;

    public function __construct($value, bool $throw_exception = false)
    {
        $this->throw_exception = $throw_exception;
        $this->set($value);

    }
    public function isValid(): bool
    {
        return preg_match('/^\+{0,1}[0-9]{8,40}$/', $this->input);
    }
    public function set($value)
    {
        $this->input = $this->filter($value) ;
        parent::set($this->input);
    }

    private function filter($input){
       return preg_replace('/[.-]/','', 
            preg_replace('/\s/', '',
                preg_replace('/\s\s+/', ' ', $input)));
    }
}