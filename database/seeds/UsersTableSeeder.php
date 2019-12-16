<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ketua
        $ketua = factory(User::class)->create([

            'name'     => 'kasie teknik',
            'email'    => 'kasieteknik@bumida.com',
            'address' => 'Jl.terus berhenti kaga lapar ia',
            'ttl' => '11-11-1992',
            'telp_rumah' => '03003393939',
            'phone' => '0893432423',
            'pekerjaan' => 'ngangur euy',
            'email_verified_at' => now(),
            'password' => bcrypt('bumida'),
        ]);

        $ketua->assignRole('kasie teknik');

        $this->command->info('>_ Here is your kasie teknik details to login:');
        $this->command->warn($ketua->email);
        $this->command->warn('Password is "bumida"');

        // bendahara
        $bendahara = factory(User::class)->create([

            'name'     => 'staff teknik',
            'email'    => 'staffteknik@bumida.com',
            'address' => 'Jl.terus berhenti kaga lapar ia',
            'ttl' => '11-11-1992',
            'telp_rumah' => '03003393939',
            'phone' => '0893432423',
            'pekerjaan' => 'ngangur euy',
            'email_verified_at' => now(),
            'password' => bcrypt('bumida'),
        ]);

        $bendahara->assignRole('staff teknik');

        $this->command->info('>_ Here is your staff teknik details to login:');
        $this->command->warn($bendahara->email);
        $this->command->warn('Password is "bumida"');

        // sekretaris
        $sekretaris = factory(User::class)->create([

            'name'     => 'kasir',
            'email'    => 'kasir@bumida.com',
            'address' => 'Jl.terus berhenti kaga lapar ia',
            'ttl' => '11-11-1992',
            'telp_rumah' => '03003393939',
            'phone' => '0893432423',
            'pekerjaan' => 'ngangur euy',
            'email_verified_at' => now(),
            'password' => bcrypt('bumida'),
        ]);

        $sekretaris->assignRole('kasir');

        $this->command->info('>_ Here is your kasir details to login:');
        $this->command->warn($sekretaris->email);
        $this->command->warn('Password is "bumida"');

        // customer
        $sekretaris = factory(User::class)->create([

            'name'     => 'customer',
            'email'    => 'customer@bumida.com',
            'address' => 'Jl.terus berhenti kaga lapar ia',
            'ttl' => '11-11-1992',
            'telp_rumah' => '03003393939',
            'phone' => '0893432423',
            'pekerjaan' => 'ngangur euy',
            'email_verified_at' => now(),
            'password' => bcrypt('bumida'),
        ]);

        $sekretaris->assignRole('customer');

        $this->command->info('>_ Here is customer kasir details to login:');
        $this->command->warn($sekretaris->email);
        $this->command->warn('Password is "bumida"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
