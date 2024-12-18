<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    /**
     * 警告タイプ
     *
     * @var string $type エラーの種類
     */
    public $type;
    // $typeという名前のプロパティを公開アクセスとしてクラスに宣言している

    /**
     * 警告メッセージsession
     *
     * @var string $session セッション名
     */
    public $session;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$session)
    {
        $this->type = $type;
        $this->session = $session;
        // Alertが作られたときに$typeと$sessionがはいる。

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
