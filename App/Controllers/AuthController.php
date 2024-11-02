<?php

namespace App\Controllers;

use App\Configuration;
use Exception;
use Framework\Core\ControllerBase;
use Framework\Http\Responses\Response;
use Framework\Http\Responses\ViewResponse;

/**
 * Class AuthController
 *
 * This controller handles authentication actions such as login, logout, and redirection to the login page. It manages
 * user sessions and interactions with the authentication system.
 *
 * @package App\Controllers
 */
class AuthController extends ControllerBase
{
    /**
     * Redirects to the login page.
     *
     * This action serves as the default landing point for the authentication section of the application, directing
     * users to the login URL specified in the configuration.
     *
     * @return \Framework\Http\Responses\Response The response object for the redirection to the login page.
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Authenticates a user and processes the login request.
     *
     * This action handles user login attempts. If the login form is submitted, it attempts to authenticate the user
     * with the provided credentials. Upon successful login, the user is redirected to the admin dashboard.
     * If authentication fails, an error message is displayed on the login page.
     *
     * @return Response The response object which can either redirect on success or render the login view with
     *                  an error message on failure.
     * @throws Exception If the parameter for the URL generator is invalid throws an exception.
     */
    public function login(): Response
    {
        $request = $this->getRequest();
        $logged = null;
        if ($request->hasValue('submit')) {
            $logged = $this->app->getAuth()->login($request->value('login'), $request->value('password'));
            if ($logged) {
                return $this->redirect($this->url("admin.index"));
            }
        }

        $message = $logged === false ? 'Zlý login alebo heslo!' : null;
        return $this->html(compact("message"));
    }

    /**
     * Logs out the current user.
     *
     * This action terminates the user's session and redirects them to a view. It effectively clears any authentication
     * tokens or session data associated with the user.
     *
     * @return ViewResponse The response object that renders the logout view.
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }
}
