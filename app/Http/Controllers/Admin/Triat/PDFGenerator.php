<?php
namespace App\Http\Controllers\Admin\Triat;
use App\Models\User;
use PDF;
trait PDFGenerator{
     
    public function UsersPDF(){
       $users = User::all();
       $pdf = PDF::loadView('admin.users.myPDF', compact('users'));
       return $pdf->download('Users.pdf');
    }

}