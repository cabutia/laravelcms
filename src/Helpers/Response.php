<?php

namespace LaravelCMS\Helpers;

use Illuminate\Contracts\View\Factory as ViewFactory;

class Response
{

    protected $type;
    protected $view;
    protected $route;
    protected $redirect;
    protected $response;

    protected $errors;
    protected $warnings;
    protected $messages;
    protected $successes;

    public function debug ()
    {
        dump($this);
    }

    /**
     * Constructs the class
     */
    public function __construct ($responseType, $resource, ...$args)
    {
        $this->type = strtolower($responseType);
        $this->response = $this->{'build'.ucwords($responseType).'Response'}($resource, ...$args);
    }

    /**
     * Generates a View response
     * @return View
     */
    public static function view (...$args)
    {
        $self = new self ('view', ...$args);
        return $self;
    }

    /**
     * Generates a Redirect response
     * @return Redirect
     */
    public static function redirect (...$args)
    {
        $self = new self ('redirect', ...$args);
        return $self;
    }

    /**
     * Builds a View response
     * @return this
     */
    public function buildViewResponse ($view)
    {
        $factory = app(ViewFactory::class);
        $this->view = $factory->make('cms::'.$view, [], []);
    }

    /**
     * Builds a redirect response
     * @return this
     */
    public function buildRedirectResponse ($to, $route = true, $prefix = true)
    {
        $url = !$route ? $to : ($prefix ? 'cms::'.$to : $to);
        $this->redirect = app('redirect')->to($route ? route($url) : $url, 302, [], null);
        return $this;
    }

    /**
     * Appends data to response
     * @return this
     */
    public function with (...$args)
    {
        $this->{$this->type}->with(...$args);
        return $this;
    }

    /**
     * Attach an error to response
     * @return this
     */
    public function error ($error)
    {
        $this->errors[] = $error;
        // $this->{$this->type}->withErrors(...$args);
        return $this;
    }

    /**
     * Attach a message to the response
     * @return this
     */
    public function message ($message)
    {
        $this->messages[] = $message;
        return $this;
    }

    /**
     * Attach a success message to the response
     * @return this
     */
    public function success ($success)
    {
        $this->successes[] = $success;
        return $this;
    }

    /**
     * Attach a warning message to the response
     * @return this
     */
    public function warning ($warning)
    {
        $this->warnings[] = $warning;
        return $this;
    }

    /**
     * Sends the response
     * @return Response
     */
    public function send ()
    {
        $response = $this->{$this->type};
        $response->with([
            '__cms_successes' => $this->successes,
            '__cms_errors' => $this->errors,
            '__cms_messages' => $this->messages,
            '__cms_warnings' => $this->warnings,
        ]);
        return $response;
    }
}
