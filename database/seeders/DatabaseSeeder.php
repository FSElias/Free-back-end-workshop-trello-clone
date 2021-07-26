<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->count(10)->create();

        $board1 = Board::create([
            'title' => 'Groceries', 'color' => 'teal', 'user_id' => 1
        ]);
        $board2 = Board::create([
            'title' => 'Work', 'color' => 'orange', 'user_id' => 2
        ]);
        $board3 = Board::create([
            'title' => 'Hobby', 'color' => 'indigo', 'user_id' => 1
        ]);

        collect([$board1, $board2, $board3])->each(function (Board $board) {


            $list1 = $board->cardLists()->create(['title' => 'To-Do']);
            $list2 = $board->cardLists()->create(['title' => 'In progress']);
            $list3 = $board->cardLists()->create(['title' => 'Done']);

//            $list1 = CardList::create([
//                'title' => 'To-Do', 'board_id' => $board->id
//            ]);
//            $list2 = CardList::create([
//                'title' => 'In progress', 'board_id' => $board->id
//            ]);
//            $list3 = CardList::create([
//                'title' => 'Done', 'board_id' => $board->id
//            ]);

            collect([$list1, $list2, $list3])->each(function (CardList $card_list) use ($board) {
                $order = 1;

                collect([
                    'Buy groceries',
                    'Take the dog for a walk',
                    'Pay the bills',
                    'Get the car fixed',
                    'Write novel',
                    'Buy food',
                    'Paint a picture',
                    'Create a course'
                ])->random(random_int(2, 5))->each(function (string $task) use ($board, $card_list, &$order) {

                    $card_list->cards()->create(['title' => $task, 'user_id' => $board->user_id, 'order' => $order++]);

//                    $list->cards()->save(
//                        Card::make(['title' => $task, 'owner_id' => $board->owner_id, 'order' => $order++])
//                    );
                });
            });
        });
    }
}
