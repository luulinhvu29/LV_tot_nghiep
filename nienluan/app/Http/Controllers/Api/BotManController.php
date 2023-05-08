<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        }else{
            $botman->hears('{message}', function ($botman, $message) {
                if (strpos($message, 'tìm') !== false or strpos($message, 'xyz') !== false) {
                    $this->askTypeSearch($botman);
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
            ->addButton(Button::create('Giá tiền')->value('price'));

        $botman->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $selectedOption = $answer->getValue(); // lấy giá trị của tùy chọn được chọn
                switch ($selectedOption) {
                    case 'cate':
                        $botman = app('botman');
                        $botman->reply("Danh mục (category)");
                        $question2 = Question::create('Danh mục:')
                            ->addButton(Button::create('Men\'s')->value('men'))
                            ->addButton(Button::create('Women\'s')->value('women'))
                            ->addButton(Button::create('Kid\'s')->value('kid'));
                        $botman->ask($question2, function (Answer $answer) {
                            if ($answer->isInteractiveMessageReply()) {
                                $selectedOption = $answer->getValue(); // lấy giá trị của tùy chọn được chọn
                                switch ($selectedOption) {
                                    case 'men':
                                        $botman = app('botman');
                                        $botman->reply("Men");
                                        $url = 'http://127.0.0.1:8000/shop/men';
                                        $message = sprintf('Bạn có thể tham khảo kết quả tại <a href="%s" target="_blank">ĐÂY</a>.', $url);
                                        $botman->reply($message);
                                        break;
                                    case 'women':
                                        $botman = app('botman');
                                        $botman->reply("Women");
                                        $url = 'http://127.0.0.1:8000/shop/women';
                                        $message = sprintf('Bạn có thể tham khảo kết quả tại <a href="%s" target="_blank">ĐÂY</a>.', $url);
                                        $botman->reply($message);
                                        break;
                                    case 'kid':
                                        $botman = app('botman');
                                        $botman->reply("Kid");
                                        $url = 'http://127.0.0.1:8000/shop/kids';
                                        $message = sprintf('Bạn có thể tham khảo kết quả tại <a href="%s" target="_blank">ĐÂY</a>.', $url);
                                        $botman->reply($message);
                                        break;
                                    default:
                                        $this->say('Xin lỗi, lựa chọn không hợp lệ.');
                                        break;
                                }
                            }
                        });
                        break;
                    case 'brand':
                        $botman = app('botman');
                        $botman->reply("Thương hiệu (brand)");
                        $question3 = Question::create('Thương hiệu:');
                        foreach(Brand::all() as $brand) {
                            $question3->addButton(Button::create($brand->name)->value($brand->id));
                        }
                        $botman->ask($question3, function (Answer $answer) {
                            if ($answer->isInteractiveMessageReply()) {
                                $selectedOption = $answer->getValue(); // lấy giá trị của tùy chọn được chọn
                                $botman = app('botman');
                                $botman->reply(Brand::find($selectedOption)->name);
                                $url = 'http://127.0.0.1:8000/shop?brand%5B'.$selectedOption.'%5D=on';
                                $message = sprintf('Bạn có thể tham khảo kết quả tại <a href="%s" target="_blank">ĐÂY</a>.', $url);
                                $botman->reply($message);

                            }
                        });
                        break;
                    case 'price':
                        $botman = app('botman');

                        $botman->ask("Giá thấp nhất:", function (Answer $answer){
                            $min = 0;
                            $max = 0;
                            $min = $answer->getText();
                            $this->say($min);
                            $botman = app('botman');
                            $botman->ask("Giá cao nhất:", function (Answer $answer) use ($min) {
                                $botman = app('botman');
                                $max = $answer->getText();
                                $this->say($max);
                                $url = 'http://127.0.0.1:8000/shop?price_min=%24'.$min.'&price_max=%24'.$max;
                                $message = sprintf('Bạn có thể tham khảo kết quả tại <a href="%s" target="_blank">ĐÂY</a>.', $url);
                                $botman->reply($message);
                            });

                        });

                        break;
                    default:
                        $this->say('Xin lỗi, lựa chọn không hợp lệ.');
                        break;
                }
            }
        });
    }

}
