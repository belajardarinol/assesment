<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'cpl_create',
            ],
            [
                'id'    => 18,
                'title' => 'cpl_edit',
            ],
            [
                'id'    => 19,
                'title' => 'cpl_show',
            ],
            [
                'id'    => 20,
                'title' => 'cpl_delete',
            ],
            [
                'id'    => 21,
                'title' => 'cpl_access',
            ],
            [
                'id'    => 22,
                'title' => 'sub_cpmk_create',
            ],
            [
                'id'    => 23,
                'title' => 'sub_cpmk_edit',
            ],
            [
                'id'    => 24,
                'title' => 'sub_cpmk_show',
            ],
            [
                'id'    => 25,
                'title' => 'sub_cpmk_delete',
            ],
            [
                'id'    => 26,
                'title' => 'sub_cpmk_access',
            ],
            [
                'id'    => 27,
                'title' => 'mata_kuliah_create',
            ],
            [
                'id'    => 28,
                'title' => 'mata_kuliah_edit',
            ],
            [
                'id'    => 29,
                'title' => 'mata_kuliah_show',
            ],
            [
                'id'    => 30,
                'title' => 'mata_kuliah_delete',
            ],
            [
                'id'    => 31,
                'title' => 'mata_kuliah_access',
            ],
            [
                'id'    => 32,
                'title' => 'kela_create',
            ],
            [
                'id'    => 33,
                'title' => 'kela_edit',
            ],
            [
                'id'    => 34,
                'title' => 'kela_show',
            ],
            [
                'id'    => 35,
                'title' => 'kela_delete',
            ],
            [
                'id'    => 36,
                'title' => 'kela_access',
            ],
            [
                'id'    => 37,
                'title' => 'indikator_create',
            ],
            [
                'id'    => 38,
                'title' => 'indikator_edit',
            ],
            [
                'id'    => 39,
                'title' => 'indikator_show',
            ],
            [
                'id'    => 40,
                'title' => 'indikator_delete',
            ],
            [
                'id'    => 41,
                'title' => 'indikator_access',
            ],
            [
                'id'    => 42,
                'title' => 'cpmk_create',
            ],
            [
                'id'    => 43,
                'title' => 'cpmk_edit',
            ],
            [
                'id'    => 44,
                'title' => 'cpmk_show',
            ],
            [
                'id'    => 45,
                'title' => 'cpmk_delete',
            ],
            [
                'id'    => 46,
                'title' => 'cpmk_access',
            ],
            [
                'id'    => 47,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 48,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 49,
                'title' => 'team_create',
            ],
            [
                'id'    => 50,
                'title' => 'team_edit',
            ],
            [
                'id'    => 51,
                'title' => 'team_show',
            ],
            [
                'id'    => 52,
                'title' => 'team_delete',
            ],
            [
                'id'    => 53,
                'title' => 'team_access',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 57,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 58,
                'title' => 'klasifikasi_edit',
            ],
            [
                'id'    => 59,
                'title' => 'klasifikasi_show',
            ],
            [
                'id'    => 60,
                'title' => 'klasifikasi_delete',
            ],
            [
                'id'    => 61,
                'title' => 'klasifikasi_access',
            ],
            [
                'id'    => 62,
                'title' => 'bab_create',
            ],
            [
                'id'    => 63,
                'title' => 'bab_edit',
            ],
            [
                'id'    => 64,
                'title' => 'bab_show',
            ],
            [
                'id'    => 65,
                'title' => 'bab_delete',
            ],
            [
                'id'    => 66,
                'title' => 'bab_access',
            ],
            [
                'id'    => 67,
                'title' => 'sub_bab_create',
            ],
            [
                'id'    => 68,
                'title' => 'sub_bab_edit',
            ],
            [
                'id'    => 69,
                'title' => 'sub_bab_show',
            ],
            [
                'id'    => 70,
                'title' => 'sub_bab_delete',
            ],
            [
                'id'    => 71,
                'title' => 'sub_bab_access',
            ],
            [
                'id'    => 72,
                'title' => 'materi_create',
            ],
            [
                'id'    => 73,
                'title' => 'materi_edit',
            ],
            [
                'id'    => 74,
                'title' => 'materi_show',
            ],
            [
                'id'    => 75,
                'title' => 'materi_delete',
            ],
            [
                'id'    => 76,
                'title' => 'materi_access',
            ],

            [
                'id'    => 77,
                'title' => 'klasifikasi_create',
            ],
            [
                'id'    => 78,
                'title' => 'profile_password_edit',
            ],

        ];

        Permission::insert($permissions);
    }
}
