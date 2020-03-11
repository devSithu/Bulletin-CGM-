<?php

namespace App\Contracts\Service;

use Illuminate\Http\Request;



interface NewsServiceInterface {
   
    public function store(Request $request);
    public function destroy($id);
    public function update_page($id);
    public function update(Request $request,$id);
   
   
}