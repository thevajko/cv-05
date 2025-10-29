<?php

namespace App\Controllers;

use App\Helpers\Calculation;
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


    public function faktorial(Request $request): Response
    {
        $cislo = $request->get('cislo') ?? 5;
        $faktorial = Calculation::factorial($cislo);

        return $this->html(['cislo' => $cislo, 'faktorial' => $faktorial]);
    }

    /**
     * Displays a page with a list of headings (nadpisy).
     * The view will render $count headings; default is 10.
     *
     * @param Request $request
     * @return Response
     */
    public function nadpisy(Request $request): Response
    {
        $count = 10;
        return $this->html(['count' => $count]);
    }
}
