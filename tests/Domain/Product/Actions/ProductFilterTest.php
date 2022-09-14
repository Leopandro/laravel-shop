<?php

namespace Tests\Domain\Payment\Actions;

use App\Domain\Category\ProductCategory;
use App\Domain\Order\Projections\States\CanceledOrderState;
use App\Domain\Payment\Actions\FailPayment;
use App\Domain\Payment\States\FailedPaymentState;
use App\Domain\Product\Product;
use App\Domain\ProductCity\ProductCity;
use Carbon\Carbon;
use Tests\Domain\Factories\PaymentAggregateFactory;
use Tests\TestCase;

class ProductFilterTest extends TestCase
{

    /** @test */
    public function test_fail_payment(): void
    {
        Carbon::setTestNow('2020-01-01');

        $payment = PaymentAggregateFactory::new()->create();

        $payment = (new FailPayment)($payment);

        $this->assertTrue($payment->state->equals(FailedPaymentState::class));
        $this->assertTrue(Carbon::create('2020-01-01')->eq($payment->failed_at));
    }

    /** @test */
    public function order_is_cancelled(): void
    {
        Carbon::setTestNow('2020-01-01');

        $payment = PaymentAggregateFactory::new()->create();

        $payment = (new FailPayment)($payment);

        $this->assertTrue($payment->order->state->equals(CanceledOrderState::class));
        $this->assertTrue(Carbon::create('2020-01-01')->eq($payment->order->canceled_at));
    }
}
