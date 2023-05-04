<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Auth;
use function Termwind\style;

class BotManController extends Controller
{
    public function handle(){
        $botman = app('botman');

        if(!Auth::check()){

            $botman->hears('{message}', function ($botman, $message) {
                if ($message == 'hi') {
                    $this->askName($botman);
                }elseif (strpos($message, 'tìm') !== false or strpos($message, 'xyz') !== false){
                    $this->askTypeSearch($botman);
                } else {
                    $botman->reply("Bạn vui lòng liên hệ số điện thoại: <br/>
                        0907104902<br/>
                        Hoặc email:<br/>
                        linhvu29112001@gmail.com<br/>
                        để được hỗ trợ thông tin này", ['parse_mode' => 'HTML']);

                }
            });
        }

            $botman->listen();
    }

    public function askName($botman){
        $botman->ask("Hello! What's your name bro?", function (Answer $answer){
           $name = $answer->getText();

           $this->say('Nice to meet you '.$name);
        });
    }

    public function askTypeSearch($botman)
    {
        $question = Question::create('Bạn muốn tìm kiếm theo:')
            ->addButton(Button::create('Danh mục (category)')->value('cate'))
            ->addButton(Button::create('Thương hiệu (brand)')->value('brand'))
            ->addButton(Button::create('Loại')->value('tag'));

        $botman->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $selectedOption = $answer->getValue(); // lấy giá trị của tùy chọn được chọn
                switch ($selectedOption) {
                    case 'cate':
                        $botman = app('botman');
                        $this->askCate($botman);
                        break;
                    case 'brand':
                        $this->say("DDD");
                        break;
                    case 'tag':
                        // xử lý tùy chọn 3
                        break;
                    default:
                        $this->say('Xin lỗi, lựa chọn không hợp lệ.');
                        break;
                }
            }
        });
    }

    public function askCate($botman)
    {
        $question = Question::create('Danh mục:')
            ->addButton(Button::create('Mens')->value('men'))
            ->addButton(Button::create('Women\ss')->value('women'))
            ->addButton(Button::create('Kids')->value('kid'));

        $botman->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $selectedOption = $answer->getValue(); // lấy giá trị của tùy chọn được chọn
                switch ($selectedOption) {
                    case 'men':
                        $this->say("Yeah");
                        break;
                    case 'women':
                        // xử lý tùy chọn 2
                        break;
                    case 'kid':
                        // xử lý tùy chọn 3
                        break;
                    default:
                        $this->say('Xin lỗi, lựa chọn không hợp lệ.');
                        break;
                }
            }
        });
    }

}
