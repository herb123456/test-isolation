# Read committed

這是只能讀到commit之後的資料

大部分資料庫都是默認這種隔離等級

但這會造成一個問題

在同一個session下讀取到的資料會有不同

假設

A session 先讀取 id = 4 的資料

B session 更改了 id = 4 的資料

B session commit

A session 又讀取了 id = 4 的資料

這時候讀到的就會與第一次不一樣了

這叫 unrepeatable read

不可重複讀

這個測試資料庫內要先有資料

再去做update

所以先執行create_product.php

```
php create_product.php TEST
```

這會建立一筆名稱是TEST的資料

並會輸出這筆資料的ID

有了資料之後就可以開始實現 unrepeatable read了

首先執行 show_product.php

```
php show_product.php 2
```

這會去 select id = 2 的資料

id 可以依據剛剛新增的那筆 id

然後會sleep五秒

在這五秒之間

執行 update_product.php

```
php update_product.php 2 newName
```

這會去更新 id = 2 的名字成為 newName

這時候剛剛睡著的 show_product 應該也已經醒了

醒了之後他會去 select 第二次

這時候就會發現跟第一次 select 出來的資料不同