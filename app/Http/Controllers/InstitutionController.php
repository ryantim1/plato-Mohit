<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Institution;
use Yajra\Datatables\Datatables;
use App\User;
use Illuminate\Support\Collection;
use Yajra\DataTables\EloquentDataTable;

class InstitutionController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index($layout_type = '')
    {   
         if(!checkRole(getUserGrade(2)))
        {
          prepareBlockUserMessage();
          return back();
        }
        
        $institution=Institution::where('id',auth()->user()->inst_id)->first();
        $data['institutions']=$institution->users;
        $data['records']      = FALSE;
        $data['layout']      = getLayout();
        $data['active_class'] = 'institutions';
        $data['heading']      =  getPhrase('Institutions').'/'.getPhrase($institution->institution_name);
        $data['title']        = getPhrase('Users');
        $view_name = getTheme().'::institution.index';
        return view($view_name, $data);

    }

    



  
}
