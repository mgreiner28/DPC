<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class TestChildTest extends DuskTestCase
{

    public function testCreateTestChild()
    {
        $admin = \App\User::find(1);
        $test_child = factory('App\TestChild')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $test_child) {
            $browser->loginAs($admin)
                ->visit(route('admin.test_children.index'))
                ->clickLink('Add new')
                ->type("field_one", $test_child->field_one)
                ->type("field_two", $test_child->field_two)
                ->press('Save')
                ->assertRouteIs('admin.test_children.index')
                ->assertSeeIn("tr:last-child td[field-key='field_one']", $test_child->field_one)
                ->assertSeeIn("tr:last-child td[field-key='field_two']", $test_child->field_two)
                ->logout();
        });
    }

    public function testEditTestChild()
    {
        $admin = \App\User::find(1);
        $test_child = factory('App\TestChild')->create();
        $test_child2 = factory('App\TestChild')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $test_child, $test_child2) {
            $browser->loginAs($admin)
                ->visit(route('admin.test_children.index'))
                ->click('tr[data-entry-id="' . $test_child->id . '"] .btn-info')
                ->type("field_one", $test_child2->field_one)
                ->type("field_two", $test_child2->field_two)
                ->press('Update')
                ->assertRouteIs('admin.test_children.index')
                ->assertSeeIn("tr:last-child td[field-key='field_one']", $test_child2->field_one)
                ->assertSeeIn("tr:last-child td[field-key='field_two']", $test_child2->field_two)
                ->logout();
        });
    }

    public function testShowTestChild()
    {
        $admin = \App\User::find(1);
        $test_child = factory('App\TestChild')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $test_child) {
            $browser->loginAs($admin)
                ->visit(route('admin.test_children.index'))
                ->click('tr[data-entry-id="' . $test_child->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='field_one']", $test_child->field_one)
                ->assertSeeIn("td[field-key='field_two']", $test_child->field_two)
                ->assertSeeIn("td[field-key='created_by']", $test_child->created_by->name)
                ->assertSeeIn("td[field-key='created_by_team']", $test_child->created_by_team->name)
                ->logout();
        });
    }

}
