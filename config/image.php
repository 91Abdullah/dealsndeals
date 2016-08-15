<?php

return array(
    'library'     => 'gd',
    'upload_dir'  => 'uploads',
    'assets_upload_path' => 'storage/app/uploads',
    'quality'     => 85,
    'dimensions'  => [
        ['50','50',true, 85, 'thumbnail'],
        ['80','80',false, 85, 'xsmall'],
        ['98','98',false, 85, 'small'],
        ['250','250',true, 85, 'profile'],
        ['640','480',false, 85, 'medium'],
        ['800','800',false, 85, 'large']
    ]
);