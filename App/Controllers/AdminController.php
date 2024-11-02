<?php

namespace App\Controllers;

use Framework\Core\ControllerBase;
use Framework\Http\Responses\Response;

/**
 * Class AdminController
 *
 * This controller manages admin-related actions within the application.It extends the base controller functionality
 * provided by ControllerBase.
 *
 * @package App\Controllers
 */
class AdminController extends ControllerBase
{
    /**
     * Authorizes actions in this controller.
     *
     * This method checks if the user is logged in, allowing or denying access to specific actions based
     * on the authentication state.
     *
     * @param string $action The name of the action to authorize.
     * @return bool Returns true if the user is logged in; false otherwise.
     */
    public function authorize(string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Displays the index page of the admin panel.
     *
     * This action requires authorization. It returns an HTML response for the admin dashboard or main page.
     *
     * @return \Framework\Http\Responses\Response Returns a response object containing the rendered HTML.
     */
    public function index(): Response
    {
        return $this->html();
    }
}
