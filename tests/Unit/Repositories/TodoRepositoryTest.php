<?php

namespace Tests\Unit\Repositories;

use App\Models\Todo;
use App\Models\User;
use App\Repositories\TodoRepository;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TodoRepositoryTest extends TestCase
{
    public function test_getTodosForUser_returns_todos_for_user()
    {
        $user = User::factory()->create(['name'=>'coolGuy']);
        $todo = Todo::factory(5)->create([
            'user_id' => $user->id
        ]);

        Todo::factory()->create();

        $todoRepo = new TodoRepository();
        $result = $todoRepo->getTodosForUser($user);

        $this->assertEquals(6, Todo::count());
        $this->assertEquals(5, $result->count());
    }

    public function  test_getTodo_get_route_retunrs_todos()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $result = $this->get(route("dashboard"));
        $result->assertStatus(200);
    }
}
