<?php

namespace LaravelCMS\Helpers;

class MessageRenderer
{

    protected $resource;
    protected $resourceType;

    /**
     * Constructs the class
     */
    public function __construct ($resource, ...$args)
    {
        $this->resourceType = $resource;
        $this->resource = $this->{'build'.ucwords($resource).'Alert'}(...$args);
    }

    /**
     * Builds the errors
     * @return view
     */
    public static function errors ($validationErrors = [], $errors = [])
    {
        $self = new self (
            'danger',
            $validationErrors ? $validationErrors : [],
            $errors ? $errors : []
        );
        return $self->render();
    }

    /**
     * Builds the messages
     *
     * @return view
     */
    public static function messages ($messages = [])
    {
        $self = new self ('message', $messages);
        return $self->render();
    }

    /**
     * Builds the successes
     *
     * @return view
     */
    public static function successes ($successes = [])
    {
        $self = new self ('primary', $successes);
        return $self->render();
    }

    /**
     * Builds the successes
     *
     * @return view
     */
    public static function warnings ($warnings = [])
    {
        $self = new self ('warning', $warnings);
        return $self->render();
    }

    /**
     * Renders all the resources
     * @return HTML
     */
    private function render ()
    {
        echo view('cms::components.Alerts')->with([
            'resourceType' => $this->resourceType,
            'resource' => $this->resource ? $this->resource : []
        ])->render();
    }

    /**
     * Builds the errors
     */
    private function buildDangerAlert ($validationErrors, $errors)
    {
        return array_merge($validationErrors, $errors);
    }

    /**
     * Builds the messages
     */
    private function buildMessageAlert ($messages = [])
    {
        return $messages;
    }

    /**
     * Builds the successes
     */
    private function buildPrimaryAlert ($successes = [])
    {
        return $successes;
    }

    /**
     * Builds the warnings
     */
    private function buildWarningAlert ($warnings = [])
    {
        return $warnings;
    }
}
