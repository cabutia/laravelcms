<?php

namespace LaravelCMS\Helpers;

class MessageRenderer
{

    protected $resource;

    /**
     * Constructs the class
     */
    public function __construct ($resource, ...$args)
    {
        $this->resource = $this->{'build'.ucwords($resource)}(...$args);
    }

    /**
     * Builds the errors
     * @return self
     */
    public static function errors ($validationErrors = [], $errors = [])
    {
        $self = new self (
            'errors',
            $validationErrors ? $validationErrors : [],
            $errors ? $errors : []
        );
        return $self->render();
    }

    /**
     * Renders all the resources
     * @return HTML
     */
    private function render ()
    {
        $template = 'Hello :)';
        return $template;
    }

    /**
     * Builds the errors
     */
    private function buildErrors ($validationErrors, $errors)
    {
        dump([
            'Validation' => $validationErrors,
            'Error messages' => $errors
        ]);
        return '';
    }
}
