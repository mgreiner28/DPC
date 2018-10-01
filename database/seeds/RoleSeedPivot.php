<?php

use Illuminate\Database\Seeder;

class RoleSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'permission' => [1, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 2, 3, 4, 5, 6, 27, 28, 29, 30, 31, 32, 38, 39, 40, 41, 42],
            ],
            2 => [
                'permission' => [2, 3, 4, 5, 27, 28, 31, 38, 40, 42],
            ],
            3 => [
                'permission' => [27, 28, 29, 30, 31, 32, 38, 39, 40, 41, 42],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = \App\Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}
