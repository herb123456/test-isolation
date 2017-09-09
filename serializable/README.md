# Serializable

Serializable 序列化級別

顧名思義

就是每個操作都要按照順序來執行

我們把測試Phantom read的code

將isolation level調整為 serializable 之後

可以發現 B 在執行新增的時候

必須先等A睡醒之後才會新增

但 B 的 code 裡面並沒有 sleep

也就是 B 的停頓

是資料庫避免Phantom read造成的

執行流程也是一樣

先執行 count.php

```
php count.php
```

可以看到目前在資料庫內有幾筆資料

並且睡著

另外開一個視窗執行 create_product.php
```
php create_product.php TEST3
```

可以發現並沒有直接 create

而是等 count.php 睡醒並count完第二次之後

才執行 insert