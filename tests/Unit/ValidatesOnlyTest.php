<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use Livewire\Livewire;

class ValidatesOnlyTest extends TestCase
{
    /** @test */
    public function a_set_of_items_will_validate_individually()
    {
        if (version_compare(PHP_VERSION, '7.4', '<')) {
            $this->markTestSkipped('Typed Property Initialization not supported prior to PHP 7.4');
        }

        require_once __DIR__.'/ValidatesOnlyStub.php';

        Livewire::test(ValidatesOnlyTestComponent::class, ['image' => 'image', 'imageAlt' => 'This is an image'])
            ->call('runValidateOnly', 'image_alt')
            ->assertHasNoErrors(['image_alt', 'image_url', 'image'])
            ->call('runValidateOnly', 'image_url')
            ->assertHasNoErrors(['image', 'image_url', 'image_alt'])
            ->call('runValidateOnly', 'image')
            ->assertHasNoErrors(['image', 'image_url', 'image_alt']);
    }
}
