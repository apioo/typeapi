<?php

return [

    [['ANY'], '/', App\Website\Index::class],
    [['ANY'], '/specification', App\Website\Specification::class],
    [['ANY'], '/faq', App\Website\Faq::class],

];
