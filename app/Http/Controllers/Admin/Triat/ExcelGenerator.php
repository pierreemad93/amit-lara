<?php 
namespace App\Http\Controllers\Admin\Triat;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelGenerator{

    public function importView()
    { 
      
        return view('admin.users.import');
    }

    public function import() 
    {
       
        Excel::import(new UsersImport,request()->file('file'));     
        return back();
    }

    public function export() 
    {   
        
        return Excel::download(new UsersExport, 'users.xlsx');
    }

  

}