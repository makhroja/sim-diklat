<?php

class DashboardController extends BaseController
{

    public function __construct()
    {

    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return View::make('admin.dashboard', $data);
    }


    
}
