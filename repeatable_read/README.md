# Repeatable read

這個等級解決了 dirty read 的問題

也解決了 unrepeatable read的問題

但仍然有Phantom read的問題

Phantom read就是當A取得某一個範圍的資料後

B 對這範圍內的資料有新增修改刪除等動作後

A 再次取得這個範圍內的資料就會有不同

造成幻讀的問題（兩次讀到的資料不同，就像幻覺一樣XD）

先執行 count.php

```
php count.php
```

可以看到目前在資料庫內有幾筆資料

並且睡著

另外開一個視窗執行 create_product.php
```
php create_product.php TEST2
```

等 count.php 醒來

就會發現同一個session卻count到不同比數