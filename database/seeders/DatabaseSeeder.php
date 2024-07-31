<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionTax;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $transaction = Transaction::create([
            'reference' => 'asdasdas',
            'amount' => '12300',
            'currency' => 'USD',
            'status' => 'success',
        ]);

        TransactionTax::create([
            'transaction_id' => $transaction->id,
            'calc_id' => '1sdafas',
            'reference' => 'asdcsvsd',
            'amount' => '1200',
            'rate' => '2200',
            'country' => 'IE'
        ]);
    }
}
