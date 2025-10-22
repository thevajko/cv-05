<?php

namespace App\Controllers;

use App\Helpers\Calculations;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class HomeController
 * Handles actions related to the home page and other public actions.
 *
 * This controller includes actions that are accessible to all users, including a default landing page and a contact
 * page. It provides a mechanism for authorizing actions based on user permissions.
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    /**
     * Authorizes controller actions based on the specified action name.
     *
     * In this implementation, all actions are authorized unconditionally.
     *
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(string $action): bool
    {
        return true;
    }

    /**
     * Displays the default home page.
     *
     * This action serves the main HTML view of the home page.
     *
     * @return Response The response object containing the rendered HTML for the home page.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Displays the contact page.
     *
     * This action serves the HTML view for the contact page, which is accessible to all users without any
     * authorization.
     *
     * @return Response The response object containing the rendered HTML for the contact page.
     */
    public function contact(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Calculates the factorial of a number and displays the result.
     *
     * This action computes the factorial of 12 and returns an HTML view with the result.
     *
     * @return Response The response object containing the rendered HTML with the factorial result.
     */
    public function factorial() : Response
    {
        $number = 12;
        $result = Calculations::factorial($number);
        return $this->html(compact('number', 'result'));
    }

    /**
     * Displays headings based on a specified count.
     *
     * This action serves an HTML view that includes headings, with the count set to 10.
     *
     * @return Response The response object containing the rendered HTML with the headings.
     */
    public function headings() : Response {
        return $this->html([
            'count' => 10
        ]);
    }

}
