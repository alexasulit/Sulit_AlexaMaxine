<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Fetch users with LIMIT & OFFSET
    public function get_paginated($limit, $offset)
{
    return $this->db->table($this->table)
                    ->order_by('id', 'ASC')
                    ->limit($offset, $limit) // <-- AYUSIN DITO: OFFSET muna bago LIMIT
                    ->get_all();
}


    // Count total users
    public function count_all_users()
    {
        $row = $this->db->table($this->table)
                        ->select('COUNT(*) as total')
                        ->get();
        return isset($row['total']) ? (int)$row['total'] : 0;
    }
}
