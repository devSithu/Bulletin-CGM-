<?php

namespace App\Contracts\Dao;

interface NewsDaoInterface {

    public function store( $userData);
    public function destroy($id);
    public function update_page($id);
    public function update($userData,$id);
     
}