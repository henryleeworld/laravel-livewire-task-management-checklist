# Laravel 8 Livewire 任務管理清單

你認為只有高知識份子，或是那些天生很有組織架構的人，才有能力與動機，去使用清單管理來追求高生產力嗎？其實，完全不需要任何特殊科技、學位或天賦，只需要一套日常慣例和一個可靠的系統，就能養成使用清單的好習慣，不迷失在每天龐大的訊息量裡。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/login` 來進行登入，以管理者身分使用預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ ；以使用者身分使用預設的電子郵件和密碼分別為 __user@user.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/vsdg2gd.png)
> 以管理者身分，確實切分任務，把大事化成能夠處理的小事

![](https://i.imgur.com/TyPiXUj.png)
> 以使用者身分，捕捉自己的待辦任務，將壓力移出大腦，進而獲取工作上的終極生產力