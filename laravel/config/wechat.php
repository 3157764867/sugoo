<?php
return [
    'use_alias'    => env('WECHAT_USE_ALIAS', false),
    'app_id'       => env('WECHAT_APPID', 'wx426b3015555a46be'), // 必填
    'secret'       => env('WECHAT_SECRET', '01c6d59a3f9024db6336662ac95c8e74'), // 必填
    'token'        => env('WECHAT_TOKEN', 'e10adc3949ba59abbe56e057f20f883e'),  // 必填
    'encoding_key' => env('WECHAT_ENCODING_KEY', 'YourEncodingAESKey') // 加密模式需要，其它模式不需要
];