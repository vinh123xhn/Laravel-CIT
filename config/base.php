<?php

/* --- System group user */
if (!defined('GROUP_ADMIN')) {define('GROUP_ADMIN', 1);}

/* --- System active */
if (!defined('ACTIVE_TRUE')) {define('ACTIVE_TRUE', 1);}
if (!defined('ACTIVE_FALSE')) {define('ACTIVE_FALSE', 0);}
if (!defined('EMAIL_TEMPLATE_FORGOT_PASSWORD')) {define('EMAIL_TEMPLATE_FORGOT_PASSWORD', 1);}



if (!defined('SESSION_EXPIRED')) {define('SESSION_EXPIRED', 180);} // Expired in 30 minutes

return [
    'type_of_doctor' => [
        1 => 'Bác sĩ',
        2 => 'Dược sĩ',
        3 => 'Điều dưỡng',
        4 => 'Nữ Hộ sinh',
    ],
    'type_of_children' => [
        1 => 'Bình thường',
        2 => 'Suy dinh dưỡng',
    ],
    'type_of_hospital' => [
        1 => 'Bệnh viện',
        2 => 'Cơ sở y tế',
    ]


];
