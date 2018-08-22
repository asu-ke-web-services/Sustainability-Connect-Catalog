<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        User::withoutSyncingToSearch(function () {
            // Import old Users data

            $old_users = DB::connection('old')->table('wp_users')->get();

            foreach ($old_users as $old_user) {

                $old_user_asurite = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'asurite')
                        ->value('meta_value');
                $old_user_nick    = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'nickname')
                        ->value('meta_value');
                $old_user_first_name         = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'first_name')
                        ->value('meta_value');
                $old_user_last_name          = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'last_name')
                        ->value('meta_value');
                $old_user_wp_capabilities    = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'wp_capabilities')
                        ->value('meta_value');
                $old_user_last_login         = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'last_login')
                        ->value('meta_value');
                $old_user_type               = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'type')
                        ->value('meta_value');
                $old_user_phone              = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'phone')
                        ->value('meta_value');
                $old_user_research_interests = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'research_interests')
                        ->value('meta_value');
                $old_user_degree_program     = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'degree_program')
                        ->value('meta_value');
                $old_user_graduation_date    = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'graduation_date')
                        ->value('meta_value');
                $old_user_degree_level       = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'degree_level')
                        ->value('meta_value');
                $old_user_organization_name  = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'organization_name')
                        ->value('meta_value');
                $old_user_organization_url   = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'organization_url')
                        ->value('meta_value');
                $old_user_sos_eligible       = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'sos_eligible')
                        ->value('meta_value');
                $old_user_sos_verified       = DB::connection('old')->table('wp_usermeta')
                        ->where('user_id', $old_user->ID)
                        ->where('meta_key', 'sos_verified')
                        ->value('meta_value');


                if ($old_user_degree_level === "Bachelors") {
                    $degree_level_id = 1;
                } elseif ($old_user_degree_level === "Masters") {
                    $degree_level_id = 2;
                }

                if ($old_user_graduation_date != '' && $old_user_graduation_date != '00000000') {
                    $old_user_graduation_date = substr($old_user_graduation_date, 0, 4) .'-'. substr($old_user_graduation_date, 4, 2) .'-'. substr($old_user_graduation_date, 6, 2);
                } else {
                    $old_user_graduation_date = null;
                }

                $new_user = User::create([
                    'id'                      => $old_user->ID,
                    'name'                    => $old_user->display_name ?? null,
                    'first_name'              => $old_user_first_name ?? null,
                    'last_name'               => $old_user_last_name ?? null,
                    'login_name'              => $old_user->user_login ?? null,
                    'email'                   => empty($old_user->user_email) ? $old_user->user_login : $old_user->user_email,
                    'password'                => $old_user->user_pass,
                    'type'                    => $old_user_type ?? null,
                    'asurite'                 => $old_user_asurite ?? null,
                    'student_degree_level_id' => $degree_level_id ?? null,
                    'degree_program'          => $old_user_degree_program ?? null,
                    'graduation_date'         => $old_user_graduation_date ?? null,
                    'phone'                   => $old_user_phone ?? null,
                    'research_interests'      => $old_user_research_interests ?? null,
                    'department'              => $old_user_department ?? null,
                    // 'organization_id'         => $old_user->,
                    // 'created_at'              => $old_user->user_registered,
                    // 'updated_at'              => $old_user->updated,
                    'created_by'              => 1,
                    'updated_by'              => 1,
                ]);


                if ($old_user_sos_eligible == 1 || $old_user_sos_verified == 1) {
                    DB::table('affiliation_user')->insert([
                        'user_id' => $old_user->ID,
                        'affiliation_id' => 16,
                        'order' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'created_by' => 1,
                        'updated_by' => 1,
                    ]);
                }
            }
        });
    }
}
