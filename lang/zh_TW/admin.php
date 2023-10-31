<?php

/*
|--------------------------------------------------------------------------
| Admin Language Lines
|--------------------------------------------------------------------------
*/

return [
    'account' => [
        'title' => '帳戶',
        'logout' => [
            'title' => '登出',
        ],
    ],
    'manage_checklists' => [
        'title'         => '管理清單',
        'checklist' => [
		    'create' => [
                'title' => '新清單',
		        'content' => [
                    'checklist_name'   => '清單名稱',
                    'name'             => '名稱',
                    'new_checklist_in' => '新清單於',
                    'save'             => '儲存',
                ],
            ],
            'edit'  => [
                'title' => '編輯清單',
		        'content' => [
                    'are_you_sure' => '你確定嗎？',
                    'delete'       => '刪除清單',
                    'name'         => '名稱',
                    'save'         => '儲存清單',
                ],
            ],
            'review'  => [
		        'content' => [
                    'store' => '儲存評論',
                ],
            ],
        ],
        'checklist_group' => [
		    'create' => [
                'title' => '新清單群組',
		        'content' => [
                    'checklist_group_name' => '清單群組名稱',
                    'name'                 => '名稱',
                    'save'                 => '儲存',
                ],
            ],
            'edit'  => [
                'title' => '編輯清單群組',
		        'content' => [
                    'are_you_sure' => '你確定嗎？',
                    'delete'       => '刪除清單群組',
                    'name'         => '名稱',
                    'save'         => '儲存',
                ],
            ],
        ],
		'tasks' => [
            'show'  => [
                'title' => '任務清單',
		        'content' => [
                    'add_due_date'            => '新增截止日期',
                    'add_to_my_day'           => '新增至我的一天',
                    'due'                     => '到期',
                    'next_monday'             => '下個星期一',
                    'next_week'               => '下週',
                    'no_tasks_found'          => '沒有任務',
                    'or_pick_a_date'          => '或者選擇一個日期',
                    'or_pick_a_date_and_time' => '或者選擇一個日期和時間',
                    'remind_me'               => '提醒我',
                    'reminder_to_be_sent_at'  => '提醒發送至',
                    'remove'                  => '刪除',
                    'remove_from_my_day'      => '從我的一天中刪除',
                    'save'                    => '儲存',
                    'today'                   => '今天',
                    'tomorrow'                => '明天',
                    'unlock_all_now'          => '立即解鎖',
                    'you_are_limited'         => '每個清單最多只能完成五個任務',
                ],
            ],
		    'create' => [
                'title' => '新任務',
		        'content' => [
                    'description' => '描述',
                    'name'        => '名稱',
                    'save'        => '儲存任務',
                ],
            ],
            'delete'  => [
                'title' => '刪除任務',
		        'content' => [
                    'are_you_sure' => '你確定嗎？',
                ],
            ],
            'edit'  => [
                'title' => '編輯任務',
		        'content' => [
                    'description'  => '描述',
                    'name'         => '名稱',
                    'save'         => '儲存任務',
                ],
            ],
            'important' => [
                'title' => '重要的',
		        'content' => [
                ],
            ],
            'my_day' => [
                'title' => '我的一天',
		        'content' => [
                ],
            ],
            'planned' => [
                'title' => '計劃的',
		        'content' => [
                ],
            ],
        ],
        'note' => [
            'title' => '注釋',
            'edit'  => [
                'title' => '編輯',
		        'content' => [
                    'save' => '儲存注釋',
                ],
            ],
        ],
    ],
    'pages' => [
        'title'            => '頁面',
        'edit'             => [
            'title' => '編輯頁面',
		    'content' => [
                'content' => '內容',
                'save'    => '儲存頁面',
                'title'   => '標題',
            ],
        ],
        'get_consultation' => [
            'title'   => '取得諮詢',
		    'content' => [
            ],
        ],
        'welcome' => [
            'title'   => '歡迎光臨',
		    'content' => [
            ],
        ],
    ],
    'manage_data' => [
        'title' => '管理數據',
        'users' => [
            'title'   => '使用者',
		    'content' => [
                'email'         => '電子郵件',
                'free_access'   => [
                    'title' => '免費進入',
		            'content' => [
                        'give'   => '免費進入',
                        'remove' => '刪除免費進入',  
                    ],
                ],
                'name'          => '名稱',
                'payment_plan'  => '付款方式',
                'register_time' => '註冊時間',
                'website'       => '網站',
            ],
        ],
        'menus' => [
		    'badge' => [
                'new' => '新增',
                'upd' => '更新',
            ],
        ],
    ],
];
