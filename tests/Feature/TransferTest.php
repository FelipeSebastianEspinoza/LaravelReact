<?php

namespace Tests\Feature;

use App\Wallet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Transfer;


class TransferTest extends TestCase
{
    use RefreshDatabase;

    public function testPostTransfer()
    {
        $wallet = factory(Wallet::class)->create();
        $transfer = factory(Transfer::class)->make();
        $response = $this->json(
            'Post',
            '/api/transfer',
            [
                'description' => $transfer->description,
                'amount' => $transfer->amount,
                'wallet_id' => $wallet->id
            ]
        );

        $response->assertJsonStructure([
            'id', 'description', 'amount', 'wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' =>  $wallet->id
        ]);
        $this->assertDatabaseHas('wallets',[
            'id' => $wallet->id,
            'money' => $wallet->money + $transfer->amount
        ]);
    }
}
